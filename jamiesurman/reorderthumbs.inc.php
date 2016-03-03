<?php

// $page_title = '';

$all_images = get_images();

?>
<div id="reorder_thumbnails_section">

  <ul>
  	<?php
		foreach ($all_images as $image) {
			$listclass = ($image['image_type'] != '') ? ' class="' . $image['image_type'] . '"' : '';
  		echo '
			<li' . $listclass . ' id="thumb_'. $image['id'] .'"><a href="gallery/large/' . $image['file_name'] . '"><img src="gallery/thumbs/' . $image['file_name'] . '" border="0" alt="thumb1" /></a></li>
			';
		}
		?>
  </ul>

</div>
