<?php
namespace TURNERPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\this;
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
class Turner_Counter extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_turner_counter';
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
		return esc_html__( 'Turner Counter', 'turner' );
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
			'Turner_Counter',
			[
				'label' => esc_html__( 'Call To Action', 'turner' ),
			]
		);		
		
		$this->add_control(
			'icon',
			[
			  	'label' => __( 'Icon', 'turner' ),
			  	'type' => Controls_Manager::ICONS,			
			]
	    );
		$this->add_control(
			'counter',
			[
			  	'label' => __( 'Counter', 'turner' ),
			  	'type' => Controls_Manager::TEXT,			
			]
	    );
		$this->add_control(
			'title',
			[
			  	'label' => __( 'Title', 'turner' ),
			  	'type' => Controls_Manager::TEXT,			
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
                'label'      => esc_html__( 'Margin', 'turner' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .imi-work-process-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		
        $this->add_responsive_control(
            'general_padding',
            [
                'label'      => esc_html__( 'Padding', 'turner' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .imi-work-process-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						{{WRAPPER}} .imi-work-process-section:before,
						{{WRAPPER}} .imi-work-process-contnet',				
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
	?>
    <div class="counter-one_column">
            <div class="counter-one_inner">
                <div class="counter-one_icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
				<div class="counter-one_count count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_html($settings['counter']);?>">0</span>+</div>
                <div class="counter-one_text"><?php echo esc_html($settings['title']);?></div>
            </div>
        </div>
	<?php
	}
}