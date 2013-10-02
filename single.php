<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $category = get_the_category($post)[0]->category_nicename; ?>
		
		<?php if ($category == 'book'): ?>
			<?php get_template_part( 'content', 'book' ); ?>

		<?php elseif ($category == 'code_snippets'): ?>
			<?php get_template_part( 'content', 'codesnippet' ); ?>

		<?php endif; ?>

		<!-- comment -->
		<?php comments_template(); ?>

		<!-- 도서 분석  -->
		<?php if ($category == 'book'): ?>
			<div class="the-box the-white-box">
				<!-- 도서정보 -->
				<div class="">
					<?php get_template_part( 'content', 'book-description' ); ?>
				</div>

				<!-- 저자 정보 -->
				<div class="">
					<?php get_template_part( 'content', 'book-author' ); ?>
				</div>
				
				<!-- 독서 통계 링크 -->
				<div class="">
					<a href="<?php echo home_url().'/분석';?>"><h3>독서통계 바로가기</h3></a>
				</div>
			</div>
		<?php endif; ?>

	<?php endwhile; ?>

</div> <!-- span8 -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>