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
class Accordian extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_accordian';
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
        return esc_html__( 'Turner Accordian', 'turner' );
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
	
    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'accordian',
            [
                'label' => esc_html__( 'Accordian', 'turner' ),
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
				),
			]
		);
		
		//Our Slider		
		$repeater = new Repeater();	
		$repeater->add_control(
			'active',
			[
				'label' => esc_html__( 'Active Item', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);			
		$repeater->add_control(
			'block_title',
			[
				'label'       => __( 'Block Title', 'turner' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Accordion Title', 'turner' ),
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Block Title', 'turner' ),
			]
		);		
		$repeater->add_control(
			'block_text',
			[
				'label'       => __( 'Block Text', 'turner' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Accordion Content', 'turner' ),
				'show_label' => false,
			]
		);
		
		$this->add_control(
			'faqs',
			[
				'label'                 => __('Add Faqs Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'default' => [
					[
						'block_title' => esc_html__( 'What is Agency ?', 'textdomain' ),
						'block_text' => esc_html__( 'Improve efficiency, provide a better customer experience with modern technolo services available around Improve efficiency, provide a better customer experience ', 'textdomain' ),
					],
					[
						'block_title' => esc_html__( 'Nulla vitae est risus. Aenean <br> aliquam dolor a massa ', 'textdomain' ),
						'block_text' => esc_html__( 'Improve efficiency, provide a better customer experience with modern technolo services available around Improve efficiency, provide a better customer experience ', 'textdomain' ),
					],
					[
						'block_title' => esc_html__( 'Pellentesque habitant morbi <br> tristique senectus ?', 'textdomain' ),
						'block_text' => esc_html__( 'Improve efficiency, provide a better customer experience with modern technolo services available around Improve efficiency, provide a better customer experience ', 'textdomain' ),
					],
				],
				'title_field' => '{{{ block_title }}}',
			]
		);	
		
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [ 'layout_control' => '1', ],
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
                    '{{WRAPPER}} .turner-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .turner-accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					{{WRAPPER}} .turner-accordion-item',				
			]
		);
		
		$this->add_control(
			'general_border_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-accordion-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'general_box_border_type',
				'selector' => 
					'{{WRAPPER}} .turner-accordion-item',				
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'general_box_shadow',
				'selector' => 
					'{{WRAPPER}} .turner-accordion-item',				
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
					'{{WRAPPER}} .turner-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
                    '{{WRAPPER}} .acc-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .feature-tab-wrap .nav-tabs .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .about__tab .nav-item .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .acc-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .feature-tab-wrap .nav-tabs .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .about__tab .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .acc-btn,
										   .feature-tab-wrap .nav-tabs .nav-item .nav-link,
										   .about__tab .nav-item .nav-link',				
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .acc-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .feature-tab-wrap .nav-tabs .nav-item .nav-link' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about__tab .nav-item .nav-link' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .acc-btn:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .feature-tab-wrap .nav-tabs .nav-item .nav-link:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .about__tab .nav-item .nav-link:before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .acc-btn,
										   .feature-tab-wrap .nav-tabs .nav-item .nav-link,
										   .about__tab .nav-item .nav-link',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .acc-btn,
										   .feature-tab-wrap .nav-tabs .nav-item .nav-link,
										   .about__tab .nav-item .nav-link',
			]
		);

		$this->end_controls_section();
		
		//Text Style
		
		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Text', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
            'text__margin',
            [
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .turner-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
        $this->add_responsive_control(
            'text_padding',
            [
                'label'      => esc_html__( 'Padding', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .turner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .turner-content',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_text_shadow',
				'selector' => '{{WRAPPER}} .turner-content',
			]
		);
		$this->add_control(
			'text_border_color',
			[
				'label' => esc_html__( 'Border Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-content' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		/**Button Style**/
		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style Setting', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [ 'layout_control' => '1', ],
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
    	
        <?php if( $layout == 4 ):?>
		
        <div class="about__tab-wrap turner-accordion-item">
            <ul class="about__tab nav nav-tabs" id="myTab" role="tablist">
                <?php $count = 1; foreach($settings['faqs'] as $key => $item):?>
                <li class="nav-item" role="presentation">
                <button class="nav-link <?php if($count == 1) echo 'active';?>" id="home-tab<?php echo esc_attr($count);?>" data-bs-toggle="tab" data-bs-target="#home<?php echo esc_attr($count);?>" type="button" role="tab" aria-controls="home<?php echo esc_attr($count);?>" aria-selected="true"><span><?php echo wp_kses($item['block_title'], true) ;?></span></button>
                </li>
                <?php $count++; endforeach;?>                
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php $count = 1; foreach($settings['faqs'] as $key => $item):?>
                <div class="tab-pane animated fadeInUp <?php if($count == 1) echo 'show active';?>" id="home<?php echo esc_attr($count);?>" role="tabpanel" aria-labelledby="home-tab<?php echo esc_attr($count);?>">
                    <div class="about__tab-content turner-content">
						<?php $this->print_text_editor( $item['block_text'] ); ;?>
                    </div>
                </div>
                <?php $count++; endforeach;?>                                  
            </div>
        </div>
        
		<?php elseif( $layout == 3 ):?>
		
        <div class="faq-wrapper turner-accordion-item">
            <ul class="accordion_box">
                <?php foreach($settings['faqs'] as $key => $item):?>
                <li class="accordion block <?php echo $key;?> <?php if($key == 1) echo 'active-block';?>">
                    <div class="acc-btn">
                       <?php echo wp_kses($item['block_title'], true) ;?>
                    </div>
                    <div class="acc_body <?php if($key == 1) echo 'current';?>">
                        <div class="content turner-content">
                            <?php $this->print_text_editor( $item['block_text'] ); ;?> 
                        </div>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>            
        </div>
        
		<?php elseif( $layout == 5 ):?>
			<div class="tur-faq-accordion">
				<div class="accordion" id="accordionExample_31">
					<?php $i = 0; foreach($settings['faqs'] as $item): $i++?>
					<div class="accordion-item  <?php if($item['active'] == 'yes'){echo esc_attr('faq_on');}?> wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
						<h2 class="accordion-header" id="heading10<?php echo esc_attr($item['_id']);?>">
							<button class="accordion-button <?php if($item['active'] != 'yes'){echo esc_attr('collapsed');}?> " type="button" data-bs-toggle="collapse" data-bs-target="#collapse10<?php echo esc_attr($item['_id']);?>" aria-expanded="true" aria-controls="collapse10<?php echo esc_attr($item['_id']);?>">
								<span>	<?php echo wp_kses($item['block_title'], true) ;?></span>
							</button>
						</h2>
						<div id="collapse10<?php echo esc_attr($item['_id']);?>" class="accordion-collapse collapse <?php if($item['active'] == 'yes'){echo esc_attr('show');}?>" aria-labelledby="heading10<?php echo esc_attr($item['_id']);?>" data-bs-parent="#accordionExample_31">
							<div class="accordion-body ">
								<div class="tur-faq-text">
									<?php $this->print_text_editor( $item['block_text'] ); ;?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		<?php elseif( $layout == 2 ):?>
                
        <div class="feature-tab-wrap mb-30 turner-accordion-item">
                                    
            <ul class="tx-item--tab nav nav-tabs" id="myTab" role="tablist">
                <?php $count = 1; foreach($settings['faqs'] as $key => $item):?>
                <li class="nav-item" role="presentation">
                <button class="nav-link <?php if($count == 1) echo 'active';?>" id="home-tab<?php echo esc_attr($count);?>" data-bs-toggle="tab" data-bs-target="#home<?php echo esc_attr($count);?>" type="button" role="tab" aria-controls="home<?php echo esc_attr($count);?>" aria-selected="<?php if($count == 1) echo 'true'; else echo 'false'; ?>"><?php echo wp_kses($item['block_title'], true) ;?></button>
                </li>
                <?php $count++; endforeach;?>
            </ul>
            <div class="tab-content turner-content" id="myTabContent">
                <?php $j = 1; foreach($settings['faqs'] as $key => $item):?>
                <div class="tab-pane fade <?php if($j == 1) echo 'show active';?>" id="home<?php echo esc_attr($j);?>" role="tabpanel" aria-labelledby="home-tab<?php echo esc_attr($count);?>">
                    <?php $this->print_text_editor( $item['block_text'] ); ;?>
                </div>
                <?php $j++; endforeach;?>
            </div>
        </div>
        
        
        <?php else:?>
        
        <div class="faq__wrap turner-accordion-item">
            <ul class="accordion_box">
                <?php foreach($settings['faqs'] as $key => $item):?>
                <li class="accordion block <?php echo $key;?> <?php if($key == 1) echo 'active-block';?>">
                    <div class="acc-btn">
                       <?php echo wp_kses($item['block_title'], true) ;?>
                    </div>
                    <div class="acc_body <?php if($key == 1) echo 'current';?>">
                        <div class="content turner-content">
                            <?php $this->print_text_editor( $item['block_text'] ); ;?> 
                        </div>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
            <?php if($settings['btn_title']){ ?>
            <div class="yt-btn">
                <?php 
                   $this->add_link_attributes( 'btn_link', $settings['btn_link']);
                ?>
                <a class="faq__link turner-thm-btn" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><span><?php echo wp_kses($settings['btn_title'], true);?></span></a>
            </div>
            <?php } ?>
        </div>        
        
        <?php endif;?>
    <?php
    }
}