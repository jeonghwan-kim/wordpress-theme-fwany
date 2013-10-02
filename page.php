<?php
/**
 * 페이지 분기 
 */

get_header(); ?>

<?php the_post(); ?>
	
<!-- 분석페이지 -->
<?php if (strtoupper($post->post_title) == '분석') : 
 	get_template_part( 'content', 'analysis' ); ?>

<!-- CODE SNIPPET list page -->
<?php elseif ( (strtoupper($post->post_title) == 'CODE SNIPPET') ||
			 ( strtoupper( get_post($post->post_parent)->post_title) == 'CODE SNIPPET' ) ) :
	get_template_part( 'content', 'codesnippets' ); ?>

<!-- the CODE SNIPPET page -->
<?php else: ?>
	<?php get_template_part( 'content', 'codesnippet' ); ?>
	<?php comments_template(); ?>

<?php endif;?>

</div> <!-- span8 -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>