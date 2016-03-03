<?php

/*define("SLIDE_SHOW_WIDTH", 654);
define("SLIDE_SHOW_HEIGHT", 438);
define("PORTFOLIO_IMAGE_WIDTH", 320);
define("ALBUM_IMAGE_WIDTH", 500);
define("ALBUM_THUMB_WIDTH", 70);*/

// New settings for database etc
$__conf = array(

  'salt' => 'd8B3_§?wR10"HK-FK',

  'emailfrom' => 'info@anenglishhand.co.uk',

  'VAT' => 17.50,
  
  'timezone' => 'Europe/London',

  // db settings (PDO string)
  'db' => array(
    'dsn' => 'mysql:host=localhost;dbname=jamie',
    'user' => 'jamie',
    'pass' => 'alphajake1',
    'options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  ),

);

?>
