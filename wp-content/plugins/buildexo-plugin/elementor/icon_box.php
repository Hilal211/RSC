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
use Elementor\Plugin;
/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Icon_Box extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_icon_box';
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
        return esc_html__( 'Turner Icon Box', 'turner' );
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
        return 'eicon-icon-box';
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
		wp_register_script( 'icon-counter', YT_URL . 'assets/js/cs-counter-2.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'icon-counter' ];
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
            'icon_box',
            [
                'label' => esc_html__( 'Icon Box', 'turner' ),
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
				),
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [ 'layout_control' => ['5', '6'], ],
			]
			
		);
		
		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__('Choose Icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,	
				'condition' => [ 'layout_control' => ['1', '2', '3', '7'], ],
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'counter_start',
			[
				'label' => esc_html__( 'Counter Start', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Counter Start', 'turner' ),
				'default' => esc_html__( '00', 'turner' ),
				'condition' => [ 'layout_control' => ['1', '2', '4'], ],
			]
		);
		$this->add_control(
			'counter_stop',
			[
				'label' => esc_html__( 'Counter Stop', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Counter Stop', 'turner' ),
				'default' => esc_html__( '434', 'turner' ),
				'condition' => [ 'layout_control' => ['1', '2', '4'], ],
			]
		);
		$this->add_control(
			'alphabet_letter',
			[
				'label' => esc_html__( 'Alphabet Letter', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Alphabet Letter ', 'turner' ),
				'default' => esc_html__( '+', 'turner' ),
				'condition' => [ 'layout_control' => ['1', '2', '4'], ],
			]
		);
		
		$this->add_control(
			'title2',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Mail address', 'turner' ),
				'condition' => [ 'layout_control' => '4', ],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Mail address', 'turner' ),
				'condition' => [ 'layout_control' => ['1', '2', '3', '4', '6', '7'], ],
			]
		);
		$this->add_control(
			'phone_no',
			[
				'label' => esc_html__( 'Phone Number', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Phone Number', 'turner' ),
				'default' => esc_html__( 'Mail address', 'turner' ),
				'condition' => [ 'layout_control' => ['6', '7'], ],
			]
		);
		
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__('External Url', 'turner'),
				'label_block' => true,
				'type' => Controls_Manager::URL,
				'condition' => [ 'layout_control' => '5', ],
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
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
                    '{{WRAPPER}} .turner-icon-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .turner-icon-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .turner-icon-info',				
			]
		);
		$this->end_controls_section();		
		
		//Icon Style		
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .turner-icon-info .icon',				
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-icon-info .icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		
		//Counter Style		
		$this->start_controls_section(
			'counter_style',
			[
				'label' => esc_html__( 'Counter', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [ 'layout_control' => '1',],
			]
		);		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'counter_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .turner-icon-info .turner-counter',				
			]
		);
		
		$this->add_control(
			'counter_color',
			[
				'label' => esc_html__( 'Counter Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-icon-info .turner-counter' => 'color: {{VALUE}};',
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
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .turner-icon-title',				
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_hover_bgtype',
				'label' => __( 'Background', 'turner' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .turner-icon-title:hover',				
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-icon-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-icon-title:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_hover_bcolor',
			[
				'label' => esc_html__( 'Text Hover Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-icon-title:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .turner-icon-title',
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
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'turner' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .turner-icon-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'turner'),
				'selector' => '{{WRAPPER}} .turner-icon-text',
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
		$icon = $settings[ 'icon' ];
		$layout = $settings[ 'layout_control' ];
		
	?>
    	
		<?php if( $layout == 7 ):?>
		
        <ul class="contact__content-list turner-icon-info">
            <li class="ul_li">
                <?php if($settings['icon_image']['id']) { ?>
                <div class="icon">
                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'turner'); ?>">
                </div>
                <?php } ?>
                <div class="content">
                    <h4 class="turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></h4>
                    <p class="turner-counter"><?php echo wp_kses($settings['phone_no'], true) ;?></p>
                </div>
            </li>
        </ul>
        
		<?php elseif( $layout == 6 ):?>
		
        <div class="turner-icon-info">
            <div class="about__cta ul_li">
                <?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
                <div class="content">
                    <span class="turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></span>
                    <h3 class="turner-counter"><?php echo wp_kses($settings['phone_no'], true) ;?></h3>
                </div>
            </div>
        </div>
        
		<?php elseif( $layout == 5 ):?>
		
        <div class="turner-icon-info mt-30">
            <div class="cta-video ul_li_right">
                <a class="btn-video btn-video__xxl popup-video turner-icon-title" href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $icon ); ?></a>
            </div>
        </div>
        
		<?php elseif( $layout == 4 ):?>
		
        <div class="turner-icon-info mt-50">
            <div class="counter-single2 text-center">
                <h2 class="tx-item--number turner-counter"><span class="odometer" data-count="<?php echo esc_attr($settings['counter_stop'], true) ;?>"><?php echo esc_attr($settings['counter_start'], true) ;?></span><span class="suffix"><?php echo esc_attr($settings['alphabet_letter'], true) ;?></span><span class="suffix-text"><?php echo wp_kses($settings['title2'], true) ;?></span></h2>
                <span class="tx-item--title turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></span>
            </div>
        </div>
            
        <?php elseif( $layout == 3 ):?>
        
        <div class="about-feature__list-item ul_li turner-icon-info">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'turner'); ?>">
            <h3 class="turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?>"</h3>
        </div>
		
		<?php elseif( $layout == 2 ):?>
        
        <div class="mt-90 turner-icon-info">
            <div class="counter-single ul_li_center">
                <?php if($settings['icon_image']['id']) { ?>
                <div class="tx-item--icon">
                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'turner'); ?>">
                </div>
                <?php } ?>
                <div class="tx-item--holder">
                    <h2 class="tx-item--number turner-counter"><span class="odometer" data-count="<?php echo esc_attr($settings['counter_stop'], true) ;?>"><?php echo esc_attr($settings['counter_start'], true) ;?></span><span class="suffix"><?php echo esc_attr($settings['alphabet_letter'], true) ;?></span></h2>
                    <span class="tx-item--title turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></span>
                </div>
            </div>
        </div>
        
		<?php else:?>
        
        <div class="counter__item ul_li mt-30 turner-icon-info">
            <?php if($settings['icon_image']['id']) { ?>
            <div class="counter__icon">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'turner'); ?>">
            </div>
            <?php } ?>
            <div class="counter__content">
                <h2 class="counter__number turner-counter"><span class="odometer" data-count="<?php echo esc_attr($settings['counter_stop'], true) ;?>"><?php echo esc_attr($settings['counter_start'], true) ;?></span><span class="suffix"><?php echo esc_attr($settings['alphabet_letter'], true) ;?></span></h2>
                <span class="title turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></span>
            </div>
        </div>
        
    <?php endif;
    }
}