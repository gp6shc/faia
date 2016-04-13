<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Spike
 */
?>

	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<div class="site-info contain">
			<div>
			<?php $RSpage = get_page_by_title('Resource Center');?>
				<a href="<?php the_permalink($RSpage);?>">Resource Center</a>
				<p>&copy <?= date('Y')?> Risk Management Careers</p>
			</div>
			<div>
				<ul class="soc">
					 <li><a href="https://www.facebook.com/FloridaRiskManagementCareers" class="fb"></a></li>
					 <li><a href="https://www.linkedin.com/company/risk-management-careers" class="li"></a></li>
				</ul>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if (is_front_page()): ?>
	<script src="<?= get_stylesheet_directory_uri() ?>/js/flickity.min.js"></script>
	<script>
		var elem = document.querySelector('.slider');
		var flkty = new Flickity( elem, {
		  // options
		  wrapAround: true,
			autoPlay: 5000,
			prevNextButtons: false,
			setGallerySize: true,
			imagesLoaded: true
		});
		
		var dlButton = document.querySelector('.wpcf7-submit');
		var timerOut;
		
		function loadAnimation() {
			console.log("loading...");
			dlButton.removeEventListener('click', loadAnimation);
			this.classList.add('loading');
			this.value = "sending...";
			timerOut = setTimeout(function(){
				dlButton.value = "thinking...";
			},750);
		}

		function errorAnimation() {
			clearTimeout(timerOut);
			console.log("error!");
			dlButton.addEventListener('click', loadAnimation);
			dlButton.classList.remove('loading');
			dlButton.classList.add('error');
			dlButton.value = "Error!";
			setTimeout(function(){
				dlButton.classList.remove('error');
				dlButton.value = "Download";
				},2450);
		}

		function successAnimation() {
			clearTimeout(timerOut);
			console.log("success!");
			dlButton.classList.remove('loading');
			dlButton.classList.add('success');
			dlButton.value = "Success!";
			setTimeout(function(){
				dlButton.classList.remove('success');
				dlButton.value = "Download";
				dlButton.addEventListener('click', loadAnimation);
			},4450);
		}
		
		dlButton.addEventListener('click', loadAnimation);
		
		jQuery(document).on('invalid.wpcf7', function () {
			errorAnimation();
		});
		jQuery(document).on('spam.wpcf7', function () {
			errorAnimation();
		});
		jQuery(document).on('mailfailed.wpcf7', function () {
			errorAnimation();
		});		
		
	</script>
<?php endif;?>
<?php wp_footer(); ?>

</body>
</html>
