<?php
/*
 Template Name: Projects Front Page
*/

// Custom query for projects
$args = [
    'post_type' => 'project',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
$query = new WP_Query($args);

get_header(); ?>
<main>
    <?php if ($query->have_posts()) : ?>
        <div class="projects-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="project-item">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <h2 class="grid-title"><?php the_title(); ?></h2>
                        <p class="grid-terms"><?php the_terms(get_the_ID(), 'project_category', '', ', ', ''); ?></p>
                        <?php if (has_post_thumbnail()) : ?>
                            <div><?php the_post_thumbnail('medium'); ?></div>
                        <?php endif; ?>
                        <?php if ($summary = get_field('project_summary')) : ?>
                            <p><?php echo esc_html($summary); ?></p>
                        <?php endif; ?>
                        </a>
                    </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No projects found.</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</main>
<?php get_footer(); ?>