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
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Stroke;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Feature_List extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_feature_list';
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
		return esc_html__( 'Turner Feature List', 'turner' );
	}


	public function get_keywords() {
		return ['Feature','Feature List','List'];
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
		return 'eicon-tools';
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
			'feature_list',
			[
				'label' => esc_html__( 'Feature List', 'turner' ),
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
				),
			]
		);
		
		$this->add_control(
			'icon_image',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,						
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);	
		
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter Your title', 'turner' ),
				'default' => esc_html__( ' Facility to produce simply advance', 'turner' ),				
			]
		);
		
		$this->end_controls_section();
		
		/************************************************************************
								Tab Style Start
		*************************************************************************/
		
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
                    '{{WRAPPER}} .turner-flist-title li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .turner-flist-title li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .turner-flist-title li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'turner'),
				'selector' => 
				'{{WRAPPER}} .turner-flist-title li',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_text_shadow',
				'selector' => 
					'{{WRAPPER}} .turner-flist-title li',
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
		
		$title = $settings[ 'title' ];
		
	?>
	
    	<?php if( $layout == 4 ):?>
		
        <ul class="feature-list ul_li turner-flist-title">
        	<li><i class="far fa-check-circle"></i><?php echo $title;?></li>
        </ul>
        
		<?php elseif( $layout == 3 ):?>
		
        <ul class="org-one_list turner-flist-title">
            <li><?php echo $title;?></li>
        </ul>
        
		<?php elseif( $layout == 2 ):?>       
        
        <?php $features_list = $settings['title'];
			if(!empty($features_list)){
			$features_list = explode("\n", ($features_list)); 
		?>
        <ul class="cause-four_list turner-flist-title">
           	<?php foreach($features_list as $features): ?>
           		<li><?php echo wp_kses($features, true); ?></li>
        	<?php endforeach; ?>
        </ul>
        <?php } ?>       
				
		<?php else:?>
        
        <ul class="feature__list turner-flist-title">
            <li><?php if($settings['icon_image']['id']) {?><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_html_e('Awesome Image', 'turner'); ?>"><?php } ?> <?php echo $title;?></li>
        </ul>

        <?php endif;?>
        
		<?php 

	}
}