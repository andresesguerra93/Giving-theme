<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-full">
        <header>
          <h2><?php the_title(); ?></h2>
          By: <?php the_author(); ?>
        </header>
        <?php the_content(); ?>
      </article>
<?php endwhile; else : ?>
      <article>
        <p>No encontrado!</p>
      </article>
<?php endif; ?>
  </section><?php get_sidebar(); ?>
  <li><?php echo imp_getprot(3); ?></li>
</main>
<?php get_footer(); ?>