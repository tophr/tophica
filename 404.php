<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>

<?php get_header(); ?>
			
			<h1 class="page-title">
				<?php _e('Error 404 - Not Found', 'tophica') ?>
            </h1>
            
			<div id="primary" class="hfeed">

				<div id="post-0" class="hentry">
				
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here.", "tophica") ?></p>
					</div>
				
				</div>

			</div>

<?php get_footer(); ?>