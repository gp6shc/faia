<?php echo '<pre>';
var_dump($_POST);
echo '</pre>';

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Spike
 */

get_header(); ?>

	<div class="content-area contain">
		<main class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="entry-content">
						<?php $fields = get_fields();?>
						
						<div class="slider">
							<?php foreach ($fields['slides'] as $image): ?>
								<img class="full-img" src="<?= $image['image'] ?>">
							<?php endforeach; ?>
						</div>
						
						
						<div class="main-frame">
							<div class="content">
								<?= $fields['content'] ?>
								<div class="book-description">
									<div class="cover" style="background-image:url(<?= $fields['cover_art']?>)"></div>
									<ul class="bullets">
										<?php foreach ($fields['bullets'] as $bullet): ?>
											<li><?= $bullet['bullet'] ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
							<div class="wpcf7">
								<form id="js-download-form" action="" method="post" class="wpcf7-form demo" novalidate="novalidate">
									<h2 class="green-bg">Get The Free E-Book</h2>
									<p>Name<br /><span class="wpcf7-form-control-wrap name"><input required id="js-name" type="text" name="name" value="" size="40" aria-required="true" aria-invalid="false" /></span></p>
									<p	>Email<br /><span class="wpcf7-form-control-wrap email"><input required id="js-email" type="email" name="email" value="" size="40"  aria-required="true" aria-invalid="false" /></span></p>
									<p class="submit-wrap"><span id="js-disabled-catch"></span><input type="submit" id="js-submit-button" value="Download" class="wpcf7-form-control wpcf7-submit" disabled /></p>
								</form>
							</div>
<!--
							<script type="text/javascript">
							  var __ss_noform = __ss_noform || [];
							  __ss_noform.push(['baseURI', 'https://app-3QMU81PVCI.marketingautomation.services/webforms/receivePostback/MzawMDE2tDQxBwA/']);
							  __ss_noform.push(['endpoint', '59001020-2c2d-4d02-9d50-e29febe50e63']);
							</script>
							<script type="text/javascript" src="https://koi-3QMU81PVCI.marketingautomation.services/client/noform.js?ver=1.24" ></script>
-->
						</div>
						
						
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'spike' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
