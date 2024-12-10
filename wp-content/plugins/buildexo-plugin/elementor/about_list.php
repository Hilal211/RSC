<?php
namespace TURNERPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Repeater;
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
class About_List extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_About_List';
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
		return esc_html__( 'About List', 'turner' );
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
			'About_List',
			[
				'label' => esc_html__( 'Call To Action', 'turner' ),
			]
		);		
		
		$this->add_control(
			'lists',
			[
			  	'label' => __( 'Lists Item', 'turner' ),
			  	'type' => Controls_Manager::TEXTAREA,
			  	'label_block' => true,			
			]
	    );
        $repeater = new Repeater();		
		$repeater->add_control(
			'icon',
			[
				'name' => 'icon',							
				'label' => esc_html__('Icon', 'turner'),							
				'type' => Controls_Manager::ICONS,				
			]
		);
		$repeater->add_control(
			'title',
			[
				'name' => 'Title',							
				'label' => esc_html__('Title', 'turner'),							
				'type' => Controls_Manager::TEXT,				
			]
		);
		
		$this->add_control(
			'features',
			[
				'label'                 => __('Add Features Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
			]
		);	
		$this->add_control(
			'btn_label',
			[
			  	'label' => __( 'Button Label', 'turner' ),
			  	'type' => Controls_Manager::TEXT,
			  	'label_block' => true,			
			]
	    );
		$this->add_control(
			'btn_link',
			[
			  	'label' => __( 'Button Link', 'turner' ),
			  	'type' => Controls_Manager::URL,
			  	'label_block' => true,			
			]
	    );
		$this->add_control(
			'phone_icon',
			[
			  	'label' => __( 'Phone Icon', 'turner' ),
			  	'type' => Controls_Manager::ICONS,		
			]
	    );
		$this->add_control(
			'phn_title',
			[
			  	'label' => __( 'Phone Title', 'turner' ),
			  	'type' => Controls_Manager::TEXT,
			  	'label_block' => true,			
			]
	    );
		$this->add_control(
			'phn_no',
			[
			  	'label' => __( 'Phone No', 'turner' ),
			  	'type' => Controls_Manager::TEXT,
			  	'label_block' => true,			
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
    <div class="about-one">
		<div class="row clearfix">
			<!-- Column -->
			<div class="column col-xl-7 col-lg-6 col-md-6 col-sm-12">
				<ul class="about-one_list">
				<?php 
					$list_item = $settings['lists'];
					$list_item = explode("\n", ($list_item));
					foreach($list_item as $list):
					?>
					<li><i class="fal fa-chevron-double-right"></i> <?php echo wp_kses($list, true)?></li>
					<?php endforeach;?>
				</ul>
			</div>
			<!-- Column -->
			<div class="column col-xl-5 col-lg-6 col-md-6 col-sm-12">
				<div class="about-one_feature-outer">
					<!-- About One Feature -->
					<?php foreach($settings['features'] as $item):?>
					<div class="about-one_feature">
						<span class="icon"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
						<?php echo esc_html($item['title']);?>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<div class="lower-box d-flex aligm-item-center flex-wrap">
			<!-- Button Box -->
			<?php if(!empty($settings['btn_label'])):?>
			<div class="about-one_button">
				<a class="btn-style-two theme-btn" href="<?php echo esc_url($settings['btn_link']['url']);?>">
					<div class="btn-wrap">
						<span class="text-one"><?php echo esc_html($settings['btn_label']);?> <i>
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_86_252)">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M13.506 -52.3748C13.506 -50.2365 13.506 -45.375 13.506 -45.375C13.506 -44.961 13.8412 -44.625 14.256 -44.625L16.2705 -44.625C16.4077 -44.625 16.5345 -44.55 16.5997 -44.4285C16.6657 -44.3078 16.6598 -44.1607 16.5848 -44.0452C16.548 -43.989 12.3285 -38.8087 12.3202 -38.7952C12.2512 -38.6895 12.1327 -38.625 12.006 -38.625C11.8792 -38.625 11.7607 -38.6895 11.6917 -38.7952C11.6227 -38.901 7.50525 -43.9245 7.42725 -44.0452C7.35225 -44.1607 7.34625 -44.3078 7.4115 -44.4285C7.4775 -44.55 7.6035 -44.625 7.7415 -44.625L9.75599 -44.625C10.17 -44.625 10.506 -44.961 10.506 -45.375C10.506 -45.375 10.506 -50.2388 10.4947 -52.3785C10.4947 -52.8503 10.2675 -53.2973 9.88349 -53.577C9.49874 -53.8575 9.00374 -53.937 8.55149 -53.7922C8.54474 -53.79 8.538 -53.7877 8.532 -53.7855C4.4415 -52.35 1.50599 -48.453 1.50599 -43.875C1.50599 -38.0798 6.21074 -33.375 12.006 -33.375C17.8012 -33.375 22.506 -38.0798 22.506 -43.875C22.506 -48.4522 19.5712 -52.3493 15.4852 -53.796C15.4785 -53.799 15.471 -53.8013 15.4642 -53.8035C15.0075 -53.9498 14.5087 -53.8695 14.1217 -53.5868C13.734 -53.304 13.5052 -52.8532 13.506 -52.374L13.506 -52.3748ZM13.506 -7.11449C13.5052 -6.63524 13.734 -6.18449 14.1217 -5.90174C14.5087 -5.61899 15.0075 -5.53874 15.4643 -5.68499C15.471 -5.68724 15.4785 -5.6895 15.4852 -5.6925C19.5713 -7.13925 22.506 -11.0362 22.506 -15.6135C22.506 -21.4087 17.8012 -26.1135 12.006 -26.1135C6.21074 -26.1135 1.50599 -21.4087 1.50599 -15.6135C1.50599 -11.0355 4.4415 -7.1385 8.532 -5.703C8.538 -5.70075 8.54474 -5.6985 8.55149 -5.69625C9.00374 -5.5515 9.49874 -5.63099 9.88349 -5.91149C10.2675 -6.19124 10.4947 -6.63824 10.4947 -7.11374C10.506 -9.24974 10.506 -14.1135 10.506 -14.1135C10.506 -14.5275 10.17 -14.8635 9.75599 -14.8635L7.7415 -14.8635C7.6035 -14.8635 7.4775 -14.9385 7.4115 -15.06C7.34625 -15.1807 7.35225 -15.3278 7.42725 -15.4433C7.50525 -15.564 11.6228 -20.5875 11.6918 -20.6933C11.7608 -20.799 11.8792 -20.8635 12.006 -20.8635C12.1327 -20.8635 12.2512 -20.799 12.3202 -20.6933C12.3285 -20.6798 16.548 -15.4995 16.5848 -15.4433C16.6598 -15.3278 16.6657 -15.1807 16.5997 -15.06C16.5345 -14.9385 16.4077 -14.8635 16.2705 -14.8635L14.256 -14.8635C13.8412 -14.8635 13.506 -14.5275 13.506 -14.1135L13.506 -7.11449ZM3.3765 13.5C2.89725 13.4992 2.44649 13.728 2.16374 14.1157C1.88099 14.5028 1.79999 15.0015 1.94699 15.4582C1.94924 15.4657 1.9515 15.4725 1.95375 15.4793C3.40125 19.5653 7.29824 22.5 11.8747 22.5C17.67 22.5 22.3747 17.7952 22.3747 12C22.3747 6.20475 17.67 1.5 11.8747 1.5C7.29749 1.5 3.39975 4.43625 1.96425 8.526C1.962 8.53275 1.95974 8.53875 1.95824 8.5455C1.81274 8.9985 1.893 9.4935 2.17275 9.8775C2.45325 10.2615 2.90025 10.4888 3.37575 10.4888C5.511 10.5 10.3755 10.5 10.3755 10.5C10.7895 10.5 11.1255 10.164 11.1255 9.75L11.1255 7.7355C11.1255 7.59825 11.2005 7.4715 11.3212 7.40625C11.442 7.34025 11.589 7.34625 11.7045 7.42125C11.8253 7.5 16.8488 11.6167 16.9545 11.6857C17.061 11.7547 17.1255 11.8732 17.1255 12C17.1255 12.1268 17.061 12.2453 16.9545 12.3143C16.9418 12.3225 11.7615 16.542 11.7045 16.5787C11.589 16.6537 11.442 16.6598 11.3212 16.5937C11.2005 16.5285 11.1255 16.4018 11.1255 16.2645L11.1255 14.25C11.1255 13.836 10.7895 13.5 10.3755 13.5L3.3765 13.5ZM20.6242 41.25C18.486 41.25 13.6245 41.25 13.6245 41.25C13.2105 41.25 12.8745 41.586 12.8745 42L12.8745 44.0145C12.8745 44.1518 12.7995 44.2785 12.6787 44.3437C12.558 44.4097 12.411 44.4037 12.2955 44.3287C12.2385 44.292 7.05825 40.0725 7.0455 40.0643C6.939 39.9953 6.8745 39.8767 6.8745 39.75C6.8745 39.6232 6.939 39.5047 7.0455 39.4357C7.15125 39.3667 12.1747 35.25 12.2955 35.1713C12.411 35.0963 12.558 35.0902 12.6787 35.1562C12.7995 35.2215 12.8745 35.3482 12.8745 35.4855L12.8745 37.5C12.8745 37.914 13.2105 38.25 13.6245 38.25C13.6245 38.25 18.489 38.25 20.628 38.2387C21.0997 38.2387 21.5467 38.0115 21.8272 37.6275C22.107 37.2435 22.1873 36.7485 22.0418 36.2955C22.0403 36.2887 22.038 36.2827 22.0357 36.276C20.6002 32.1862 16.7025 29.25 12.1253 29.25C6.33 29.25 1.62525 33.9548 1.62526 39.75C1.62526 45.5452 6.33001 50.25 12.1253 50.25C16.7018 50.25 20.5988 47.3153 22.0463 43.2293C22.0485 43.2225 22.0508 43.2157 22.053 43.2082C22.2 42.7515 22.119 42.2527 21.8363 41.8657C21.5535 41.478 21.1035 41.2492 20.6242 41.25Z" fill="white"/>
	</g>
	<defs>
	<clipPath id="clip0_86_252">
	<rect width="24" height="24" fill="white" transform="translate(0 24) rotate(-90)"/>
	</clipPath>
	</defs>
	</svg>
	</i></span>
						<span class="text-two"><?php echo esc_html($settings['btn_label']);?> <i>
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_86_252)">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M13.506 -52.3748C13.506 -50.2365 13.506 -45.375 13.506 -45.375C13.506 -44.961 13.8412 -44.625 14.256 -44.625L16.2705 -44.625C16.4077 -44.625 16.5345 -44.55 16.5997 -44.4285C16.6657 -44.3078 16.6598 -44.1607 16.5848 -44.0452C16.548 -43.989 12.3285 -38.8087 12.3202 -38.7952C12.2512 -38.6895 12.1327 -38.625 12.006 -38.625C11.8792 -38.625 11.7607 -38.6895 11.6917 -38.7952C11.6227 -38.901 7.50525 -43.9245 7.42725 -44.0452C7.35225 -44.1607 7.34625 -44.3078 7.4115 -44.4285C7.4775 -44.55 7.6035 -44.625 7.7415 -44.625L9.75599 -44.625C10.17 -44.625 10.506 -44.961 10.506 -45.375C10.506 -45.375 10.506 -50.2388 10.4947 -52.3785C10.4947 -52.8503 10.2675 -53.2973 9.88349 -53.577C9.49874 -53.8575 9.00374 -53.937 8.55149 -53.7922C8.54474 -53.79 8.538 -53.7877 8.532 -53.7855C4.4415 -52.35 1.50599 -48.453 1.50599 -43.875C1.50599 -38.0798 6.21074 -33.375 12.006 -33.375C17.8012 -33.375 22.506 -38.0798 22.506 -43.875C22.506 -48.4522 19.5712 -52.3493 15.4852 -53.796C15.4785 -53.799 15.471 -53.8013 15.4642 -53.8035C15.0075 -53.9498 14.5087 -53.8695 14.1217 -53.5868C13.734 -53.304 13.5052 -52.8532 13.506 -52.374L13.506 -52.3748ZM13.506 -7.11449C13.5052 -6.63524 13.734 -6.18449 14.1217 -5.90174C14.5087 -5.61899 15.0075 -5.53874 15.4643 -5.68499C15.471 -5.68724 15.4785 -5.6895 15.4852 -5.6925C19.5713 -7.13925 22.506 -11.0362 22.506 -15.6135C22.506 -21.4087 17.8012 -26.1135 12.006 -26.1135C6.21074 -26.1135 1.50599 -21.4087 1.50599 -15.6135C1.50599 -11.0355 4.4415 -7.1385 8.532 -5.703C8.538 -5.70075 8.54474 -5.6985 8.55149 -5.69625C9.00374 -5.5515 9.49874 -5.63099 9.88349 -5.91149C10.2675 -6.19124 10.4947 -6.63824 10.4947 -7.11374C10.506 -9.24974 10.506 -14.1135 10.506 -14.1135C10.506 -14.5275 10.17 -14.8635 9.75599 -14.8635L7.7415 -14.8635C7.6035 -14.8635 7.4775 -14.9385 7.4115 -15.06C7.34625 -15.1807 7.35225 -15.3278 7.42725 -15.4433C7.50525 -15.564 11.6228 -20.5875 11.6918 -20.6933C11.7608 -20.799 11.8792 -20.8635 12.006 -20.8635C12.1327 -20.8635 12.2512 -20.799 12.3202 -20.6933C12.3285 -20.6798 16.548 -15.4995 16.5848 -15.4433C16.6598 -15.3278 16.6657 -15.1807 16.5997 -15.06C16.5345 -14.9385 16.4077 -14.8635 16.2705 -14.8635L14.256 -14.8635C13.8412 -14.8635 13.506 -14.5275 13.506 -14.1135L13.506 -7.11449ZM3.3765 13.5C2.89725 13.4992 2.44649 13.728 2.16374 14.1157C1.88099 14.5028 1.79999 15.0015 1.94699 15.4582C1.94924 15.4657 1.9515 15.4725 1.95375 15.4793C3.40125 19.5653 7.29824 22.5 11.8747 22.5C17.67 22.5 22.3747 17.7952 22.3747 12C22.3747 6.20475 17.67 1.5 11.8747 1.5C7.29749 1.5 3.39975 4.43625 1.96425 8.526C1.962 8.53275 1.95974 8.53875 1.95824 8.5455C1.81274 8.9985 1.893 9.4935 2.17275 9.8775C2.45325 10.2615 2.90025 10.4888 3.37575 10.4888C5.511 10.5 10.3755 10.5 10.3755 10.5C10.7895 10.5 11.1255 10.164 11.1255 9.75L11.1255 7.7355C11.1255 7.59825 11.2005 7.4715 11.3212 7.40625C11.442 7.34025 11.589 7.34625 11.7045 7.42125C11.8253 7.5 16.8488 11.6167 16.9545 11.6857C17.061 11.7547 17.1255 11.8732 17.1255 12C17.1255 12.1268 17.061 12.2453 16.9545 12.3143C16.9418 12.3225 11.7615 16.542 11.7045 16.5787C11.589 16.6537 11.442 16.6598 11.3212 16.5937C11.2005 16.5285 11.1255 16.4018 11.1255 16.2645L11.1255 14.25C11.1255 13.836 10.7895 13.5 10.3755 13.5L3.3765 13.5ZM20.6242 41.25C18.486 41.25 13.6245 41.25 13.6245 41.25C13.2105 41.25 12.8745 41.586 12.8745 42L12.8745 44.0145C12.8745 44.1518 12.7995 44.2785 12.6787 44.3437C12.558 44.4097 12.411 44.4037 12.2955 44.3287C12.2385 44.292 7.05825 40.0725 7.0455 40.0643C6.939 39.9953 6.8745 39.8767 6.8745 39.75C6.8745 39.6232 6.939 39.5047 7.0455 39.4357C7.15125 39.3667 12.1747 35.25 12.2955 35.1713C12.411 35.0963 12.558 35.0902 12.6787 35.1562C12.7995 35.2215 12.8745 35.3482 12.8745 35.4855L12.8745 37.5C12.8745 37.914 13.2105 38.25 13.6245 38.25C13.6245 38.25 18.489 38.25 20.628 38.2387C21.0997 38.2387 21.5467 38.0115 21.8272 37.6275C22.107 37.2435 22.1873 36.7485 22.0418 36.2955C22.0403 36.2887 22.038 36.2827 22.0357 36.276C20.6002 32.1862 16.7025 29.25 12.1253 29.25C6.33 29.25 1.62525 33.9548 1.62526 39.75C1.62526 45.5452 6.33001 50.25 12.1253 50.25C16.7018 50.25 20.5988 47.3153 22.0463 43.2293C22.0485 43.2225 22.0508 43.2157 22.053 43.2082C22.2 42.7515 22.119 42.2527 21.8363 41.8657C21.5535 41.478 21.1035 41.2492 20.6242 41.25Z" fill="white"/>
	</g>
	<defs>
	<clipPath id="clip0_86_252">
	<rect width="24" height="24" fill="white" transform="translate(0 24) rotate(-90)"/>
	</clipPath>
	</defs>
	</svg>
	</i></span>
					</div>
				</a>
			</div>
			<?php endif;?>
			<!-- Phone Box -->
			<div class="about-one_phone">
				<span class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['phone_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
				<?php echo wp_kses($settings['phn_title'], true)?>
				<strong><?php echo wp_kses($settings['phn_no'], true)?></strong>
			</div>
		</div>
    </div>
	<?php
	}
}