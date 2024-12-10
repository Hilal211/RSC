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
class News_Carousel extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_news_carousel';
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
		return esc_html__( 'Turner News Carousel', 'turner' );
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
	
	public function get_script_depends() {
		wp_register_script( 'blog-carousels', YT_URL . 'assets/js/blog-carousel.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'blog-carousels' ];
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
			'news_carousel',
			[
				'label' => esc_html__( 'News Carousel', 'turner' ),
			]
		);		
		
		$this->add_control(
            'cat',
            [
                'label'        => esc_html__( 'Show Category', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
		$this->add_control(
            'date',
            [
                'label'        => esc_html__( 'Show Date', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
		$this->add_control(
            'author',
            [
                'label'        => esc_html__( 'Show Author', 'turner' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'turner' ),
                'label_off'    => esc_html__( 'Off', 'turner' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );		
		$this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'turner' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 15,
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
                'default' => 'ASC',
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
                'options' => get_blog_categories(),
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
		
		/**Loop Style**/
		$this->start_controls_section(
			'loop_style',
			[
				'label' => esc_html__('LOOP CONTENT STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);					
		//Meta List Style
		$this->add_control(
			'show_loop_meta_style',
			[
				'label'       => __( 'ON/OFF  Meta List Style', 'turner' ),
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
                'label' => __('Meta Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .news-block .info' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
				]
            ]
        );
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_meta_typography',
                'label' => __('Meta List Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .news-block .info i,
								 .news-block .info span',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_meta_color',
            [
                'label' => __('Meta List Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .news-block .info i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .news-block .info span' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_meta_hover_color',
            [
                'label' => __('Meta List Hover Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .news-block .info i a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .news-block .info span a:hover' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
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
		$this->add_control(
            'loop_cat_bgcolor',
            [
                'label' => __('Category BG Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .news-block .tag' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_cat_style'    => 'yes',
				]
            ]
        );
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_cat_typography',
                'label' => __('Category Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .news-block .tag a',                 
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
                    '{{WRAPPER}} .news-block .tag a' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_cat_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_cat_hover_color',
            [
                'label' => __('Category Hover Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .news-block .tag a:hover' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .news-block h5',                 
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
                    '{{WRAPPER}} .news-block h5 a' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .news-block h5 a:hover' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .news-block .text',                 
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
                    '{{WRAPPER}} .news-block .text' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
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
		$cat = $settings[ 'cat' ];
		$date = $settings[ 'date' ];
		$author = $settings[ 'author' ];
		
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
            'post_type'      => 'post',
            'posts_per_page' => turner_set( $settings, 'query_number' ),
            'orderby'        => turner_set( $settings, 'query_orderby' ),
            'order'          => turner_set( $settings, 'query_order' ),
            'paged'         => $paged
        );
        if( turner_set( $settings, 'query_category' ) ) $args['category_name'] = turner_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );
		
        if ( $query->have_posts() ) { 
	?>
	
    <div class="blog__wrap pos-rel">
        <div class="blog__slide swiper-container" id="yt-blog-slider" <?php $this->print_render_attribute_string( 'slider_settings' ); ?>>
            <div class="swiper-wrapper">
                <?php 
					while ( $query->have_posts() ) : $query->the_post();
				?>
                <div class="blog-single swiper-slide">
                    <div class="tx-item--inner">
                        <div class="tx-item--image">
                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('turner_399x231'); ?></a>
                        </div>
                        <div class="tx-item--holder">
                            <h3 class="tx-item--title border_effect"><a href="<?php echo esc_url( get_the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                            <ul class="tx-item--meta ul_li mb-10">
                                <?php if( $author == 'yes' ){?>
                                <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><i class="far fa-user"></i><?php the_author(); ?></a></li>
                                <?php };?>
                                <?php if( $date == 'yes' ){?>
                                <li><i class="fas fa-calendar-alt"></i><?php echo get_the_date( ); ?></li>
                                <?php };?>
                            </ul>
                            <div class="tx-item--content">
                                <?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        
		<?php if( $settings[ 'arrows' ] === 'yes' ){?>
        <div class="blog-nav">
            <div class="blog-nav-item blog-button-prev"><i class="fal fa-long-arrow-left"></i></div>
            <div class="blog-nav-item blog-button-next"><i class="fal fa-long-arrow-right"></i></div>
        </div>
        <?php };?>
        <?php if( $settings[ 'dots' ] === 'yes' ){?>
        <div class="swiper-pagination blog-swiper-pagination"></div>
        <?php };?>
        
    </div>     

	<?php }
		wp_reset_postdata();
	}
}
	