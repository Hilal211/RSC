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
class Feature_Tabs extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_feature_tabs';
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
        return esc_html__( 'Turner Feature Tabs', 'turner' );
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
        return 'eicon-accordion';
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
		wp_register_script( 'feature-carousel', YT_URL . 'assets/js/feature-tabs.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'feature-carousel' ];
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
            'feature_tabs',
            [
                'label' => esc_html__( 'Feature Tabs', 'turner' ),
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
				),
			]
		);
		
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Choose Background Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,
				'condition' => [ 'layout_control' => '2', ],
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		
		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__('Choose Icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,	
				'condition' => [ 'layout_control' => '1', ],						
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Small Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [ 'layout_control' => '1', ],
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your small title', 'turner' ),
				'default' => esc_html__( 'Great Experience in building', 'turner' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [ 'layout_control' => '1', ],
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Great Experience in building', 'turner' ),
			]
		);
		
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'condition' => [ 'layout_control' => '1', ],
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title Here', 'turner' ),
			]
		);
		
		$this->add_control(
            'btn_link',
			[
				'label' => __( 'Button Url', 'turner' ),
				'type' => Controls_Manager::URL,
				'condition' => [ 'layout_control' => '1', ],
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
		
		//Our Slider		
		$repeater = new Repeater();				
		$repeater->add_control(
			'block_title',
			[
				'label'       => __( 'Block Title', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Tabs Title', 'turner' ),
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Tabs Title', 'turner' ),
			]
		);		
		$repeater->add_control(
			'image1',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		
		$repeater->add_control(
			'image2',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);		
		$repeater->add_control(
			'video_text_image',
			[
				'label' => esc_html__('Choose Text Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$repeater->add_control(
            'video_link',
			[
				'label' => __( 'Video Url', 'turner' ),
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
			'features',
			[
				'label'                 => __('Add Feature Tabs Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'condition' => [ 'layout_control' => '1', ],
				'default' => [
					[
						'block_title' => esc_html__( 'Modern Bridge', 'turner' ),
					],
					[
						'block_title' => esc_html__( 'Factory Manufacture', 'turner' ),
					],
					[
						'block_title' => esc_html__( 'Metal Engineering', 'turner' ),						
					],
					[
						'block_title' => esc_html__( 'Roof Renovation', 'turner' ),						
					],
				],
				'title_field' => '{{{ block_title }}}',
			]
		);		
		
		//Our Slider		
		$repeater = new Repeater();				
		$repeater->add_control(
			'block_title2',
			[
				'label'       => __( 'Block Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Tabs Title', 'turner' ),
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Tabs Title', 'turner' ),
			]
		);		
		$repeater->add_control(
			'image3',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$repeater->add_control(
			'block_subtitle2',
			[
				'label'       => __( 'Sub Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'block_title3',
			[
				'label'       => __( 'Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'block_text2',
			[
				'label'       => __( 'Text', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'turner' ),
			]
		);
		$repeater->add_control(
			'block_btn_title2',
			[
				'label'       => __( 'Button Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'turner' ),
			]
		);
		$repeater->add_control(
            'block_btn_link2',
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
			'features2',
			[
				'label'                 => __('Add Feature Tabs Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'condition' => [ 'layout_control' => '2', ],
				'default' => [
					[
						'block_title2' => esc_html__( 'Building', 'turner' ),
					],
					[
						'block_title2' => esc_html__( 'Industrial', 'turner' ),
					],
					[
						'block_title2' => esc_html__( 'Architecture', 'turner' ),
					],
					[
						'block_title2' => esc_html__( 'Construction', 'turner' ),
					],
					[
						'block_title2' => esc_html__( 'Interior Design', 'turner' ),
					],
					[
						'block_title2' => esc_html__( 'Engineer', 'turner' ),
					],
				],
				'title_field' => '{{{ block_title2 }}}',
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
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-tab' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-tab' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					{{WRAPPER}} .accordion,
					{{WRAPPER}} .feature-tab',				
			]
		);
		
		$this->add_control(
			'general_border_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-tab' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'general_box_border_type',
				'selector' => 
					'{{WRAPPER}} .feature-tab',				
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'general_box_shadow',
				'selector' => 
					'{{WRAPPER}} .feature-tab',				
				'separator' => 'before',
			]
		);
		$this->add_control(
			'general_border_radius',
			[
				'label' => esc_html__('Border Radius', 'turner'),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .feature-tab' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
		//Small Title Style
		$this->start_controls_section(
			'small_title_style',
			[
				'label' => esc_html__( 'Small Title', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
            'small_title__margin',
            [
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title__tagline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
        $this->add_responsive_control(
            'small_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title__tagline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'small_title_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sec-title__tagline',				
			]
		);
		
		$this->add_control(
			'small_title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title__tagline' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'small_title_typography',
				'label' => __('Typography', 'cleanex'),
				'selector' => '{{WRAPPER}} .sec-title__tagline',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'small_title_text_stroke',
				'selector' => '{{WRAPPER}} .sec-title__tagline',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'small_title_text_shadow',
				'selector' => '{{WRAPPER}} .sec-title__tagline',
			]
		);

		$this->end_controls_section();
		
		//Title Style
		
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
            'title__margin',
            [
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__( 'Padding', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sec-title__title',				
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .sec-title__title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'title_text_stroke',
				'selector' => '{{WRAPPER}} .sec-title__title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .sec-title__title',
			]
		);

		$this->end_controls_section();
		
		/**Button Style**/
		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style Setting', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'turner_tabs_btn' );
		
			$this->start_controls_tab(
				'turner_tab_btn_normal',
				[
					'label' => __( 'Normal', 'turner' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'btn_bgtype',
						'label' => __( 'Button Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .turner-thm-btn',				
					]
				);
				$this->add_responsive_control(
					'btn_width_size',
					[
						'label' => __( 'Width', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em', '%', 'custom' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .turner-thm-btn' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'btn_height_size',
					[
						'label' => __( 'Height', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em', '%', 'custom' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .turner-thm-btn' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'btn_padding',
					[
						'label'              => __( 'Padding', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .turner-thm-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'btn_border_type',
						'selector' => 
							'{{WRAPPER}} .turner-thm-btn',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .turner-thm-btn',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'btn_border_radius',
					[
						'label' => esc_html__('Border Radius', 'turner'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .turner-thm-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'btn_title_typography',
						'label' => __('Button Text Typography', 'turner'),
						'selector' => 
							'{{WRAPPER}} .turner-thm-btn',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'btn_title_color',
					[
						'label' => __('Button Text Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .turner-thm-btn' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'turner_tab_btn_hover',
				[
					'label' => __( 'Hover', 'turner' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'btn_hover_bg_bgtype',
						'label' => __( 'Button Hover Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .turner-thm-btn:hover',				
					]
				);
				$this->add_control(
					'btn_border_hover_color',
					[
						'label' => __('Button Border Hover Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .turner-thm-btn:hover' => 'border-color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
				$this->add_control(
					'btn_title_hover_color',
					[
						'label' => __('Button Text Hover Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .turner-thm-btn:hover' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
			
			$this->end_controls_tab();
			
		$this->end_controls_tabs();   
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
		$layout = $settings[ 'layout_control' ];
	?>
    	
		<?php if( $layout == 2 ):?>
        
        <section class="renovation pt-120 jarallax bg_img" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>')">
            <div class="container">
                <div class="row renovation__wrap">
                    <div class="col-xl-2 col-lg-3 col-md-3">
                        <ul class="nav nav-tabs renovation__tabs" id="rbTab" role="tablist">
                            <?php $i = 1; foreach($settings['features2'] as $key => $item):?>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link <?php if($i == 1) echo 'active';?>" id="tb-tab-1<?php echo esc_attr($i);?>" data-bs-toggle="tab" data-bs-target="#tb1<?php echo esc_attr($i);?>" type="button" role="tab" aria-controls="tb1<?php echo esc_attr($i);?>" aria-selected="<?php if($i == 1) echo 'true'; else echo 'false'; ?>"><?php echo wp_kses($item['block_title2'], true); ?></button>
                            </li>
                             <?php $i++; endforeach;?>
                        </ul>                              
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-9">
                        <div class="tab-content renovation__content-wrap" id="rbTabContent">
                            <?php $i = 1; foreach($settings['features2'] as $key => $item):?>
                            <div class="tab-pane animated fadeInUp  <?php if($i == 1) echo 'show active';?>" id="tb1<?php echo esc_attr($i);?>" role="tabpanel" aria-labelledby="tb-tab-1<?php echo esc_attr($i);?>">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="renovation__img">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($item['image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="renovation__content">
                                            <div class="section-heading section-heading--2 section-heading--white mb-55">
                                                <div class="sec-title__tagline heading-subtitle wow fadeInRight">
                                                    <?php echo wp_kses($item['block_subtitle2'], true); ?>
                                                </div>
                                                <h2 class="sec-title__title heading-title tx-split-text split-in-right mb-15"> <?php echo wp_kses($item['block_title3'], true); ?></h2>
                                                <p><?php echo wp_kses($item['block_text2'], true); ?></p>
                                            </div>
                                            <a class="thm-btn thm-btn--2 turner-thm-btn" href="<?php echo esc_url($item['block_btn_link2']['url']);?>"> <?php echo wp_kses($item['block_btn_title2'], true); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- renovation end -->       
        
        <?php else:?>
        
        <!-- feature-tab start -->
        <section class="feature-tab pt-120 pb-120">
            <div class="container">
                <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="section-heading feature-tab__title mb-40">
                    <?php if($settings['subtitle']) { ?>
                    <div class="sec-title__tagline heading-subtitle mb-15 wow fadeInRight" data-wow-delay="100ms">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>"><?php echo wp_kses( $settings['subtitle'], true );?>
                    </div>
                    <?php } ?>
                    <?php if($settings['title']) { ?>    
                    <h3 class="sec-title__title heading-title tx-split-text split-in-right"><?php echo wp_kses( $settings['title'], true );?></h3>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="row align-items-end">
                    <div class="col-lg-3 col-md-4">
                        <div class="feature-tab__left">
                            <ul class="feature-tab__tabs nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <?php $i = 1; foreach($settings['features'] as $key => $item):?>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link <?php if($i == 1) echo 'active';?>" id="ft-tab-<?php echo esc_attr($i);?>" data-bs-toggle="pill" data-bs-target="#ft-<?php echo esc_attr($i);?>" type="button" role="tab" aria-controls="ft-<?php echo esc_attr($i);?>" aria-selected="<?php if($i == $i) echo 'true'; else echo 'false'; ?>"><?php echo wp_kses($item['block_title'], true) ;?></button>
                                </li>
                                <?php $i++; endforeach;?>
                            </ul>
                            <?php if($settings['btn_title']){ ?>
        					<div class="yt-btn">
								<?php 
                                   $this->add_link_attributes( 'btn_link', $settings['btn_link']);
                                ?>
                                <a class="thm-btn mt-55 turner-thm-btn" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><?php echo wp_kses($settings['btn_title'], true);?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="feature-tab__content">
                            <div class="tab-content" id="pills-tabContent">
                                <?php $i = 1; foreach($settings['features'] as $key => $item):?>
                                <div class="tab-pane <?php if($i == 1) echo 'show active';?> feature-tab__tab-item" id="ft-<?php echo esc_attr($i);?>" role="tabpanel" aria-labelledby="ft-tab-<?php echo esc_attr($i);?>">
                                    <div class="feature-tab__item">
                                        <div class="row align-items-center">
                                            <?php if($item['image1']['id'] || $item['video_link']['url']) { ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="feature-tab__img feature-tab__img--1">
                                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
                                                    <?php if($item['video_text_image']['id'] || $item['video_link']['url']) { ?>
                                                    <a class="feature-tab__video feature-tab__video--animation popup-video" href="<?php echo esc_url($item['video_link']['url']); ?>"><i class="fas fa-play"></i><span><img src="<?php echo esc_url(wp_get_attachment_url($item['video_text_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></span></a>
                                                	<?php } ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <?php if($item['image2']['id']) { ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="feature-tab__img feature-tab__img--2">
                                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; endforeach;?>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-tab end -->      
        
        <?php endif;?>
    <?php
    }
}