<?php

$query_string = 'posts_per_page=' . $instance['number'];
if ($instance['cat']) {
    $query_string .= '&cat=' . $instance['cat'];
}
$query = new WP_Query($query_string);

extract($args);
$title = apply_filters('widget_title', $instance['title']);

echo wp_kses_post($before_widget); ?>

<div class="footer__widget-gallery">
    <div class="widget-heading mb-40">
        <?php echo wp_kses_post($before_title . $title . $after_title); ?>
    </div>
    <ul class="footer__gallery list-unstyled">
        <?php 
			global $post ; 
			while ( $query->have_posts() ) : $query->the_post(); 
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );			
		?>
        <li><a class="popup-image" href="<?php echo esc_url($post_thumbnail_url); ?>"><?php the_post_thumbnail('turner_95x91'); ?></a></li>
        <?php endwhile; ?>
    </ul>
</div>

<?php echo wp_kses_post($after_widget);