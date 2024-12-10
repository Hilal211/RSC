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
class Service_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_service_grid';
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
		return esc_html__( 'Turner Service Grid', 'turner' );
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
		return 'eicon-library-open town';
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
			'service_grid',
			[
				'label' => esc_html__( 'Service Grid', 'turner' ),
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
				'label' => esc_html__('Icon Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [ 'layout_control'      => '3'],
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('BG Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => ['layout_control'      => '3'],
			]
		);
			
		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Sub title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),	
				'condition' => [ 'layout_control'      => '2', ],		
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),	
				'condition' => [ 'layout_control'      => ['2', '3', '4'] ],			
			]
		);
		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),	
				'condition' => [ 'layout_control'      => ['3', '4'], ],		
			]
		);				
		$this->add_control(
            'exturnel_link',
			[
				'label' => __( 'Exturnel Url', 'turner' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'turner' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [ 'layout_control'      => ['3', '4'], ],
			]
		);	
		
		
		$repeater = new Repeater();		
		$repeater->add_control(
			'feature_image',
			[
				'name' => 'Feature Image',							
				'label' => esc_html__('Slide Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);
		$repeater->add_control(
			'bottom_image',
			[
				'name' => 'Bottom Image',							
				'label' => esc_html__('Slide Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],				
			]
		);	
		$repeater->add_control(
			'block_title',
			[
				'label' => esc_html__( 'Block Title', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Block Title', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),								
			]
		);
		$repeater->add_control(
			'block_text',
			[
				'label' => esc_html__( 'Block Text', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Block Text', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),						
			]
		);		
		$repeater->add_control(
			'features_list',
			[
				'label' => esc_html__( 'Feature List', 'turner' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Feature List', 'turner' ),
				'default' => esc_html__( 'Trusted By Thousand', 'turner' ),						
			]
		);
		$repeater->add_control(		
			 'btn_title',
			[
				'label'       => __( 'Button Title', 'turner' ),				
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,				
				'dynamic'     => [				
					'active' => true,
				],				
				'placeholder' => __( 'Enter your Button title', 'turner' ),				
			]
		);		
		$repeater->add_control(
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
			'slides',
			[
				'label'                 => __('Add Item', 'turner'),
				'type'                  => Controls_Manager::REPEATER,
				'fields'                => $repeater->get_controls(),		
				'condition' => [ 'layout_control'      => '2', ],		
			]
		);
		
		$this->add_control(
			'shape_image',
			[
				'name' => 'Shape Image',							
				'label' => esc_html__('Slide Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [ 'layout_control'      => '2'],
			]
		);
		$this->add_control(
			'shape_image2',
			[
				'name' => 'Shape Image2',							
				'label' => esc_html__('Slide Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,							
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => ['layout_control'      => '2'],
			]
		);
		
		$this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'turner' ),
                'type'    => Controls_Manager::NUMBER,
				'condition' => [ 'layout_control' => '1', ],
                'default' => 6,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'turner' ),
                'type'    => Controls_Manager::NUMBER,
				'condition' => [ 'layout_control' => '1', ],
                'default' => 5,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__( 'Order By', 'turner' ),
				'label_block' => true,
				'condition' => [ 'layout_control' => '1', ],
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'turner' ),
                    'title'      => esc_html__( 'Title', 'turner' ),
                    'menu_order' => esc_html__( 'Menu Order', 'turner' ),
                    'rand'       => esc_html__( 'Random', 'turner' ),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'turner' ),
				'label_block' => true,
				'condition' => [ 'layout_control' => '1', ],
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'turner' ),
                    'ASC'  => esc_html__( 'ASC', 'turner' ),
                ),
            ]
        );
		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [ 'layout_control' => '1', ],
				'default' => [
					'value' => 'fa-solid fa-star',
					'library' => 'solid',
				],
			]
			
		);
		
		$this->add_control(
			'iconss',
			[
				'label' => esc_html__('Enter The icons', 'turner'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [ 'layout_control' => '4', ],
				'default' => [
					'value' => 'fa-solid fa-star',
					'library' => 'solid',
				],
			]
			
		);
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'turner'),
				'condition' => [ 'layout_control' => '1', ],
				'label_block' => true,
                'options' => get_service_categories(),
            ]
        );
		$this->end_controls_section();
		
		/**Grid Setting Start**/
		$this->start_controls_section(
			'grid',
			[
				'label' => esc_html__( 'Grid Setting', 'turner' ),			
			]
		);
		$this->add_control(
			'col_grid',
			[
				'label'   => esc_html__( 'Choose Column', 'turner' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => array(
					'one' => esc_html__( 'One Column Grid ', 'turner'),
					'two'  => esc_html__( 'Two Column Grid', 'turner' ),
					'three'  => esc_html__( 'Three Column Grid', 'turner' ),
					'four'  => esc_html__( 'Four Column Grid', 'turner' ),
					'five'  => esc_html__( 'Six Column Grid', 'turner' ),
				),				
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
		/**Loop Style**/
		$this->start_controls_section(
			'loop_style',
			[
				'label' => esc_html__('LOOP CONTENT STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		//Loop Background Color Style
		$this->add_control(
			'show_loop_loop_style',
			[
				'label'       => __( 'ON/OFF  Loop Content Background Color Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		
		$this->add_control(
            'loop_loop_bgcolor',
            [
                'label' => __('Loop Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-content-box' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
            ]
        );	
		//Icon Style
		$this->add_control(
			'show_loop_icon_style',
			[
				'label'       => __( 'ON/OFF  Icon Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [ 'layout_control' => '2', ],
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_icon_typography',
                'label' => __('Icon Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .tg-icon-box',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_icon_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_icon_color',
            [
                'label' => __('Icon Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-icon-box' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_icon_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_icon_hover_color',
            [
                'label' => __('Icon Hover Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-icon-box a:hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_icon_style'    => 'yes',
				]
            ]
        );
		//Title Style
		$this->add_control(
			'show_loop_title_style',
			[
				'label'       => __( 'ON/OFF  Title Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_title_typography',
                'label' => __('Title Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .tg-service-title,
								 .tg-service-title a',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_title_color',
            [
                'label' => __('Title Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-service-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tg-service-title a' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_title_hover_color',
            [
                'label' => __('Title Hover Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-service-title:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tg-service-title a:hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		//Content Style
		$this->add_control(
			'show_loop_content_style',
			[
				'label'       => __( 'ON/OFF  Content Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_content_typography',
                'label' => __('Content Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .tg-service-text',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_content_color',
            [
                'label' => __('Content Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-service-text' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
		//Button Style
		$this->add_control(
			'show_loop_btn_style',
			[
				'label'       => __( 'ON/OFF  Button Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [ 'layout_control' => '1', ],
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_btn_typography',
                'label' => __('Button Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .tg-service-btn a,
								 .tg-service-btn a span',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_btn_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_btn_color',
            [
                'label' => __('Button Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-service-btn a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tg-service-btn a span' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_btn_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_btn_hover_color',
            [
                'label' => __('Button Hover Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tg-service-btn a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tg-service-btn a span:hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_btn_style'    => 'yes',
				]
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
		$grid_col = $settings['col_grid'];
		$iconss = $settings['iconss'];
		
		if( $grid_col == 'one' ){
			$classes = 'col-lg-12 col-md-12 col-sm-12';
		}elseif( $grid_col == 'two' ){
			$classes = 'col-lg-6 col-md-6 col-sm-12';
		}elseif( $grid_col == 'three' ){
			$classes = 'col-lg-4 col-md-6 col-sm-12';
		}elseif( $grid_col == 'four' ){
			$classes = 'col-lg-3 col-md-6 col-sm-12';
		}elseif( $grid_col == 'five' ){
			$classes = 'col-lg-2 col-md-6 col-sm-12';
		}else{
			$classes = 'col-lg-4 col-md-6 col-sm-12';
		}

        $paged = turner_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-turner' );
		
        $args = array(
            'post_type'      => 'service',
            'posts_per_page' => turner_set( $settings, 'query_number' ),
            'orderby'        => turner_set( $settings, 'query_orderby' ),
            'order'          => turner_set( $settings, 'query_order' ),
            'paged'         => $paged
        );

        if( turner_set( $settings, 'query_category' ) ) $args['service_cat'] = turner_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );		
        if ( $query->have_posts() ) { 
	?>
	
	<?php if($settings['layout_control'] == '4') : ?>
	
    <div class="mt-50">
        <div class="service-item">
            <div class="tx-item--holder ul_li mb-15">
                <div class="tx-item--icon tg-service-btn">
                    <?php \Elementor\Icons_Manager::render_icon( $iconss ); ?>
                </div>
                <?php if($settings['title']){ ?><h2 class="tx-item--title tg-service-title"><a href="<?php echo esc_url($settings['exturnel_link']['url']);?>"><?php echo wp_kses($settings['title'], true); ?></a></h2><?php } ?>
            </div>
            <?php if($settings['text']){ ?><div class="tx-item--content tg-service-text"><?php echo wp_kses($settings['text'], true); ?></div><?php } ?>
            <div class="tx-item--bg"></div>
            <a class="tx-item--link tg-service-btn" href="<?php echo esc_url($settings['exturnel_link']['url']);?>">
                <i class="far fa-arrow-right"></i>
            </a>
        </div>
    </div>
    
	<?php elseif($settings['layout_control'] == '3') : ?>
    
    <div class="tx-benefit pos-rel mt-25">
        <div class="tx-item--holder">
            <?php if($settings['icon_image']['id']){ ?>
            <div class="tx-item--icon">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
            </div>
            <?php } ?>
            <?php if($settings['title']){ ?><h3 class="tx-item--title border_effect tg-service-title"><a href="<?php echo esc_url($settings['exturnel_link']['url']);?>"><?php echo wp_kses($settings['title'], true); ?></a></h3><?php } ?>
            <?php if($settings['text']){ ?><div class="tx-item--content tg-service-text"><?php echo wp_kses($settings['text'], true); ?></div><?php } ?>
            <?php if($settings['bg_image']['id']){ ?>
            <div class="tx-item--bg" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>')"></div>
            <?php } ?>
        </div>
    </div>
	
	<?php elseif($settings['layout_control'] == '2') : ?>
    
    <section class="services pos-rel gray-bg-2 pt-115">
        <div class="container">
            <div class="section-heading section-heading--2 text-center mb-40">
                <?php if($settings['sub_title']){ ?>
                <div class="heading-subtitle wow fadeInUp">
                   <?php echo wp_kses($settings['sub_title'], true); ?>
                </div>
                <?php } ?>
                <?php if($settings['title']){ ?>
                <h2 class="heading-title tx-split-text split-in-up"><?php echo wp_kses($settings['title'], true); ?></h2>
                <?php } ?>
            </div>
            <div class="row g-0 service-warp justify-content-center">
            
                <?php foreach($settings['slides'] as $key => $item):?>
                <div class="col-lg-4 col-md-6">
                    <div class="service-single pos-rel">
                        <div class="tx-item--image">
                            <a href="<?php echo esc_url($item['btn_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></a>
                        </div>
                        <div class="tx-item--holder">
                            <h2 class="tx-item--title"><a href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['block_title'], true); ?></a></h2>
                            
                            <div class="tx-item--content">
                                <?php echo wp_kses($item['block_text'], true); ?> 
                            </div>
                            <?php $features_list = $item['features_list'];
                                if(!empty($features_list)){
                                $features_list = explode("\n", ($features_list)); 
                            ?>	
                            <ul class="tx-item--list list-unstyled mb-45">
                                <?php foreach($features_list as $features): ?>
                                <li><i class="far fa-check-circle"></i><?php echo wp_kses($features, true); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <a class="thm-btn thm-btn--2" href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['btn_title'], true); ?></a>
                        </div>
                        <div class="tx-item--ovarly-image" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($item['bottom_image']['id'])); ?>')"></div>
                    </div>
                </div>
               <?php endforeach; ?>
               
            </div>
        </div>
        <div class="service-shape">
            <div class="shape shape--1">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
            </div>
            <div class="shape shape--2">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
            </div>
        </div>
    </section>
    <!-- services end -->    
    
    <?php else: ?>
    
    <div class="row justify-content-center mt-none-30">
        <?php 
			while ( $query->have_posts() ) : $query->the_post(); 
			$icon = $settings[ 'icon' ];			 
		?>
        <?php $turner_service_meta = get_post_meta( get_the_ID(), 'turner_meta_service', true );?>
        <div class="<?php echo esc_attr( $classes );?> mt-50">
            <div class="service__item">
                <div class="service__bg tg-service-btn"><a class="service__link" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                	<?php if( !empty( $icon ) ):?>
					<?php \Elementor\Icons_Manager::render_icon( $icon ); ?>
                    <?php else:?>
                        <i class="far fa-arrow-right"></i>
                    <?php endif;?>
                    </a>
                </div>
                <div class="image">
                    <?php the_post_thumbnail('turner_175x197'); ?>
                </div>
                <div class="content">
                    <h2 class="title tg-service-title"><?php the_title(); ?></h2>
                    <p class="tg-service-text"><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?> </p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
           
	<?php endif; ?>
		<?php }
		wp_reset_postdata();
	}
}