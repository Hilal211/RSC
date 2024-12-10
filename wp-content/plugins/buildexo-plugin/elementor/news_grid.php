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
class News_Grid extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_news_grid';
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
		return esc_html__( 'Turner News Grid', 'turner' );
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
			'news_grid',
			[
				'label' => esc_html__( 'News Grid', 'turner' ),
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
			'col_grid',
			[
				'label'   => esc_html__( 'Choose Column', 'turner' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => array(
					'default'  => esc_html__( 'Default', 'turner' ),
					'one' => esc_html__( 'One Column Grid ', 'turner'),
					'two'  => esc_html__( 'Two Column Grid', 'turner' ),
					'three'  => esc_html__( 'Three Column Grid', 'turner' ),
					'four'  => esc_html__( 'Four Column Grid', 'turner' ),
					'five'  => esc_html__( 'Six Column Grid', 'turner' ),
				),
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
                    '{{WRAPPER}} .blog-item .tx-item--author-text',                 
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
                    '{{WRAPPER}} .blog-item .tx-item--author-text' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .news-block .tx-item--date' => 'background-color: {{VALUE}}'
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
                    '{{WRAPPER}} .news-block .tx-item--date a,
								 .blog-item .tx-item--date',                 
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
                    '{{WRAPPER}} .news-block .tx-item--date a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tx-item--date a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .news-block .tx-item--date a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .news-block .tx-item--date:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .news-block h5,
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
                    '{{WRAPPER}} .news-block h2 a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .news-block h2 a:hover' => 'color: {{VALUE}}',
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
		$layout = $settings[ 'layout_control' ];
				
		$grid_col = $settings[ 'col_grid' ];
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
			$classes = 'col-lg-6 col-md-6';
		}
		
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
	
    <?php if( $layout == 2 ):?>
    
    <div class="row mt-none-30 justify-content-center">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="<?php echo esc_attr( $classes );?> mt-30">
            <div class="blog-single2">
                <div class="tx-item--thumb pos-rel">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('turner_385x229'); ?></a>
                </div>
                <div class="tx-item--holder news-block">
                    <?php if( $date == 'yes' ){?>
                    <div class="tx-item--date text-center">
                        <?php echo get_the_date('d'); ?> <br>
                        <span><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></span>
                    </div>
                    <?php };?>
                    <h3 class="tx-item--title border_effect"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                    <?php if( $author == 'yes' ){?>
                    <a class="tx-item--author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php esc_html_e('By ', 'turner'); ?> <?php the_author(); ?></a>
                    <?php };?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <?php elseif( $layout == 3 ):?>
        <div class="row">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="<?php echo esc_attr( $classes );?> wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
                    <div class="tur-blog-item">
                        <div class="blog-img-author position-relative">
                            <div class="blog-img">
                                <?php the_post_thumbnail('turner_566x320'); ?>
                            </div>
                            <div class="blog-author d-flex align-items-center position-absolute">
                                <div class="author-img">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 73); ?>
                                </div>
                                <div class="author-text text-uppercase">
                                    <span><?php esc_html_e('by Post ', 'turner'); ?></span>
                                    <h4><?php the_author(); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="blog-text">
                            <div class="blog-meta text-uppercase">
                                <a href="#"><?php the_category(' '); ?> </a>
                                <a href="#"><?php echo get_the_date( ); ?> </a>
                            </div>
                            <h2><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
            
    <?php else:?>
    
    <div class="row pl-30 pr-30 mt-none-30">
        <?php $count = 0; while ( $query->have_posts() ) : $query->the_post(); ?>
        
        <?php if($count % 2) { ?>
        
        <div class="<?php echo esc_attr( $classes );?> mt-30">
            <div class="blog-item">
                <div class="tx-item--image tx-item--image--2">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('turner_566x320'); ?></a>
                    <?php if( $author == 'yes' ){?>
                    <div class="tx-item--author ul_li">
                        <div class="tx-item--avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 73); ?>
                        </div>
                        <div class="tx-item--author-text">
                            <?php esc_html_e('by Post ', 'turner'); ?><br>
                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><strong><?php the_author(); ?></strong></a>
                        </div>
                    </div>
                    <?php };?>
                </div>
                <div class="tx-item--holder">
                    <?php if( $date == 'yes' || $cat == 'yes' ){?>
                    <span class="tx-item--date"><?php the_category(' '); ?> <?php if( $date == 'yes' ){?>/ <?php echo get_the_date( ); ?><?php };?></span>
                    <?php };?>
                    <h2 class="tx-item--title border_effect"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
        </div>
        
        <?php } else { ?>
        <div class="<?php echo esc_attr( $classes );?> mt-30">
            <div class="blog-item">
                <div class="tx-item--image">
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('turner_566x320'); ?></a>
                    <?php if( $author == 'yes' ){?>
                    <div class="tx-item--author ul_li">
                        <div class="tx-item--avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 73); ?>
                        </div>
                        <div class="tx-item--author-text">
                            <?php esc_html_e('by Post ', 'turner'); ?><br>
                            <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><strong><?php the_author(); ?></strong></a>
                        </div>
                    </div>
                    <?php };?>
                </div>
                <div class="tx-item--holder news-block">
                    <?php if( $date == 'yes' || $cat == 'yes' ){?>
                    <span class="tx-item--date"><?php the_category(' '); ?> <?php if( $date == 'yes' ){?>/ <?php echo get_the_date( ); ?><?php };?></span>
                    <?php };?>
                    <h2 class="tx-item--title border_effect"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <?php $count++; endwhile; ?>        
    </div>
     
    <?php endif;?> 
	<?php }
		wp_reset_postdata();
	}
}
	