<?php

/**
 *
 */
class Settings implements iModel
{
  private $data;

  function __construct()
  {
    $options = $this->get(['autoload' => 'yes']);

    if(!empty($options) && streq('array', gettype($options)))
    {
      foreach($options as $k => $v)
      {
        $this->__set(substr($k, strlen('option_')), $v);
      }
    }
  } // end __construct()

  public function __get($var_name)
  {
    if(!key_exists($var_name, $this->data))
    {
      throw new Exception("<strong>Fatal Error: </strong> Undefined variable {$var_name} in " . $_SERVER['SCRIPT_FILENAME'] . " near line " . __LINE__);
    }

    return $this->data[$var_name];
  } // end __get()

  public function __set($var_name, $value)
  {
    $this->data[$var_name] = $value;
  } // end __set()

  public function save()
  {
  } // end save()

  /**
   * Returns settings data from the database.
   * @param {array} $args The arguments
   */
  public function get(array $args = [])
  {
    global $db;
    $opts = null;
    $params = "";
    $id_flag = false;
    $name_flag = false;
    $value_flag = false;
    $description_flag = false;
    $autoload_flag = false;

    if(empty($args))
    {
      $params = '*/' . TABLE_OPTIONS;
    }
    else
    {
      $params = '*/' . TABLE_OPTIONS;

      if(key_exists('id', $args))
      {
        $params .= "/option_id=" . $args['id'];
        $id_flag = true;
      }

      if(key_exists('value', $args))
      {
        $params .= ($id_flag)? '&option_value=' . $args['value'] : '/option_value=' . $args['value'];
        $value_flag = true;
      }

      if(key_exists('name', $args))
      {
        $params .= ($value_flag)? "&option_name='" . $args['name'] . "'" : "/option_name='" . $args['name'] . "'";
        $value_flag = true;
      }

      if(key_exists('description', $args))
      {
        $params .= ($name_flag)? "&option_description='" . $args['description'] . "'" : "/option_description='" . $args['description'] . "'";
        $description_flag = true;
      }

      if(key_exists('autoload', $args))
      {
        $params .= ($description_flag)? "&option_autoload='" . $args['autoload'] . "'" : "/option_autoload='" . $args['autoload'] . "'";
        $autoload_flag = true;
      }
    }

    return $db->select($params);
  } // end get()

  public function set(array $args = []) {} // end set()
} // end Settings{}

?>
