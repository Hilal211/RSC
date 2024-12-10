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
class Team_Item_Two extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_team_item_two';
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
		return esc_html__( 'Turner Team Item Two', 'turner' );
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
		return 'eicon-icon-box town';
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
			'Team_Item_Two',
			[
				'label' => esc_html__( 'Team Grid', 'turner' ),
			]
		);
		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Team Image', 'turner' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,						
			]
		);
		$this->add_control(
			'name',
			[
				'label' => esc_html__( 'Name', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,						
			]
		);
		$this->add_control(
			'desgination',
			[
				'label' => esc_html__( 'Desgination', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,						
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'turner' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,						
			]
		);
        $repeater = new Repeater();		
		$repeater->add_control(
			'icon',
			[
				'name' => 'Icon',							
				'label' => esc_html__('Icon', 'turner'),							
				'type' => Controls_Manager::ICONS,				
			]
		);
		$repeater->add_control(
			'link',
			[
				'name' => 'Link',							
				'label' => esc_html__('Link', 'turner'),							
				'type' => Controls_Manager::TEXT,				
			]
		);
		$this->add_control(
			'socials',
			[
				'label'                 => __('Add Social Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),		
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
		
	}
	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();?>

        <div class="team-block_one">
            <div class="team-block_one-inner">
                <div class="team-block_one-image">
                    <img src="<?php echo esc_url($settings['team_image']['url']);?>" alt="" />
                    <?php if(!empty($settings['socials'])):?>
                    <div class="overlay-box">
                        <ul class="team-block_one_socials">
                            <?php foreach($settings['socials'] as $item):?>
                                <li><a href="<?php echo esc_url($item['link']);?>"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
                <div class="team-block_one-content">
                    <h5 class="team-block_one-heading"><a href="<?php echo esc_url($settings['link']['url']);?>"><?php echo esc_html($settings['name']);?></a></h5>
                    <div class="team-block_one-designation"><?php echo esc_html($settings['desgination']);?></div>
                </div>
            </div>
        </div>

    <?php 
	}
}