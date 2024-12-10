<?php namespace TURNERPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Stroke;
use Elementor\Plugin;
/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */

class Product_Carousel extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_product_carousel';
    }
    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Turner Product Carousel', 'turner' );
    }
    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-post-list';
    }
    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'turner' ];
    }
	
	public function get_script_depends() {
		wp_register_script( 'product-carousel', YT_URL . 'assets/js/product-carousel.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'product-carousel' ];
	}
	
    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'product_carousel',
            [
                'label' => esc_html__( 'Product Carousel', 'turner' ),
            ]
        );
					
		$this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'turner' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__( 'Order By', 'turner' ),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'turner' ),
                    'title'      => esc_html__( 'Title', 'turner' ),
                    'menu_order' => esc_html__( 'Menu Order', 'turner' ),
                    'rand'       => esc_html__( 'Random', 'turner' ),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'turner' ),
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'turner' ),
                    'ASC'  => esc_html__( 'ASC', 'turner' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'turner'),
				'label_block' => true,
                'options' => get_product_categories(),
            ]
        );		
		$this->end_controls_section();
		
		/**Swiper Setting Start**/
		$this->start_controls_section(
			'swiper_carousel',
			[
				'label' => esc_html__( 'Swiper Carousel Setting', 'turner' )
			]
		);
		
		$this->add_control(
			'loop',
			[
				'label' => __( 'infinite Loop?', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turner' ),
				'label_off' => __( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_responsive_control(
			'items_show',
			[
				'label' => esc_html__( 'No. of Items', 'turner' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 2,
			]
		);
		
		$this->add_responsive_control(
			'image_item_gap',
			[
				'label' => __( 'Item Gap', 'turner' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'default' => 30,
			]
		);
		
		$this->add_control(
			'arrows',
			[
				'label' => __( 'Enable Arrows?', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turner' ),
				'label_off' => __( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'dots',
			[
				'label' => __( 'Enable Dots?', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turner' ),
				'label_off' => __( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->end_controls_section();		
		
		//General Style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__( 'General Setting', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
            'general_margin',
            [
                'label'      => esc_html__( 'Margin', 'turner' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .turner_product__section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
        $this->add_responsive_control(
            'general_padding',
            [
                'label'      => esc_html__( 'Padding', 'turner' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .turner_product__section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'general_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .turner_product__section',				
			]
		);
		$this->end_controls_section();			
	}
	
	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');				
		
		$items_show = $settings[ 'items_show' ];
		$image_item_gap = $settings[ 'image_item_gap' ];
		
		if($settings['loop'] == 'yes'){
			$loop = true;
		}else{
			$loop = false;
		}	
		
		$changed_atts = array(
			'loop'       => $loop,
			'spacebetween' 	     => $image_item_gap,
			'slidesperview' 	 => $items_show
		);	
		$slider_atts = 'data-slider';
		
		$this->add_render_attribute( 'slider_settings', $slider_atts , wp_json_encode( $changed_atts ) );
		
		$paged = turner_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-greenture' );
        $args = array(
			'post_type'      => 'product',
			'posts_per_page' => turner_set( $settings, 'query_number' ),
			'orderby'        => turner_set( $settings, 'query_orderby' ),
			'order'          => turner_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( turner_set( $settings, 'query_category' ) ) $args['product_cat'] = turner_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
    
    <div class="shop-slider-wrap pos-rel turner_product__section woocommerce">
        <div class="shop-slider-active swiper-container" id="yt-product-slider" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
            <div class="swiper-wrapper">
                <?php 
					global $post ; 
					while ( $query->have_posts() ) : $query->the_post(); 
					$term_list = wp_get_post_terms(get_the_id(), 'product_cat', array("fields" => "names"));
				?>
                <div class="shop-single swiper-slide">
                    <div class="tx-item--image">
                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('turner_370x357'); ?></a>
                        <div class="tx-item--badge-cat">
                            <span class="tx-item--badge"><?php esc_html_e('New Sale', 'turner'); ?></span>
                            <span class="tx-item--category"><span><?php echo implode( ', ', (array)$term_list );?></span></span>
                        </div>
                    </div>
                    <div class="tx-item--holder mt-20">
                        <h2 class="tx-item--title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                        <ul class="tx-item--ratting ul_li">
                            <?php woocommerce_template_loop_rating();?>
                        </ul>
                        <h4 class="tx-item--price"><?php woocommerce_template_loop_price();?></h4>
                    </div>
                </div>
                <?php endwhile; ?>
    		</div>
        </div>
		
        <?php if( $settings[ 'arrows' ] === 'yes' ){?>
        <div class="tx-swiper-arrow-wrap shop-slider-arrow">
            <div class="tx-swiper-arrow tx-button-prev"><i class="far fa-arrow-left"></i></div>
            <div class="tx-swiper-arrow tx-button-next"><i class="far fa-arrow-right"></i></div>
        </div>
        <?php };?>
        <?php if( $settings[ 'dots' ] === 'yes' ){?>
        <div class="swiper-pagination blog-swiper-pagination"></div>
        <?php };?>
        
    </div>
    
	<?php }
	wp_reset_postdata();
	}
}