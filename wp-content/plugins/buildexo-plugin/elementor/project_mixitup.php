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
use \Elementor\Group_Control_Text_Stroke;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Project_Mixitup extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_project_mixitup';
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
		return esc_html__( 'Turner Project MixitUp', 'turner' );
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
		wp_register_script( 'product-tab-carousels', YT_URL . 'assets/js/product-tab-carousel.js', [ 'elementor-frontend' ], '1.0.0', true );
		return [ 'product-tab-carousels' ];
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
			'project_mixitup',
			[
				'label' => esc_html__( 'Project MixitUp', 'turner' ),
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'turner' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'turner' ),
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
				'label' => esc_html__('Flaxoc Layout Setting', 'turner'),
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
                    '{{WRAPPER}} .turner_product__section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .turner_product__section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .turner_product__section',
			]
		);
		$this->end_controls_section();

		/**Sub Title Style**/
		$this->start_controls_section(
			'sub_title_style',
			[
				'label' => esc_html__('SUB TITLE STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		//Sub Title
		$this->add_control(
			'show_subtitle_style',
			[
				'label'       => __( 'ON/OFF Sub Title Style', 'turner' ),
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
                'name' => 'subtitle_typography',
                'label' => __('Sub Title Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .sec-title .sub-title',
                'separator' => 'before',
				'condition'             => [
					'show_subtitle_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'subtitle_color',
            [
                'label' => __('Sub Title Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sec-title .sub-title' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_subtitle_style'    => 'yes',
				]
            ]
        );
		$this->end_controls_section();

		/**Title Style**/
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__('TITLE STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'show_title_style',
			[
				'label'       => __( 'ON/OFF Title Style', 'turner' ),
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
                'name' => 'title_typography',
                'label' => __('Title Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .sec-title h2',
                'separator' => 'before',
				'condition'             => [
					'show_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_title_style'    => 'yes',
				]
            ]
        );
		$this->end_controls_section();

		/**Loop  Style**/
		$this->start_controls_section(
			'loop_style',
			[
				'label' => esc_html__('LOOP STYLE SETTING', 'turner'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		//Tab Button Style
		$this->add_control(
			'show_loop_tab_btn_title_style',
			[
				'label'       => __( 'ON/OFF Loop Tab Button Title Style', 'turner' ),
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
                'name' => 'loop_tab_btn_title_typography',
                'label' => __('Loop Tab Button Title Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .popular-rooms-section .tab-btns li',
                'separator' => 'before',
				'condition'             => [
					'show_loop_tab_btn_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_tab_btn_title_color',
            [
                'label' => __('Loop Tab Button Title Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .popular-rooms-section .tab-btns li' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_tab_btn_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_tab_btn_title_active_color',
            [
                'label' => __('Loop Tab BUtton Title Active Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .popular-rooms-section .tab-btns li.active-btn' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_tab_btn_title_style'    => 'yes',
				]
            ]
        );
		//Title
		$this->add_control(
			'show_loop_title_style',
			[
				'label'       => __( 'ON/OFF Loop Title Style', 'turner' ),
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
                'label' => __('Loop Title Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .room-block-one .inner-box .image-box .title h3',
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_title_color',
            [
                'label' => __('Loop Title Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .room-block-one .inner-box .image-box .title h3' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_title_arrow_color',
            [
                'label' => __('Loop Title Arrow Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .room-block-one .inner-box .image-box .title h3 a' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		//Meta Style
		$this->add_control(
			'show_loop_meta_style',
			[
				'label'       => __( 'ON/OFF Loop Meta Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
            'loop_meta_icon_color',
            [
                'label' => __('Loop Meta Icon Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .room-block-one .inner-box .info-list li i' => 'color: {{VALUE}}',
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
                'label' => __('Loop Meta Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .room-block-one .inner-box .info-list li',
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_meta_color',
            [
                'label' => __('Loop Meta Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .room-block-one .inner-box .info-list li' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_meta_style'    => 'yes',
				]
            ]
        );
		//Price
		$this->add_control(
			'show_loop_price_style',
			[
				'label'       => __( 'ON/OFF Loop Price Style', 'turner' ),
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
                'name' => 'loop_price_typography',
                'label' => __('Loop Price Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .room-block-one .inner-box .lower-box .price h3,
					 {{WRAPPER}} .room-block-one .inner-box .lower-box .price h3 span',
                'separator' => 'before',
				'condition'             => [
					'show_loop_price_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_price_color',
            [
                'label' => __('Loop Price Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .room-block-one .inner-box .lower-box .price h3' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_price_style'    => 'yes',
				]
            ]
        );
		//Ratting
		$this->add_control(
			'show_loop_ratting_style',
			[
				'label'       => __( 'ON/OFF Loop Ratting Style', 'turner' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'turner' ),
				'label_off' => esc_html__( 'Hide', 'turner' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
            'loop_ratting_color',
            [
                'label' => __('Loop Ratting Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .popular-rooms-section .room-tab-2 .p-tabs-content .room-block-one .inner-box .lower-content .lower-box .rating i' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_ratting_style'    => 'yes',
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

		$paged = turner_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-turner' );
		$args = array(
			'post_type'      => 'project',
			'posts_per_page' => turner_set( $settings, 'query_number' ),
			'orderby'        => turner_set( $settings, 'query_orderby' ),
			'order'          => turner_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",turner_set( $settings, 'cat_exclude' ));
		if(turner_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() )
		{
		ob_start();
		?>

		<?php
            $count = 0;
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');

            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat');
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';

			$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );

            ?>

			<!--Gallery Item-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item <?php echo esc_attr($term_slug); ?>">
			<div class="portfolio__item mb-30">
				<?php if (has_post_thumbnail()): ?>
					<div class="portfolio__img">
						<?php the_post_thumbnail('turner_389x390'); ?>
					</div>
				<?php endif; ?>

				<div class="portfolio__content">
					<h3 class="title">
						<?php if (get_the_permalink()): ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php else: ?>
							<?php the_title(); ?>
						<?php endif; ?>
					</h3>

					<?php
					$term_list = get_the_terms(get_the_ID(), 'project_cat');
					if ($term_list && !is_wp_error($term_list)) :
					?>
						<a class="category" href="<?php the_permalink(); ?>">
							<?php echo implode(', ', array_column($term_list, 'name')); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

            </div>

			<?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();

            ob_start();?>

            <?php $terms = get_terms(array('project_cat')); ?>

			<!-- Gallery Section -->
 			<div class="portfolio__menu mb-35">
                <button class="active" data-filter="*"><?php esc_attr_e('SEE ALL', 'turner');?></button>
                <?php foreach( $fliteration as $t ): ?>
                <button data-filter=".<?php echo esc_attr(turner_set( $t, 'slug' )); ?>"><?php echo turner_set( $t, 'name'); ?></button>
                <?php endforeach;?>
            </div>
            <div class="row grid">
            	<?php echo wp_kses($data_posts, true); ?>
            </div>

       <?php }
	}

}