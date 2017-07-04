<?php
namespace Admin;

class Controller
{
    public $userInstance;
    
    public function __construct()
    {
        $this->userInstance = new \User();
    }
}
