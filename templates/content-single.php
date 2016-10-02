<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="container-fluid">
      <header>
        <?php get_template_part('templates/entry-meta'); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </div>
    <footer>
      <div class="container-fluid">
        <div class="row author__meta">
          <div class="col-sm-3">
            <?php echo wp_kses_post( get_avatar( get_the_author_meta( 'email' ), 256 ) ); ?>
          </div>
          <div class="col-sm-9">
            <?= the_author_meta( 'description' ); ?>
          </div>
        </div>
      </div>
    </footer>
  </article>
<?php endwhile; ?>
