<?php get_header(); 
$data = \buildexo\Includes\Classes\Common::instance()->data('single-project')->get(); 

$query_number = get_post_meta( get_the_id(), 'query_number', true );
$query_orderby = get_post_meta( get_the_id(), 'query_orderby', true );
$query_order = get_post_meta( get_the_id(), 'query_order', true );
$query_category = get_post_meta( get_the_id(), 'query_category', true );
$args = array(
	'post_type'      => 'project',
	'posts_per_page' => $query_number,
	'orderby'        => $query_orderby,
	'order'          => $query_order,
);

if( $query_category  ) $args['project_cat'] = $query_category;
$related_query = new \WP_Query( $args );

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
<?php 
	while( have_posts() ) : the_post(); 
	$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
?>
<?php $turner_projects_meta = get_post_meta( get_the_ID(), 'turner_meta_projects', true );?>
<!--
=====================================================
    Portfolio Details
=====================================================
-->
<!-- portfolio single start -->
<section class="portfolio-single pt-120 pb-190">
    <div class="container">
        <div class="row">
			<div class="col-lg-8">
                <div class="portfolio-single__content">
                    <div class="portfolio-single__thumb mb-30">
                        <img src="<?php echo wp_get_attachment_url($turner_projects_meta['project_feature_image']['id'], true);?>" alt="<?php esc_attr_e('Awesome Image', 'buildexo');?>">
                    </div>
                    <?php the_content();?>
                </div>
            </div>
			<div class="col-lg-4">
                <div class="portfolio-single__inner">
                    <h3 class="title"><?php echo wp_kses($turner_projects_meta['project_info_title'], true ); ?></h3>
                    <ul class="portfolio-single__widget">
                        <li>
                            <strong><?php echo wp_kses($turner_projects_meta['project_title'], true ); ?></strong><br>
                            <?php echo wp_kses($turner_projects_meta['project_name'], true ); ?>
                        </li>
                        <li>
                            <strong><?php echo wp_kses($turner_projects_meta['project_cat_title'], true ); ?></strong><br>
                            <?php echo implode( ', ', (array)$term_list );?>
                        </li>
                        <li>
                            <strong><?php echo wp_kses($turner_projects_meta['project_date_title'], true ); ?></strong><br>
                            <?php echo wp_kses($turner_projects_meta['project_date'], true ); ?>
                        </li>
                        <li>
                            <strong><?php echo wp_kses($turner_projects_meta['project_end_date_title'], true ); ?></strong><br>
                            <?php echo wp_kses($turner_projects_meta['project_end_date'], true ); ?>
                        </li>
                        <li>
                            <strong><?php echo wp_kses($turner_projects_meta['project_tags_title'], true ); ?></strong><br>
                            <?php echo wp_kses($turner_projects_meta['project_tags'], true ); ?>
                        </li>
                        <li>
                            <strong><?php echo wp_kses($turner_projects_meta['project_price'], true ); ?></strong><br>
                            <?php echo wp_kses($turner_projects_meta['project_price_title'], true ); ?>
                        </li>
                    </ul>
                    <?php
						$icons = $turner_projects_meta['social_profile2'];
						if ( ! empty( $icons ) ) :								
					?>
					<!-- Social Box -->
					<ul class="portfolio-single__social ul_li_center">
						<?php foreach ( $icons as $h_icon ) {
		
							$icon_class = explode( '-', turner_set( $h_icon, 'icon' ) ); 
						?>
						<li><a href="<?php echo esc_url(turner_set( $h_icon, 'url' )); ?>" <?php if( turner_set( $h_icon, 'background' ) || turner_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(turner_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(turner_set( $h_icon, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( turner_set( $h_icon, 'icon' ) ); ?>"></i></a></li>
						<?php } ?>
					</ul>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-details -->
<?php endwhile; ?>
<?php get_footer(); ?>