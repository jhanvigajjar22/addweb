<?php
/*
 * Template Name: Resource Listing Template
 */

get_header();
?>

<?php
// Categories resource_type
$resource_type_args = array(
    'taxonomy' => 'resource_type',
    'orderby' => 'name',
    'order'   => 'ASC'
);

$resource_types = get_categories($resource_type_args);

// Categories resource_topic
$resource_topic_args = array(
    'taxonomy' => 'resource_topic',
    'orderby' => 'name',
    'order'   => 'ASC'
);

$resource_topics = get_categories($resource_topic_args);

// Custom resource 
$args = array(
    'post_type' => 'resource',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

$query = new WP_Query($args);
?>

<section class="author-archive">
    <div class="container">
        <h1>Resource Filter</h1>
       
        <div class="">
            <h2 class="cat_title">Resource Types</h2>
            <ol class="filters">
                <li class="active">
                    <a href="javascript:void(0);" data-category="All"><label for="All">All</label></a>
                </li>
                <?php foreach ($resource_types as $type) { ?>
                    <li>
                        <a href="<?php echo $type->term_id; ?>" data-category="<?php echo esc_attr($type->slug); ?>">
                            <label for="<?php echo esc_attr($type->slug); ?>"> <?php echo esc_html($type->name); ?> </label>
                        </a>
                    </li>
                <?php } ?>
            </ol>
        </div>

        <div class="">
            <h2 class="cat_title">Resource Topics</h2>
            <ol class="filters">
                <li class="active">
                    <a href="javascript:void(0);" data-category="All"> <label for="All">All</label> </a>
                </li>
                <?php foreach ($resource_topics as $topic) { ?>
                    <li>
                        <a href="<?php echo $topic->term_id; ?>" data-category="<?php echo esc_attr($topic->slug); ?>">
                            <label for="<?php echo esc_attr($topic->slug); ?>"> <?php echo esc_html($topic->name); ?> </label>
                        </a>
                    </li>
                <?php } ?>
            </ol>
        </div>

        <?php if ($query->have_posts()) { ?>
            <ol class="posts">
                <?php while ($query->have_posts()) {
                    $query->the_post();

                    $title = get_the_title();
                    $excerpt = get_the_excerpt();
                    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                ?>
                    <li class="post old_data">
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
                                    <?php if (!empty($title)) { ?>
                                        <h2 class="post-title">
                                            <?php echo esc_html($title); ?>
                                        </h2>
                                    <?php } ?>
                                </figcaption>
                            </figure>
                        </article>
                    </li>
                <?php } ?>
            </ol>
        <?php } else {
            echo '<p> No Resouce Found </p>';
        }
        wp_reset_postdata();
        ?>

    </div>
</section>

<?php get_footer(); ?>