<?php

/**
 * Transforms an associative array into a string using the specified delimiter.
 * @param {string} $delimiter Specifies what to put between the array elements. Default is "" (an empty string)
 * @param {array} $array The array to join to a string.
 * @return {string} Returns a string from elements of an array.
 */
function assoc_to_string(string $delimiter, array $array)
{
  $result = "";
  $x = 0;

  foreach($array as $k => $v)
  {
    $result .= (streq('integer', gettype($v)))? "{$k}={$v}" : "{$k}='{$v}'";
    if($x < (count($array) - 1)) $result .= $delimiter;
    $x++;
  }

  return $result;
} // end assoc_to_string()

/**
 * Tests two strings for equality.
 * @param {string} $s1 The first string.
 * @param {string} $s2 The second string.
 * @return {boolean} Returns TRUE if the strings are equal, otherwise FALSE.
 */
function streq($s1, $s2)
{
  return (strcmp($s1, $s2) == 0);
} // end streq()

/**
 * Transforms an array of values containing key-value pair strings into a
 * 2-dimensional array where array[0] contains the keys & array[1] contains
 * the corresponding values.
 * @param {string} $pivot The pivot value. If null, '=' is used.
 * @param {array} $array The array to be fizzed.
 * @return Returns a 2-dimensional array of keys and values.
 * @throws InvalidPairException for malformed key-value pair statements.
 */
function fizz_array(string $pivot = null, array $array)
{
  $arr1 = [];
  $arr2 = [];
  if(is_null($pivot))
  {
    $pivot = "=";
  }

  if(!streq('array', gettype($array)))
  {
    return STATUS_BAD_REQUEST;
  }

  for($x = 0; $x < count($array); $x++)
  {
    if(!strpos($array[$x], $pivot))
    {
      throw new Exception("Missing pivot symbol '{$pivot}' in entry {$x}.");
    }

    $temp = explode($pivot, $array[$x]);
    array_push($arr1, $temp[0]);
    array_push($arr2, $temp[1]);
  }

  return [$arr1, $arr2];
} // end fizz_array()

/**
* Combines two arrays of equal size into a single array taking cor.
* @param {string} $pivot The pivot value. If null, '=' is used.
* @param {array} $keys The array to be fizzed.
* @param {array} $values The array to be fizzed.
* @return Returns an array of combined keys and values or STATUS_BAD_REQUEST if input arrays are of different sizes.
 */
function fuse_arrays(string $pivot = null, array $keys, array $values)
{
  $result = [];
  $pivot = (!is_null($pivot))? $pivot : "=";

  if(count($keys) != count($values))
  {
    die(STATUS_BAD_REQUEST);
  }

  for($x = 0; count($keys); $x++)
  {
    $str = $keys[$x] . $pivot . $values[$x];
    array_push($result, $str);
  }

  return $result;
} // end fuse_arrays()

/**
 * Checks whether the action requested by the client was received, understood,
 * accepted or processed successfully.
 * @param {integer} $status_code The status code.
 * @return {boolean} Returns TRUE for a successful status code otherwise FALSE.
 */
function status_success(integer $status_code)
{
  return ($status_code == STATUS_OK || $status_code == STATUS_CREATED || $status_code == STATUS_ACCEPTED || $status_code == STATUS_OK_BLANK);
} // end status_success()
?>
