<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Osten-auto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
    <div class="container">
      <div class="header__top">
		<?php   echo get_custom_logo(); ?>
        <a class="phone" href="tel:<?php echo the_field( 'phone', 'option' ); ?>"><?php the_field( 'phone', 'option' ); ?></a>
      </div>
      <div class="header__content">
        <h1 data-wow-delay=".5s" class="header__title wow animate__fadeInLeft">
		<?php the_field( 'header_title', 'option' ); ?>
        </h1>
        <h2 data-wow-delay="1s" class="header__subtitle wow animate__fadeInLeft">
		<?php the_field( 'header_subtitle', 'option' ); ?>
        </h2>
        <p data-wow-delay="1.5s" class="header__text wow animate__fadeInLeft">
		<?php the_field( 'header_text', 'option' ); ?>
        </p>
        <a class="button" href="/"><?php the_field( 'button_header', 'option' ); ?></a>
        <div class="social header__social">
		<?php if ( have_rows( 'block_social_network', 'option' ) ) : ?>
	<?php while ( have_rows( 'block_social_network', 'option' ) ) : the_row(); ?>
		<?php $social_network_icon = get_sub_field( 'social_network_icon' ); ?>
		<?php if ( $social_network_icon ) { ?>
			<a class="social__link" href="	<?php the_sub_field( 'social_network_url' ); ?>">
			<img src="<?php echo $social_network_icon['url'] ; ?>"/>
          </a>
		<?php } ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
         
     
        </div>

        <img data-wow-delay="2s" class="header__images wow animate__fadeInUpBig" src="<?php bloginfo( 'template_url' ) ?>/assets/images/ford-mustang.png"
          alt="ford mustang">
      </div>
    </div>
  </header>
