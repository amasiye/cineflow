<?php

/**
 * View template class.
 */
class Template implements iModel
{
  public function save()
  {

  } // end save()

  public function set(array $args = [])
  {

  } // end set()

  public function get(array $args = [])
  {

  }

  public static function head($header = 'header')
  {
    if(empty($header))
    {
      die("Header file is <strong><u>not defined</u></strong> on line 8 of " . $_SERVER['SCRIPT_FILENAME']);
    }

    if(streq('.php', substr($header, -4)))
    {
      $header = str_ireplace('.php', '', $header);
    }

    require_once 'includes/' . $header . '.php';
  } // end head()

  public static function body($view = 'home/index')
  {
    if(empty($view))
    {
      die("Template file is <strong><u>not defined</u></strong> on line 8 of " . $_SERVER['SCRIPT_FILENAME']);
    }

    if(streq('.php', substr($view, -4)))
    {
      $view = str_ireplace('.php', '', $view);
    }

    require_once 'app/views/' . $view . '.php';
  }

  /**
   * Ends the template file
   */
  public static function foot($footer = 'footer')
  {
    if(empty($footer))
    {
      die("Footer file is <strong><u>not defined</u></strong> close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    if(streq('.php', substr($footer, -4)))
    {
      $footer = str_ireplace('.php', '', $footer);
    }

    require_once 'includes/' . $footer . '.php';
  } // end foot()

  public static function load_styles($paths, $delimiter = ';')
  {
    if(empty($paths))
    {
      die("Invalid path value '{$paths}' close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    if(empty($delimiter))
    {
      die("Invalid delimeter value '{$delimeter}' close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    $paths = explode($delimiter, $paths);

    foreach($paths as $path)
    {
      ?><link rel="stylesheet" href="<?= trim($path); ?>"><?php echo PHP_EOL;
    }
  } // end load_styles()

  /**
   * Loads javascript files using a delimiter separated string.
   * @param {string} $paths The delimiter seperated string of paths.
   * @param {string} $delimiter [Optional]. Specifies what delimiting symbol to use. Default = ';'
   */
  public static function load_scripts(string $paths, $delimiter = ';')
  {
    if(empty($paths))
    {
      die("Invalid path value close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    if(empty($delimiter))
    {
      die("Invalid delimeter value close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    $paths = explode($delimiter, $paths);

    foreach($paths as $path)
    {
      ?><script src="<?= trim($path) ?>"></script><?php echo PHP_EOL;
    }
  } // end load_scripts()

  public static function load_component($name)
  {
    global $session;
    switch ($name)
    {
      case 'navbar':
        include_once COMPONENTPATH . $name . '.php';
        break;

      default:
        break;
    }
  } // end load_component()
} // end Template{}


?>
