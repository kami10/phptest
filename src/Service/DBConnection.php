<?php

namespace Kamran\Phptest\Service;

use PDO;
use PDOException;

class DBConnection
{
    private PDO $conn;

    public function __construct(array $config)
    {
        $this->conn = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
    }

    public function addUsers(array $users)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT IGNORE INTO tbl_users (id, name, email, gender, status) VALUES";
            foreach ($users as $user) {
                $user['name'] = htmlentities($user['name'], ENT_QUOTES);
                $user['email'] = htmlentities($user['email'], ENT_QUOTES);
                $user['gender'] = htmlentities($user['gender'], ENT_QUOTES);
                $user['status'] = htmlentities($user['status'], ENT_QUOTES);

                $sql .= '("' . implode('","', $user) . '"),';
            }
            $sql = rtrim($sql, ',');

            // use exec() because no results are returned
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addPosts(array $posts)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT IGNORE INTO tbl_posts (id, user_id, title, body) VALUES";
            foreach ($posts as $post) {
                $post['title'] = htmlentities($post['title'], ENT_QUOTES);
                $post['body'] = htmlentities($post['body'], ENT_QUOTES);

                $sql .= '("' . implode('","', $post) . '"),';
            }
            $sql = rtrim($sql, ',');

            // use exec() because no results are returned
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getPosts(string $gender = '', string $status = '')
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT body FROM tbl_posts INNER JOIN tbl_users ON tbl_posts.user_id = tbl_users.id";
            if (!empty($gender) || !empty($status)) {
                $sql .= " WHERE ";
            }
            if (!empty($gender)) {
                $sql .= " tbl_users.gender = '$gender' ";
            }
            if (!empty($gender) && !empty($status)) {
                $sql .= "AND";
            }
            if (!empty($status)) {
                $sql .= " tbl_users.status = '$status'";
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $output = [];
            foreach ($stmt->fetchAll() as $key => $value) {
                $output[$key] = $value;
            }
            return $output;

        } catch (PDOException $e) {
            return false;
        }
    }
}