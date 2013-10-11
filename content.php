<?php
/**
 * 기본 페이지 
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="the-box the-white-box">
	<!-- 제목 -->
	<div class="page-header"><h1><?php echo get_the_title(); ?></h1></div>

	<!-- 내용출력  -->
	<div><?php the_content(); ?></div>

</div>
