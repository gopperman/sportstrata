<?php
/**
 * Template Name: Media Template
 */
while ( have_posts() ) : the_post();
  $id = get_the_ID();
  $hero = get_post_meta( $id, 'content_header')[0];
  $videos = get_post_meta( $id, 'media_videos' )[0];
?>

  <div id="content-header" class="hero">
    <div class="overlay"></div>
    <div class="container-fluid">
      <div class="col-md-6">
        <h1>Invite Dr. Fader to Speak</h1>
        <h2><?php echo wp_kses_post( $hero['description'] ); ?></h2>
        <a href="" class="button__cta button__cta-purple" data-toggle="modal" data-target="#contact">
          <?php echo wp_kses_post( $hero['ctas']['text'] ); ?>
        </a>
      </div>
    </div>
  </div>
    <?php if ( count( $videos ) ) { ?>
    <div class="media__videos">
      <div class="container-fluid">
        <h2>Media Appearances</h2>
        <?php foreach ($videos as $video) { ?>
          <div class="col-sm-6 col-md-4">
            <div class="media__video">
              <?= wp_oembed_get( $video ); ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <? } ?>
  <div class="author-about">
    <div class="container-fluid">
      <div class="row author__meta">
        <div class="col-sm-3"><?php echo wp_kses_post( get_avatar( get_the_author_meta( 'email' ), 256 ) ); ?></div>
        <div class="col-sm-9"><?php echo wp_kses_post( the_author_meta( 'description' ) ); ?></div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
