<?php

$query_string = 'posts_per_page=' . $instance['numbers'];
if ($instance['cat']) {
    $query_string .= '&cat=' . $instance['cat'];
}
$query = new WP_Query($query_string);

extract($args);
$title = apply_filters('widget_title', $instance['title']);

echo wp_kses_post($before_widget); ?>

<?php echo wp_kses_post($before_title . $title . $after_title); ?>
<div class="widget__inner">
    <div class="widget__post">
        <?php while( $query->have_posts() ): $query->the_post(); ?>
        <div class="widget__post-item ul_li">
            <div class="post-thumb">
                <a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_post_thumbnail('turner_90x90'); ?></a>
            </div>
            <div class="post-content">
                <div class="post-meta">
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><i class="invite-text-gr-color far fa-user"></i><?php esc_html_e('By ', 'turner'); ?> <?php the_author(); ?></a>
                    <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><i class="invite-text-gr-color far fa-calendar"></i><?php echo get_the_date( ); ?></a>
                </div>
                <h4 class="post-title border-effect-2"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php echo wp_kses_post($after_widget);