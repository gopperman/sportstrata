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
  'category_name' => 'trainers',
));

$teams = array(
  'directors' => $director_query->get_posts(),
  'coaches' => $coach_query->get_posts(),
  'trainers' => $trainer_query->get_posts(),
); ?>
<div id="content-header" class="hero">
  <div class="centered">
    <h1>Our Team</h1>
    <h2>lorem ipsum</h2>
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
            <div class="team__member col-sm-6 col-md-4">
                <a class="team__member-link" href="<?php echo get_permalink($member->ID); ?>">
                  <img src="<?php echo esc_url( wp_get_attachment_image_src( $fields['external_content_headshot'][0], 'medium' )[0] ); ?>" />
                </a>
                <h3><?php echo esc_html($member->post_title); ?></h3>
                <h4><?php echo esc_html($fields['external_content_title'][0]); ?></h4>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }
  } ?>
</div>
