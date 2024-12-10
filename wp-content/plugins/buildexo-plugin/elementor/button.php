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
class Button extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_button';
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
        return esc_html__( 'Turner Button', 'turner' );
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
        return 'eicon-button';
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
            'button',
            [
                'label' => esc_html__( 'Button', 'turner' ),
            ]
        );
		
		$this->add_control(
			'btn_style',
			[
				'label'   => esc_html__( 'Choose Button Style', 'turner' ),
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
				),
			]
		);		
		
		$this->add_responsive_control(
			'btn_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .yt-btn' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'btn_text',
			[
				'label'       => __( 'Button Text', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'condition' => [ 'btn_style' => ['1', '4'], ],
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Text Here', 'turner' ),
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
				'placeholder' => __( 'Enter your Button Title Here', 'turner' ),
			]
		);
		
		$this->add_control(
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
		
		$this->add_control(
            'show_icon',
            [
                'label'        => esc_html__( 'Show Icon', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
				'condition' => [ 'btn_style' => ['4', '6', '7'], ],
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-chevron-double-right',
					'library' => 'solid',
				],
				'condition'   => [ 'show_icon' => 'yes' ]
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
		$allowed_tags = wp_kses_allowed_html('post');
		$icon = $settings[ 'icon' ];
		$btn_style = $settings[ 'btn_style' ];
		if( $btn_style == '1' ){
			$classes = 'turner-thm-btn';
		}elseif( $btn_style == '2' ){
			$classes = 'turner-thm-btn thm-btn';
		}elseif( $btn_style == '3' ){
			$classes = 'turner-thm-btn thm-btn thm-btn--hover-white mt-45';
		}elseif( $btn_style == '4' ){
			$classes = 'turner-thm-btn';
		}elseif( $btn_style == '5' ){
			$classes = 'turner-thm-btn thm-btn thm-btn--2';
		}elseif( $btn_style == '6' ){
			$classes = 'turner-thm-btn thm-btn thm-btn--3';
		}else{
			$classes = 'turner-thm-btn';
		}
	
	?>	
    	
        <?php if($btn_style == '6') :?>
		
            <div class="yt-btn">
                <?php 
				   $this->add_link_attributes( 'btn_link', $settings['btn_link']);
				?>
                <a class="<?php echo esc_attr( $classes );?>" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><?php echo wp_kses($settings['btn_title'], true);?> 
                	<span>
                    	<?php if( $settings[ 'show_icon' ] === 'yes' ):?>
							<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
                        <?php else:?>
                            <i class="far fa-chevron-double-right"></i>
                        <?php endif;?>
                    </span>                
                </a>
            </div>
		
		<?php elseif($btn_style == '5') :?>
        
        <div class="about-btn yt-btn">
            <?php 
			   $this->add_link_attributes( 'btn_link', $settings['btn_link']);
			?>
            <a class="<?php echo esc_attr( $classes );?>" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><?php echo wp_kses($settings['btn_title'], true);?></a>
        </div>
        
        <?php elseif($btn_style == '4') :?>
        
			<?php if($settings['btn_title'] || $settings['btn_text']){ ?>
            <div class="sec-cta yt-btn">
                <?php 
                   $this->add_link_attributes( 'btn_link', $settings['btn_link']);
                ?>
                <div class="sec-cta__text sec-cta__text--2"><span><?php echo wp_kses($settings['btn_text'], true);?></span> 
                    <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="<?php echo esc_attr( $classes );?>">
						<?php echo wp_kses($settings['btn_title'], true);?>
                        <?php if( $settings[ 'show_icon' ] === 'yes' ):?>
							<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
                        <?php else:?>
                            <i class="far fa-chevron-double-right"></i>
                        <?php endif;?>                        
                    </a>
                </div>
            </div>
            <?php } ?>
        
		<?php elseif($btn_style == '7') :?>
			<?php				
               $this->add_link_attributes( 'btn_link', $settings['btn_link']);
            ?>
			<div class="yt-btn">
				<a class="btn-style-two theme-btn" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>>
					<div class="btn-wrap">
						<span class="text-one"><?php echo wp_kses($settings['btn_title'], true);?> <i>
						<?php if( $settings[ 'show_icon' ] === 'yes' ):?>
								<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
							<?php endif;?>
						</i></span>
						<span class="text-two"><?php echo wp_kses($settings['btn_title'], true);?> <i>
								<?php if( $settings[ 'show_icon' ] === 'yes' ):?>
								<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
								<?php endif;?>
						</i></span>
					</div>
				</a> 
			</div>
			  
		<?php elseif($btn_style == '3') :?>
        
        <?php if($settings['btn_title']){ ?>
		<div class="yt-btn">
			<?php				
               $this->add_link_attributes( 'btn_link', $settings['btn_link']);
            ?>
            <a class="<?php echo esc_attr( $classes );?>" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><?php echo wp_kses($settings['btn_title'], true);?></a>             
        </div>
        <?php } ?>
        
		<?php elseif($btn_style == '2') :?>
        
			<?php if($settings['btn_title']){ ?>
            <div class="yt-btn">
                <?php             
                   $this->add_link_attributes( 'btn_link', $settings['btn_link']);
                ?>
                <a class="<?php echo esc_attr( $classes );?>" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><?php echo wp_kses($settings['btn_title'], true);?></a>            
            </div>
            <?php } ?>
        
        <?php else: ?>
        
		<?php if($settings['btn_title'] || $settings['btn_text']){ ?>
        <div class="sec-cta yt-btn">
            <?php 
               $this->add_link_attributes( 'btn_link', $settings['btn_link']);
			?>
            <div class="sec-cta__text"><span><?php echo wp_kses($settings['btn_text'], true);?></span> <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="<?php echo esc_attr( $classes );?>"><?php echo wp_kses($settings['btn_title'], true);?></a></div>
        </div>
        <?php } ?>
    
    <?php endif;
    }
}