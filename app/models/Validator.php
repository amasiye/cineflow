<?php

class Validator
{
  public static function validate($string, $rule = VALIDATE_TEXT)
  {
    $is_valid = true;

    switch($rule)
    {
      case VALIDATE_TEXT:
        $is_valid = Validator::validate_text($string);
        break;

      case VALIDATE_NAME:
        $is_valid = Validator::validate_name($string);
        break;

      case VALIDATE_EMAIL:
        $is_valid = Validator::validate_email($string);
        break;

      case VALIDATE_PHONE:
        $is_valid = Validator::validate_phone($string);
        break;

      case VALIDATE_POSTAL:
        $is_valid = Validator::validate_postal($string);
        break;

      case VALIDATE_USERNAME:
        $is_valid = Validator::validate_username($string);
        break;
    }

    return $is_valid;
  } // end validate()

  public static function validate_text($text)
  {
    $is_valid = true;

    return $is_valid;
  } // end validate_text()

  public static function validate_name($text)
  {
    $is_valide = true;

    return $is_valid;
  } // end validate_name()

  public static function validate_phone($number)
  {
    $is_valide = true;

    return $is_valid;
  } // end validate_phone()

  public static function validate_email($email)
  {
    $is_valide = true;

    return $is_valid;
  } // end validate_email()

  public static function validate_username($username)
  {
    $is_valide = true;

    return $is_valid;
  } // end validate_email()

  public static function validate_postal($code)
  {
    $is_valide = true;

    return $is_valid;
  } // end validate_email()
} // end Validator{}

?>
