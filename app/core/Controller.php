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
    global $session, $app, $db;
    $header = 'header.php';
    $footer = 'footer.php';

    # Load specific header
    if(key_exists('header', $data) && !empty($data['header']))
    {
      $header = $data['header'];
    }

    # Load specific footer
    if(key_exists('footer', $data) && !empty($data['footer']))
    {
      $footer = $data['footer'];
    }

    Router::resolve_content_type();
    Template::head($header);
    require_once 'app/views/' . $view . '.php';
    Template::foot($footer);
    # Load footer
  } // end view()
} // end Controller{}

?>
