<?php

// We get $page_title from the included page which is cached before the header is included (:
$page_title = (!isset($page_title)) ? '' : ' - ' . $page_title;

// At somepoint we may also want to get the javascript files from a variable so that they aren't all always loaded on every single page.. maybe.

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
    <head>
    
        <title><?php echo 'Jamie Surman' . htmlspecialchars($page_title); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="Fashion stylist - Vogue, Harper's Bazaar, i-D, 10 Magazine, Sunday Times..." />
        
        
        <link rel="stylesheet" type="text/css" href="reset.css" id="resetcss" />
        <link rel="stylesheet" type="text/css" href="styles.php" id="stylescss" />
        
        <!--[if IE]><link rel="stylesheet" type="text/css" href="iehacks.css" id="iehacks" /><![endif]-->
        
        <script type="text/javascript" language="JavaScript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" language="JavaScript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
        <script type="text/javascript" language="JavaScript" src="js/core.js"></script>
        
        <script type="text/javascript">
            $(function() {
                // Initalise Core
                core.init();					
            });
        </script>
        
				<script type="text/javascript">
				
					var _gaq = _gaq || [];
					_gaq.push(['_setAccount', 'UA-20166241-1']);
					_gaq.push(['_trackPageview']);
				
					(function() {
						var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
						ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
					})();
				
				</script>
    
    </head>

    <body>
    
	    <div id="top_padding_section" style="height: 12%;"></div>
        
