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
class Hero_Title extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_hero_title';
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
        return esc_html__( 'Turner Hero Title', 'turner' );
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
        return 'eicon-site-identity';
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
            'hero_title',
            [
                'label' => esc_html__( 'Hero Title', 'turner' ),
            ]
        );
		
		$this->add_control(
			'hero_style',
			[
				'label'   => esc_html__( 'Choose Hero Title Style', 'turner' ),
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
				),
			]
		);	
		
		$this->add_control(
            'show_icon_image',
            [
                'label'        => esc_html__( 'Enable Icon Image', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
				'condition' => [ 'hero_style' => ['1', '4', '5'], ],
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		
		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__('icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [ 'show_icon_image'      => 'yes',],
			]
		);
		
		$this->add_control(
            'subtitle_show',
            [
                'label'        => esc_html__( 'Enable Small Title', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Small Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your small title', 'turner' ),
				'default' => esc_html__( 'Add Your Sub Heading Text Here', 'turner' ),
				'condition'   => [ 'subtitle_show' => 'yes' ]
			]
		);
				
		$this->add_control(
            'title_show',
            [
                'label'        => esc_html__( 'Enable Title', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'turner' ),
				'condition'   => [ 'title_show' => 'yes' ]
			]
		);
		
		
		$this->add_control(
            'show_text',
            [
                'label'        => esc_html__( 'Enable Text', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
		
		$this->add_control(
            'text',
            [
                'label'   => esc_html__( 'Description', 'pyloncore' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'There are many variations of passages of lorem ipsum available the majority have suffered alteration in some form by injected humour. Duis aute irure dolor lipsum is simply free text available in the local markets in reprehenderit.', 'pyloncore' ),
				'condition'   => [ 'show_text' => 'yes' ]
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
			'general_align',
			[
				'label' => esc_html__( 'Alignment', 'turner' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'turner' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'turner' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'turner' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .turner-sec-title' => 'text-align: {{VALUE}}',
					'{{WRAPPER}} .sec-title' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
            'general_margin',
            [
                'label'      => esc_html__( 'Margin', 'pyloncore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .sec-title',				
			]
		);
		
		$this->add_control(
			'general_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'general_text_shadow',
				'selector' => '{{WRAPPER}} .sec-title',
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
                    '{{WRAPPER}} .sec-title_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .sec-title_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .sec-title__tagline, .sec-title_title',				
			]
		);
		
		$this->add_control(
			'small_title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title__tagline' => 'color: {{VALUE}};',
					'{{WRAPPER}} .sec-title_title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'small_title_typography',
				'label' => __('Typography', 'cleanex'),
				'selector' => '{{WRAPPER}} .sec-title__tagline, .sec-title_title',
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
                    '{{WRAPPER}} .heading-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sec-title_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .heading-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sec-title_heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '
				{{WRAPPER}} .sec-title__title,
				{{WRAPPER}} .heading-title,
				{{WRAPPER}} .sec-title_heading
				',				
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title__title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .heading-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .sec-title_heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '
					{{WRAPPER}} .sec-title__title,
					{{WRAPPER}} .sec-title_heading
				',
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
                    '{{WRAPPER}} .sec-title__text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sec-title_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .sec-title__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sec-title_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sec-title__text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tur-section-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .sec-title_text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '
				{{WRAPPER}} .sec-title__text,
				{{WRAPPER}} .tur-section-title,
				{{WRAPPER}} .sec-title_text
				',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_text_shadow',
				'selector' => '
				{{WRAPPER}} .sec-title__text,
				{{WRAPPER}} .tur-section-title,
				{{WRAPPER}} .sec-title_text
				',
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
	
		$this->add_render_attribute( 'subtitle', 'class', 'title sec-title__tagline heading-subtitle wow fadeInUp data-wow-delay="100ms"' );

		$subtitle = $settings['subtitle'];
		$title = $settings['title'];
		
		$text = $settings[ 'text' ];
	?>
    	<?php if($settings['hero_style'] == 4 ): ?>
		
        <div class="section-heading section-heading--white turner-sec-title">
            <?php if($settings['subtitle_show']) { ?>
            <div class="sec-title__tagline heading-subtitle wow fadeInRight mb-15">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>"><?php echo wp_kses( $settings['subtitle'], true );?>
            </div>
            <?php } ?>
			<?php if($settings['title_show'] && !empty($title)) { ?>
            <h3 class="sec-title__title heading-title tx-split-text split-in-right mb-25"><?php echo wp_kses( $settings['title'], true );?></h3>
            <?php } ?>
            <?php if($settings['show_text'] && !empty($text)) { ?> 
            <p class="sec-title__text"><?php echo wp_kses( $text, true );?></p>
            <?php } ?>
        </div>
		
		<?php elseif($settings['hero_style'] == 3 ): ?>
        
        <div class="section-heading section-heading--3 turner-sec-title">
		<?php if($settings['subtitle_show'] && !empty($subtitle)) { ?>
            <div class="sec-title__tagline heading-subtitle mb-15 wow fadeInRight"><?php echo wp_kses( $settings['subtitle'], true );?></div>
            <?php } ?>
			<?php if($settings['title_show'] && !empty($title)) { ?>
            <h3 class="sec-title__title heading-title tx-split-text split-in-right mb-15"><?php echo wp_kses( $settings['title'], true );?></h3>
            <?php } ?>
            <?php if($settings['show_text'] && !empty($text)) { ?> 
            <p class="sec-title__text"><?php echo wp_kses( $text, true );?></p>
            <?php } ?>
        </div>
        
		<?php elseif($settings['hero_style'] == 2 ): ?>
        
        <div class="section-heading section-heading--2 turner-sec-title">
		<?php if($settings['subtitle_show'] && !empty($subtitle)) { ?>
            <div class="sec-title__tagline heading-subtitle wow fadeInRight"><?php echo wp_kses( $settings['subtitle'], true );?></div>
            <?php } ?>
            <?php if($settings['title_show'] && !empty($title)) { ?>
            <h2 class="sec-title__title heading-title tx-split-text split-in-right mb-10"><?php echo wp_kses( $settings['title'], true );?></h2>            
			<?php } ?>
			<?php if($settings['show_text'] && !empty($text)) { ?> 
            <p class="sec-title__text"><?php echo wp_kses( $text, true );?></p>
            <?php } ?>
        </div>

		<?php elseif($settings['hero_style'] == 5 ): ?>

        
		<div class="tur-section-title tur-text turner-sec-title">
			<?php if($settings['subtitle_show'] && !empty($subtitle)) { ?>
				<div class="tur-subtile text-uppercase wow fadeInRight" data-wow-delay="100ms"> <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>"> <?php echo wp_kses( $settings['subtitle'], true );?>
				</div> 
				<?php } ?>
				<h2 class="heading-title tx-split-text split-in-right"><?php echo wp_kses( $settings['title'], true );?></h2>
				<?php if($settings['show_text'] && !empty($text)) { ?> 
					<?php echo wp_kses( $text, true );?>
				<?php } ?>
			</div>
			<?php elseif($settings['hero_style'] == 6 ): ?>
			<div class="sec-title">
				<div class="left-box">
				<?php if($settings['subtitle_show'] && !empty($subtitle)) { ?>
					<div class="sec-title_title tx-split-text split-in-up"><?php echo wp_kses( $settings['subtitle'], true );?></div>
					<?php }?> 
					<h2 class="sec-title_heading tx-split-text split-in-up"><?php echo wp_kses( $settings['title'], true );?></h2>
					<?php if($settings['show_text'] && !empty($text)) { ?> 
					<div class="sec-title_text"><?php echo wp_kses( $text, true );?></div>
					<?php } ?>
				</div>
			</div>	
        <?php else: ?>
    	
        <div class="section-heading turner-sec-title">
            <?php if($settings['show_icon_image']) { ?>
            <div class="heading-img wow fadeInUp">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>">
            </div>
            <?php } ?>
            <?php if($settings['subtitle_show'] && !empty($subtitle)) { ?>
			<div class="heading-subtitle wow fadeInUp" data-wow-delay="100ms">
				<?php echo wp_kses($subtitle, true);?>
			</div>
            <?php } ?>
            <?php if($settings['title_show'] && !empty($title)) { ?>
			<h3 class="sec-title__title heading-title tx-split-text split-in-up">
				<?php echo wp_kses($title, true);?>
			</h3>
            <?php } ?>
            <?php if($settings['show_text'] && !empty($text)) { ?> 
            <p class="sec-title__text"><?php echo wp_kses( $text, true );?></p>
            <?php } ?>           
        </div>       
    
    <?php endif;
    }
}