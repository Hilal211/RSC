<?php
extract($args);

echo wp_kses_post($before_widget); ?>

<div class="footer__about">
    <?php if ($instance['widget_logo_img3']) { ?>
    <div class="footer__logo mb-30">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['widget_logo_img3']['url']); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>"></a>
    </div>
	<?php } ?>
    <?php if ($instance['content3']) { ?>
    <p><?php echo wp_kses_post($instance['content3']); ?> </p>
    <?php } ?>
    <?php 
		$social_group = $instance['social_links_group'];
		if (!empty( $social_group )) : 
	?>
    <div class="footer-social">
        <?php foreach( $social_group as $social ):?> 
        <a href="<?php echo esc_url( $social[ 'social_link' ] );?>"><i class="fab <?php echo esc_attr(str_replace( "fa ",  "", $social['social_icon']));?>"></i></a>
        <?php endforeach;?>
    </div>
    <?php endif; ?>
</div>

<?php

echo wp_kses_post($after_widget);
