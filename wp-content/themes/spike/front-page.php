<?php
if( isset($_POST['submitted'])) {
	wp_redirect(home_url('/thank-you'), 302);
}

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
							<?= do_shortcode('[contact-form-7 id="12" html_id="SS-hook" title="E-Book Download"]');?>
							<script type="text/javascript">
								var __ss_noform = __ss_noform || [];
								__ss_noform.push(['baseURI', 'https://app-3QMU81PVCI.marketingautomation.services/webforms/receivePostback/MzawMDE2tDQxBwA/']);
								__ss_noform.push(['form', 'SS-hook', '59001020-2c2d-4d02-9d50-e29febe50e63']);
								__ss_noform.push(['submitType', 'manual']);
							</script>
							<script type="text/javascript" src="https://koi-3QMU81PVCI.marketingautomation.services/client/noform.js?ver=1.24" ></script>
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
