<?php
while ($query->have_posts()) {
    $query->the_post();

    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
    <li class="post" data-category="">
        <article>
            <figure>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($featured_image_url); ?>" alt="Image">
                </a>
                <figcaption>
                    <ol class="post-categories">
                        <li>
                            <?php echo esc_html($excerpt); ?>
                        </li>
                    </ol>
                    <?php if (!empty($title)) : ?>
                        <h2 class="post-title">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>
                </figcaption>
            </figure>
        </article>
    </li>
<?php } ?>