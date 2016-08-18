<?php
	/*
	 * @package Spike
	 * Template Name: Locations
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
						
						<ul class="double-column-list">
						<?php foreach ($fields['locations'] as $location): ?>
							<li>
								<h4><?= $location['name'] ?></h4>
								<b>Location:</b> <?= $location['location'] ?>
								<b>Contact:</b> <?= $location['contact'] ?>
								<b>Email:</b> <a href="mailto:<?= $location['email'] ?>"><?= $location['email'] ?></a>
								<b>Website:</b> <a href="http://<?= $location['website'] ?>"><?= $location['website'] ?></a>
							</li>
						<?php endforeach; ?>
						</ul>
						
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
