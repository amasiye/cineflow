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

    public function create($user_id, $hash, $expires)
    {

    } // end create()

    public function get_from_hash($hash)
    {
      global $db;
      return $db->select('*/' . TABLE_SESSIONS . "/session_hash='${$hash}'");
    } // end get_from_hash()

    public static function exists($hash)
    {
      return false;
    } // end exists()
} // end Session()

?>
