<?php

namespace Root;

define("EOL", "\r\n");
define("BR", "<br>");

class Config
{
    public $dbprofile;

    public function __construct()
    {
        $this->dbprofile = [
            "server"        => "localhost",
            "username"      => "rentroll",
            "password"      => "rentroll",
            "database_name" => "rentroll",
            "database_type" => "mysql",
            "charset"       => "utf8"
        ];
    }
}

$config = new Config();
