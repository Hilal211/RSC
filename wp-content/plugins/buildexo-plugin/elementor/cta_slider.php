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
class Cta_Slider extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_cta_slider';
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
		return esc_html__( 'Turner CTA Slider', 'turner' );
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
		return 'eicon-library-open';
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
			'Cta_Slider',
			[
				'label' => esc_html__( 'Call To Action', 'turner' ),
			]
		);		
		
		$repeater = new Repeater();
		$repeater->add_control(
			'bg_image',
			[
			  	'label' => __( 'Background Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
	    );
		$repeater->add_control(
			'icon_image',
			[
			  	'label' => __( 'Icon Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
	    );
		$repeater->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Sub Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'btn_label',
			[
				'label'       => __( 'Button Label', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Button Label', 'turner' ),
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label'       => __( 'Button Link', 'turner' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);
		
		$this->add_control(
			'slides',
			[
				'label'                 => __('Add Slide Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
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
		
		//General Style
		$this->start_controls_section(
			'general_style',
			[
				'label' => esc_html__( 'GENERAL SETTING', 'turner' ),
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
                    '{{WRAPPER}} .imi-work-process-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .imi-work-process-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '
						{{WRAPPER}} .imi-work-process-section:before,
						{{WRAPPER}} .imi-work-process-contnet',				
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
	?>
    <div class="tur-cta-slider position-relative swiper-container">
        <div class="swiper-wrapper">
            <?php foreach($settings['slides'] as $item):?>
            <div class="swiper-slide">
                <div class="tur-cta-item position-relative" data-background="<?php echo esc_url($item['bg_image']['url']);?>">
                    <div class="tur-cta-text">
                        <div class="tur-section-title text-center">
                            <div class="tur-subtile text-uppercase"> 
                            <?php if(!empty($item['icon_image']['url'])):?>
                                <img src="<?php echo esc_url($item['icon_image']['url']);?>" alt=""> 
                            <?php endif;?>
                            <?php echo esc_html($item['subtitle']);?>
                            </div> 
                            <h2><?php echo wp_kses($item['title'], true) ?></h2>
                        </div>
                        <?php if(!empty($item['btn_label'])):?>
                        <div class="tur-portfolio-btn text-center">
                            <a class="thm-btn mt-30" href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo esc_html($item['btn_label']);?></a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="tur-cta-slider-nav">
            <div class="tur-cta-button-prev tur-slider-arrow position-absolute d-flex justify-content-center align-items-center"><img src="<?php echo esc_url($settings['arrow_left']['url']);?>" alt=""></div>
            <div class="tur-cta-button-next tur-slider-arrow position-absolute d-flex justify-content-center align-items-center"><img src="<?php echo esc_url($settings['arrow_right']['url']);?>" alt=""></div>
        </div>
    </div>
	<?php
	}
}