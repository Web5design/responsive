<?php
/**
 * Search Template
 *
 * @package Responsive
 */

get_header(); ?>

		<div id="content-search" class="grid col-620">

<?php if ( have_posts() ) : ?>

			<h6><?php printf( __( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' ); ?></h6>

	<?php while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'responsive' ), esc_attr( the_title_attribute( 'echo=0') ) ); ?>"><?php the_title(); ?></a></h1>

				<div class="post-meta">
					<?php responsive_post_meta_data(); ?>

					<?php if ( comments_open() ) : ?>
						<span class="comments-link">
							<span class="mdash">&mdash;</span>
							<?php comments_popup_link( __( 'Leave a comment &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
						</span>
					<?php endif; ?>
				</div><!-- end of .post-meta -->

				<div class="post-entry">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<?php edit_post_link( __( 'Edit', 'responsive' ), '<div class="post-edit">', '</div>' ); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
		</div><!-- end of .navigation -->
		<?php endif; ?>

<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

<?php endif; ?>

		</div><!-- end of #content-search -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
