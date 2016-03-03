<?php

// $page_title = '';

$all_images = get_images();

?>
<div id="white_section">

	<div id="main_image_section">
  	<img id="mainimage" src="images/1pxtrans.gif" border="0" alt="main image" />
    
    <img class="ajaxloadergif" src="images/loadergif.gif" border="0" alt="main image" />
  </div>

</div>

<?php require_once 'globalnav.inc.php' ?>

<div id="thumbnails_section">

  <ul>
  	<?php
		foreach ($all_images as $image) {
			$listclass = ($image['image_type'] != '') ? ' class="' . $image['image_type'] . '"' : '';
  		echo '
			<li' . $listclass . '><a href="gallery/large/' . $image['file_name'] . '"><img src="gallery/thumbs/' . $image['file_name'] . '" border="0" alt="thumb1" /></a></li>
			';
		}
		?>
  </ul>

</div>
