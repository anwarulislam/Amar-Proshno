<?php

namespace App\question;

use PDO;

class question
{
    private $dbuser = 'root';
    private $dbname = 'mysql:host=localhost;dbname=amarproshno';
    private $dbpass = '';

    private $title;
    private $description;
    private $user_id;
    private $question_id;
    private $userIdName;

    public function setData($data = '')
    {
        if (!empty($data['question_id'])) {
            $this->question_id = $data['question_id'];
        }
        if (!empty($data['user_id'])) {
            $this->user_id = $data['user_id'];
        }
        if (!empty($data['title'])) {
            $this->title = $data['title'];
        }
        if (!empty($data['description'])) {
            $this->description = $data['description'];
        }
        return $this;
    }

    public function getAllQuestions()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT users.photo, users.first_name, users.middle_name, users.last_name, questions.* FROM users LEFT JOIN questions ON users.id=questions.user_id ORDER BY id DESC";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getQuestionSidebar()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM questions ORDER BY id DESC LIMIT 5";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function show($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT users.photo, users.first_name, users.middle_name, users.last_name, questions.* FROM users LEFT JOIN questions ON users.id=questions.user_id WHERE questions.id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function SingleQu($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT users.photo, users.first_name, users.middle_name, users.last_name, questions.* FROM users LEFT JOIN questions ON users.id=questions.user_id WHERE questions.user_id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function store()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "INSERT INTO questions(id,user_id,title,description,created_at) VALUES(:i,:u,:t,:d,:c)";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':u' => $this->user_id,
                ':t' => $this->title,
                ':d' => $this->description,
                ':c' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);

            if ($status) {
                $_SESSION['message'] = "<h3 style='color: green;'>Successfully question asked</h3><br>";
                header('location:../../index.php');
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "UPDATE questions SET title=:t, description=:d, updated_at=:u WHERE id=$this->question_id";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':t' => $this->title,
                ':d' => $this->description,
                ':u' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);

            if ($status) {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Question Successfully Updated..!
              </div>';
                header('location:../../show.php?id=' . $this->question_id);
            } else {
                $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Question Not Updated..!
              </div>';
                header('location:../../quedit.php?quid=' . $this->question_id);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "DELETE FROM questions WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->execute();;

        if ($data) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Your Question Successfully Deleted..!
              </div>';
            header('location:../../profile.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Failed to delete Your Question..!
              </div>';
            header('location:../../index.php');

        }
    }
}

