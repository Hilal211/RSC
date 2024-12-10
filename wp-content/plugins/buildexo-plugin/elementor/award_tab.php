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
class Award_Tab extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_award_tab';
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
        return esc_html__( 'Turner Award Tabs', 'turner' );
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
            'Award_Tab',
            [
                'label' => esc_html__( 'Award Tabs', 'turner' ),
            ]
        );
		
		
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Choose Background Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		//Our Slider		
		$repeater = new Repeater();	
		
		$repeater->add_control(
			'icon_image',
			[
				'label' => esc_html__('Choose Icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		
		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Small Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your small title', 'turner' ),
				'default' => esc_html__( 'Great Experience in building', 'turner' ),
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Great Experience in building', 'turner' ),
			]
		);
		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'description', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Great Experience in building', 'turner' ),
			]
		);
		
		$repeater->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title Here', 'turner' ),
			]
		);
		
		$repeater->add_control(
            'btn_link',
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
        $repeater->add_control(
			'award_1',
			[
				'label' => esc_html__( 'Image 1', 'turner' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);		
        $repeater->add_control(
			'award_2',
			[
				'label' => esc_html__( 'Image 2', 'turner' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);		
		$repeater->add_control(
			'tab_title',
			[
				'label'       => __( 'Title', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Tabs Title', 'turner' ),
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Tabs Title', 'turner' ),
			]
		);		
		
		
		$this->add_control(
			'features',
			[
				'label'                 => __('Add Feature Tabs Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
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
	?>
    	<div class="tur-award-content position-relative" data-background="<?php echo esc_url($settings['bg_image']['url']);?>">
            <div class="award-tab-btn-area ul-li-block">
                <ul class="award-tab-btn nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <?php $i = 0; foreach($settings['features'] as $item): $i++;?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($i == 1){ echo esc_attr('active');}?>" id="ft-tab-1<?php echo esc_attr($item['_id']);?>" data-bs-toggle="pill" data-bs-target="#award-1<?php echo esc_attr($item['_id']);?>" type="button" role="tab" aria-controls="award-1<?php echo esc_attr($item['_id']);?>" aria-selected="true"><?php echo esc_html($item['tab_title']);?></button>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="tur-award-tab-content">
                <div class="tab-content" id="pills-tabContent">
                <?php $i = 0; foreach($settings['features'] as $item): $i++;?>
                    <div class="tab-pane animated fadeInUp <?php if($i == 1){ echo esc_attr('show active');}?>" id="award-1<?php echo esc_attr($item['_id']);?>" role="tabpanel" aria-labelledby="award-tab-1<?php echo esc_attr($item['_id']);?>">
                        <div class="tur-award-tab-item-text-img d-flex justify-content-between">
                            <div class="tur-award-tab-item-text">
                                <div class="tur-section-title">
                                    <div class="tur-subtile text-uppercase"> 
                                        <img src="<?php echo esc_url($item['icon_image']['url']);?>" alt=""> 
                                        <?php echo wp_kses($item['subtitle'], true)?>
                                    </div> 
                                    <h2><?php echo wp_kses($item['title'], true)?></h2>
                                </div>
                                <div class="tur-award-year-text">
                                    <h3><?php echo esc_html($item['tab_title']);?></h3>
                                    <p><?php echo wp_kses($item['description'], true)?></p>
                                    <?php if(!empty($item['btn_title'])):?>
                                        <a class="thm-btn mt-20" href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['btn_title'], true)?></a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="tur-award-tab-item-img">
                                <?php if(!empty($item['award_1']['url'])):?>
                                    <div class="tur-award-tab-img1">
                                        <img src="<?php echo esc_url($item['award_1']['url']);?>" alt="">
                                    </div>
                                <?php endif;?>
                                <?php if(!empty($item['award_2']['url'])):?>
                                    <div class="tur-award-tab-img2">
                                        <img src="<?php echo esc_url($item['award_2']['url']);?>" alt="">
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?> 
                </div>
            </div>
        </div>
    <?php
    }
}