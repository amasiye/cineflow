<?php

class Controller
{
  public $db;
  public $session;
  
  public function model($model)
  {
    require_once 'app/models/' . $model . '.php';
    return new $model();
  }

  public function view($view, $data = [])
  {
    $header = 'header.php';
    $footer = 'footer.php';

    # Load header
    if(key_exists('header', $data))
    {
      $header = $data['header'];
    }

    if(key_exists('footer', $data))
    {
      $footer = $data['footer'];
    }

    Template::head($header);
    require_once 'app/views/' . $view . '.php';
    Template::foot($footer);
    # Load footer
  } // end view()
} // end Controller{}

?>
