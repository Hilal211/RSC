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
class Testimonial_Carousel_Two extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	 
	public function get_name() {
		return 'turner_Testimonial_Carousel_Two';
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
		return esc_html__( 'Turner Testimonial Carousel Two', 'turner' );
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
		return 'eicon-testimonial-carousel';
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
			'Testimonial_Carousel_Two',
			[
				'label' => esc_html__( 'Testimonial Carousel', 'turner' ),
			]
		);
		
		$repeater = new Repeater();		
		
		$repeater->add_control(
			'authore_img',
			[
				'name' => 'Authore Image',							
				'label' => esc_html__('Authore Img ', 'turner'),							
				'type' => Controls_Manager::MEDIA,										
			]
		);
		$repeater->add_control(
			'feedback',
			[
				'name' => 'Feedback',							
				'label' => esc_html__('Feedback ', 'turner'),							
				'type' => Controls_Manager::TEXTAREA,										
			]
		);
		$repeater->add_control(
			'title',
			[
				'name' => 'Title',							
				'label' => esc_html__('Title ', 'turner'),							
				'type' => Controls_Manager::TEXT,										
			]
		);
		$repeater->add_control(
			'designation',
			[
				'name' => 'Designtaion',							
				'label' => esc_html__('Designtaion ', 'turner'),							
				'type' => Controls_Manager::TEXT,										
			]
		);
			
		$this->add_control(
			'testimonials',
			[
				'label'                 => __('Add Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),		
                'title_field' => '{{{ title }}}',
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
		$this->start_controls_section(
			'loop_style',
			[
				'label' => esc_html__('LOOP CONTENT STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		//Title Style
		$this->add_control(
			'show_loop_title_style',
			[
				'label'       => __( 'ON/OFF  Title Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_title_typography',
                'label' => __('Title Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .testimonial-block_one-text',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_title_color',
            [
                'label' => __('Title Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-block_one-text' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		//Content Style
		$this->add_control(
			'show_loop_content_style',
			[
				'label'       => __( 'ON/OFF  Name Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_content_typography',
                'label' => __('Name Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .testimonial-block_one-info',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_content_color',
            [
                'label' => __('Name Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-block_one-info' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );

		//Author Name
		$this->add_control(
			'show_loop_author_style',
			[
				'label'       => __( 'ON/OFF  Author Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_author_typography',
                'label' => __('Author Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .testimonial-block_one-info span',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_author_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_author_color',
            [
                'label' => __('Author Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-block_one-info span' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_author_style'    => 'yes',
				]
            ]
        );
		//Designation
		$this->add_control(
			'show_loop_designation_style',
			[
				'label'       => __( 'ON/OFF  Designation Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_designation_typography',
                'label' => __('Designation Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .testimonial-block_one-info span',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_designation_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_designation_color',
            [
                'label' => __('Designation Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-block_one-info span' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_designation_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'arrow_style_color',
            [
                'label' => __('Arrow Style Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-one_button-prev' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-one_button-prev' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-one_button-prev:hover' => 'background-color: {{VALUE}}'
                ]
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
     <div class="testimonial-one_carousel swiper-container">
        <div class="swiper-wrapper">

            <!-- Slide -->
            <?php foreach($settings['testimonials'] as $item):?>
            <div class="swiper-slide">
                <!-- Testimonial Block One -->
                <div class="testimonial-block_one">
                    <div class="testimonial-block_one-inner">
                        <div class="testimonial-block_one-image">
                            <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="" />
                        </div>
                        <div class="testimonial-block_one-text"><?php echo wp_kses($item['feedback'], true);?></div>
                        <div class="testimonial-block_one-info">
                            <?php echo esc_html($item['title']);?>
                            <span> <?php echo esc_html($item['designation']);?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            
        </div>

        <!-- If we need navigation buttons -->
        <div class="testimonial-one_navs">
            <div class="testimonial-one_button-prev fa-solid fa-angle-left fa-fw"></div>
            <div class="testimonial-one_button-next fa-solid fa-angle-right fa-fw"></div>
        </div>
    </div>
    <?php
	}
}