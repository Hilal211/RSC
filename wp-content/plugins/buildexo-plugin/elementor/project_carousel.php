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
class Project_Carousel extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_project_carousel';
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
		return esc_html__( 'Turner Project Carousel', 'turner' );
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
			'project_carousel',
			[
				'label' => esc_html__( 'Project Carousel', 'turner' ),
			]
		);
		
		
		$repeater = new Repeater();		
		$repeater->add_control(
			'project_image',
			[
				'name' => 'Project Image',							
				'label' => esc_html__('Project Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);
		
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Block Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Block Title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),								
			]
		);
		$repeater->add_control(
			'location',
			[
				'label' => esc_html__( 'Location', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Location', 'turner' ),						
			]
		);
		
				
		$repeater->add_control(
            'link',
			[
				'label' => __( 'Page Url', 'turner' ),
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
			'projects',
			[
				'label'                 => __('Add Project Item', 'turner'),
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
		
		/**Loop Style**/
		$this->start_controls_section(
			'loop_style',
			[
				'label' => esc_html__('LOOP CONTENT STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		//Loop Background Color Style
		$this->add_control(
			'show_loop_loop_style',
			[
				'label'       => __( 'ON/OFF  Title Background Color Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		
		$this->add_control(
            'loop_loop_bgcolor',
            [
                'label' => __('Title Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-project-title' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
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
                    '{{WRAPPER}} .bn-project-title',                 
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
                    '{{WRAPPER}} .bn-project-title' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_title_hover_color',
            [
                'label' => __('Title Hover Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-project-title a:hover' => 'color: {{VALUE}}'
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
				'label'       => __( 'ON/OFF  Category Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
            'loop_content_bgcolor',
            [
                'label' => __('Category Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-project-cat' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
            ]
        );	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_content_typography',
                'label' => __('Category Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .bn-project-cat',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_content_color',
            [
                'label' => __('Category Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-project-cat' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );		
		$this->end_controls_section();
		
		/**Icon Box Style**/
		$this->start_controls_section(
			'icon_box_style',
			[
				'label' => esc_html__('Icon Setting', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'turner_service_icon_tab' );
		
			$this->start_controls_tab(
				'turner_service_icon_normal',
				[
					'label' => __( 'Normal', 'turner' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'icon_box_bgtype',
						'label' => __( 'Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-icon-box'				
					]
				);
				$this->add_control(
					'service_icon_color',
					[
						'label' => __('Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-icon-box' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-icon-box a' => 'color: {{VALUE}}'
						],
						'separator' => 'before',
					]
				);
				$this->add_responsive_control(
					'icon_width_size',
					[
						'label' => __( 'Width', 'cleanex' ),
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
							'{{WRAPPER}} .te-icon-box' => 'width: {{SIZE}}{{UNIT}};'
						],
					]
				);
				$this->add_responsive_control(
					'icon_height_size',
					[
						'label' => __( 'Height', 'cleanex' ),
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
							'{{WRAPPER}} .te-icon-box' => 'height: {{SIZE}}{{UNIT}};'
						],
					]
				);
				$this->add_responsive_control(
					'icon_line_height',
					[
						'label' => __( 'Line Height', 'cleanex' ),
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
							'{{WRAPPER}} .te-icon-box' => 'line-height: {{SIZE}}{{UNIT}};'
						],
					]
				);
				$this->add_responsive_control(
					'icon_box_space',
					[
						'label'              => __( 'Space', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-icon-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'icon_box_padding',
					[
						'label'              => __( 'Padding', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'service_icon_border_type',
						'selector' => 
							'{{WRAPPER}} .te-icon-box',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'service_icon_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-icon-box',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'service_icon_border_radius',
					[
						'label' => esc_html__('Border Radius', 'turner'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						],
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'turner_services_icon_box_hover',
				[
					'label' => __( 'Hover', 'turner' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'service_icon_hover_bg_bgtype',
						'label' => __( 'Hover Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-icon-box:hover'				
					]
				);
				
				$this->add_control(
					'icon_hover_color',
					[
						'label' => __('Button Text Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-icon-box:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-icon-box:hover a' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
				
				$this->add_control(
					'service_icon_hover_transition',
					[
						'label' => esc_html__( 'Transition Duration', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'max' => 3,
								'step' => 0.1,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .te-icon-box:hover' => 'transition-duration: {{SIZE}}s'
						],
					]
				);
		
				$this->add_control(
					'icon_hover_animation',
					[
						'label' => esc_html__( 'Hover Animation', 'turner' ),
						'type' => Controls_Manager::HOVER_ANIMATION,
					]
				);
				
			$this->end_controls_tab();
			
		$this->end_controls_tabs();   
		$this->end_controls_section();
		
		/*******************
		Arrow Styling Start
		*******************/
		
		$this->start_controls_section(
			'carousel_navigation_arrow',
			[
				'label' => esc_html__('Navigation - Arrow', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => ['layout_control'      => ['1', '2']	],
			]
		);
		
		/******Tabs Start**********/
		
		$this->start_controls_tabs( 'turner_tabs_nav_position' );
			
			$this->start_controls_tab(
				'turner_tab_navs_position_left',
				[
					'label' => __( 'Left Arrow', 'turner' ),
				]
			);
			$this->add_control(
				'arrow_position_toggle',
				[
					'label' => __( 'Position', 'turner' ),
					'type' => Controls_Manager::POPOVER_TOGGLE,
					'label_off' => __( 'None', 'turner' ),
					'label_on' => __( 'Custom', 'turner' ),
					'return_value' => 'yes',
				]
			);
			/******Popup Start**********/
			$this->start_popover();
				$this->add_responsive_control(
					'arrow_position_y',
					[
						'label' => __( 'Vertical', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'condition' => [
							'arrow_position_toggle' => 'yes'
						],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -110,
								'max' => 110,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'arrow_position_x',
					[
						'label' => __( 'Horizontal', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'condition' => [
							'arrow_position_toggle' => 'yes'
						],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -110,
								'max' => 110,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
						],
					]
				);
			$this->end_popover();
			$this->add_control(
				'nav_arrow_position',
				[
					'label' => esc_html__( 'Position', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'relative'  => esc_html__( 'Relative', 'textdomain' ),
						'absolute' => esc_html__( 'Absolute', 'textdomain' ),
						'fixed' => esc_html__( 'Fixed', 'textdomain' ),
					],
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev' => 'position: {{VALUE}};',
					],
				]
			);
			
			$this->end_controls_tab();
		
			$this->start_controls_tab(
				'turner_tab_navs_position_right',
				[
					'label' => __( 'Right Arrow', 'turner' ),
				]
			);
			$this->add_control(
				'right_arrow_position_toggle',
				[
					'label' => __( 'Position', 'turner' ),
					'type' => Controls_Manager::POPOVER_TOGGLE,
					'label_off' => __( 'None', 'turner' ),
					'label_on' => __( 'Custom', 'turner' ),
					'return_value' => 'yes',
				]
			);
			$this->start_popover();
				$this->add_responsive_control(
					'right_arrow_position_y',
					[
						'label' => __( 'Vertical', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'condition' => [
							'arrow_position_toggle' => 'yes'
						],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -110,
								'max' => 110,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .owl-carousel .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'right_arrow_position_x',
					[
						'label' => __( 'Horizontal', 'turner' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['px', '%'],
						'condition' => [
							'arrow_position_toggle' => 'yes'
						],
						'range' => [
							'px' => [
								'min' => -100,
								'max' => 500,
							],
							'%' => [
								'min' => -110,
								'max' => 110,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .owl-carousel .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
						],
					]
				);
			$this->end_popover();
			$this->add_control(
				'rightnav_arrow_position',
				[
					'label' => esc_html__( 'Position', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'relative'  => esc_html__( 'Relative', 'textdomain' ),
						'absolute' => esc_html__( 'Absolute', 'textdomain' ),
						'fixed' => esc_html__( 'Fixed', 'textdomain' ),
					],
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-next' => 'position: {{VALUE}};',
					],
				]
			);
		$this->end_controls_tabs();
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_title_typography',
                'label' => __('Button Text Typography', 'axtra'),
                'selector' => 
					'{{WRAPPER}} .owl-carousel .owl-nav button span',				
                'separator' => 'before',
			]
        );
		
		$this->add_control(
            'arrow_border_radius',
            [
                'label' => __('Border Radius', 'turner'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ]
        );
		
		$this->add_responsive_control(
			'arrow_nav_padding',
			array(
				'label'      => __('Padding', 'turner'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array('px', '%'),
				'selectors'  => array(
					'.owl-carousel .owl-nav button span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
					
				),
			)
		);
		
		$this->start_controls_tabs( 'turner_tabs_nav' );
		$this->start_controls_tab(
			'turner_tab_navs_normal',
			[
				'label' => __( 'Normal', 'turner' ),
			]
		);
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'navigation_border_type',
                'selector' => '{{WRAPPER}} .owl-carousel .owl-nav button span',				
				'separator' => 'before',
            ]
        );
		$this->add_control(
			'navigation_bg_color',
			array(
				'label'     => __('Background Color', 'turner'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-carousel .owl-nav button span' => 'background-color: {{VALUE}}!important',
					
				),
			)
		);
		$this->add_control(
			'navigation_color',
			array(
				'label'     => __('Color', 'turner'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-carousel .owl-nav button span' => 'color: {{VALUE}}!important',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'turner_tab_nav_hover',
			[
				'label' => __( 'Hover', 'turner' ),
			]
		);
		$this->add_control(
            'navigation_border_hover_color',
            [
                'label' => __('Border Hover Color', 'axtra'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-nav button span:hover' => 'border-color: {{VALUE}}!important',
                ],
                'separator' => 'before',
			 ]
        );
		$this->add_control(
			'navigation_bg_hover_color',
			array(
				'label'     => __('Background Color', 'turner'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-carousel .owl-nav button span:hover' => 'background-color: {{VALUE}}!important',
					
				),
			)
		);
		$this->add_control(
			'navigation_hover_color',
			array(
				'label'     => __('Color', 'turner'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-carousel .owl-nav button span:hover' => 'color: {{VALUE}}!important',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
		/******Dots Styling Start*******/
		
		$this->start_controls_section(
			'carousel_navigation_dots',
			[
				'label' => esc_html__('Navigation - Dots', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [ 'layout_control'  =>  ['1', '2'] ]
			]
		);
		$this->add_control(
			'dots_position_toggle',
			[
				'label' => __( 'Position', 'turner' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'None', 'turner' ),
				'label_on' => __( 'Custom', 'turner' ),
				'return_value' => 'yes',
			]
		);
		$this->start_popover();
		$this->add_responsive_control(
			'dots_position_y',
			[
				'label' => __( 'Vertical', 'turner' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'condition' => [
					'arrow_position_toggle' => 'yes'
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 500,
					],
					'%' => [
						'min' => -110,
						'max' => 110,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dots' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'dots_position_x',
			[
				'label' => __( 'Horizontal', 'turner' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'condition' => [
					'arrow_position_toggle' => 'yes'
				],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 500,
					],
					'%' => [
						'min' => -110,
						'max' => 110,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_popover();
		$this->add_control(
			'nav_dots_position',
			[
				'label' => esc_html__( 'Position', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'relative'  => esc_html__( 'Relative', 'textdomain' ),
					'absolute' => esc_html__( 'Absolute', 'textdomain' ),
					'fixed' => esc_html__( 'Fixed', 'textdomain' ),
				],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dots' => 'position: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'dots_nav_size',
			[
				'label' => __( 'Width', 'turner' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .owl-theme .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->add_control(
			'dots_nav_heigt_size',
			[
				'label' => __( 'Height', 'turner' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .owl-theme .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->add_control(
            'dots_border_radius',
            [
                'label' => __('Border Radius', 'turner'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ]
        );
		$this->start_controls_tabs( 'turner_tabs_dots' );
		
		$this->start_controls_tab(
			'turner_tab_dots_normal',
			[
				'label' => __( 'Normal', 'turner' ),
			]
		);
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'dots_border_type',
                'selector' => '{{WRAPPER}} .owl-carousel .owl-dots button span',				
				'separator' => 'before',
            ]
        );
		$this->add_control(
			'dots_bg_color',
			array(
				'label'     => __('Background Color', 'turner'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-carousel .owl-dots button span' => 'background-color: {{VALUE}}!important',
					
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'turner_tab_dots_hover',
			[
				'label' => __( 'Hover', 'turner' ),
			]
		);
		$this->add_control(
            'dots_border_hover_color',
            [
                'label' => __('Border Hover Color', 'axtra'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button span:hover' => 'border-color: {{VALUE}}!important',
					'{{WRAPPER}} .owl-carousel .owl-dots button.active span' => 'border-color: {{VALUE}}!important',
                ],
                'separator' => 'before',
			 ]
        );
		$this->add_control(
			'dots_bg_hover_color',
			array(
				'label'     => __('Background Color', 'turner'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-carousel .owl-dots button span:hover' => 'background-color: {{VALUE}}!important',
					'{{WRAPPER}} .owl-carousel .owl-dots button.active span' => 'background-color: {{VALUE}}!important',
					
				),
			)
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
		$settings = $this->get_settings_for_display();?>
	<div class="tur-project-content position-relative">
		<div class="tur-project-slider swiper-container">
			<div class="swiper-wrapper">  
				<?php foreach($settings['projects'] as $item):?>
				<div class="swiper-slide">
					<div class="tur-project-item">
						<div class="project-img">
							<img src="<?php echo esc_url($item['project_image']['url']);?>" alt="">
						</div>
						<div class="project-text position-relative">
							<div class="item-location position-absolute">
								<i class="fas fa-map-marker-alt"></i> <?php echo wp_kses($item['location'], true)?>
							</div>
							<h3><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo wp_kses($item['title'], true)?></a></h3>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
		<div class="tur-project-slider-nav">
			<div class="tur-project-button-prev tur-slider-arrow position-absolute d-flex justify-content-center align-items-center"><img src="<?php echo esc_url($settings['arrow_left']['url']);?>" alt=""></div>
			<div class="tur-project-button-next tur-slider-arrow position-absolute d-flex justify-content-center align-items-center"><img src="<?php echo esc_url($settings['arrow_right']['url']);?>" alt=""></div>
		</div>
	</div>
	<?php
        
	}
}
		