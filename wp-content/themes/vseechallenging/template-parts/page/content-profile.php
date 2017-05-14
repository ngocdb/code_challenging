<?php
/**
 * Template part for displaying page content in page-user.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vsee
 * @subpackage Vsee_Challenging
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php vseechallenging_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'vseechallenging' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
