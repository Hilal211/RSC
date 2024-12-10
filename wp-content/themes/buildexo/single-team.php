<?php get_header(); 
$data = \buildexo\Includes\Classes\Common::instance()->data( 'single-team' )->get(); 

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
	$turner_team_meta = get_post_meta(get_the_ID(), 'turner_meta_team', true );
?>

<!-- team single start -->
<section class="team-single pt-120 pb-190">
    <div class="container">
        <div class="row align-items-end mt-none-30">
            <div class="col-lg-6 mt-30">
                <div class="team-single__img">
                    <?php the_post_thumbnail('turner_405x647'); ?>
                </div>
            </div>
            <div class="col-lg-6 mt-30">
                <div class="team-single__info">
                    <h3 class="name"><?php the_title(); ?></h3>
                    <span class="desig"><?php echo wp_kses($turner_team_meta['team_designation'], true ); ?></span>
                    <p><?php the_content();?></p>                    
                    <ul class="team-single__info-list list-unstyled mb-30">
                        <?php 						
							foreach($turner_team_meta['team_contact_info'] as $key => $turner_set):                    
							$turner_team_meta = get_post_meta(get_the_ID(), 'turner_meta_team', true );											
						?>
                        <li><span><?php echo wp_kses( $turner_set['team_contact_title'], true );?></span><?php echo wp_kses( $turner_set['team_contact_detail'], true );?></li>
                        <?php endforeach; ?>                        
                    </ul>
                    <div class="team-single__social">
                        <h4><?php echo wp_kses($turner_team_meta['team_social_title'], true ); ?></h4>
                        <?php
                            $icons = $turner_team_meta['social_profile'];
                            if ( ! empty( $icons ) ) :								
                        ?>
                        <!-- Social Box -->
                        <div class="team-single__social-list ul_li">
                            <?php foreach ( $icons as $h_icon ) {
            
                                $icon_class = explode( '-', turner_set( $h_icon, 'icon' ) ); 
                            ?>
                            <a href="<?php echo esc_url(turner_set( $h_icon, 'url' )); ?>" <?php if( turner_set( $h_icon, 'background' ) || turner_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(turner_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(turner_set( $h_icon, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( turner_set( $h_icon, 'icon' ) ); ?>"></i></a>
                            <?php } ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>        
        
        <?php if($turner_team_meta['show_personal_info']){ ?>
        <div class="team-single__content mt-60 mb-60">
            <h2><?php echo wp_kses($turner_team_meta['team_personal_info_title'], true ); ?></h2>
            <?php echo wp_kses($turner_team_meta['team_personal_info_description'], true ); ?>
        </div>
        <?php } ?>
        
        <?php if($turner_team_meta['show_contact_me']){ ?>
        <div class="contact-form__wrap">
            <h3><?php echo wp_kses($turner_team_meta['team_form_title'], true ); ?></h3>
            <p><?php echo wp_kses($turner_team_meta['team_form_text'], true ); ?></p>
            <div class="contact-form">
                <?php echo do_shortcode( $turner_team_meta['team_form_url'] );?>
            </div>
        </div>
        <?php } ?>
        
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>