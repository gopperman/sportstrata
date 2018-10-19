<?php use Roots\Sage\Titles;
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = ( strpos( $thumb_url_array[0], 'default.png' ) ) ? '/app/themes/sportstrata/assets/images/sports2-lg.jpg' : $thumb_url_array[0];
?>

<div class="page-header hero" id="content-header">
  <div class="centered">
      <h2 class="page__title"><?= Titles\title(); ?></h2>
  </div>
</div>
