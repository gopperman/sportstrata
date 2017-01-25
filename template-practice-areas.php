<?php
/**
 * Template Name: Practice Areas Template
 */
while ( have_posts() ) : the_post();
  $id = get_the_ID();
  $hero = get_post_meta( $id, 'content_header')[0];
  $content = get_post_meta( $id, 'practice_area_content' )[0];
  $featured_posts = get_post_meta( $id, 'featured_posts' )[0];
?>

  <div id="content-header" class="practice-areas__hero hero">
    <div class="centered">
      <p><?php echo wp_kses_post( $hero['description'] ); ?></p>
      <h2><?php echo wp_kses_post( get_the_title() ); ?></h2>
    </div>
  </div>
  <div class="practice-areas">
    <div class="container-fluid">
      <?php echo wp_kses_post( $content ); ?>
    </div>
  </div>
  <div class="featured-posts">
    <div class="container-fluid">
      <h4>Featured Blog Posts</h4>
      <div class="row">
        <?php foreach ( $featured_posts as $featured_post ) { ?>
          <div class="col-md-4">
            <a href="<?php echo esc_url( get_permalink( $featured_post['post_link'] ) ); ?>" class="featured-post__link">
              <?php if ( has_post_thumbnail( $featured_post['post_link'] ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post['post_link'] ), 'large' ); ?>
                <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title( $featured_post['post_link'] ) ); ?>"/>
              <?php } ?>
              <b><?php echo wp_kses_post( get_the_title( $featured_post['post_link'] ) ); ?></b>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php endwhile; ?>
