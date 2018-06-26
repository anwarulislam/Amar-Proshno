<?php

namespace App\answer;

use PDO;


class answer
{
    private $dbuser = 'root';
    private $dbname = 'mysql:host=localhost;dbname=amarproshno';
    private $dbpass = '';

    private $user_id;
    private $answer_id;
    private $question_id;
    private $description;

    public function __construct()
    {
    }

    public function setData($data = '')
    {
        if (!empty($data['user_id'])){
            $this->user_id = $data['user_id'];
        }

        if (!empty($data['description'])){
            $this->description = $data['description'];
        }

        if (!empty($data['question_id'])){
            $this->question_id = $data['question_id'];
        }
        if (!empty($data['answer_id'])){
            $this->answer_id = $data['answer_id'];
        }
        return $this;
    }

    public function store()
    {

        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "INSERT INTO answers(id,user_id,question_id,description,created_at) VALUES(:i,:u,:q,:d,:c)";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':u' => $this->user_id,
                ':q' => $this->question_id,
                ':d' => $this->description,
                ':c' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);

            if ($status) {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Answer Successfully Added..!
              </div>';
                header('location:../../show.php?id=' . $this->question_id);
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();


        }

    }

    public function ShowAnswer($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT users.photo, users.first_name, users.middle_name, users.last_name, answers.* FROM users LEFT JOIN answers ON users.id=answers.user_id WHERE question_id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function show($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM answers WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function update(){
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "UPDATE answers SET description=:d, updated_at=:u WHERE id=$this->answer_id";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':d' => $this->description,
                ':u' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);

            if ($status) {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Answer Successfully Updated..!
              </div>';
                header('location:../../show.php?id=' . $this->question_id);
            } else {
                $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Answer Not Updated..!
              </div>';
                header('location:../../quedit.php?quid=' . $this->question_id);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function SingleAns($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT users.photo, users.first_name, users.middle_name, users.last_name, answers.* FROM users LEFT JOIN answers ON users.id=answers.user_id WHERE answers.user_id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function delete($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "DELETE FROM ANSWERS WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->execute();;

        if ($data){
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Answer Successfully Deleted..!
              </div>';
            header('location:../../index.php');
        } else{
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Failed to delete Your Answer..!
              </div>';
            header('location:../../index.php');

        }
    }
}

