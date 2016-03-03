<?php
/* Global php files
------------------------------------------------------------------------------------------------------------------------------------- */

// settings.php contains constants for this website such as usernames/passwords for database connections
require_once 'settings.php';

// setup.php contains the initialisation of the website. E.g. things that happen every time any page is loaded.
require_once 'setup.php';

// core.php contains all functions
require_once 'core.php';

// process.php allows us to trigger core functions before any headers are sent. (needed for form validation and http head redirects)
// Need to be careful with this because the functions are triggered before any login logic is called.
require_once 'process.php';

/* ---------------------------------------------------------------------------------------------------------------------------------- */


/* Include the correct page, cache the output and read it into a variable
------------------------------------------------------------------------------------------------------------------------------------- */

// We start caching here so that we can obtain a page title from page includes.
ob_start();

// Main Nav

$getpage = (isset($_GET['page'])) ? $_GET['page'] : 'home';

switch ($getpage) {
	case 'home':
		$required_page = 'home.inc.php';
		break;
	case 'reorder':
		$required_page = 'reorderthumbs.inc.php';
		break;
	case 'blank':
		$required_page = 'blank.inc.php';
		break;
	default:
		$required_page = 'home.inc.php';
}

// Include the appropriate php file
if (isset($required_page)) {
	require_once $required_page;
}


// Read the cached content into a variable
$__content = ob_get_contents();

// As we obtain the page title from the included page we might as well stop caching after it is included.
ob_end_clean();

/* ---------------------------------------------------------------------------------------------------------------------------------- */



/* Echo to the browser all happens here
------------------------------------------------------------------------------------------------------------------------------------- */

// Include the header
if (!isAjax()) {
	require_once 'header.inc.php';
}

// Include the page
echo $__content;

// Include the footer
if (!isAjax()) {
	require_once 'footer.inc.php';
}

/* ---------------------------------------------------------------------------------------------------------------------------------- */
?>