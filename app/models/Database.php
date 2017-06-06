<?php

class Database
{
  private $host, $user, $pass, $name;
  public $conn;

  function __construct($db_host, $db_user, $db_pass, $db_name)
  {
    $this->host = $db_host;
    $this->user = $db_user;
    $this->pass = $db_pass;
    $this->name = $db_name;

    $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  } // end __construct()

  public function query($sql)
  {
    return $this->conn->query($sql);
  } // end query()

  /**
   * Inserts new records in a table.
   * @param {string} $args A delimited string containing SQL INSERT statment arguments.
   * @param {string} $seperator [Optional] Default = '/'.
   * @return {integer} Returns STATUS_CREATED for successful insertion otherwise STATUS_BAD_REQUEST.
   */
  public function insert(string $args, $seperator = '/')
  {
    $conn = $this->conn;
    $sql = "INSERT INTO";
    $args = explode($seperator, $args);

    # $table/$set
    $table = "";
    $set = "";

    if(count($args) != 2)
    {
      return STATUS_BAD_REQUEST;
    }

    list($table, $set) = $args;

    $columns = "";
    $values = "";
    list($columns, $values) = fizz_array($set);

    if(empty($columns) || empty($values))
    {
      die(STATUS_BAD_REQUEST);
    }

    for($x = 0; $x < count($values); $x++)
    {
      $values[$x] = $conn->real_escape_string($values[$x]);
    }

    $columns  = implode(', ', $columns);
    $values   = implode(', ', $values);

    $sql .= " {$table} ($columns) VALUES ($valuse)";

    if($this->query($sql))
    {
      return STATUS_CREATED;
    }

    return STATUS_BAD_REQUEST;
  } // end insert()

  /**
   * Selects data from the database.
   * @param {string} $args A delimited string containing SQL SELECT statment arguments.
   * @param {string} $seperator [Optional] Default = '/'.
   * @return {array|integer} Returns an array representation of the result-set.
   */
  public function select(string $args, $seperator = '/')
  {
    $args = explode($seperator, $args);
    $sql = "SELECT ";

    # $columns/$table/$where
    $columns    = '';
    $table      = '';
    $where      = '';

    switch(count($args))
    {
      case 2:
        list($columns, $table) = $args;
        break;

      case 3:
        list($columns, $table, $where) = $args;
        break;
    }

    if(isset($columns) && isset($table))
    {
      $sql .= " {$columns} FROM {$table}";
      if(isset($where) && !empty($where)) $sql .= " WHERE {$where}";
    }

    $result = $this->query($sql);
    $rows = [];

    if($result)
    {
      while($row = $result->fetch_assoc())
      {
        array_push($rows, $row);
      }
    }

    return (count($rows) > 1)? $rows : (!empty($rows))? $rows[0] : STATUS_BAD_REQUEST;
  } // end select()

  public function update(string $args, $seperator = '/')
  {
    $sql = "UPDATE";
    $args = explode($seperator, $args);

    # $table/$set/$where
    $table = "";
    $set = "";
    $where = "";

    if(count($args) != 3)
    {
      return STATUS_BAD_REQUEST;
    }

    # Bind parameters
    list($table, $set, $where) = $args;

    $sql .= " {$table} SET " . assoc_to_string($set);
    $sql .= (!streq('*', $where))? " WHERE " . assoc_to_string : "";
  } // end update()

  public function delete(string $args, $seperator = '/')
  {
  } // end delete()

  function sanitize($str)
  {
    return htmlentities(htmlspecialchars($str));
  } // end sanitize()
} // end Database{}
?>
