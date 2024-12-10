<?php
/**
 * Blog Post Main File.
 *
 * @package TURNER
 * @author  The Genious
 * @version 1.0
 */

get_header();
$data    = \buildexo\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = turner_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {

	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'turner_banner', $data );?>
<?php else:?>

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

<?php endif;?>


<!-- blog start -->
<section class="blog pt-120 pb-120">
    <div class="container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'turner_sidebar', $data );
				}
			?>
            <div class="content-side thm-unit-test <?php echo esc_attr( $class ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
                <!-- Blog Detail -->
				<div class="blog__post-wrap">
                    <article class="post-details">
                        <?php if( has_post_thumbnail() ){?>
                        <figure class="post-thumb mb-30">
                            <?php the_post_thumbnail('full'); ?>
                        </figure>
                        <?php };?>
                        <div class="text"><?php the_content(); ?></div>
                        <div class="clearfix"></div>
                        <?php wp_link_pages(array('before'=>'<div class="paginate-links mt-30">'.esc_html__('Pages: ', 'buildexo'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                    </article>

                    <div class="post-footer">
                        <?php if(has_tag() || function_exists('bunch_share_us_two')){ ?>
                        <div class="post-tags-share">
                            <?php if(has_tag()){ ?>
                            <div class="tags ul_li mt-30">
                                <h5 class="title"><?php esc_html_e('Tags:', 'buildexo'); ?></h5>
                                <ul class="list-unstyled ul_li">
                                    <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                                </ul>
                            </div>
                            <?php } ?>
                            <?php if(function_exists('bunch_share_us_two')):?>
                            <div class="social-share ul_li mt-20">
                                <h5 class="title"><?php esc_html_e('Share:', 'buildexo'); ?></h5>
                                <ul class="ul_li">
                                    <?php echo wp_kses(bunch_share_us_two(get_the_id(), $post->post_name ), true);?>
                                </ul>
                            </div>
                            <?php endif;?>
                        </div>
                    	<?php } ?>

                        <div class="row">
                        	<div class="col-xl-12">
                        		<!-- Comments Area -->
                        		<?php comments_template(); ?>
                            </div>
                        </div>

                	</div>
                </div>
				<?php endwhile; ?>

            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'turner_sidebar', $data );
				}
			?>
        </div>
    </div>
</section>
<!--End blog area-->

<?php
}
get_footer();
