<?php

namespace TURNERPLUGIN\Element;

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
class Service_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_service_carousel';
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
		return esc_html__( 'Turner Service Carousel', 'turner' );
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
		return 'eicon-library-open town';
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
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'Service_Carousel',
			[
				'label' => esc_html__( 'Service Carousel', 'turner' ),
			]
		);
		
		$repeater = new Repeater();		
		$repeater->add_control(
			'feature_image',
			[
				'name' => 'Feature Image',							
				'label' => esc_html__('Service Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);
		$repeater->add_control(
			'icon_img',
			[
				'name' => 'Feature Image',							
				'label' => esc_html__('Service Icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);
		$repeater->add_control(
			'title',
			[
				'name' => 'Title',							
				'label' => esc_html__('Title ', 'turner'),							
				'type' => Controls_Manager::TEXTAREA,										
			]
		);
			
		$repeater->add_control(
            'link',
			[
				'label' => __( 'Button Url', 'turner' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'turner' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],				
			]
		);	
		$this->add_control(
			'services',
			[
				'label'                 => __('Add Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),		
                'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'arrow_left',
			[
				'name' => 'Arrow Prev Image',							
				'label' => esc_html__('Arrow Left ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);
		$this->add_control(
			'arrow_right',
			[
				'name' => 'Arrow Next Image',							
				'label' => esc_html__('Arrow Right ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);
		$this->end_controls_section();
		
		
		/** Style Tab **/
		$this->register_style_background_controls();
    }
	
	/************************************************************************
								Tab Style Start
	*************************************************************************/
	
	protected function register_style_background_controls()
	{
		/**Loop Style**/
		
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
        ?>
        <div class="tur-service-slider-content position-relative">
            <div class="tur-service-slider swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($settings['services'] as $item):?>
                    <div class="swiper-slide">
                        <div class="tur-service-item-area position-relative">
                            <div class="tur-service-item">
                                <div class="service-img">
                                    <img src="<?php echo esc_url($item['feature_image']['url']);?>" alt="">
                                </div>
                                <div class="service-icon-text d-flex align-items-center">
                                    <div class="service-icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="">
                                    </div>
                                    <div class="service-text">
                                        <h3><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo esc_html($item['title']); ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="tur-service-slider-nav">

                <div class="tur-service-button-prev tur-slider-arrow position-absolute d-flex justify-content-center align-items-center"><img src="<?php echo esc_url($settings['arrow_left']['url']);?>" alt=""></div>

                <div class="tur-service-button-next tur-slider-arrow position-absolute d-flex justify-content-center align-items-center"><img src="<?php echo esc_url($settings['arrow_right']['url']);?>" alt=""></div>

            </div>
        </div>
    <?php 
	}
}