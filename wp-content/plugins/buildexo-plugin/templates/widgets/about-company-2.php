<?php
extract($args);

echo wp_kses_post($before_widget); ?>

<div class="footer__about">
    <?php if ($instance['widget_logo_img2']) { ?>
    <div class="footer__logo mb-25">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['widget_logo_img2']['url']); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>"></a>
    </div>
    <?php } ?>
    <?php if ($instance['content2']) { ?><p><?php echo wp_kses_post($instance['content2']); ?></p><?php } ?>
    <?php if ($instance['address'] || $instance['email_address'] || $instance['phone_no']) { ?>
    <ul class="footer__info list-unstyled mt-40">
        <?php if ($instance['address']) { ?><li><i class="fas fa-map-marker-alt"></i><?php echo wp_kses_post($instance['address']); ?></li><?php } ?>
        <?php if ($instance['email_address']) { ?><li><i class="fas fa-envelope"></i><?php echo wp_kses_post($instance['email_address']); ?></li><?php } ?>
        <?php if ($instance['phone_no']) { ?><li><i class="fas fa-phone"></i><?php echo wp_kses_post($instance['phone_no']); ?> </li><?php } ?>
    </ul>
    <?php } ?>
</div>

<?php

echo wp_kses_post($after_widget);
