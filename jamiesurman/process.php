<?php

// May want to include the required login logic to this file so that don't need to check in every core function.

if (isset($_GET['x'])) {

  $action = $_GET['x'];

  switch ($action) {
    case 'login':
      user_login();
      break;
		case 'setcontent':
			// if (!is_in_site_edit_mode()) { error_page(); }
			user_set_content();
			break;
		case 'reorderthumbs':
			user_reorder_thumbs();
			break;
  }

}

?>