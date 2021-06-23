<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_healthcare_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_healthcare_slider_arrows', false) != '' || get_theme_mod( 'vw_healthcare_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <?php $vw_healthcare_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_healthcare_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_healthcare_pages[] = $mod;
            }
          }
          if( !empty($vw_healthcare_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_healthcare_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()) {?>
                <div class="slide-image">
                  <?php the_post_thumbnail(); ?>
                </div>
              <?php }?>
              <div class="carousel-caption">
                <div class="slider-inner-box">
                  <h6 class="p-0"><?php esc_html_e('Emergency: ','vw-healthcare'); ?><?php echo esc_html(get_theme_mod('vw_healthcare_phone_number',''));?></h6>
                  <h1 class="mb-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <div class="more-btn my-3 my-lg-4 my-md-4">
                    <a href="<?php the_permalink();?>" class="p-3"><?php esc_html_e('Read More','vw-healthcare'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon px-3 py-2 w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-healthcare' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon px-3 py-2 w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-healthcare' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'vw_healthcare_after_slider' ); ?>

  <section id="services-sec" class="py-5 text-center">
    <div class="container">
      <?php if( get_theme_mod('vw_healthcare_services_text') != '' ){ ?>
        <p class="mb-0 htext"><?php echo esc_html(get_theme_mod('vw_healthcare_services_text',''));?></p>
      <?php }?>
      <?php if( get_theme_mod('vw_healthcare_services_title') != '' ){ ?>
        <h3><?php echo esc_html(get_theme_mod('vw_healthcare_services_title',''));?></h3>
      <?php }?>
      <?php if( get_theme_mod('vw_healthcare_services_btn_link') != '' || get_theme_mod('vw_healthcare_services_btn_text') != '' ){ ?>
        <div class="topbar-btn service-btn my-5">
          <hr>
          <span><a href="<?php echo esc_url(get_theme_mod('vw_healthcare_services_btn_link',''));?>" class="py-3 px-4"><?php echo esc_html(get_theme_mod('vw_healthcare_services_btn_text',''));?></a></span>          
        </div>
        
      <?php }?>
      <div class="row">
        <?php
        $vw_healthcare_catData = get_theme_mod('vw_healthcare_services_category');
        if($vw_healthcare_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $vw_healthcare_catData ,'vw-healthcare')));
          $bgcolor = 1; ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-4 mb-4">
              <div class="inner-box pb-5 px-3 pt-3 text-center">
                <h4><a href="<?php the_permalink();?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                <p class="px-4"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_healthcare_string_limit_words( $excerpt, 10)); ?></p>
              </div>
              <?php the_post_thumbnail(); ?>
            </div>
          <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_healthcare_after_service' ); ?>

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>