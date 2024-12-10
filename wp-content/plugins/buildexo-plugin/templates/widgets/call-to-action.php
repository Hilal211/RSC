<?php

extract($args);

echo wp_kses_post($before_widget); ?>


<div class="widget__cta bg_img mt-30" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($instance['cta_bg_image']['id'])); ?>)">
    <?php if ($instance['cta_icon_image']) { ?>
    <div class="icon">
        <img src="<?php echo esc_url(wp_get_attachment_url($instance['cta_icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner');?>">
    </div>
    <?php } ?>
    <?php if ($instance['cta_title']) { ?><h2><?php echo wp_kses_post($instance['cta_title']); ?></h2><?php } ?>
    <?php if ($instance['cta_address']) { ?><p><?php echo wp_kses_post($instance['cta_address']); ?></p><?php } ?>
</div>
<?php if($instance['banner_image']) { ?>
<div class="widget__banner mt-30">
    <a href="<?php echo esc_url($instance['cta_url']); ?>"><img src="<?php echo esc_url(wp_get_attachment_url($instance['banner_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner');?>"></a>
</div>
<?php } ?>

<?php

echo wp_kses_post($after_widget);
