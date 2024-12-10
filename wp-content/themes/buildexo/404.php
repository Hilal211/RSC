<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Turner
 * @author     The Genious <admin@thegenious.com>
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to <a href="%s">Homepage</a>', 'buildexo'), esc_html(home_url('/')));
$error_page_img    = $options->get( 'error_page_image' );
$error_page_img    = turner_set( $error_page_img, 'url', TURNER_URI . 'assets/images/bg/img_404.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<?php get_header();

$data = \buildexo\Includes\Classes\Common::instance()->data( '404' )->get();
$options = turner_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

	<?php if ( $data->get( 'enable_banner' ) ) : ?>
		<?php do_action( 'turner_banner', $data );?>
    <?php else:?>

    <!-- breadcrumb start -->
    <section class="breadcrumb bg_img d-flex align-items-center" data-overlay="dark-2" data-opacity="8" data-background="<?php echo esc_url( $data->get( '404_page_banner' ) ); ?>">
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

    <!-- 404 page start -->
    <section class="error-page pt-95 pb-95">
        <div class="container">
            <div class="error-page__inner text-center">
                <div class="error-page__img">
                    <img src="<?php echo esc_url($error_page_img); ?>" alt="<?php esc_attr_e('Awesome Image', 'buildexo');?>">
                </div>
                <div class="error-page__content">
                    <h2>
                    	<?php
							if( $options->get( '404-page_title' ) ){
								echo wp_kses( $options->get( '404-page_title' ), true );
							}else{
								esc_html_e( 'Oops! Page Not found.', 'buildexo' );
							}
						?>
                    </h2>
                    <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                    <a href="<?php echo( home_url( '/' ) ); ?>" class="thm-btn">
                    <?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'back to Home page', 'buildexo' ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 page end -->

<?php
}
get_footer(); ?>
