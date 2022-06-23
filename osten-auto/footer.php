<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Osten-auto
 */

?>
  <footer class="footer">
    <div class="container">
      <div class="footer__inner">
      <?php   echo get_custom_logo(); ?>

        <div class="social footer__social">

        <?php if ( have_rows( 'block_social_network', 'option' ) ) : ?>
	<?php while ( have_rows( 'block_social_network', 'option' ) ) : the_row(); ?>
		<?php $social_network_icon = get_sub_field( 'social_network_icon' ); ?>
		<?php if ( $social_network_icon ) { ?>
			<a class="social__link" href="	<?php the_sub_field( 'social_network_url' ); ?>">
			<img class="social__img" src="<?php echo $social_network_icon['url'] ; ?>"/>
          </a>
		<?php } ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
        
         
        </div>

        <?php 
        
        $page_id = 3 ;?> 
        <a class="footer__copy" href="<?php echo get_page_link( $page_id  ); ?>">
        <?php echo get_the_title($page_id ); ?>
        </a>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>

</body>
</html>
