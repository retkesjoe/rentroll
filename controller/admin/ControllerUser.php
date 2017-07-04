<?php
namespace Admin;

class ControllerUser extends Controller
{
	protected $user;
    public function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    {
        $this->userInstance->login($data);
        header("Location: dashboard");
    }

    public function logout()
    {
    	$this->userInstance->logout();
    }
}
