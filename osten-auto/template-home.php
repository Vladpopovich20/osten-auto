<?php
/** 
* Template Name: Home Template
**/
?>

<?php  get_header(); ?>
<section class="services">
    <div class="container">
      <h2 class="title"><?php the_field('services_title') ;?></h2>
      <div class="services__inner">
        <div class="services__content">
        <?php if ( have_rows( 'services_box' ) ) : ?>
	<?php while ( have_rows( 'services_box' ) ) : the_row(); ?>


  <div class="services__content-box">
            <h6 class="services__content-title">
            <?php the_sub_field( 'services__content-title' ); ?>
            </h6>
            
            <div class="services__content-textbox">
              <p class="services__content-text">
              <?php the_sub_field( 'services__content-text' ); ?>
              </p>
           
            </div>
          </div>



	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
   
         
            <a class="button button--decor" href="#"><?php the_field('services_btn'); ?></a>
         
        </div>
        <ol class="services__list">

       
          <?php if ( have_rows( 'services_item_box' ) ) : ?>
	<?php while ( have_rows( 'services_item_box' ) ) : the_row(); ?>
    <li data-wow-delay="1s" class="services__item wow animate__fadeInRight">
    <p class="services__item-title">	<?php the_sub_field( 'services__item' ); ?></p>
            <p class="services__item-text">	<?php the_sub_field( 'services_item_text' ); ?></p>
          </li>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
        </ol>
      </div>
    </div>
  </section>


  <section class="benefits">
    <div class="container">
      <div class="benefits__inner">
      <?php $why_me_img = get_field( 'why_me_img' ); ?>
<?php if ( $why_me_img ) { ?>
	<img data-wow-delay="2s" class="benefits__images wow animate__fadeInUp" src="<?php echo $why_me_img['url']; ?>" alt="<?php echo $why_me_img['alt']; ?>" />
<?php } ?>  

        <div class="benefits__content">
          <h2 class="title benefits__title"><?php the_field( 'why_we_title' ); ?></h2>
          <ul class="benefits__list">
          <?php if ( have_rows( 'benefits__item' ) ) : ?>
	<?php while ( have_rows( 'benefits__item' ) ) : the_row(); ?>
  <li class="benefits__item">
              <p class="benefits__item-num"><?php the_sub_field( 'benefits__item-num' ); ?></p>
              <p class="benefits__item-title">		<?php the_sub_field( 'benefits_item_title' ); ?></p>
              <p class="benefits__item-text">
              <?php the_sub_field( 'benefits__item-text' ); ?>
              </p>
            </li>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
          

          </ul>
        </div>
      </div>
    </div>
  </section>


  <section class="carousel">
    <div class="container">
      <h2 class="title">
      <?php the_field( 'get_car_title' ); ?>
      </h2>
      <div class="carousel__inner">

      <?php if ( have_rows( 'car-box' ) ) : ?>
	<?php while ( have_rows( 'car-box' ) ) : the_row(); ?>
		<?php $carousel_item_img = get_sub_field( 'carousel__item-img' ); ?>
	
    <div class="carousel__item">
          <div class="carousel__item-box">
          <?php if ( $carousel_item_img ) { ?>
			<img  class="carousel__item-img" src="<?php echo $carousel_item_img['url']; ?>" alt="<?php echo $carousel_item_img['alt']; ?>" />
		<?php } ?>
            <h4 class="carousel__item-title">		<?php the_sub_field( 'carousel__item-title' ); ?>.</h4>
            <p class="carousel__item-text">	<?php the_sub_field( 'carousel__item-text' ); ?></p>
          </div>
        </div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
      </div>
    </div>
  </section>
        
  <section class="contacts">
    <div class="container">
      <div class="contacts__inner">
        <div class="contacts__info">
          <h2 class="title">
           <?php the_field('contact_title'); ?>
          </h2>
          <ul class="contacts__list">
           
          <?php if ( have_rows( 'contact-box' ) ) : ?>
	<?php while ( have_rows( 'contact-box' ) ) : the_row(); ?>

  <li class="contacts__item">
              <p class="contacts__item-title"><?php the_sub_field( 'contacts__item-title' ); ?></p>
              <p class="contacts__item-text">
              <?php the_sub_field( 'contacts__item-text' ); ?><br>
              <?php the_sub_field( 'contacts__item-sub_text' ); ?>
              </p>
            </li>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
        
          </ul>
        </div>
        <form class="contacts__form">
          <h2 class="title contacts__title"><?php the_field('declaration_title'); ?></h2>
          <?php echo do_shortcode('[contact-form-7 id="88" title="Contact form bid"]');?>
        </form>
      </div>
    </div>
  </section>

  <?php  get_footer(); ?>