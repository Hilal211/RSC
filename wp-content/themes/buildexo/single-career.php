<?php get_header(); 
$data = \buildexo\Includes\Classes\Common::instance()->data('single-career')->get(); 

$query_number = get_post_meta( get_the_id(), 'query_number', true );
$query_orderby = get_post_meta( get_the_id(), 'query_orderby', true );
$query_order = get_post_meta( get_the_id(), 'query_order', true );
$query_category = get_post_meta( get_the_id(), 'query_category', true );
$args = array(
	'post_type'      => 'career',
	'posts_per_page' => $query_number,
	'orderby'        => $query_orderby,
	'order'          => $query_order,
);

if( $query_category  ) $args['career_cat'] = $query_category;
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
	$term_list = wp_get_post_terms(get_the_id(), 'career_cat', array("fields" => "names"));
?>
<?php $turner_careers_meta = get_post_meta( get_the_ID(), 'turner_meta_careers', true );?>
<!--
=====================================================
    Portfolio Details
=====================================================
-->
<!-- career single start -->
<section class="career-single pt-120 pb-120">
    <div class="container">
        <div class="row">
			<div class="col-lg-8">
                <div class="career-single__content">
                    <div class="career-single__img">
                        <?php the_post_thumbnail('turner_768x282'); ?>
                    </div>
                    <?php the_content();?>
                    <h4><?php echo wp_kses($turner_careers_meta['career_title'], true ); ?></h4>
                    <?php 
						$features_list = $turner_careers_meta['career_feature_list'];
						if(!empty($features_list)){
						$features_list = explode("\n", ($features_list)); 
					?>
					<ul>
						<?php foreach($features_list as $features): ?>
                        <li><i class="far fa-check"></i><?php echo wp_kses($features, true); ?></li>
                        <?php endforeach; ?>
                    </ul>
					<?php } ?>
                    <h4><?php echo wp_kses($turner_careers_meta['career_skills_title'], true ); ?></h4>
                     <?php 
						$features_list = $turner_careers_meta['career_feature_list_v2'];
						if(!empty($features_list)){
						$features_list = explode("\n", ($features_list)); 
					?>
					<ul>
						<?php foreach($features_list as $features): ?>
                        <li><i class="far fa-check"></i><?php echo wp_kses($features, true); ?></li>
                        <?php endforeach; ?>
                    </ul>
					<?php } ?>
                    <h4><?php echo wp_kses($turner_careers_meta['career_benifits_title'], true ); ?></h4>
                     <?php 
						$features_list = $turner_careers_meta['career_feature_list_v3'];
						if(!empty($features_list)){
						$features_list = explode("\n", ($features_list)); 
					?>
					<ul>
						<?php foreach($features_list as $features): ?>
                        <li><i class="far fa-check"></i><?php echo wp_kses($features, true); ?></li>
                        <?php endforeach; ?>
                    </ul>
					<?php } ?>
                    <h4><?php echo wp_kses($turner_careers_meta['career_salary_title'], true ); ?></h4>
                    <span><?php echo wp_kses($turner_careers_meta['career_salary'], true ); ?></span>                    
            	</div>
            </div>       
			<div class="col-lg-4">
            	<div class="career-single__widget">
                    <h3><?php echo wp_kses($turner_careers_meta['career_info_title'], true ); ?></h3>
                    <ul class="career-single__details mb-30">
                        <li>
                            <i class="fal fa-map-marker-alt"></i>
                            <p><strong><?php echo wp_kses($turner_careers_meta['career_address_title'], true ); ?></strong><br> <?php echo wp_kses($turner_careers_meta['career_address'], true ); ?></p>
                        </li>
                        <li>
                            <i class="fal fa-briefcase"></i>
                            <p><strong><?php echo wp_kses($turner_careers_meta['career_job'], true ); ?></strong><br> <?php echo wp_kses($turner_careers_meta['career_job_title'], true ); ?></p>                            
                        </li>
                        <li>
                            <i class="fal fa-analytics"></i>
                            <p><?php echo wp_kses($turner_careers_meta['career_exp'], true ); ?></p>
                        </li>
                        <li>
                            <i class="fal fa-users"></i>
                            <p><?php echo wp_kses($turner_careers_meta['career_gender'], true ); ?></p>
                        </li>
                        <li>
                            <i class="fal fa-user-circle"></i>
                            <p><?php echo wp_kses($turner_careers_meta['career_age'], true ); ?></p>
                        </li>
                        <li>
                            <i class="fal fa-clock"></i>
                            <p><?php echo wp_kses($turner_careers_meta['career_office_time'], true ); ?></p>
                        </li>
                        <li>
                            <i class="fal fa-calendar-alt"></i>
                            <p><strong><?php echo wp_kses($turner_careers_meta['career_date_title'], true ); ?></strong><br><?php echo wp_kses($turner_careers_meta['apply_end_date'], true ); ?></p>
                        </li>
                        <li>
                            <i class="fal fa-wallet"></i>
                            <p><strong><?php echo wp_kses($turner_careers_meta['career_salary_title'], true ); ?></strong><br> <?php echo wp_kses($turner_careers_meta['career_salary'], true ); ?></p>
                        </li>
                    </ul>
                    <?php if($turner_careers_meta['career_apply_btn_link']) {?>
                    <div class="text-center">
                        <a href="<?php echo esc_url($turner_careers_meta['career_apply_btn_link']); ?>" class="thm-btn"><?php echo wp_kses($turner_careers_meta['career_apply_btn_title'], true ); ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-details -->
<?php endwhile; ?>
<?php get_footer(); ?>