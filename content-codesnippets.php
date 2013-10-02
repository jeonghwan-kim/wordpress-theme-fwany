<?php
/**
 * 특정 부류(html, css, php 등)의 코드스니펫 리스트를 출력한다. 
 *
 */
?>

<!-- 현제 페이지를 저장한다 (jquery에서 사용) -->
<input type="hidden" value="<?php echo strtoupper($post->post_title); ?>" id="current_post" />

<!-- 하위 페이지 리스트를 얻는다. -->
<?php if ($post->post_parent == 0) : ?>
<?php $sub_page_titles = get_sub_page_titles($post->ID); ?>
<?php elseif ($post->post_parent > 0) : ?>
<?php $sub_page_titles = get_sub_page_titles($post->post_parent); ?>
<?php endif; ?>

<div id="codesnippets" class="the-box the-white-box">
	
	<!-- 네비게이션  -->
	<ul class="nav nav-pills">
		<?php $post_title = $post->post_title; ?>
		<?php if (strtoupper($post_title) == 'CODE SNIPPET') : $post_title = 'CSS'; ?>
		<?php endif; ?>

		<?php foreach ($sub_page_titles as $title) { ?>
			<?php if ( strtoupper($title) == strtoupper($post_title) ) : ?> 
				<li id="<?php echo strtoupper($title); ?>" class="active"> 
			
			<?php else : ?>
				<li id="<?php echo strtoupper($title); ?>" class=""> 
			
			<?php endif; ?>
			
			<a style="cursor:pointer;"><?php echo strtoupper($title); ?></a></li>
		<?php } ?>
	</ul>

	<!-- 리스트 출력  -->
	<?php foreach ($sub_page_titles as $title) { ?>
		<table class="table table-striped" id="<?php echo strtoupper($title).'-TABLE'; ?>" >
			<!-- 하위 포스트를 얻는다. -->
			<?php $page_id = get_page_by_title( $title )->ID; ?>
			<?php $pages = get_pages(array( 'child_of' => $page_id, 'parent' => -1) ); ?>
			<?php foreach ($pages as $page) { ?>
				<tr><td><h4><a href="<?php echo $page->guid; ?>">
					<?php echo $page->post_title; ?></a></h4></td></tr>
			<?php } ?>
		</table>

	<?php } ?>

</div>

<script type="text/javascript">
$(document).ready(function() {
	// 현제 분류
	var current_post = $("#current_post").val();
	if (current_post == "CODE SNIPPET") current_post = "CSS";

	$("table").hide();
	$("#"+current_post+"-TABLE").show();

	$("ul").children().click(function() {
		$("ul").children().removeClass("active");
		$(this).addClass("active");

		$("table").hide();
		$("#"+this.id+"-TABLE").show();
	});
});
</script>

<!-- 메뉴 선택 표시 -->
<script type="text/javascript">
	$(document).ready( function() {
		$("#menu-item-836").addClass("current-menu-item");
	});
</script>