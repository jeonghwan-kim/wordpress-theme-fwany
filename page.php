<?php
/**
 * 페이지 분기 
 */


get_header(); ?>


<?php the_post(); ?>

<!-- 분석페이지 -->
<?php if ($post->ID == 680): get_template_part( 'content-analysis', 'page' ); ?>

<!-- CODE SNIPPETS -->
<?php elseif ($post->ID == 834): get_template_part( 'content-codesnippets', 'page' ); ?>

<!-- CODE SNIPPET list page -->
<?php elseif ( (strtoupper($post->post_title) == 'CODE-SNIPPET') ||
			   (strtoupper($post->post_title) == 'HTML') ||
			   (strtoupper($post->post_title) == 'PHP') ||
			   (strtoupper($post->post_title) == 'WORD-PRESS') ||
			   (strtoupper($post->post_title) == 'CSS') )
			   : get_template_part( 'content-codesnippets', 'page' ); ?>

<!-- the CODE SNIPPET page -->
<?php else: ?>
	<?php get_template_part( 'content-codesnippet', 'page' ); ?>
	<?php comments_template(); ?>
<?php endif;?>

</div> <!-- span8 -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>