<?php

// PHP Setup and site init
// This file is included before the core and contains many settings that core.php depends on so we can't call any core.php functions from here.

session_name('dimycouk');
session_start();

function get_config() { global $__conf; return $__conf; }

$conf = get_config();

// Set the character set to UTF-8
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'en_US.UTF8');

// Check if server has magic quotes set to 
if (get_magic_quotes_gpc()) {
   exit('This site does not support php magic quotes');
}

// Set Timezone
date_default_timezone_set($conf['timezone']);

?>
