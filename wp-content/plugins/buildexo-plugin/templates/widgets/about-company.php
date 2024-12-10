<?php
extract($args);

echo wp_kses_post($before_widget); ?>

<div class="footer__about">
    <?php if ($instance['widget_logo_img']) { ?>
    <div class="footer__logo mb-15">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']['url']); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>"></a>
    </div>
    <?php } ?>
    <?php if ($instance['content']) { ?><p><?php echo wp_kses_post($instance['content']); ?> </p><?php } ?>
    <?php if ($instance['widget_card_img']) { ?>
    <div class="payment-img mt-15">
        <img src="<?php echo esc_url(wp_get_attachment_url($instance['widget_card_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>">
    </div>
    <?php } ?>
</div>

<?php

echo wp_kses_post($after_widget);
