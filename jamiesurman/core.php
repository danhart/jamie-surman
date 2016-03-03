<?php

// Classes

// Functions used in all sites:

// Check if page has been requested via jquery's ajax
function isAjax() {
  return ( (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) || (isset($_POST['isAjax'])) );
}

// Connect to database code. Allows for multiple database connections.
function get_db_session( $dbtype = 'db' ) {
  global $__database;

  // singleton
  if( isset( $__database[$dbtype] ) && $__database[$dbtype] !== null ) return $__database[$dbtype];

  $conf = get_config();

  // connect to db
  $__database[$dbtype] = new PDO( $conf[$dbtype]['dsn'], $conf[$dbtype]['user'], $conf[$dbtype]['pass'], $conf[$dbtype]['options'] );

  return $__database[$dbtype];
}

function add_error_message($id, $message) {

  global $error_messages;

  $error_messages[] = array(
    'id' => $id, 
    'message' => $message
  );

}

function error_page() {
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/?page=errorpage');
	exit;
}

function reindex_array($thearray) {

  if (!empty($thearray)) {
    $thearray = array_values($thearray);
  }

  return $thearray;
}

function ForceSSL() {

  if (isset($_SESSION['ForceSSL'])) {
    if ( $_SERVER['SERVER_PORT'] != 443 ) {
      $new_url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '?' . $_SERVER['QUERY_STRING'];
      header("Location: $new_url");
      exit;
    }
  }

}

if (!function_exists('apache_request_headers')) {
    eval('
        function apache_request_headers() {
            foreach($_SERVER as $key=>$value) {
                if (substr($key,0,5)=="HTTP_") {
                    $key=str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($key,5)))));
                    $out[$key]=$value;
                }
            }
            return $out;
        }
    ');
} 

function generatePassword ($length = 8) {

  // start with a blank password
  $password = "";

  // define possible characters
  $possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
    
  // set up a counter
  $i = 0; 
    
  // add random characters to $password until $length is reached
  while ($i < $length) { 

    // pick a random character from the possible ones
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
        
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  // done!
  return $password;

}

function get_time_now() {

  $a = explode (' ',microtime());

  return(double) $a[0] + $a[1];

}

function ifsetor(&$variable, $default = null) {
	if (isset($variable)) {
		$tmp = $variable;
	} else {
		$tmp = $default;
	}
	return $tmp;
}

function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
         if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }    
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}

// Site specific functions below here:

function add_images_from_dir() {
	
	$files1 = scandir('gallery/large');
	
	$db = get_db_session();

  $sql = sprintf('
		INSERT INTO 
			gallery (file_name, image_order)
		VALUES
			(:file_name, :image_order)
  ');

	$counter = 0;

	foreach ($files1 as $dir) {

		$fields = array(
			':file_name' => $dir,
			':image_order' => $counter,
		);
	
		$stmt = $db->prepare( $sql );
		$stmt->execute( $fields );
		
		$counter++;
	
	}

  unset($stmt);
	
}

function get_images() {
	
	$db = get_db_session();

  $sql = sprintf('
		SELECT 
			*
		FROM 
			gallery
		ORDER BY
			image_order ASC
  ');

  $stmt = $db->prepare( $sql );
  $stmt->execute();

  $all_images = $stmt->fetchAll( PDO::FETCH_ASSOC );
	
  unset($stmt);
	
	return $all_images;
	
}

function user_reorder_thumbs() {
	
	$db = get_db_session();

  $sql = sprintf('
		UPDATE
			gallery
		SET
			image_order = :array_key
		WHERE
			id = :array_value
  ');
	
	$stmt = $db->prepare( $sql );

	foreach ($_GET['thumb'] as $key=>$value) {
		$fields = array(
			':array_key' => $key,
			':array_value' => $value,
		);
		
		$stmt->execute( $fields );
	}
	
	unset($stmt);
	
}
?>