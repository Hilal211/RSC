<?php

$query_string = 'posts_per_page=' . $instance['number'];
if ($instance['cat']) {
    $query_string .= '&cat=' . $instance['cat'];
}
$query = new WP_Query($query_string);

extract($args);

echo wp_kses_post($before_widget); ?>

<div class="footer__instagram">
    <?php 
		while ( $query->have_posts() ) : $query->the_post();		
	?>
    <div class="footer__instagram-item pos-rel">
        <?php the_post_thumbnail('turner_351x258'); ?>
        <a class="icon" href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/instagram.png" alt="<?php esc_attr_e('Awesome Image', 'turner');?>"></a>
    </div>
    <?php endwhile; ?>
</div>

<?php echo wp_kses_post($after_widget);