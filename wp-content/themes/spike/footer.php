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

		function errorAnimation( string ) {
			clearTimeout(timerOut);
// 			console.log("error!");
			dlButton.addEventListener('click', loadAnimation);
			dlButton.classList.remove('loading');
			dlButton.classList.add('error');
			dlButton.value = string;
			setTimeout(function(){
				dlButton.classList.remove('error');
				dlButton.value = "Download";
				},2450);
		}

		function successAnimation() {
			clearTimeout(timerOut);
// 			console.log("success!");
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
		
		var inputName = document.getElementById('js-name');
		var inputEmail = document.getElementById('js-email');
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var buttonCover = document.getElementById("js-disabled-catch");
		var realButton = document.getElementById("js-submit-button");
		var downloadForm = document.getElementById("js-download-form");
		
		inputEmail.addEventListener('input', checkValidEmail);
		
/*
		inputEmail.addEventListener('blur', function() {
			if ( !re.test(inputEmail.value) ) errorAnimation("valid email?");
		});
*/
			
		function checkValidEmail() {
			if (inputName.value.length < 1) {
				dlButton.disabled = true;
				buttonCover.classList.remove("hide");
				console.log("error: no name");
				errorAnimation( "Enter a name" );
				return;
			}
			if ( re.test(inputEmail.value) ) {
				dlButton.disabled = false;
				buttonCover.classList.add("hide");
				console.log("success");
			}else{
				console.log("error: bad email");
				errorAnimation( "valid email?" );
				dlButton.disabled = true;
				buttonCover.classList.remove("hide");
			}
		}
		
		buttonCover.addEventListener('click', function() {
			checkValidEmail();
		});

		realButton.addEventListener('click', function() {
				// downloadForm.submit();
				// This is for you sharpspring... uggghhghg
				setTimeout(function() {
						location = "/thank-you";
					}, 3500);
		});
		
		
	</script>
<?php endif;?>
<?php wp_footer(); ?>

</body>
</html>
