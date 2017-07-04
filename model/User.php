<?php

class User
{
    private $database;
    public $isLoggedIn;

    public function __construct()
    {
        global $db;
        $this->isLoggedIn();
        $this->database = $db;
    }

    public function login($data)
    {
        $this->getUserByEmail($data);
    }

    private function isLoggedIn()
    {
        if (!isset($_SESSION["user"]) && empty($_SESSION["user"])) {
            return $this->isLoggedIn = false;
        }

        return $this->isLoggedIn = true;
    }

    protected function getUserByEmail($data)
    {
        $user = $this->database->select(
            "user",
            [
                "role_id",
                "username",
                "firstname",
                "lastname",
                "fullname",
                "email",
                "avatar_id",
                "salt"
            ],
            [
                "email" => $data["email"],
            ]
        );

        if (empty($user)) {
            return "E_USER_DOES_NOT_EXIST";
        }

        $passwordHash = hash("sha256", $data["password"].$user[0]["salt"]);
        unset($user[0]["salt"]);

        $this->checkUserPassword($data, $passwordHash);
    }

    protected function checkUserPassword($data, $passwordHash)
    {
        $userByPassword = $this->database->select(
            "user",
            [
                "role_id",
                "username",
                "firstname",
                "lastname",
                "fullname",
                "email",
                "avatar_id",
            ],
            [
                "email" => $data["email"],
                "password" => $passwordHash
            ]
        );

        if (empty($userByPassword)) {
            return "E_WRONG_PASSWORD";
        }

        $this->setUserSession($userByPassword[0]);
    }

    protected function setUserSession($user)
    {
        $_SESSION["user"] = [
            "role_id" => $user["role_id"],
            "username" => $user["username"],
            "firstname" => $user["firstname"],
            "lastname" => $user["lastname"],
            "fullname" => $user["fullname"],
            "email" => $user["email"],
            "avatar_id" => $user["avatar_id"]
        ];
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        header("Location: /admin/login");
    }
}
