<?php
/**
 * Default Template Main File.
 *
 * @package TURNER
 * @author  TheGenious
 * @version 1.0
 */
get_header();
$data  = \buildexo\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'turner_banner', $data );?>
<?php endif;?>

<!-- Sidebar Page Container -->
<section class="blog pt-120 pb-120">
    <div class="container">
        <div class="row">	
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'turner_sidebar', $data );
				}
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="blog__post-wrap">
                    <div class="thm-unit-test">
                        
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'buildexo' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                    </div>
                </div>
            </div>
            <?php
            if ( $layout == 'right' ) {
                $data->set('sidebar', 'default-sidebar');
                do_action( 'turner_sidebar', $data );
            }
            ?>        
        </div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
