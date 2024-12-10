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
class Career extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_career';
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
		return esc_html__( 'Turner Career', 'turner' );
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
			'career',
			[
				'label' => esc_html__( 'Career', 'turner' ),
			]
		);

		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'turner' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
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
				'options' => get_career_categories()
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
				'label'       => __( 'ON/OFF  Title Background Color Style', 'turner' ),
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
                'label' => __('Box Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-project-box' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_border_bgcolor',
            [
                'label' => __('Box Border Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-project-box' => 'border-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
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
                    '{{WRAPPER}} .bn-project-title h2,
								 .bn-project-title h2 a',
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
                    '{{WRAPPER}} .bn-project-title h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .bn-project-title h2 a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .bn-project-title a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .bn-project-title h2 a:hover' => 'color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_title_style'    => 'yes',
				]
            ]
        );
		//Price Style
		$this->add_control(
			'show_loop_price_style',
			[
				'label'       => __( 'ON/OFF  Price Style', 'turner' ),
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
                'label' => __('Price Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .portfolio-inner .tx-item--holder span',
                'separator' => 'before',
				'condition'             => [
					'show_loop_price_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_price_color',
            [
                'label' => __('Price Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-inner .tx-item--holder span' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_price_style'    => 'yes',
				]
            ]
        );
		//Meta List Style
		$this->add_control(
			'show_loop_content_style',
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
            'loop_content_bgcolor',
            [
                'label' => __('Meta List Background Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bn-meta-list' => 'background-color: {{VALUE}}'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
            ]
        );
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'loop_content_typography',
                'label' => __('Meta List Typography', 'turner'),
                'selector' =>
                    '{{WRAPPER}} .portfolio-inner .tx-item--location-item p',
                'separator' => 'before',
				'condition'             => [
					'show_loop_content_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_content_color',
            [
                'label' => __('Meta List Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-inner .tx-item--location-item p' => 'color: {{VALUE}}',
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

        $paged = turner_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-turner' );
		$args = array(
			'post_type'      => 'career',
			'posts_per_page' => turner_set( $settings, 'query_number' ),
			'orderby'        => turner_set( $settings, 'query_orderby' ),
			'order'          => turner_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( turner_set( $settings, 'query_category' ) ) $args['career_cat'] = turner_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() )
		{ ?>

        <!-- career start -->
        <section class="career pt-120 pb-120">
            <div class="container">
                <div class="row mt-none-30">
                    <?php
						 while ( $query->have_posts() ) : $query->the_post();
				    ?>
				    <?php $turner_careers_meta = get_post_meta( get_the_ID(), 'turner_meta_careers', true );?>
                    <div class="col-lg-6 col-md-6 mt-30 bn-project-box">
                        <div class="career__single pos-rel">
                            <div class="career__author ul_li">
                                <img src="<?php echo wp_get_attachment_url($turner_careers_meta['career_image']['id'], true);?>" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>">
                                <h4 class="bn-project-title"><?php the_title();?></h4>
                            </div>
                            <ul class="career__meta ul_li mb-10">
                                <li><i class="far fa-map-marker-alt"></i><?php echo wp_kses($turner_careers_meta['career_address'], true ); ?></li>
                                <li><i class="far fa-calendar-alt"></i><?php echo wp_kses($turner_careers_meta['apply_end_date'], true ); ?></li>
                                <li><i class="far fa-wallet"></i><?php echo wp_kses($turner_careers_meta['career_salary'], true ); ?></li>
                            </ul>
                            <p>
								<?php echo wp_kses( wp_trim_words( get_the_content(), 20, '...' ), $allowed_tags ); ?>
							</p>
                            <a class="thm-btn" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Apply now', 'turner'); ?></a>
                            <span class="time"><?php echo wp_kses($turner_careers_meta['career_job_title'], true ); ?></span>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!-- career start -->

	<?php }
	wp_reset_postdata();
	}
}
