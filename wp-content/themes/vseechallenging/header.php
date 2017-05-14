<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<header id="masthead" class="site-header" role="banner">
            <nav class="navbar navbar-fixed-top innernav" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                    <i class="icon icon_menu"></i>
                                </button>
                                <a href="/" class="navbar-brand img-logo scrollto">
                                    <img src="https://thisamericandoc.com/wp-content/uploads/2017/03/TAD_Logo-1.png" alt="Logo">
                                </a>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="navigation nav navbar-right navbar-nav">
                                    <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-18"><a href="/#section-home" class="scrollto">Home</a></li>
                                    <li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-20"><a href="/#section-team" class="scrollto">Team</a></li>
                                    <li id="menu-item-395" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-395"><a href="#" class="is-external">Blog</a></li>
                                    <li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-19"><a href="/#section-contact" class="scrollto">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
