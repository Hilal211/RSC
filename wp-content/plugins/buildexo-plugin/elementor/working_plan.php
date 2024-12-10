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
use \Elementor\Group_Control_Text_Stroke;
use \Elementor\Group_Control_Image_Size;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Working_Plan extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_working_plan';
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
		return esc_html__( 'Turner Working Plan', 'turner' );
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
			'working_plan',
			[
				'label' => esc_html__( 'Working Plan', 'turner' ),
			]
		);			
		$this->add_control(
			'shape_line_image',
			[
			  	'label' => __( 'Shape Line Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );	
		$this->add_control(
			'title_icon_image',
			[
			  	'label' => __( 'Sub Title Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );	
		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Sub Title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),				
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),				
			]
		);	
		
		
		 //Working Plan Table		
		$repeater = new Repeater();
		$repeater->add_control(
			'block_title',
			[
				'label'       => __( ' Title', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your  Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'block_text',
			[
				'label'       => __( ' Text', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your  Text', 'turner' ),
			]
		);
		$repeater->add_control(
			'block_no',
			[
				'label'       => __( 'Block Number', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Block Number', 'turner' ),
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'imigrat'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],				
			]			
		);			
		$this->add_control(
			'slide',
			[
				'label'                 => __('Add List Item', 'imigrat'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),				
			]
		);
		
		
		$this->end_controls_section();
		
	
		/************************************************************************
									Tab Style Start
		*************************************************************************/
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
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-one.style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
        $this->add_responsive_control(
            'general_padding',
            [
                'label'      => esc_html__( 'Padding', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-one.style-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .faq-one.style-two',				
			]
		);
		$this->end_controls_section();
		
		/**Sub Title Style**/
		$this->start_controls_section(
			'sub_title_style',
			[
				'label' => esc_html__('SUB TITLE STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'show_sub_title_style',
			[
				'label'       => __( 'ON/OFF Sub Title Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_responsive_control(
            'sub_title__margin',
            [
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title.light .sec-title_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator'  => 'before',
				'condition'             => [
					'show_sub_title_style'    => 'yes',
				]
            ]
        );
		
        $this->add_responsive_control(
            'sub_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title.light .sec-title_heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator'  => 'before',
				'condition'             => [
					'show_sub_title_style'    => 'yes',
				]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'sub_title_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => 
						'{{WRAPPER}} .sec-title.light .sec-title_heading',	
				'condition'             => [
					'show_sub_title_style'    => 'yes',
				]			
			]
		);
		
		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title.light .sec-title_heading' => 'color: {{VALUE}};'
				],
				'condition'             => [
					'show_sub_title_style'    => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'label' => __('Typography', 'turner'),
				'selector' => 
					'{{WRAPPER}} .sec-title.light .sec-title_heading',
				'condition'             => [
					'show_sub_title_style'    => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'sub_title_text_stroke',
				'selector' => '{{WRAPPER}} .sec-title.light .sec-title_heading',
				'condition'             => [
					'show_sub_title_style'    => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'sub_title_shadow',
				'selector' => '{{WRAPPER}} .sec-title.light .sec-title_heading',
				'condition'             => [
					'show_sub_title_style'    => 'yes',
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
		$allowed_tags = wp_kses_allowed_html('post');
	?>
	
    <!-- process start -->
    <section class="process pt-110 pb-85 shape-shape bg_img" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['shape_line_image']['id'])); ?>')">
        <div class="section-heading text-center mb-75">
            <div class="heading-img wow fadeInUp">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['title_icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
            </div>
            <?php if($settings['sub_title']) { ?>
            <div class="heading-subtitle wow fadeInUp" data-wow-delay="100ms">
                <?php echo wp_kses($settings['sub_title'], true); ?>
            </div>
            <?php } ?>
            <?php if($settings['title']) { ?><h3 class="heading-title tx-split-text split-in-up"><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
        </div>
        <div class="container">
            <div class="row process-warp mt-none-30">
                <?php 
					$count = 1; 
					foreach ($settings['slide'] as $key => $item):
					$icon = $item['icon'];
				?>
                <?php if($count % 2) { ?>
                <div class="col-lg-3 col-md-6 mt-30">
                    <div class="process-inner text-center">
                        <div class="tx-item--holder">
                            <h2 class="tx-item--title"><?php echo wp_kses($item['block_title'], true) ;?></h2>
                            <div class="tx-item--content"><?php echo wp_kses($item['block_text'], true) ;?></div>
                        </div>
                        <div class="tx-item--icon-box">
                            <div class="tx-item--icon">
								<?php \Elementor\Icons_Manager::render_icon( $icon ); ?> 
                            </div>
                            <div class="tx-item--number"><?php echo wp_kses($item['block_no'], true) ;?></div>
                        </div>
                    </div>
                </div>
                
                <?php } else { ?>
                 
                <div class="col-lg-3 col-md-6 mt-30">
                    <div class="process-inner text-center">
                        <div class="tx-item--holder">
                            <h2 class="tx-item--title"><?php echo wp_kses($item['block_title'], true) ;?></h2>
                            <div class="tx-item--content"><?php echo wp_kses($item['block_text'], true) ;?></div>
                        </div>
                        <div class="tx-item--icon-box">
                            <div class="tx-item--icon">
                            	<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>  
                            </div>
                            <div class="tx-item--number"><?php echo wp_kses($item['block_no'], true) ;?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php $count++; endforeach; ?>
                
            </div>
        </div>
    </section>
    <!-- process end -->
    
    <?php 
	}
}