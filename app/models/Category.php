<?php

class Category implements iModel
{
  public $id;
  public $parent;
  public $name;
  public $description;

  function __construct(array $args = [])
  {
    global $db;
    if(!empty($args))
    {
      if(array_key_exists('id', $args))
      {
        $this->id = $args['id'];
        $cat = $this->get(['id' => $this->id]);
      }
    }
  } // __construct()

  public function save()
  {

  } // end save()

  public function set(array $args = [])
  {

  } // end set()

  public function get(array $args = [])
  {
    global $db;
    $sql = "";
    $cats = null;
    $id_flag = false;
    $parent_flag = false;
    $name_flag = false;

    if(empty($args))
    {
      $sql = '*/' . TABLE_CATEGORY;
    }
    else
    {
      $sql = '*/' . TABLE_CATEGORY;

      if(array_key_exists('id', $args))
      {
        $sql .= "/category_id=" . $args['id'];
        $id_flag = true;
      }

      if(array_key_exists('parent', $args))
      {
        $sql .= ($id_flag)? '&category_parent=' . $args['parent'] : '/category_parent=' . $args['parent'];
        $parent_flag = true;
      }

      if(array_key_exists('name', $args))
      {
        $sql .= ($parent_flag)? '&category_name=' . $args['name'] : '/category_name=' . $args['name'];
        $name_flag = true;
      }

      if(array_key_exists('description', $args))
      {
        $sql .= ($name_flag)? '&category_description=' . $args['description'] : '/category_description=' . $args['description'];
        $description_flag = true;
      }
    }

    return $db->select($sql);
  } // end get()
} // end Category{}

?>
