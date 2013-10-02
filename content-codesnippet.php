<?php
/**
 * 한개의 코드 스니핏을 출력한다.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<!-- 상위 페이지를 저장한다 (jquery에서 사용) -->
<?php $parent_title = get_post($post->post_parent)->post_title; ?>
<input type="hidden" value="<?php echo strtoupper($parent_title); ?>" id="current_post" />

<!-- 하위 페이지 리스트를 얻는다. -->
<?php $sub_page_titles = get_sub_page_titles(get_page_by_title('Code snippet')->ID); ?>

<div class="the-box the-white-box">
	
	<!-- 네비게이션  -->
	<ul class="nav nav-pills">
		<?php foreach ($sub_page_titles as $title) { ?>
			<?php if ( strtoupper($title) == strtoupper($parent_title) ) : ?> 
				<li id="<?php echo strtoupper($title); ?>" class="active"> 
			
			<?php else : ?>
				<li id="<?php echo strtoupper($title); ?>" class=""> 
			
			<?php endif; ?>

			<a style="cursor:pointer;" href="<?php echo home_url().'/code-snippet/'.$title; ?>"><?php echo strtoupper($title); ?></a></li> 
		<?php } ?>
	</ul>

	<!-- 제목 -->
	<div class="page-header"><h1><?php echo get_the_title(); ?></h1></div>

	<!-- 내용출력  -->
	<div><?php the_content(); ?></div>

	<!-- 페이지 뷰 횟수 출력 -->
	<?php arixWp_PostViews( get_the_ID(), 'count' ); ?>
	<div class="text-right muted"><small>이 페이지를 <?php echo arixWp_PostViews( get_the_ID(), 'display' ); ?>회 보았습니다.</small></div>
</div>

