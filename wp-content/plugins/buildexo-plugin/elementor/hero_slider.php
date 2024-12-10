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
class Hero_Slider extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_Hero_Slider';
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
		return esc_html__( 'Hero Slider', 'turner' );
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
			'Hero_Slider',
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
			'simage',
			[
			  	'label' => __( 'Slider Image', 'turner' ),
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
			'description',
			[
				'label'       => __( 'Description', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Description', 'turner' ),
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
			'btn_arrow',
			[
				'label'       => __( 'Button Arrow', 'turner' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
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

		$repeater = new Repeater();
		
		$repeater->add_control(
			'social_text',
			[
				'label'       => __( 'Social Text', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'       => __( 'Link', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'socials',
			[
				'label'                 => __('Add Social Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
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
    <section class="slider-one">
        <div class="main-slider swiper-container">
            <div class="swiper-wrapper">

                <!-- Slide -->
                <?php foreach($settings['slides'] as $item):?>
                <div class="swiper-slide">
                    <div class="slider-one_bg-image" style="background-image: url(<?php echo esc_url($item['bg_image']['url']);?>)"></div>
                    <div class="container">
                        <div class="row clearfix">
                            <!-- Content Column -->
                            <div class="slider-one_content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="slider-one_content-inner">
                                    <?php if(!empty($item['subtitle'])):?>
                                    <div class="slider-one_title"><?php echo wp_kses($item['subtitle'], true)?></div>
                                    <?php endif;?>
                                    <h1 class="slider-one_heading">
                                        <?php echo wp_kses($item['title'], true)?>
                                    </h1>
                                    <div class="slider-one_text"><?php echo wp_kses($item['description'], true)?></div>
                                    <!-- Button Box -->
                                    <?php if(!empty($item['btn_label'])):?>
                                    <div class="slider-one_button">
                                        <a class="btn-style-two theme-btn" href="about.html">
                                            <div class="btn-wrap">

                                                <span class="text-one"><?php echo esc_html($item['btn_label']);?> 
                                                <?php if(!empty($item['btn_arrow']['url'])):?>
                                                    <i> 
                                                    <img src="<?php echo esc_url($item['btn_arrow']['url']);?>" alt="" /></i>
                                                    <?php endif;?>
                                                </span>

                                                <span class="text-two"><?php echo esc_html($item['btn_label']);?> 
                                                <?php if(!empty($item['btn_arrow']['url'])):?>
                                                    <i> 
                                                    <img src="<?php echo esc_url($item['btn_arrow']['url']);?>" alt="" /></i>
                                                    <?php endif;?>
                                                </span>

                                            </div>
                                        </a>
                                    </div>
                                    <?php endif;?>

                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="slider-one_image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="slider-one_image">
                                    <div class="slider-one_color-layer"></div>
                                    <img src="<?php echo esc_url($item['simage']['url']);?>" alt="" />
                                </div>
                                <!-- Slider One Socials -->
                                <?php if(!empty($settings['socials'])):?>
                                <div class="slider-one_socials">
                                    <?php foreach($settings['socials'] as $item):?>
                                        <a href="<?php echo esc_url($item['link']);?>"><?php echo esc_html($item['social_text']);?></a>
                                    <?php endforeach;?>
                                </div>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

            <!-- If we need pagination -->
            <div class="main-slider_pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="main-slider_button-prev fas fa-arrow-left fa-fw"></div>
            <div class="main-slider_button-next fas fa-arrow-right fa-fw"></div>

        </div>
    </section>
	<?php
	}
}