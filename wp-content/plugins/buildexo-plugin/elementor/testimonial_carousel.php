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
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Testimonial_Carousel extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	 
	public function get_name() {
		return 'turner_testimonial_carousel';
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
		return esc_html__( 'Turner Testimonial Carousel ', 'turner' );
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
		return 'eicon-testimonial-carousel';
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
	public function get_script_depends() {
		wp_register_script( 'testimonials-script', YT_URL . 'assets/js/testimonial-slider.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'testimonials-script' ];
	}
	*/
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'testimonial_carousel',
			[
				'label' => esc_html__( 'Testimonial Carousel', 'turner' ),
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
				),
			]
		);
		
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__( 'Choose Image', 'buildexo-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [	'active' => true, ],
				'default' => [	'url' => Utils::get_placeholder_image_src(),],
			]
	    );
		
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [ 'layout_control' => '2', ],
				'placeholder' => __( 'Enter your Title Here', 'turner' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'turner' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [ 'layout_control' => '2', ],
				'placeholder' => __( 'Enter your Text Here', 'turner' ),
			]
		);
		
		$this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'turner' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 25,
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
				'default' => 3,
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
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'turner' ),
					'ASC'  => esc_html__( 'ASC', 'turner' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'turner'),
			  'label_block' => true,
			  'options' => get_testimonials_categories()
			]
		);
		$this->end_controls_section();
		
		/**Swiper Setting Start**/
		$this->start_controls_section(
			'swiper_carousel',
			[
				'label' => esc_html__( 'Swiper Carousel Setting', 'turner' )
			]
		);
		
		$this->add_control(
			'loop',
			[
				'label' => __( 'infinite Loop?', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turner' ),
				'label_off' => __( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_responsive_control(
			'items_show',
			[
				'label' => esc_html__( 'No. of Items', 'turner' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 2,
			]
		);
		
		$this->add_responsive_control(
			'image_item_gap',
			[
				'label' => __( 'Item Gap', 'turner' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'default' => 30,
			]
		);
		
		$this->add_control(
			'arrows',
			[
				'label' => __( 'Enable Arrows?', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turner' ),
				'label_off' => __( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'dots',
			[
				'label' => __( 'Enable Dots?', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turner' ),
				'label_off' => __( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => '',
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
		
		/**Layout Control Style**/		
		$this->start_controls_section(
			'turner_layout_style',
			[
				'label' => esc_html__('Turner Layout Setting', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
            'turner_layout_margin',
            [
                'label'              => __( 'Spacing', 'turner' ),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => [ 'px', 'em', '%' ],
                'selectors'          => [
                    '{{WRAPPER}} .turner-testimonial-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'frontend_available' => true,
				
            ]
        );
		$this->add_responsive_control(
            'turner_layout_padding',
            [
                'label'              => __( 'Gapping', 'turner' ),
                'type'               => Controls_Manager::DIMENSIONS,
                'size_units'         => [ 'px', 'em', '%' ],
                'selectors'          => [
                    '{{WRAPPER}} .turner-testimonial-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'frontend_available' => true,
				
            ]
        );
		$this->add_control(
			'turner_layout_background',
			[
				'label'                 => __( 'Background', 'turner' ),
				'type'                  => Controls_Manager::HEADING,
				'separator'             => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'turner_layout_bgtype',
				'label' => __( 'Button Background', 'turner' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => 
					'{{WRAPPER}} .turner-testimonial-section',				
			]
		);
		$this->end_controls_section();	
		
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
				'label'       => __( 'ON/OFF  Loop Background Color Style', 'turner' ),
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
                    '{{WRAPPER}} .turner-testi-grid' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
            ]
        );	
		//Category Style
		$this->add_control(
			'show_loop_cat_style',
			[
				'label'       => __( 'ON/OFF  Category Style', 'turner' ),
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
                'name' => 'loop_cat_typography',
                'label' => __('Category Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .turner-testi-cat',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_cat_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_cat_color',
            [
                'label' => __('Category Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .turner-testi-cat' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_cat_style'    => 'yes',
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
                    '{{WRAPPER}} .turner-testi-title',                 
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
                    '{{WRAPPER}} .turner-testi-title' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .turner-testi-text',                 
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
                    '{{WRAPPER}} .turner-testi-text' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
		//Author Name
		$this->add_control(
			'show_loop_author_style',
			[
				'label'       => __( 'ON/OFF  Author Style', 'turner' ),
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
                'name' => 'loop_author_typography',
                'label' => __('Author Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .turner-testi-author',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_author_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_author_color',
            [
                'label' => __('Author Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .turner-testi-author' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_author_style'    => 'yes',
				]
            ]
        );
		//Designation
		$this->add_control(
			'show_loop_designation_style',
			[
				'label'       => __( 'ON/OFF  Designation Style', 'turner' ),
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
                'name' => 'loop_designation_typography',
                'label' => __('Designation Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .turner-testi-designation',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_designation_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_designation_color',
            [
                'label' => __('Designation Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .turner-testi-designation' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_designation_style'    => 'yes',
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
		
		$items_show = $settings[ 'items_show' ];
		$image_item_gap = $settings[ 'image_item_gap' ];
		
		if($settings['loop'] == 'yes'){
			$loop = true;
		}else{
			$loop = false;
		}	
		
		$changed_atts = array(
			'loop'       => $loop,
			'spacebetween' 	     => $image_item_gap,
			'slidesperview' 	 => $items_show
		);	
		$slider_atts = 'data-slider';
		
		$this->add_render_attribute( 'slider_settings', $slider_atts , wp_json_encode( $changed_atts ) );
		
        $paged = turner_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-turner' );
		
		$args = array(
			'post_type'      => 'testimonials',
			'posts_per_page' => turner_set( $settings, 'query_number' ),
			'orderby'        => turner_set( $settings, 'query_orderby' ),
			'order'          => turner_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( turner_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = turner_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ 
	?>
    <?php if($settings['layout_control'] == '2') :?>
       
    <!-- testimonial start -->
    <section class="testimonial turner-testimonial-section bg_img pt-140 pb-140" <?php if($settings['shape_image']['id']){ ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>)"<?php } ?>>
        <div class="container">
            <div class="row align-items-center mt-none-30">
                <div class="col-lg-5 col-md-6 mt-30">
                    <div class="testimonial__thumb-wrap pos-rel">
                        <div class="testimonial__thumb-active swiper-container" id="yt-testi-slider-v3" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                            <div class="swiper-wrapper">
                                <?php 
									while ( $query->have_posts() ) : $query->the_post(); 						
								?>
                                <?php $turner_testimonials_meta = get_post_meta( get_the_ID(), 'turner_meta_testimonials', true );?>
                                <div class="tx-item--item swiper-slide">
                                    <div class="tx-item--inner ul_li">
                                        <div class="tx-item--avatar">
                                            <?php the_post_thumbnail('turner_101x92'); ?>
                                        </div>
                                        <div class="tx-item--author">
                                            <h4 class="turner-testi-author"><?php echo wp_kses($turner_testimonials_meta['testi_author_name'], true ); ?></h4>
                                            <span class="turner-testi-designation"><?php echo wp_kses($turner_testimonials_meta['test_designation'], true ); ?></span>
                                        </div>
                                        <div class="tx-item--arrow">
                                            <i class="far fa-chevron-double-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php if( $settings[ 'arrows' ] === 'yes' ){?>
                        <div class="testimonial-arrow">
                            <div class="testimonial-nav-item testimonial-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="testimonial-nav-item testimonial-button-next"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                        <?php };?>
            
						<?php if( $settings[ 'dots' ] === 'yes' ){?>
                        <div class="swiper-pagination"></div>
                        <?php };?>                        
                        
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 mt-30">
                    <div>
                        <?php if($settings['title'] || $settings['text']){ ?>
                        <div class="section-heading section-heading--3 mb-10">
                            <?php if($settings['title']){ ?><div class="heading-subtitle wow fadeInRight sec-title__tagline"><?php echo wp_kses($settings['title'], true);?></div><?php } ?>
                            <?php if($settings['text']){ ?><h3 class="heading-title tx-split-text split-in-right sec-title__title"><?php echo wp_kses($settings['text'], true);?></h3><?php } ?>
                        </div>
                        <?php } ?>
                        <div class="testimonial__content-active swiper-container" id="yt-testi-slider-v4" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                            <div class="swiper-wrapper">
                                <?php 
									while ( $query->have_posts() ) : $query->the_post();
									$term_list = wp_get_post_terms(get_the_id(), 'testimonials_cat', array("fields" => "names"));					
								?>
								<?php $turner_testimonials_meta = get_post_meta( get_the_ID(), 'turner_meta_testimonials', true );?>
                                <div class="tx-item--single swiper-slide">
                                    <div class="tx-item--holder">
                                        <ul class="tx-item--ratting ul_li mb-10">
                                            <?php $rating = wp_kses( $turner_testimonials_meta['testimonial_rating'], true );
												if(!empty($rating)){
												for ($x = 1; $x <= 5; $x++) {
													if($x <= $rating) echo '<li><i class="fas fa-star"></i></li>'; else echo '<li class="inactive"><i class="fas fa-star"></i></li>';
												}
											} ?>
                                        </ul>
                                        <div class="tx-item--content mb-45 turner-testi-text"><?php echo wp_kses(turner_trim(get_the_content(), $settings['text_limit']), true); ?></div>
                                        <div class="tx-item--author ul_li">
                                            <div class="avatar">
                                                <?php the_post_thumbnail('turner_58x55'); ?>
                                            </div>
                                            <div class="content">
                                                <h4 class="turner-testi-author"><?php echo wp_kses($turner_testimonials_meta['testi_author_name'], true ); ?></h4>
                                                <span class="turner-testi-designation"><?php echo wp_kses($turner_testimonials_meta['test_designation'], true ); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial end -->
    
    <?php else: ?>
    
    <!-- testimonial start -->
    <section class="testimonial turner-testimonial-section testimonial__pt pb-90 bg_img" <?php if($settings['shape_image']['id']){ ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>)"<?php } ?>>
        <div class="container">
            <div class="row align-items-center turner-testi-grid">
                <div class="col-lg-2 col-md-3">
                    <div class="testimonial__nav-wrap pos-rel">
                        <div class="testimonial__nav swiper-container" id="yt-testi-slider" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                            <div class="swiper-wrapper">
                                <?php 
									while ( $query->have_posts() ) : $query->the_post(); 						
								?>
                                <div class="testimonial__nav-thumb swiper-slide">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php if( $settings[ 'arrows' ] === 'yes' ){?>
                        <div class="testimonial-nav">
                            <div class="testimonial-nav-item testimonial-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="testimonial-nav-item testimonial-button-next"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                        <?php };?>
            
						<?php if( $settings[ 'dots' ] === 'yes' ){?>
                        <div class="swiper-pagination"></div>
                        <?php };?>
                        
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="testimonial__active swiper-container" id="yt-testi-slider-v2" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
                        <div class="swiper-wrapper">
                            <?php 
								while ( $query->have_posts() ) : $query->the_post();
								$term_list = wp_get_post_terms(get_the_id(), 'testimonials_cat', array("fields" => "names"));					
							?>
                            <?php $turner_testimonials_meta = get_post_meta( get_the_ID(), 'turner_meta_testimonials', true );?>
                            <div class="testimonial__single swiper-slide">
                                <div class="testimonial__single-inner ul_li">
                                    <div class="testimonial__img">
                                        <?php the_post_thumbnail('turner_377x618'); ?>
                                    </div>
                                    <div class="testimonial__holder">
                                        <div class="section-heading section-heading--2 mb-50">
                                            <div class="heading-subtitle wow fadeInRight turner-testi-cat"><?php echo implode( ', ', (array)$term_list );?></div>
                                            <h2 class="heading-title tx-split-text split-in-right mb-20 turner-testi-title"><?php the_title(); ?></h2>
                                            <p class="turner-testi-text"><?php echo wp_kses(turner_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                        </div>
                                        <div class="testimonial__author">
                                            <span class="turner-testi-designation"><?php echo wp_kses($turner_testimonials_meta['test_designation'], true ); ?></span>
                                            <h4 class="turner-testi-author"><?php echo wp_kses($turner_testimonials_meta['testi_author_name'], true ); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial end -->    
    
      <?php endif; }
		wp_reset_postdata();
	}
}