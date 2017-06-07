<?php



class User
{
  public $user_id;
  public $user_login;
  public $user_password;
  public $user_email;
  public $user_fullname;
  public $user_address;
  public $user_billing;
  public $user_type;
  public $user_registered;
  public $user_modified;
  public $user_activity;
  public $user_status;
  public $user_watchlist;
  public $user_flags;

  function __construct()
  {

  } // end __construct()

  public function save()
  {

  } // end save()

  public static function get(array $args = [])
  {
    global $db;
    $sql = "";
    $cats = null;
    $id_flag = false;
    $login_flag = false;
    $email_flag = false;

    if(empty($args))
    {
      $sql = '*/' . TABLE_USERS;
    }
    else
    {
      $sql = '*/' . TABLE_USERS;

      if(array_key_exists('id', $args))
      {
        $sql .= "/user_id=" . $args['id'];
      }

      if(array_key_exists('login', $args))
      {
        $sql .= ($id_flag)? '&user_login=' . $args['login'] : 'user_login=' . $args['login'];
      }

      if(array_key_exists('email', $args))
      {
        $sql .= ($login_flag)? '&user_email=' . $args['email'] : 'user_email=' . $args['email'];
      }

      if(array_key_exists('description', $args))
      {
        $sql .= ($email_flag)? '&user_description=' . $args['description'] : 'user_description=' . $args['description'];
      }
    }

    return $db->select($sql);
  } // end get()

  public static function set(array $args = [])
  {
    $where = (key_exists('where', $args))? : null;

    if(empty($where))
    {
      return STATUS_BAD_REQUEST;
    }


  } // end set()

  public static function register($login, $password, $email, array $args = [])
  {

  } // end register()
} // end User{}

?>
