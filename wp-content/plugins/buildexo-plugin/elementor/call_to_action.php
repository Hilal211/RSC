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
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Call_To_Action extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_call_to_action';
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
		return esc_html__( 'Turner Call To Action', 'turner' );
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
			'call_to_action',
			[
				'label' => esc_html__( 'Call To Action', 'turner' ),
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
			'cta_bg_image',
			[
			  	'label' => __( 'CTA BG Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],	
				'condition' => [ 'layout_control' => ['1','2', '3'],	],			
			]
	    );
		$this->add_control(
			'feature_image',
			[
			  	'label' => __( 'Feature Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [ 'layout_control'      => ['1', '3'] ],
			]
	    );
		$this->add_control(
			'social_bg_image',
			[
			  	'label' => __( 'Social Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [ 'layout_control'      => '1', ],
			]
	    );
		
		//Social Icon	
		$repeater = new Repeater();	
		$repeater->add_control(
            'social_link',
			[
				'label' => __( 'External Url', 'turner' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [ 'url' => '',	'is_external' => true,	'nofollow' => true,	],
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],				
			]			
		);	
		$this->add_control(
			'social_icon',
			[
				'label'                 => __('Add List Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),	
				'condition' => [ 'layout_control'      => '1', ],		
			]
		);
				
		$this->add_control(		
			 'sub_title',
			[
				'label'       => __( 'Sub Title', 'turner' ),				
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,			
				'dynamic'     => [				
					'active' => true,
				],				
				'placeholder' => __( 'Enter your sub title', 'turner' ),
				'condition' => [ 'layout_control'      => ['1','2'],	],
			]
		);
		$this->add_control(		
			 'title',
			[
				'label'       => __( 'Title', 'turner' ),				
                'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,				
				'dynamic'     => [				
					'active' => true,
				],				
				'placeholder' => __( 'Enter your title', 'turner' ),
				'condition' => [ 'layout_control'      => ['1','2'],	],
			]
		);
		$this->add_control(		
			 'text',
			[
				'label'       => __( 'Text', 'turner' ),				
                'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,				
				'dynamic'     => [				
					'active' => true,
				],				
				'placeholder' => __( 'Enter your Text', 'turner' ),
				'condition' => [ 'layout_control'      => ['1','2'],	],
			]
		);
		$this->add_control(
			'icons',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [ 'layout_control'      => '1',	],
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],				
			]			
		);	
		$this->add_control(
			'working_hours',
			[
				'label'       => __( 'Working Hours', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Working Hours Here', 'turner' ),
				'condition' => [ 'layout_control'      => '1',	],
			]
		);
		$this->add_control(
			'phone_no',
			[
				'label'       => __( 'Phone No', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Phone No Here', 'turner' ),
				'condition' => [ 'layout_control'      => '1',	],
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
				'condition' => [ 'layout_control'      => ['1','2'],	],
			]
		);
		$this->add_control(
            'btn_link',
			[
				'label' => __( 'External Url', 'turner' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [ 'layout_control'      => ['1','2'],	],
			]
		);
		
		//Our Funfacts		
		$repeater = new Repeater();
		$repeater->add_control(
			'icon_image',
			[
			  	'label' => __( 'Icon Image', 'turner' ),
			  	'type' => Controls_Manager::MEDIA,
			  	'label_block' => true,
			  	'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
	    );
		$repeater->add_control(
			'block_title',
			[
				'label'       => __( 'Block Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Block Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'counter_start',
			[
				'label' => esc_html__('Counter Start Value', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Start Value', 'turner' ),
			]
		);
		$repeater->add_control(
			'counter_stop',
			[
				'label' => esc_html__('Counter Stop Value', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Stop Value', 'turner' ),
			]
		);
		$repeater->add_control(
			'counter_sign',
			[
				'label' => esc_html__('Counter Sign Value', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Stop Value', 'turner' ),
			]
		);
		$this->add_control(
			'slides',
			[
				'label'                 => __('Add Slide Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'condition' => [ 'layout_control'      => '2',	],
			]
		);
		
		$this->add_control(
			'counter_stop2',
			[
				'label' => esc_html__('Counter Value', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'condition' => [ 'layout_control'      => '3',	],
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Value', 'turner' ),
			]
		);
		$this->add_control(
			'counter_sign2',
			[
				'label' => esc_html__('Counter Sign Value', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'condition' => [ 'layout_control'      => '3',	],
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Stop Value', 'turner' ),
			]
		);
		$this->add_control(
			'year_title',
			[
				'label' => esc_html__('Year Title', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'condition' => [ 'layout_control'      => '3',	],
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Year Title', 'turner' ),
			]
		);
		$this->add_control(
			'year',
			[
				'label' => esc_html__('No. of Year', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'condition' => [ 'layout_control'      => '3',	],
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your No. of Year', 'turner' ),
			]
		);
		
		//Our Funfacts		
		$repeater = new Repeater();
		$repeater->add_control(
			'iconsss',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],				
			]			
		);	
		$repeater->add_control(
			'block_title2',
			[
				'label'       => __( 'Block Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Block Title', 'turner' ),
			]
		);
		$repeater->add_control(
			'block_text2',
			[
				'label' => esc_html__('Block Text', 'turner'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Block Text', 'turner' ),
			]
		);		
		$this->add_control(
			'slides2',
			[
				'label'                 => __('Add Slide Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),
				'condition' => [ 'layout_control'      => '3',	],
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
		$allowed_tags = wp_kses_allowed_html('post');
		$icons = $settings['icons'];
		$layout = $settings[ 'layout_control' ];
	?>
    
    <?php if($layout == 3): ?>
	
    <!-- cta start -->
    <section class="cta">
        <div class="cta-area ul_li" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['cta_bg_image']['id'])); ?>')">
            <?php if($settings['feature_image']['id']){ ?>
            <div class="cta-img">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>">
            </div>
            <?php } ?>
            <div class="cta__experience-inner ul_li">
                <h2 class="number"><?php echo esc_attr($settings['counter_stop2']);?><span><?php echo esc_attr($settings['counter_sign2']);?></span></h2>
                <?php if($settings['year_title'] || $settings['year']){ ?>
                <div class="content">
                    <?php if($settings['year_title']){ ?><span><?php echo wp_kses($settings['year_title'], true); ?></span><?php } ?>
                    <?php if($settings['year']){ ?><h2><?php echo wp_kses($settings['year'], true); ?></h2><?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="cta-info-list-wrap ul_li">
                <?php 
					foreach($settings['slides2'] as $key => $item):
					$iconsss = $item['iconsss'];
				?>
                <div class="cta-info-list ul_li">
                    <div class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $iconsss ); ?>
                    </div>
                    <div class="content">
                        <span><?php echo wp_kses($item['block_title2'], true); ?></span>
                        <h4><?php echo wp_kses($item['block_text2'], true); ?></h4>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- cta end -->
	
	<?php elseif($layout == 2): ?>
 
    <!-- feature start -->
    <section class="feature feature__pt-280 pos-rel bg_img pb-115 jarallax" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['cta_bg_image']['id'])); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-6 col-lg-8 offset-lg-4">
                    <div class="feature-wrap">
                        <div class="section-heading section-heading--2 section-heading--white mb-35">
                            <?php if($settings['sub_title']) { ?>
                            <div class="heading-subtitle wow fadeInRight">
                                <?php echo wp_kses($settings['sub_title'], true); ?>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2 class="heading-title tx-split-text split-in-right mb-10"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>
                            <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true); ?></p><?php } ?>
                        </div>                        
                        <div class="counter__wrap ul_li mt-none-30">
                        	<?php foreach($settings['slides'] as $key => $item):?>
                            <div class="counter__item style2 ul_li mt-30">
                                <div class="counter__icon">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
                                </div>
                                <div class="counter__content">
                                    <h2 class="counter__number"><span class="odometer" data-count="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><span class="suffix"><?php echo esc_attr($item['counter_sign']);?></span></h2>
                                    <span class="title"><?php echo wp_kses($item['block_title'], true); ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if($settings['btn_title']) { ?>
                        <a class="thm-btn thm-btn--2 mt-45" href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true);?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature end -->
	
	<?php else:?>    

    <!-- cta start -->
    <section class="cta gray-bg-2 pb-100 pos-rel">
        <div class="container">
            <div class="row g-0 cta__wrap">
                <div class="col-lg-6">
                    <div class="cta-img2">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cta-content2 bg_img" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['cta_bg_image']['id'])); ?>')">
                        <div class="section-heading section-heading--2 mb-40">
                            <?php if($settings['sub_title']) { ?>
                            <div class="heading-subtitle wow fadeInRight">
                                <?php echo wp_kses($settings['sub_title'], true);?>
                            </div>
                            <?php } ?>
                            <?php if($settings['title']) { ?><h2 class="heading-title tx-split-text split-in-right mb-10"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                        </div>
                        <div class="cta-info__wrap">
                            <div class="cta-info ul_li mb-30">
                                <div class="tx-item--icon"><?php \Elementor\Icons_Manager::render_icon( $icons ); ?></div>
                                <div class="tx-item--holder">
                                    <?php if($settings['working_hours']) { ?><span><?php echo wp_kses($settings['working_hours'], true);?></span><?php } ?>
                                    <?php if($settings['phone_no']) { ?><h3><?php echo wp_kses($settings['phone_no'], true);?></h3><?php } ?>
                                </div>
                            </div>     
                            <?php if($settings['btn_title']) { ?>                       
                            <div class="cta-btn">
                                <a class="thm-btn thm-btn--2" href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true);?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cta__social" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['social_bg_image']['id'])); ?>)">
            <?php 
				foreach($settings['social_icon'] as $key => $item):
				$icon = $item['icon'];
			?>
            <a href="<?php echo esc_url($item['social_link']['url']);?>">
                <?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
             </a>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- cta end -->


	  <?php endif; 	
	}
}