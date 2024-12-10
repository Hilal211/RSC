<?php
extract($args);

$title = apply_filters('widget_title', $instance['title']);

echo wp_kses_post($before_widget); ?>

<?php echo wp_kses_post($before_title . $title . $after_title); ?>
<ul class="footer__contact-info list-unstyled">
    <?php if ($instance['address2']) { ?><li><?php echo wp_kses_post($instance['address2']); ?></li><?php } ?>
    <?php if ($instance['email_address2']) { ?><li><?php echo wp_kses_post($instance['email_address2']); ?></li><?php } ?>
    <?php if ($instance['phone_no2']) { ?><li><?php echo wp_kses_post($instance['phone_no2']); ?></li><?php } ?>
    <?php if ($instance['working_title']) { ?><li><span><?php echo wp_kses_post($instance['working_title']); ?></span></li><?php } ?>
    <?php if ($instance['working_time']) { ?><li><?php echo wp_kses_post($instance['working_time']); ?></li><?php } ?>
</ul>

<?php

echo wp_kses_post($after_widget);
