<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div id="under-construction" class="content">
                <section class="padding-top-normal padding-bottom-normal dark section-type-column" style="background-color: #686868;background-image: url('https://thisamericandoc.com/wp-content/uploads/2017/03/TAD_BG.jpg');" id="section-home">
                    <div class="container">
                        <?php get_template_part( 'template-parts/home/introduction', 'home' ); ?>
                    </div>
                </section>
                <section class="padding-top-normal padding-bottom-normal section-type-column" style="background-color: #fff;" id="section-team">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 columns">
                                <h2>Our Physicians</h2>
                            </div>
                            <div class="col-md-6 columns vsee-search-user">
                                <div>
                                    <input type="text" value="" autocomplete="off" spellcheck="false" class="text vsee-search-keyword" placeholder="Search users..." autocorrect="off" autocapitalize="off" />
                                    <input type="submit" class="button vsee-search-button" value="">
                                    <span class="vsee-loading">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="padding-top-normal padding-bottom-normal  section-type-column" style="background-color: #fff;" id="section-team1">
                    <div class="container">
                        <?php get_template_part( 'template-parts/home/member_list', 'home' ); ?>
                    </div>
                </section>
                <section class="padding-top-normal padding-bottom-normal dark section-type-column" style="background-color: #8e8e8e;background-image: url('https://thisamericandoc.com/wp-content/uploads/2017/03/TAD_Contact-1.jpg');" id="section-contact">
                    <div class="container">
                        <?php get_template_part( 'template-parts/home/contact', 'home' ); ?>
                    </div>
                </section>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>

<div class="vsee-search-ajax">
    <ul>
    </ul>
</div>
