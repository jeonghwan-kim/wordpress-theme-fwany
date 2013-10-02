<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if (is_category( 'Book') ) : ?>
				<?php get_template_part( 'content', 'bookshelf' ); ?>

			<?php endif; ?>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php pagination(); ?>

</div> <!-- span8 -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>