<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="container-fluid">
		<div class="the-box the-white-box">
			<h1>
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
		
				<?php elseif ( is_month() ) : ?>					
					<?php printf( __( '<span class="white_font">%s</span>에 읽은 도서 목록', 'twentyeleven' ), '<span>' . get_the_date( 'Y년 m월' ) . '</span>' ); ?>

				<?php elseif ( is_year() ) : ?>
					<?php printf( __( '<span class="white_font">%s</span>에 읽은 도서 목록', 'twentyeleven' ), '<span>' . get_the_date( 'Y년' ) . '</span>' ); ?>
		
				<?php elseif ( is_tax('book_author') ) : ?>
					<?php  echo '내가 읽은 <span class="white_font">' . 
					strip_tags(get_book_author($post->ID)) . '</span>의 도서'; ?>
		
				<?php elseif ( is_tax('publisher') ) : ?>
					<?php  echo '내가 읽은 <span class="white_font">' . 
					strip_tags(get_book_publisher($post->ID)) . '</span>의 도서'; ?>
		
				<?php else : ?>
		
				<?php endif; ?>
			</h1>


			<?php /* Start the Loop */ ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
						get_template_part( 'content', 'bookshelf' );

				?>

			<?php endwhile; ?>
			<div style="clear:both;"></div>

			<?php if ( is_tax('book_author') ) : ?>
				<div>
					<?php get_template_part( 'content', 'book-author' ); ?>
				</div>
			<?php endif; ?>

			<?php pagination(); ?>

		<?php else : ?>

		<?php endif; ?>
		</div> <!-- the-box -->

	</div> <!-- container-fluid  -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>