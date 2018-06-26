<?php
namespace App\auth;

use PDO;

class auth
{
    private $password;
    private $email;
    private $dbuser = 'root';
    private $dbpass = '';

    public function __construct()
    {
echo 'this output from constructor';
    }
    public function setData($data='')
    {
        $this->email = $data['email'];
        $this->password = $data['password'];
        return $this;
    }
    public function store(){

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', $this->dbuser, $this->dbpass);
            $query = "INSERT INTO user(id,email,password) VALUES(:i,:e,:p)";
            $stmt = $pdo->prepare($query);
            $info = array(
                ':i' => null,
                ':e' => $this->email,
                ':p' => $this->password,
            );

            $stmt->execute($info);
            # Affected Rows?


            echo $stmt->rowCount(); // 1
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}