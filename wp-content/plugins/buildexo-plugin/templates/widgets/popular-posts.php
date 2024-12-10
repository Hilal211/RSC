<?php

$query_string = 'posts_per_page=' . $instance['number'];
if ($instance['cat']) {
    $query_string .= '&cat=' . $instance['cat'];
}
$query = new WP_Query($query_string);

extract($args);
$title = apply_filters('widget_title', $instance['title']);

echo wp_kses_post($before_widget); ?>

<div class="footer__widget-blog">
    <div class="widget-heading mb-40">
        <?php echo wp_kses_post($before_title . $title . $after_title); ?>
    </div>
    <div class="blog-widget">
        <?php while( $query->have_posts() ): $query->the_post(); ?>
        <div class="blog-widget__item ul_li">
            <div class="thumb">
                <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_post_thumbnail('turner_85x75'); ?></a>
            </div>
            <div class="content">
                <span> <?php echo get_the_date();?> </span>
                <h3 class="border_effect"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php echo wp_trim_words( get_the_title(), 6, '.' );?></a></h3>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php echo wp_kses_post($after_widget);