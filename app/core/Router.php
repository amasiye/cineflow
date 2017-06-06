<?php

/**
 *
 */
class Router
{
  public static function redirect($path)
  {
    header("Location: {$path}");
  } // end redirect()
} // end Router{}


?>
