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
class News_Grid_Two extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_News_Grid_Two';
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
		return esc_html__( 'Turner News Grid Two', 'turner' );
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
			'News_Grid_Two',
			[
				'label' => esc_html__( 'News Grid', 'turner' ),
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
        $this->add_control(
			'btn_label',
			[
				'label' => esc_html__( 'Btn Label', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $this->add_control(
			'btn_arrow',
			[
				'label' => esc_html__( 'Btn Arrow', 'turner' ),
				'type' => Controls_Manager::MEDIA,
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
				'label'       => __( 'ON/OFF  Date Style', 'turner' ),
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
                'label' => __('Date Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .tx-item--author-text' => 'background-color: {{VALUE}}'
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
                'label' => __('Date Typography', 'turner'),
                'selector' => 
                    '{{WRAPPER}} .news-block_one-author',                 
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_meta_color',
            [
                'label' => __('Date Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .news-block_one-author' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
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
                    '{{WRAPPER}} .news-block_one-heading,
								 .news-block h2',                 
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
                    '{{WRAPPER}} .news-block_one-heading a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .news-block h3 a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .news-block_one-heading a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .news-block h3 a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .news-block_one-text',                 
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
                    '{{WRAPPER}} .news-block_one-text' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
        
        $this->add_control(
            'btn_bg',
            [
                'label' => __('Title BG Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .btn-style-two' => 'background-color: {{VALUE}}'
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
    
    <div class="row clearfix">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="news-block_one col-lg-6 col-md-12 col-sm-12">
                <div class="news-block_one-inner">
                    <div class="news-block_one-image">
                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('turner_385x229'); ?></a>
                    </div>
                    <div class="news-block_one-content">
                        <h3 class="news-block_one-heading"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                        <div class="news-block_one-text"> <?php echo wp_kses(wp_trim_words(get_the_excerpt(), $settings['text_limit']), true); ?></div>
                        <div class="news-block_one-lower">
                            <div class="d-flex justify-content-between aligm-item-center flex-wrap">
                                <div class="news-block_one-author">
                                    <?php if( $author == 'yes' ){?>
                                    <span><?php echo get_avatar(get_the_author_meta('ID'), 48); ?></span>
                                    <?php the_author(); ?> 
                                    <?php } ?>

                                    <?php if( $date == 'yes' ){?>
                                        <i><?php echo get_the_date( ); ?></i>
                                    <?php } ?>

                                </div>
                                <?php if(!empty($settings['btn_arrow'])):?>
                                <a class="btn-style-two theme-btn" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
                                    <div class="btn-wrap">
                                        <span class="text-one"><?php echo esc_html($settings['btn_label']);?>
                                            <?php if(!empty($settings['btn_arrow']['url'])):?>
                                                <i><img src="<?php echo esc_url($settings['btn_arrow']['url']);?>" alt="" /></i>
                                            <?php endif;?>
                                        </span>
                                        <span class="text-two"><?php echo esc_html($settings['btn_label']);?>
                                            <?php if(!empty($settings['btn_arrow']['url'])):?>
                                                <i><img src="<?php echo esc_url($settings['btn_arrow']['url']);?>" alt="" /></i>
                                            <?php endif;?>
                                        </span>
                                    </div>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

	<?php }
		wp_reset_postdata();
	}
}
	