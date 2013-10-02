<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">댓글</h2>

		<?php $comments = get_comments( array( 'post_id' => $post->ID, 'order' => 'ASC') ); ?>

		<?php foreach ($comments as $comment):  ?>
				<?php $type = $comment->comment_type; ?>
				<?php if ($type == 'pingback') continue; ?>
				
				<?php $author = $comment->comment_author; ?>
				<?php $date = $comment->comment_date; ?>
				<?php $content = $comment->comment_content; ?>
				<?php $approved = $comment->comment_approved; ?>
				<?php $avatar = get_avatar($comment->comment_author_email);  ?>

			<div class="comment">
				<div class="avatar-outer"><?php echo $avatar; ?></div>
				<div class="comment-body">
					<h4 class="author"><?php echo $author; ?></h4>
					<div class="date"><?php echo $date; ?></div>
					<p class="content"><?php echo $content; ?></p>
				</div>
				<div style="clear:both;"></div>
			</div> 
		<?php endforeach; ?>

	<?php endif;?>

	<!-- 댓글 남기는 폼 -->
	<?php $arg = $args = array(
	'id_form'           => 'commentform',
	'id_submit'         => 'submit',
	'title_reply'       => __( '' ),
	'title_reply_to'    => __( 'Leave a Reply to %s' ),
	'cancel_reply_link' => __( 'Cancel Reply' ),
	'label_submit'      => __( 'Post Comment' ),

	'logged_in_as' => '',

	'comment_notes_before' => '',

	'comment_notes_after' => '',

	'fields' => apply_filters( 'comment_form_default_fields', array(

	  'author' =>
	    '<div class="span4"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" placeholder="'.__( 'Name', 'domainreference' ) . ' (required)" /></div>',

	  'email' =>
	    '<div class="span4"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" placeholder="' . __( 'Email', 'domainreference' ) . ' (required)" /></div>',

	  'url' =>
	    '<div class="span4"><input  id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	    '" placeholder="'.__( 'Website', 'domainreference' ).'"/></div>'
	  )
	),

	'comment_field' => '<textarea class="span12" id="comment" name="comment" cols="100" rows="1" 
	aria-required="true" placeholder="Your comment here."></textarea>',

	);?>
	<?php comment_form($arg); ?>

</div><!-- #comments -->


<!-- 댓글 입력 창 에니메이션 효과  -->
<script type="text/javascript">
	$(window).load(function() {
		$("textarea").click( function() {
			$(this).addClass("textarea-clicked");
		});
		$("textarea").focusf( function() {
			$(this).addClass("textarea-clicked");
		});
		$("textarea").focusout( function() {
			if ( $(this).val() == "" )
				$(this).removeClass("textarea-clicked");
		});
	});
</script>

