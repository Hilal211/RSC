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
use \Elementor\Group_Control_Image_Size;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Client_Carousel extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_client_carousel';
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
        return esc_html__( 'Turner Client Carousel', 'turner' );
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
        return 'eicon-parallax';
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
		wp_register_script( 'client-carousel', YT_URL . 'assets/js/client-carousel.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'client-carousel' ];
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
            'client_carousel',
            [
                'label' => esc_html__( 'Clients Carousel', 'turner' ),
            ]
        );
		
		$this->add_control(
			'layout_control',
			[
				'label'   => esc_html__( 'Layout Style', 'turner' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => esc_html__( 'Style One ', 'turner'),
					'2' => esc_html__( 'Style Two ', 'turner'),
					'3' => esc_html__( 'Style Three ', 'turner'),
					'4' => esc_html__( 'Style Four ', 'turner'),
				),
			]
		);
		
		//Our Slider		
		$repeater = new Repeater();		
		$repeater->add_control(
			'block_img',
			[
				'name' => 'block_img',							
				'label' => esc_html__('Slide BG Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,				
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => __( 'External Url', 'turner' ),							
				'type' => Controls_Manager::URL,							
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),							
				'show_external' => true,
			   'default' => ['url' => '','is_external' => true,'nofollow' => true,],
			]
		);
		$this->add_control(
			'slides',
			[
				'label'                 => __('Add Client Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'condition' => [ 'layout_control' => ['1', '2', '3', '4'], ],
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
	?>
    
    <?php if( $settings[ 'layout_control' ] == '3' ):?>        
    
    <!-- brand start -->
    <section class="brand pt-100 pb-80 turner-clients-section">
        <div class="container">
            <div class="brand__active swiper-container" id="yt-client-slider" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                <div class="swiper-wrapper">
                    <?php foreach($settings['slides'] as $key => $item):?>
                    <div class="brand__single swiper-slide">
                        <a href="<?php echo esc_url($item['btn_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['block_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></a>
                    </div>
                    <?php endforeach;?>	
                </div>
            </div>
        </div>
    </section>
    <!-- brand end -->
	
	<?php elseif( $settings[ 'layout_control' ] == '2' ):?>
    
    <!-- brand start -->
    <section class="brand section-notch section-notch-t-none pt-80 pb-100 turner-clients-section">
        <div class="container">
            <div class="brand__active swiper-container" id="yt-client-slider" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                <div class="swiper-wrapper">
                    <?php foreach($settings['slides'] as $key => $item):?>
                    <div class="brand__single swiper-slide">
                        <a href="<?php echo esc_url($item['btn_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['block_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
    <!-- brand end -->
	<?php elseif( $settings[ 'layout_control' ] == '4' ):?>
	<div class="tur-sponsor-content">
		<div class="tur-sponsor-slider swiper-container">
			<div class="swiper-wrapper">
				<?php foreach($settings['slides'] as $key => $item):?>
					<div class="swiper-slide">
						<div class="sponsor-img">
							<a href="<?php echo esc_url($item['btn_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['block_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></a>
						</div>
					</div>
				<?php endforeach;?>	
			</div>
		</div>
	</div>
   
    <?php else:?>
    
    <!-- brand start -->
    <section class="brand pt-80 pb-100 turner-clients-section">
        <div class="container">
            <div class="brand__active swiper-container" id="yt-client-slider" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                <div class="swiper-wrapper">
                    <?php foreach($settings['slides'] as $key => $item):?>
                    <div class="brand__single swiper-slide">
                        <a href="<?php echo esc_url($item['btn_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['block_img']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></a>
                    </div>
                    <?php endforeach;?>	
                </div>
            </div>
        </div>
    </section>
    <!-- brand end -->
    
    <?php endif;?>
      <?php
    }
}