<?php
	/*
	 * @package Spike
	 * Template Name: Resources
  */
	get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				
					<div class="entry-content contain">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						<?php the_content(); ?>

						<?php $fields = get_fields();?>
						
						<div style="text-align:center">
						<?php foreach ($fields['resources'] as $resource): ?>
							<div style="display:inline-block">
								<a href="<?= $resource['link'] ?>"rel="">
									<?= wp_get_attachment_image($resource['image'], 'medium'); ?>
								</a>
								<h4><a href="<?= $resource['link'] ?>"rel=""><?= $resource['title'] ?></a></h4>
							</div>
						<?php endforeach; ?>
						</div>
						
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'spike' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'spike' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
