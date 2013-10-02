<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<!-- 검색 성공   -->
<?php if ( have_posts() ) : ?>

	<header class="search-result-header">
		<h4 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h4>
	</header>

	<?php /* The loop */ ?>
	<div class="the-box the-white-box">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content-search-result', get_post_format() ); ?>
		<?php endwhile; ?>
			
		<?php pagination(); ?>
	</div>

<!-- 검색 실패 -->
<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
	
<?php endif; ?>

</div> <!-- span8 -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>