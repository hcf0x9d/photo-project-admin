<?php

require 'views/gallery.header.inc.php';

if(isset($_GET['access'])) {
	$access = $_GET['access'];
} else {
	if (isset($_SESSION['access'])) {
		$access = $_SESSION['access'];
	} else {
		header('Location: /');
	}
}


/**
 * In the future we will add a social share button for each image...
 * but that's not worth tackling right now...
 * 
 */
?>

	<header class="w-header container_12">
        <a href="/" class="w-logo grid_2">
            <img src="//www.jasonfukura.com/image/LOGO-Fukura2016_LIN.png" alt="User Experience Designer, Jason Fukura's logo" class="logo">
        </a>
        <div class="grid_8">
            <div class="header">
                <h1 class="title" itemprop="jobtitle">Event Photos</h1>
                <h2 class="subtitle" itemprop="name">@Christ The King Lutheran</h2>
            </div>
        </div>
    </header>
	
	<section class="galleryWrap container_12">
		<div id="folioGallery3" class="folioGallery grid_8 push_2" title="<?php echo $access; ?>"><!--<div class="numPerPage" title="3"></div>--></div>	
	</section>
	
	<section class="container_12" style="text-align:center;margin-top:20px;margin-bottom:80px;">
		<div class="grid_8 push_2">
			<button class="btn-dark" onclick="downloadZip();">Download all images</button>	
		</div>
	</section>
	
	<script>
		function downloadZip() {
			'use strict';

			location.href = "download.zip.php";
			
		}
	</script>
</body>
</html>
