<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package unreal-themes
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

<div class="section_inner flex row">
	<div class="sidebar_block"></div>
	<div id="comments" class="comments-area section_content">
		<div class="section_title">
			<h2>комментарии</h2>
		</div>

		<?php
		comment_form();
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			<!-- <h2 class="comments-title">
				<?php
				/*$unreal_themes_comment_count = get_comments_number();
				if ( '1' === $unreal_themes_comment_count ) {
					printf(
						// translators: 1: title. 
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'unreal-themes' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						// translators: 1: comment count number, 2: title. 
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $unreal_themes_comment_count, 'comments title', 'unreal-themes' ) ),
						number_format_i18n( $unreal_themes_comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}*/
				?>
			</h2> -->

			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'unreal-themes' ); ?></p>
				<?php
			endif;

		endif; // Check for have_comments().
		?>

	</div><!-- #comments -->
</div>
