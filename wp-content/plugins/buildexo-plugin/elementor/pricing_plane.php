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
class Pricing_Plane extends Widget_Base {
    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'turner_pricing_plane';
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
        return esc_html__( 'Turner Pricing Plane', 'turner' );
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
	
    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'pricing_plane',
            [
                'label' => esc_html__( 'Pricing Plane', 'turner' ),
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
				),
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,	
				'condition' => [ 'layout_control' => '1', ],
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			]
		);
		
		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Price', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Price', 'turner' ),
			]
		);
		$this->add_control(
			'month',
			[
				'label' => esc_html__( 'Month', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [ 'layout_control' => ['2', '3'], ],
				'placeholder' => esc_html__( 'Enter your Month', 'turner' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'address', 'turner' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label' => esc_html__( 'Button Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Button Title', 'turner' ),
			]
		);
		$this->add_control(
			'btn_link',
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
		
		//Counter Style		
		$this->start_controls_section(
			'counter_style',
			[
				'label' => esc_html__( 'Counter', 'turner' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
		$layout = $settings[ 'layout_control' ];
		
	?>
    	<?php if( $layout == 3 ):?>
        
        <div class="turner-icon-info">
            <div class="pricing__single active">
                <div class="pricing__head">
                    <h4><?php echo wp_kses($settings['title'], true) ;?></h4>
                    <h3 class="turner-counter"><?php echo wp_kses($settings['price'], true) ;?></h3>
                    <span><?php echo wp_kses($settings['month'], true) ;?></span>
                </div>
                <div class="pricing__wrap">
                    <?php $features_list = $settings['text'];
						if(!empty($features_list)){
						$features_list = explode("\n", ($features_list)); 
					?>
					<ul class="pricing__list list-unstyled">
						<?php foreach($features_list as $features): ?>
						   <li><?php echo wp_kses($features, true); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php } ?>
                    <a class="price-btn turner-thm-btn" href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true) ;?></a>
                </div>
            </div>
        </div>
        
    	<?php elseif( $layout == 2 ):?>
        
        <div class="turner-icon-info">
            <div class="pricing__single">
                <div class="pricing__head">
                    <h4 class="turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></h4>
                    <h3 class="turner-counter"><?php echo wp_kses($settings['price'], true) ;?></h3>
                    <span><?php echo wp_kses($settings['month'], true) ;?></span>
                </div>
                <div class="pricing__wrap">
                    <?php $features_list = $settings['text'];
						if(!empty($features_list)){
						$features_list = explode("\n", ($features_list)); 
					?>
					<ul class="pricing__list list-unstyled">
						<?php foreach($features_list as $features): ?>
						   <li><?php echo wp_kses($features, true); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php } ?>
                    <a class="price-btn turner-thm-btn" href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true) ;?></a>
                </div>
            </div>
        </div>
        
		<?php else:?>
        
        <div class="turner-icon-info mt-50">
            <div class="price-item">
                <h3 class="tx-item--title turner-icon-title"><?php echo wp_kses($settings['title'], true) ;?></h3>
                <div class="tx-item--holder">
                    <h2 class="tx-item--price ul_li turner-counter"><?php echo wp_kses($settings['price'], true) ;?></h2>
                    <div class="tx-item--text  turner-icon-text"><?php echo wp_kses($settings['text'], true) ;?></div>
                    <?php if($settings['btn_title']) { ?>
                    <a class="thm-btn thm-btn--3 turner-thm-btn" href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true) ;?> <span><i class="far fa-chevron-double-right"></i></span></a>
                	<?php } ?>
                </div>
                <?php if($settings['image']['id']) { ?>
                <div class="tx-item--image">
                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'turner'); ?>">
                </div>
                <?php } ?>
            </div>
        </div>
        
    <?php endif;
    }
}