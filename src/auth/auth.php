<?php

namespace App\auth;

use PDO;

session_start();

class auth
{
    private $dbuser = 'root';
    private $dbname = 'mysql:host=localhost;dbname=amarproshno';
    private $dbpass = '';

    private $userid;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $date_of_birth;
    private $gender;
    private $hobby;
    private $interest;
    private $email;
    private $password;

    public function __construct()
    {
    }

    public function setData($data = '')
    {

        if (!empty($data['userid'])) {
            $this->userid = $data['userid'];
        }
        if (!empty($data['first_name'])) {
            $this->first_name = $data['first_name'];
        }
        if (!empty($data['middle_name'])) {
            $this->middle_name = $data['middle_name'];
        }
        if (!empty($data['last_name'])) {
            $this->last_name = $data['last_name'];
        }
        if (!empty($data['date_of_birth'])) {
            $this->date_of_birth = $data['date_of_birth'];
        }
        if (!empty($data['gender'])) {
            $this->gender = $data['gender'];
        }
        if (!empty($data['hobby'])) {
            $this->hobby = $data['hobby'];
        }
        if (!empty($data['interest'])) {
            $this->interest = $data['interest'];
        }
        if (!empty($data['email'])) {
            $this->email = $data['email'];
        }
        if (!empty($data['password'])) {
            $this->password = $data['password'];
        }
        return $this;

    }

    public function store()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "INSERT INTO users(id,first_name,middle_name,last_name,email,password,created_at) VALUES(:i,:f,:m,:l,:e,:p,:c)";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':f' => $this->first_name,
                ':m' => $this->middle_name,
                ':l' => $this->last_name,
                ':e' => $this->email,
                ':p' => $this->password,
                ':c' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);

            if ($status) {
                $_SESSION['message'] = "<h3 style='color: green;text-align: center'>Registration Succesful</h3><br>";
                header('location:../../register.php');
            } else {
                $_SESSION['message'] = "<h3 style='color: red;text-align: center'>Registration Failed</h3><br>";
                header('location:../../register.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function login($info = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);

        $UserOrEmail = "'" . $info['email'] . "'";
        $password = "'" . $info['password'] . "'";

        $query = "SELECT * FROM users WHERE email=$UserOrEmail AND password=$password";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();

        if (!empty($data)) {
            $_SESSION['user'] = $data;
            header('location:../../index.php');
        } else {
            $_SESSION['message'] = "<h3 style='color: red;text-align: center'>Your Email or Password is Wrong</h3><br>";
            header('location:../../login.php');
        }
    }

    public function profile($uid = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM users WHERE id=$uid";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function update()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "UPDATE users SET first_name=:f, middle_name=:m, last_name=:l, gender=:g, hobby=:h, interest=:i, date_of_birth=:d WHERE id=:uid";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':f' => $this->first_name,
                ':m' => $this->middle_name,
                ':l' => $this->last_name,
                ':g' => $this->gender,
                ':h' => $this->hobby,
                ':i' => $this->interest,
                ':d' => $this->date_of_birth,
                ':uid' => $_SESSION['user']['id']
            );

            $status = $stmt->execute($data);

            if ($status) {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Profile Successfully Updated..!
              </div>';
                header('location:../../profile.php?uid=' . $_SESSION['user']['id']);
            } else {
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Failed to Updated Your Profile..!
              </div>';
                header('location:../../update.php?uid=1');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function ShowAllUsers()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM users ORDER BY id DESC ";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function delete($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "DELETE FROM users WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->execute();;

        if ($data) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Users Successfully Deleted..!
              </div>';
            header('location:../../users.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Failed to delete User..!
              </div>';
            header('location:../../users.php');

        }
    }
}