<?php

/**
 * The default app controller. This is the fall back controller when no
 * appropriate controller can be found to handle a request.
 */
class Home extends Controller
{
  public function index($action = '', $args = '')
  {
    $this->handle_action($action, $args, 'home/index');
  } // end index()

  /**
   * The login action handler.
   */
  public function login($args = [])
  {
    if(empty($args))
    {
      $session = $this->session;
      $this->view('home/login');
    }
    else
    {
      if(isset($_REQUEST[LABEL_APIKEY]) && !empty($_REQUEST[LABEL_APIKEY]))
      {
        
      }
    }
  } // end login()

  public function register($args = [])
  {
    $session = $this->session;
    $this->view('home/register');
  } // end register()
} // end Home{}

?>
