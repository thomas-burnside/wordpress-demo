<?php get_header(); ?>
<main>
    <h1 class="archive-heading"><?php echo single_term_title(); ?></h1>

    <?php if (have_posts()) : ?>
        <div class="projects-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="project-item">
                    <h3><?php the_title(); ?></h3>
                    <?php if (has_post_thumbnail()) : ?>
                        <div><?php the_post_thumbnail('medium'); ?></div>
                    <?php endif; ?>
                    <?php if ($summary = get_field('project_summary')) : ?>
                        <p><?php echo esc_html($summary); ?></p>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div> <!-- Closing projects-grid -->
    <?php else : ?>
        <p>No projects found.</p>
    <?php endif; ?>

</main>
<?php get_footer(); ?>