<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package unreal-themes
 */

get_header();

	while ( have_posts() ) :
		the_post();
		$thumbnail = get_the_post_thumbnail(get_the_ID(), 'full');
		$next = get_next_post_link( '%link', 'следующая статья', true );
		?>

		<?php if ( $thumbnail ) : ?>
			<div class="b_article section border20" style="background-color: #E6E4E1;">
				<div class="container">
					<div class="img_wrapper">
						<?php echo $thumbnail; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="b_article_content section border20" style="background-color: #F6F6F3;position:relative;">
			<div class="container">
				<div class="section_inner flex row">

					<div class="sidebar_block">
						<div class="back_btn_wrap">
							<a class="back_btn" href="/blog/">назад</a>
						</div>
					</div>

					<div class="section_content">
						<div class="content_wrapper">
							<div class="content_section">
								<?php the_title('<h2>', '</h2>'); ?>
								<?php the_content(); ?>
							</div>
						</div>

						<div class="more_wrapper">
							<?php echo str_replace( '<a ', '<a class="btn btn_green_empty w100" ', $next ); ?>
						</div>

					</div>
				</div>
			</div>
			<div class="btn_row w100 share">
				<a class="btn btn_green border20 w100 jsOpenModals" href="#share">
					<svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="15.5" cy="15.5" r="14.75" stroke="#1A1A1A" stroke-width="1.5"/>
						<path d="M13 19L9 15L13 11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M21 20V18.3333C21 17.4493 20.6839 16.6014 20.1213 15.9763C19.5587 15.3512 18.7956 15 18 15H9" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Поделиться
				</a>
			</div>
		</div>

		<div class="b_comments border20 section">
			<div class="container">
				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>
		</div>

		<?php get_template_part('template-parts/related', 'post'); ?>

		<?php get_template_part('template-parts/modals/share'); ?>

	<?php 
	endwhile; 

get_footer();