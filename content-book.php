<?php
/**
 * 독후감 내용을 표시한다.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="the-box the-white-box">
	
	<div class="page-header">
		<!-- 제목 -->
		<h1><?php echo get_the_title(); ?></h1>

		<!-- 메타 데이터 -->
		<div class="book-meta">
			<div class="time-stamp"><?php echo esc_html( get_the_date() ); ?></div>
			<div class="author-and-publisher">
				<span class="author"><?php echo '지은이: ' . get_book_author($post->ID); ?></span>
			    &ensp;&ensp;&ensp;
				<span class="publisher"><?php echo '출판사: ' . get_book_publisher($post->ID); ?></span>
			</div>
		</div>
	</div>

	<!-- 내용출력  -->
	<div class="book-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>

</div>

<!-- 메뉴 선택 표시 -->
<script type="text/javascript">
	$(document).ready( function() {
		$("#menu-item-806").addClass("current-menu-item");
	});
</script>