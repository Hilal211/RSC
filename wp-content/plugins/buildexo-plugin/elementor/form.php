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
class Form extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_form';
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
        return esc_html__( 'Turner Form', 'turner' );
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
        return 'eicon-form-horizontal';
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
            'form',
            [
                'label' => esc_html__( 'Form', 'turner' ),
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
					'5' => esc_html__( 'Style Five ', 'turner'),
					'6' => esc_html__( 'Style Six ', 'turner'),
					'7' => esc_html__( 'Style Seven ', 'turner'),
					'8' => esc_html__( 'Style Eight ', 'turner'),
				),
			]
		);
		
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__( 'Choose Image', 'buildexo-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [	'active' => true, ],
				'condition' => [ 'layout_control' => '2', ],
				'default' => [	'url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'form_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your sub title', 'turner' ),
				'default' => esc_html__( 'Select a plan that suits', 'turner' ),
				'condition' => [
					'layout_control'      => ['2', '4', '8'],
				],
			]
		);
		$this->add_control(
			'form_title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Estimatied Price', 'turner' ),
				'condition' => [
					'layout_control'      => ['2', '4', '8'],
				],
			]
		);
		
		$this->add_control(
            'cf7_shortocde',
            [
                'label' => esc_html__('Select Contact Form 7', 'turner'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => get_contact_form_7_list(),
            ]
        );
		
		$this->add_control(
			'label_title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Building Services', 'turner' ),
				'condition' => [
					'layout_control'      => ['2']
				],
			]
		);
		$this->add_control(
			'label_title2',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Building Services', 'turner' ),
				'condition' => [
					'layout_control'      => ['2']
				],
			]
		);
		
		//Project Tabs
		$repeater = new Repeater();			
		$repeater->add_control(		
			 'tab_title',
			[
				'label'       => __( 'Tabs Title', 'turner' ),				
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,				
				'dynamic'     => [				
					'active' => true,
				],				
				'placeholder' => __( 'Enter your Tabs Title', 'turner' ),
			]
		);	
		$repeater->add_control(		
			 'tab_btn_title',
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
			'tab_btn_link',
			[
				'label' => esc_html__('External Url', 'turner'),
				'label_block' => true,
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$repeater->add_control(		
			 'tab_price',
			[
				'label'       => __( 'Price', 'turner' ),				
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,				
				'dynamic'     => [				
					'active' => true,
				],				
				'placeholder' => __( 'Enter your Price', 'turner' ),
			]
		);	
		$this->add_control(
			'service_tabs',
			[
				'label'                 => __('Add Tabs Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'condition' => [ 'layout_control' => '2', ],								
			]
		);
		$this->add_control(
			'shape_image2',
			[
				'label' => esc_html__( 'Choose Image', 'buildexo-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [	'active' => true, ],
				'condition' => [ 'layout_control' => '2', ],
				'default' => [	'url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->end_controls_section();
		
		/************************************************************************
								Tab Style Start
		*************************************************************************/
		
		/**Form Box Style**/
		$this->start_controls_section(
			'general_box_style',
			[
				'label' => esc_html__('Box Setting', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'turner_general_box_tab' );
		
			$this->start_controls_tab(
				'turner_general_box_normal',
				[
					'label' => __( 'Normal', 'turner' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'general_box_bgtype',
						'label' => __( 'Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form',				
					]
				);
				$this->add_responsive_control(
					'general_box_space',
					[
						'label'              => __( 'Space', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'general_box_padding',
					[
						'label'              => __( 'Padding', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'general_box_border_type',
						'selector' => 
							'{{WRAPPER}} .te-contact-form',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'general_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-contact-form',				
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
							'{{WRAPPER}} .te-contact-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						],
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'turner_general_box_hover',
				[
					'label' => __( 'Hover', 'turner' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'general_hover_bg_bgtype',
						'label' => __( 'Hover Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form:hover'				
					]
				);
				
				$this->add_control(
					'general_background_hover_transition',
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
							'{{WRAPPER}} .te-contact-form:hover' => 'transition-duration: {{SIZE}}s'
						],
					]
				);
		
				$this->add_control(
					'hover_animation',
					[
						'label' => esc_html__( 'Hover Animation', 'turner' ),
						'type' => Controls_Manager::HOVER_ANIMATION,
					]
				);
				
			$this->end_controls_tab();
			
		$this->end_controls_tabs();   
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
                    '{{WRAPPER}} .turner__form__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .turner__form__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .turner__form__title',				
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner__form__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .turner__form__title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .turner__form__title',
			]
		);

		$this->end_controls_section();
		
		//Content Style		
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Content', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Content Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner__form__text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .turner__form__text',
			]
		);
		$this->end_controls_section();
		
		/**Button Style**/
		$this->start_controls_section(
			'form_style',
			[
				'label' => esc_html__('Form Style Setting', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'turner_tabs_form' );
		
			$this->start_controls_tab(
				'turner_tab_form_normal',
				[
					'label' => __( 'Normal', 'turner' ),
				]
			);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'form_bgtype',
						'label' => __( 'Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form textarea,
							 {{WRAPPER}} .te-contact-form select',				
					]
				);
				$this->add_responsive_control(
					'form_width_size',
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
							'{{WRAPPER}} .te-contact-form input' => 'width: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'width: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'form_height_size',
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
							'{{WRAPPER}} .te-contact-form input' => 'height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'form_spacing',
					[
						'label'              => __( 'Spacing', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_responsive_control(
					'form_padding',
					[
						'label'              => __( 'Padding', 'turner' ),
						'type'               => Controls_Manager::DIMENSIONS,
						'size_units'         => [ 'px', 'em', '%' ],
						'selectors'          => [
							'{{WRAPPER}} .te-contact-form input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'form_border_type',
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form select,
							 {{WRAPPER}} .te-contact-form textarea',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'form_border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form select,
							 {{WRAPPER}} .te-contact-form textarea',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'form_border_radius',
					[
						'label' => esc_html__('Border Radius', 'turner'),
						'type' => Controls_Manager::DIMENSIONS,
						'separator' => 'before',
						'size_units' => ['px'],
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .te-contact-form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'form_title_typography',
						'label' => __('Text Typography', 'turner'),
						'selector' => 
							'{{WRAPPER}} .te-contact-form input,
							 {{WRAPPER}} .te-contact-form select,
							 {{WRAPPER}} .te-contact-form textarea',				
						'separator' => 'before',
					]
				);
				$this->add_control(
					'form_title_color',
					[
						'label' => __('Text Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form select' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form textarea' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'form_tab_btn_hover',
				[
					'label' => __( 'Hover', 'turner' ),
				]
			);
			
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'form_hover_bg_bgtype',
						'label' => __( 'Hover Background', 'turner' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => 
							'{{WRAPPER}} .te-contact-form input:hover,
							 {{WRAPPER}} .te-contact-form select:hover,
							 {{WRAPPER}} .te-contact-form textarea:hover',				
					]
				);
				$this->add_control(
					'form_border_hover_color',
					[
						'label' => __('Border Hover Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input:hover' => 'border-color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form select:hover' => 'border-color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form textarea:hover' => 'border-color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
				$this->add_control(
					'form_title_hover_color',
					[
						'label' => __('Text Hover Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .te-contact-form input:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form select:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .te-contact-form textarea:hover' => 'color: {{VALUE}}',
						],
						'separator' => 'before',
					]
				);
			
			$this->end_controls_tab();
			
		$this->end_controls_tabs();   
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
							'{{WRAPPER}} .thm-btn,
							 {{WRAPPER}} .faq-one__link',				
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
							'{{WRAPPER}} .thm-btn' => 'width: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .faq-one__link' => 'width: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .thm-btn' => 'height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .faq-one__link' => 'height: {{SIZE}}{{UNIT}};',
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
							'{{WRAPPER}} .thm-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .faq-one__link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
						'frontend_available' => true,
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'btn_border_type',
						'selector' => 
							'{{WRAPPER}} .thm-btn,
							 {{WRAPPER}} .faq-one__link',				
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'border_box_shadow',
						'selector' => 
							'{{WRAPPER}} .thm-btn,
							 {{WRAPPER}} .faq-one__link',				
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
							'{{WRAPPER}} .thm-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							'{{WRAPPER}} .faq-one__link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'btn_title_typography',
						'label' => __('Button Text Typography', 'turner'),
						'selector' => 
							'{{WRAPPER}} .thm-btn,
							 {{WRAPPER}} .faq-one__link',				
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
							'{{WRAPPER}} .thm-btn' => 'color: {{VALUE}}',
							'{{WRAPPER}} .faq-one__link' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .thm-btn:hover,
							 {{WRAPPER}} .faq-one__link:hover',				
					]
				);
				$this->add_control(
					'btn_border_hover_color',
					[
						'label' => __('Button Border Hover Color', 'turner'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .thm-btn:hover' => 'border-color: {{VALUE}}',
							'{{WRAPPER}} .faq-one__link:hover' => 'border-color: {{VALUE}}',
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
							'{{WRAPPER}} .thm-btn:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .faq-one__link:hover' => 'color: {{VALUE}}',
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
		$allowed_tags = wp_kses_allowed_html('post');
		$layout = $settings[ 'layout_control' ];
	?>
    
    	<?php if( $layout == 7 ):?>
		
        <?php if( $settings['cf7_shortocde'] ){?>
        <div class="appointment__content">                                
    		<div class="contact-form contact-form__appointment te-contact-form">        
            	<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>                
            </div>
        </div>
        <?php } ?>
    	
    	<?php elseif( $layout == 6 ):?>
		
        <?php if( $settings['cf7_shortocde'] ){?>
        <div class="contact-form__wrap">
            <div class="contact-form te-contact-form">
            	<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>                
            </div>
        </div>
        <?php } ?>
        
		<?php elseif( $layout == 5 ):?>
		
		<?php if( $settings['cf7_shortocde'] ){?>
		<div class="appointment__content p-0 m-0">            
            <div class="contact-form contact-form__appointment te-contact-form">
                <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
            </div>
        </div>
         <?php } ?>
         
		<?php elseif( $layout == 4 ):?>
        
        <div class="contact-form__wrap">
            <?php if($settings['form_sub_title']){ ?><h3><?php echo wp_kses($settings['form_sub_title'], true);?></h3><?php } ?>
            <?php if($settings['form_title']){ ?><p><?php echo wp_kses($settings['form_title'], true);?></p><?php } ?>
            <?php if( $settings['cf7_shortocde'] ){?>
            <div class="contact-form te-contact-form">
                <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
            </div>
            <?php } ?>
        </div>
        
		<?php elseif( $layout == 3 ):?>
        
			<?php if( $settings['cf7_shortocde'] ){?>
            <section class="contact-two--home-3">
                <div class="contact-two__form te-contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
                </div>
            </section>
            <?php };?>
			<?php elseif( $layout == 8 ):?>
			<div class="help-one_form-column">
				<div class="help-one_form-outer">
					<?php if($settings['form_sub_title'] || $settings['form_title']){ ?>
						<div class="title-box">
							<div class="title"><?php echo wp_kses($settings['form_sub_title'], true);?></div>
							<h2><?php echo wp_kses($settings['form_title'], true);?></h2>
						</div>
					<?php } ?>
					<!-- Default Form -->
					<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
					<!-- End Default Form -->

				</div>
			</div>
		<?php elseif( $layout == 2 ):?>
		
        <!-- price form start -->
        <section class="price-form">
            <div class="container">
                <div class="price-form__wrap pos-rel">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="price-form__form">
                                <?php if($settings['form_sub_title'] || $settings['form_title']){ ?>
                                <div class="section-heading section-heading--3 mb-20">
                                    <?php if($settings['form_sub_title']){ ?>
                                    <div class="heading-subtitle wow fadeInRight">
                                        <?php echo wp_kses($settings['form_sub_title'], true);?>
                                    </div>
                                    <?php } ?>
                                    <?php if($settings['form_title']){ ?><h3 class="heading-title tx-split-text split-in-right"><?php echo wp_kses($settings['form_title'], true);?></h3><?php } ?>
                                </div>
                                <?php } ?>
                                <div class="te-contact-form">
                                	<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
                                </div>
                                <div class="price-form__tab-wrap">
                                    <?php if($settings['label_title']){ ?><label><?php echo wp_kses($settings['label_title'], true);?></label><?php } ?>
                                    <ul class="price-form__tab nav nav-tabs" id="pftTab" role="tablist">
                                        <?php $key = 1; foreach ($settings['service_tabs'] as $key => $item):?>
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php if($key == 1) echo 'active';?>" id="pf-tab-2<?php echo esc_attr($key);?>" data-bs-toggle="tab" data-bs-target="#pf-tab-2<?php echo esc_attr($key);?>" type="button" role="tab" aria-controls="pf-tab-2<?php echo esc_attr($key);?>" aria-selected="<?php if($key == 1) echo 'true'; else echo 'false'; ?>"><?php echo wp_kses($item['tab_title'], true); ?></button>
                                        </li>
                                        <?php $key++; endforeach; ?>
                                    </ul>
                                </div>
                                <?php if($settings['label_title2']){ ?>
                                <div class="price-form__content-label mt-25">
                                    <label><?php echo wp_kses($settings['label_title2'], true);?></label>
                                </div>
                                <?php } ?>
                                <div class="tab-content" id="pfTabContent">
                                    <?php $key = 1; foreach ($settings['service_tabs'] as $key => $item):?>
                                    <div class="tab-pane fade <?php if($key == 1) echo 'show active';?>" id="pf-tab-3<?php echo esc_attr($key);?>" role="tabpanel" aria-labelledby="pf-tab-3<?php echo esc_attr($key);?>">
                                        <ul class="price-form__tab-content list-unstyled">
                                            <li>
                                                <a href="<?php echo esc_url($item['tab_btn_link']['url']);?>"><?php echo wp_kses($item['tab_btn_title'], true); ?></a>
                                            </li>
                                            <li class="price"><?php echo wp_kses($item['tab_price'], true); ?></li>
                                        </ul>
                                    </div>
                                    <?php $key++; endforeach; ?>
                                </div>
                                <div class="price-form__shape" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['shape_image2']['id'])); ?>')"></div>
                                <div class="price-form__shape-color" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['shape_image2']['id'])); ?>')"></div>
                            </div>
                        </div>
                    </div>
                    <div class="price-form__img" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>')"></div>
                </div>
            </div>
        </section>
        <!-- price form end -->
        
		<?php else:?>
        
        <?php if( $settings['cf7_shortocde'] ){?>
        <!-- Contact Section -->
        <div class="te-contact-form">
        	<div class="contact__form te-contact-form">
            	<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
            </div>
        </div>
        <?php };?>
                
        <?php endif;?>
    <?php
    }
}