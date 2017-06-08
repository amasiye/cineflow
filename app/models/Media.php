<?php

/**
 *
 */
class Media implements iModel
{
  public $id;
  public $title;
  public $description;
  public $author;
  public $path;
  public $type;
  public $status;
  public $created;
  public $modified;

  function __construct()
  {
  } // end __construct()

  public function save()
  {
  } // end save()

  public static function get(array $args = [])
  {
  } // end get()

  public static function set(array $args = [])
  {
  } // end set()
} // end Media{}


?>
