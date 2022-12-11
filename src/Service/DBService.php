<?php

namespace Kamran\Phptest\Service;

class DBService
{
    private DBConnection $dbConnection;

    public function __construct(DBConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function addUsers(array $users)
    {
        $this->dbConnection->addUsers($users);
    }

    public function addPosts(array $posts)
    {
        $this->dbConnection->addPosts($posts);
    }

    public function getPosts(string $gender, string $status)
    {
        return $this->dbConnection->getPosts($gender, $status);
    }
}