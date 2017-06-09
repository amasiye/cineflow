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
    $header = 'header';
    $footer = 'footer';

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
    Template::body($view);
    Template::foot($footer);
    # Load footer
  } // end view()

  function handle_action($action, $args, $default_view = 'home/index', $data = [])
  {
    if(!empty($action))
    {
      $action = str_replace('-', '_', $action);

      if(method_exists($this, $action))
      {
        $this->$action($args);
      }
      else
      {
        $session = $this->session;
        $this->view($default_view, $data);
      }
    }
    else
    {
      $session = $this->session;
      $this->view($default_view, $data);
    }
  } // end handle_action()
} // end Controller{}

?>
