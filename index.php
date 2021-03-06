<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
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
				<?php get_template_part( 'content', 'bookshelf' ); ?>
		<?php endwhile; ?>

	<?php endif; ?>

	<?php pagination(); ?>

</div> <!-- span8 -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>