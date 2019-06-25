<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consumption
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
		<?php
			$consumption_comment_count = get_comments_number();
		if ( '1' === $consumption_comment_count ) {
			echo esc_html__( '1 Comment', 'consumption' );
		} else {
			printf( // WPCS: XSS OK.
				// translators: 1: comment count number, 2: title. /
				esc_html__( '%d Comments', 'consumption' ),
				number_format_i18n( $consumption_comment_count )
			);
		}
		?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'callback' => 'cunsumption_custom_comments',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		paginate_comments_links(
			array(
				'mid_size'  => 2,
				'prev_text' => '<span class="previous">' . __( 'Prev', 'studyabroad' ),
				'next_text' => '<span class="next">' . __( 'Next', 'studyabroad' ),
			)
		);

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'consumption' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
