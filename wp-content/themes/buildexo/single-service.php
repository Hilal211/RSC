<?php get_header();
	$data = \buildexo\Includes\Classes\Common::instance()->data( 'single-service' )->get();

	$layout = $data->get('layout');
    $sidebar = $data->get('sidebar');
    $layout = ($layout) ? $layout : 'right';
    $sidebar = ($sidebar) ? $sidebar : 'default-sidebar';
    if (is_active_sidebar($sidebar)) {
        $layout = 'right';
    } else {
        $layout = 'full';
    }
    $class = (!$layout || $layout == 'full') ? 'col-lg-12 col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
    $options = turner_WSH()->option();

    $allowed_tags = wp_kses_allowed_html('post');

?>

<!-- breadcrumb start -->
<section class="breadcrumb bg_img d-flex align-items-center" data-overlay="dark-2" data-opacity="8" data-background="<?php echo esc_url( $data->get( 'banner' ) ); ?>">
    <div class="container">
        <div class="breadcrumb__content text-center">
            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            <ul class="bread-crumb clearfix ul_li_center">
                <?php echo turner_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- services start -->
<section class="service-single pt-115 pb-190">
    <div class="container">
        <div class="row">
            <?php
            if ($data->get('layout') == 'left') {
                do_action('turner_sidebar', $data);
            } ?>
			<?php
				while( have_posts() ) : the_post();
				$turner_service_meta = get_post_meta( get_the_ID(), 'turner_meta_service', true );
			?>
			<div class="content-side <?php echo esc_attr( $class ); ?>">
				<div class="service-single__content">
                    <div class="service-single__thumb pos-rel mb-30">
                        <?php if(!empty( $turner_service_meta['service_detail_image']['id'] )) : ?>
                        <img src="<?php echo wp_get_attachment_url($turner_service_meta['service_detail_image']['id'], true);?>" alt="<?php esc_attr_e('Awesome Image', 'buildexo');?>">
                        <?php endif; ?>
                    	<h2 class="service-single__title"><?php the_title(); ?></h2>
                    </div>
                    <?php the_content();?>
                    <h3><?php echo wp_kses($turner_service_meta['customer_Steps_title'], true ); ?></h3>
                    <p><?php echo wp_kses($turner_service_meta['customer_Steps_text'], true ); ?></p>
                    <div class="row align-items-center mb-30">
                        <div class="col-lg-6 mt-20">
                            <?php if(!empty( $turner_service_meta['service_feature_image']['id'] )) : ?>
                            <img src="<?php echo wp_get_attachment_url($turner_service_meta['service_feature_image']['id'], true);?>" alt="<?php esc_attr_e('Awesome Image', 'buildexo');?>">
                            <?php endif; ?>
                        </div>
                        <?php
							$features_list = $turner_service_meta['service_feature_list_v2'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list));
						?>
                        <div class="col-lg-6 mt-20">
                            <ul class="service-single__list list-unstyled">
                                <?php foreach($features_list as $features): ?>
                                <li><i class="far fa-check-double"></i><?php echo wp_kses($features, true); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
						<?php } ?>
                    </div>
                    <h3><?php echo wp_kses($turner_service_meta['customer_benefits_title'], true ); ?></h3>
                    <p><?php echo wp_kses($turner_service_meta['customer_benefits_text'], true ); ?></p>
                    <?php
						$features_list = $turner_service_meta['service_feature_list'];
						if(!empty($features_list)){
						$features_list = explode("\n", ($features_list));
					?>
					<ul class="service-single__list list-unstyled mb-30">
						<?php foreach($features_list as $features): ?>
						<li><i class="far fa-check-double"></i><?php echo wp_kses($features, true); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php } ?>
                    <p><?php echo wp_kses($turner_service_meta['customer_benefits_text2'], true ); ?></p>
                </div>
			</div>
			<?php endwhile; ?>

            <?php
            if ($data->get('layout') == 'right') {
                do_action('turner_sidebar', $data);
            } ?>

        </div><!-- /.row gutter-y-60 -->
    </div><!-- /.container -->
</section>
<!--  Service details end-->
<?php get_footer(); ?>