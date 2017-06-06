<?php
session_start();

class Session
{
    public $id;
    public $user;

    function __construct()
    {
        $this->id = session_id();
    } // end __construct()

    public function get($key)
    {
        return ( ( isset($_SESSION[$key]) && !empty($_SESSION[$key]) )? $_SESSION[$key] : null );
    } // end get()

    public function set(string $k, string $v)
    {
        $_SESSION[$k] = $v;
    } // end set()

    public function has_active_user()
    {
      return ( (!empty($user)) && (!empty($id)) && (!empty($_SESSION[SESSION_ID_KEY])) );
    } // end has_active_user()

    public function handle_authorization()
    {
      if(!has_active_user())
      {
        Router::redirect(BASEPATH . 'login/');
      }
    } // end handle_authorization()
} // end Session()

?>
