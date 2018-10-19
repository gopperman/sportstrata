<?php $categories = get_categories(); ?>
<?php get_template_part('templates/page', 'header'); ?>
<div class="container-fluid blog__container">
    <main class="col-md-7">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', 'excerpt'); ?>
      <?php endwhile; ?>
      <div class="row">
        <div class="col-xs-12">
          <?php if ( $prev = get_previous_posts_link() ) { ?>
            <div class="nav-next button__cta button__cta-purple alignleft"><?= $prev; ?></div>
          <?php } ?>
          <?php if ( $next = get_next_posts_link() ) { ?>
            <div class="nav-previous button__cta button__cta-purple alignright"><?= $next; ?></div>
          <? } ?>
        </div>
      </div>
    </main>
    <aside class="col-md-5">
      <h4>Post Categories</h4>
      <?php $filtered_categories = array(
          "Directors",
          "Mental Performance Coaches",
          "SportStrata Consultants");
        foreach ( $categories as $cat ) {
          if (!in_array($cat->name, $filtered_categories)) { ?>
            <a class="button__cat" href="<?= get_category_link( $cat->cat_ID ); ?>"><?= $cat->name ?></a>
          <?php } ?>
      <?php } ?>
    </aside>
</div>
