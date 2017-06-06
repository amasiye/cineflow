<?php

class Category
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

    public function get(array $args = [], $include_related = false)
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
            }

            if(array_key_exists('parent', $args))
            {
                $sql .= ($id_flag)? '&category_parent=' . $args['parent'] : 'category_parent=' . $args['parent'];
            }

            if(array_key_exists('name', $args))
            {
                $sql .= ($parent_flag)? '&category_name=' . $args['name'] : 'category_name=' . $args['name'];
            }

            if(array_key_exists('description', $args))
            {
                $sql .= ($name_flag)? '&category_description=' . $args['description'] : 'category_description=' . $args['description'];
            }
        }

        return $db->select($sql);
    } // end get()
} // end Category{}

?>