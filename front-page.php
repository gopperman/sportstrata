<?php
  $id = get_the_ID();
  $header = get_post_meta( $id, 'homepage_header' )[0];
  $about = get_post_meta( $id, 'homepage_about' )[0];
  $content = get_post_meta( $id, 'homepage_content')[0];
  $product = get_post_meta( $id, 'homepage_product' )[0];
?>
<div id="content-header" class="hero">
  <video class="hero__video" width="100%" height="100%" poster="/app/themes/fader/assets/video/hero-poster.jpg" autoplay loop>
    <source src="/app/themes/fader/assets/video/hero.webm" type="video/webm">
    <source src="/app/themes/fader/assets/video/hero.mp4" type="video/mp4">
  </video>
  <div class="centered">
    <h1><?php echo wp_kses_post( $header['header_text'] ); ?></h1>
    <h2><?php echo wp_kses_post( $header['header_description'] ); ?></h2>
    <?php if ( isset( $header['ctas'] ) ) {
      foreach ( $header['ctas'] as $cta ) { ?>
        <a class="button__cta button__cta-purple" href="<?php echo esc_url( get_permalink( $cta['link'] ) ); ?>"<?php if ( ! is_external( get_permalink( $cta['link'] ) ) ) { ?> target="_blank"<?php } ?>><?php echo wp_kses_post( $cta['text'] ); ?></a>
      <?php }
    } ?>
  </div>
</div>
<div class="about">
  <div class="container-fluid">
    <p><?php echo wp_kses_post( $about ); ?></p>
  </div>
</div>
<div class="content-areas row">
  <?php foreach ( $content as $area ) { ?>
    <div class="col-md-4 content__area">
      <div class="content__area-title"><?php echo wp_kses_post( $area['header_text'] ); ?></div>
      <div class="content__area-overlay hidden-md hidden-lg hidden-xl">
        <div class="content__area-description">
          <h2><?php echo wp_kses_post( $area['header_description'] ); ?></h2>
          <a class="button__cta" href="<?php echo esc_url( get_the_permalink( $area['cta']['link'] ) ); ?>"><?php echo wp_kses_post( $area['cta']['text'] ); ?></a>
        </div>
      </div>
    </div>
  <? } ?>
</div>
<div class="product">
  <div class="container-fluid">
    <div class="col-sm-4">
      <img src="<?php echo esc_url( wp_get_attachment_image_src( $product['image'], 'full' )[0] ); ?>" />
    </div>
    <div class="col-sm-7 col-sm-offset-1">
      <div class="hero__description">
        <h3> <?php echo wp_kses_post( $product['header_text'] ); ?></h3>
        <?php echo wp_kses_post( $product['header_description'] ); ?>
      </div>
      <a href="<?php echo esc_url( get_the_permalink( $product['cta']['link'] ) ); ?>" class="button__cta button__cta-purple">
        <?php echo wp_kses_post( $product['cta']['text'] ); ?>
      </a>
    </div>
  </div>
</div>
