<?php

$query_string = 'posts_per_page=' . $instance['number'];
$options = turner_WSH()->option();
if ($instance['cat']) {
    $query_string .= '&cat=' . $instance['cat'];
}
$query = new WP_Query($query_string);

extract($args);

echo wp_kses_post($before_widget); ?>


<!-- Profile Widget -->
<div class="profile-widget">
    <div class="image">
        <?php echo get_avatar(get_the_author_meta('ID'), 95); ?>
    </div>
    <h6><?php the_author(); ?></h6>
    <div class="designation"><?php esc_html_e('Blogger/Photographer', 'insuco'); ?></div>
    <div class="text"><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></div>    
    <?php if($options->get( 'show_single_post_author_social_share' )) {
	$icons = $options->get( 'single_post_author_social_share' );
	if ( ! empty( $icons ) ) { ?>
	<ul class="social-box">
		<?php foreach ( $icons as $h_icon ) {					
		$icon_class = explode( '-', turner_set( $h_icon, 'icon' ) ); ?>
		<li><a href="<?php echo esc_url(turner_set( $h_icon, 'url' )); ?>" <?php if( turner_set( $h_icon, 'background' ) || turner_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(turner_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(turner_set( $h_icon, 'color' )); ?>" <?php endif;?> target="_blank" class="fa <?php echo esc_attr( turner_set( $h_icon, 'icon' ) ); ?>"></a></li>
		<?php } ?>
	</ul>
	<?php } } ?>
</div>

<?php echo wp_kses_post($after_widget);