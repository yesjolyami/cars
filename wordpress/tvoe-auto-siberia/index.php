<?php
/** Fallback template. */
get_header();
?>
<main class="frame" style="padding: 80px 0; min-height: 60vh;">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
