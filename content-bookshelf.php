<?php
/**
 * 도서 이미지를 리스팅한다.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<!-- 포스트 -->
<?php if ( 'post' == get_post_type() ) : ?>
	<?php $book_img_url = get_post_meta($post->ID, 'book_img_url', 1); ?>
	<?php $post_link = get_permalink($post->ID); ?>

	<div class="the-book">
		<!-- 이미지가 있는경우 -->
		<?php if ($book_img_url) :?>
		   <a href="<?php echo $post_link; ?>" >
		        <img src="<?php echo $book_img_url; ?>" />
		   </a>

		<!-- 이미지가 없는 경우 -->
		<?php else : ?>
		   <!-- 기본 이미지 로딩 -->
		   <?php $book_img_url = wp_get_attachment_image_src(809, 'full')[0]; ?>
		   <a href="<?php echo $post_link; ?>" >
		        <img src="<?php echo $book_img_url; ?>" />
		   </a>
		   <a href="<?php echo $post_link; ?>" class="layered-title">
		        <span ><?php echo get_the_title($post->ID); ?></span></a>
		       
		<?php endif; ?>
	</div>

<!-- 페이지 (독서계획) -->
<?php else: ?>
	
	<?php $page_link = get_permalink($page->ID); ?>

	<div class="the-book">
		<!-- 기본 이미지 로딩 -->
		<?php $book_img_url = wp_get_attachment_image_src(809, 'full')[0]; ?>
		<a href="<?php echo $page_link; ?>" >
		    <img src="<?php echo $book_img_url; ?>" />
		</a>
		<a href="<?php echo $page_link; ?>" class="layered-title">
		    <span ><?php echo $title; ?></span></a>
	</div>

<?php endif; ?>
