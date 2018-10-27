<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="row">
	<div class="col-full">
	<?php if ( have_comments() ) : ?>
		<h3 class="h2">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				echo '1 Comment';
			} else {	
				echo $comments_number . ' Comments';
			}
			?>
		</h3>
		<ol class="commentlist">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ul',
						'short_ping'  => true,
                        'avatar_size' => 100,
                        'reply_text'  => 'Reply',
                        'callback'    => 'mytheme_comment',

					)
				);
			?>
		</ol><!-- .comment-list -->

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
	<?php endif; ?>
	
	</div>
</div><!-- .comments-area -->
<?php $comments_args = array(		
	'fields'               => array(
								'author' => '<div class="form-field">' .
											'<input id="author" name="author" class="full-width" type="text" placeholder="Your Name*" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . $html_req . ' /></div>',
								'email'  => '<div class="form-field">' .
											'<input id="email" class="full-width" placeholder="Your Email*" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '"  aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
								'url'    => '<div class="form-field">' .
											'<input id="url" class="full-width" placeholder="Website" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
							),
	'comment_field'        => '<div class="message form-field"><textarea id="comment" name="comment" class="full-width" placeholder="Your Message*"  aria-required="true" required="required"></textarea></div>',
	'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'class_submit'         => 'btn btn--primary btn-wide btn--large full-width',
	'title_reply'          => __( 'Add Comment' ),
	'title_reply_to'       => __( 'Add Comment' ),
	'title_reply_before'   => '<h3 id="reply-title" class="h2">',
	'title_reply_after'    => '<span>Your email address will not be published</span></h3>',
	'cancel_reply_before'  => ' ',
	'cancel_reply_after'   => ' ',
	'label_submit'         => __( 'Add Comment' ),
	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
	'submit_field'         => '%1$s %2$s',
);
?>
<?php comment_form($comments_args); ?>
