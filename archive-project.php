<?php get_header(); ?>
<main>
    <h1 class="archive-heading">Projects</h1>
    <?php 
    if (have_posts()) : 
        while (have_posts()) : the_post(); ?>
        <article >
            <h3><?php the_title(); ?></h3>
            <?php if (has_post_thumbnail()) : ?>
        <div><?php the_post_thumbnail('medium'); ?></div>
            <?php endif; ?>
            <?php the_content(); ?>
    </article>
    <?php endwhile;
    else : 
        echo '<p>No projects found.</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>