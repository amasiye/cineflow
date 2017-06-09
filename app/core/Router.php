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

  public static function get_request_file_extension()
  {
    $url = $_GET['url'];
    $mime_type = substr($url, -4);
    return $mime_type;
  } // end get_request_file_extension()

  public static function resolve_content_type()
  {
    $url = ((isset($_GET['url']) && !empty($_GET['url']))? $_GET['url'] : "");
    $mime_type = substr($url, -4);
    $content_type = '';

    switch($mime_type)
    {
      case '.png':
        header("Content-Type: image/png");
        break;

      case '.bmp':
        header("Content-Type: image/bmp");
        break;

      case '.gif':
        header("Content-Type: image/gif");
        break;

      case '.jpg':
        header("Content-Type: image/jpg");
        break;

      case '.webp':
        header('Content-Type: image/webp');
        break;

      case '.pdf':
        header('Content-Type: application/pdf');
        break;

      default:
        header('Content-Type: text/html');
        break;
    }
  } // end resolve_content_type()
} // end Router{}


?>
