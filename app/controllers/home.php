<?php

class Home extends Controller
{
  public function index($name = '', $other = '')
  {
    $session = $this->session;
    $user = $this->model('User');
    $user->name = $name;
    $this->session->user = $user;
    $this->view('home/index', ['name'=>$user->name]);
  }

  public function login()
  {
    $session = $this->session;
    $this->view('home/login');
  } // end login()
} // end Home{}

?>
