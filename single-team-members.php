<?php
$id = get_the_ID();
$fields = get_post_meta( $id );
$email = esc_attr($fields['external_content_email'][0]);
$name = esc_html(get_the_title()); ?>
<div id="content-header" class="single-team-members__hero hero">
  <div class="centered">
    <h1><?php echo $name; ?></h1>
  </div>
</div>
<div class="team__bio">
  <div class="container-fluid team__bio-card">
    <div class="col-sm-6 col-md-5">
      <h2><?php echo $name; ?></h2>
      <h3><?php echo esc_html($fields['external_content_title'][0]); ?></h3>
      <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
      <img class="headshot" src="<?php echo esc_url( wp_get_attachment_image_src( $fields['external_content_headshot'][0], 'medium' )[0] ); ?>" />
    </div>
    <div class="col-sm-6 col-md-7 team__bio-text">
      <?php echo wp_kses_post($fields['external_content_bio'][0]); ?>
    </div>
    <a class="button__full-width" href="mailto:<?php echo $email ?>">Contact <?php echo $name; ?></a>
  </div>
</div>
