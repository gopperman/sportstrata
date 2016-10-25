<?php
/**
 * Template Name: Team Template
 */
$director_query = new WP_Query( array(
  'post_type' => 'team-members',
  'category_name' => 'directors',
));

$coach_query = new WP_Query( array(
  'post_type' => 'team-members',
  'category_name' => 'performance-coaches',
));

$trainer_query = new WP_Query( array(
  'post_type' => 'team-members',
  'category_name' => 'expert-consultants',
));

$teams = array(
  'directors' => $director_query->get_posts(),
  'performance coaches' => $coach_query->get_posts(),
  'expert consultants' => $trainer_query->get_posts(),
);

$header_description = get_post_meta( get_the_ID(), 'header_description')[0];

?>
<div id="content-header" class="hero">
  <div class="centered">
    <h1>Our Team</h1>
    <h2><?php echo esc_html($header_description); ?></h2>
  </div>
</div>
<div class="team">
  <?php foreach ($teams as $team => $members) {
    if ( count($members) > 0 ) { ?>
      <div class="container-fluid">
        <div class="row">
          <h2><?php echo esc_html($team); ?></h2>
          <?php foreach ($members as $member) {
            $fields = get_post_meta( $member->ID ); ?>
            <div class="col-sm-6 col-md-4">
              <div class="team__member">
                  <a class="team__member-link" href="<?php echo get_permalink($member->ID); ?>">
                    <img src="<?php echo esc_url( wp_get_attachment_image_src( $fields['external_content_headshot'][0], 'medium' )[0] ); ?>" />
                  </a>
                  <h3><a href="<?php echo get_permalink($member->ID); ?>">
                    <?php echo esc_html($member->post_title); ?>
                  </a></h3>
                  <h4><?php echo esc_html($fields['external_content_title'][0]); ?></h4>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }
  } ?>
</div>
