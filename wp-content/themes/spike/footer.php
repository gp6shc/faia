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
					 <li><a href="https://www.facebook.com/FloridaRiskManagementCareers" class="fb"><svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg></a></li>
					 <li><a href="https://www.linkedin.com/company/risk-management-careers" class="li"><svg viewBox="0 0 512 490" xmlns="http://www.w3.org/2000/svg"><path d="M116.333333,159 L116.333333,489.333333 L6.33333333,489.333333 L6.33333333,159 L116.333333,159 L116.333333,159 Z M123.333333,57 C123.555556,73.2222222 117.944444,86.7777778 106.5,97.6666667 C95.0555556,108.555556 80,114 61.3333333,114 L60.6666667,114 C42.4444444,114 27.7777778,108.555556 16.6666667,97.6666667 C5.55555556,86.7777778 0,73.2222222 0,57 C0,40.5555556 5.72222222,26.9444444 17.1666667,16.1666667 C28.6111111,5.38888889 43.5555556,0 62,0 C80.4444444,0 95.2222222,5.38888889 106.333333,16.1666667 C117.444444,26.9444444 123.111111,40.5555556 123.333333,57 L123.333333,57 Z M512,300 L512,489.333333 L402.333333,489.333333 L402.333333,312.666667 C402.333333,289.333333 397.833333,271.055556 388.833333,257.833333 C379.833333,244.611111 365.777778,238 346.666667,238 C332.666667,238 320.944444,241.833333 311.5,249.5 C302.055556,257.166667 295,266.666667 290.333333,278 C287.888889,284.666667 286.666667,293.666667 286.666667,305 L286.666667,489.333333 L177,489.333333 C177.444444,400.666667 177.666667,328.777778 177.666667,273.666667 C177.666667,218.555556 177.555556,185.666667 177.333333,175 L177,159 L286.666667,159 L286.666667,207 L286,207 C290.444444,199.888889 295,193.666667 299.666667,188.333333 C304.333333,183 310.611111,177.222222 318.5,171 C326.388889,164.777778 336.055556,159.944444 347.5,156.5 C358.944444,153.055556 371.666667,151.333333 385.666667,151.333333 C423.666667,151.333333 454.222222,163.944444 477.333333,189.166667 C500.444444,214.388889 512,251.333333 512,300 L512,300 Z" fill="#FFF"></path></svg></a></li>
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

		jQuery(document).on('mailsent.wpcf7', function () {
			successAnimation();
			
			var data = jQuery('.wpcf7-form').serializeArray();
			
			dataLayer.push({
			  'name': data[5].value,
			  'email': data[6].value,
			  'event': 'bookDownload'
			});
		});
		
		
	</script>
<?php endif;?>
<?php wp_footer(); ?>

</body>
</html>
