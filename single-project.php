<?php get_header(); ?>
<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article class="project-article">
                <h1><?php the_title(); ?></h1>
                <p>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'project_category');
                    if ($terms && !is_wp_error($terms)) {
                        $term_links = [];
                        foreach ($terms as $term) {
                            $term_link = get_term_link($term, 'project_category');
                            if (!is_wp_error($term_link)) {
                                $term_links[] = '<a class="project-terms" href="' . esc_url($term_link) . '" class="project-term">' . esc_html($term->name) . '</a>';
                            }
                        }
                        echo implode(', ', $term_links);
                    } else {
                        echo 'No categories';
                    }
                    ?>
                </p> <?php if (has_post_thumbnail()) : ?>
                    <div><?php the_post_thumbnail('medium'); ?></div>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php if ($github_repo = get_field('github_repo')) : ?>
                    <p><a class="anchor-link" href="<?php echo esc_url($github_repo); ?>" target="_blank">View on GitHub</a></p>
                <?php endif; ?>
                <?php if ($code = get_field('code_snippet')) : ?>
                    <pre><code class="code-snippet"><?php echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8'); ?></code></pre>
                <?php endif; ?>
            </article>
    <?php endwhile;
    else :
        echo '<p>No project found.</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>