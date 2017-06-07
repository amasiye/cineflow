<?php

/**
 * View template class.
 */
class Template
{
  public static function head($header = 'header.php')
  {
    if(empty($header))
    {
      die("Header file is <strong><u>not defined</u></strong> on line 8 of " . $_SERVER['SCRIPT_FILENAME']);
    }
    require_once 'includes/' . $header;
  } // end head()

  public static function foot($footer = 'footer.php')
  {
    if(empty($footer))
    {
      die("Footer file is <strong><u>not defined</u></strong> close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }
    require_once 'includes/' . $footer;
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
      echo "<link rel='styelsheet' href='{$path}'>" . PHP_EOL;
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
      die("Invalid path value '{$paths}' close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    if(empty($delimiter))
    {
      die("Invalid delimeter value '{$delimeter}' close to line " . __LINE__ . " of " . $_SERVER['SCRIPT_FILENAME']);
    }

    $paths = explode($delimiter, $paths);

    foreach($paths as $path)
    {
      echo "<script src='{$path}'></script>" . PHP_EOL;
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
