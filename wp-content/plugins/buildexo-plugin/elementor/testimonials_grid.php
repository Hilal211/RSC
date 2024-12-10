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
class Testimonials_Grid extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	 
	public function get_name() {
		return 'turner_testimonials_grid';
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
		return esc_html__( 'Turner Testimonials Grid', 'turner' );
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
		return 'eicon-testimonial';
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
			'testimonials_grid',
			[
				'label' => esc_html__( 'Testimonials Grid', 'turner' ),
			]
		);
		$this->add_control(
			'col_grid',
			[
				'label'   => esc_html__( 'Choose Column', 'towngov' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'two',
				'options' => array(
					'one' => esc_html__( 'One Column Grid ', 'towngov'),
					'two'  => esc_html__( 'Two Column Grid', 'towngov' ),
					'three'  => esc_html__( 'Three Column Grid', 'towngov' ),
					'four'  => esc_html__( 'Four Column Grid', 'towngov' ),
					'five'  => esc_html__( 'Six Column Grid', 'towngov' ),
				),				
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
			  'options' => get_testimonials_categories()
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
                    '{{WRAPPER}} .turner-testi-grid' => 'background-color: {{VALUE}} !important;'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
				]
            ]
        );
		$this->add_control(
            'loop_loop_border_bgcolor',
            [
                'label' => __('Loop Border Color', 'turner'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .turner-testi-grid' => 'border-color: {{VALUE}} !important;'
                ],
                'separator' => 'before',
				'condition'             => [
					'show_loop_loop_style'    => 'yes',
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
			$classes = 'col-lg-4 col-md-6 col-sm-12';
		}
		
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
  	    
    <!-- Testimonial One -->
	<div class="turner-testi-section">
    	<div class="row">
			<?php 
                while ( $query->have_posts() ) : $query->the_post();
            ?>
            <?php $turner_testimonials_meta = get_post_meta( get_the_ID(), 'turner_meta_testimonials', true );?>
            <!-- Testimonial Block Two -->
            <div class="<?php echo esc_attr( $classes );?> mt-30">
                <div class="testimonial__item turner-testi-grid">                
                    <div class="icon">
                        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/icon/t_quote.png" alt="<?php esc_attr_e('Awesome Image', 'turner'); ?>">
                    </div>
                    <p class="turner-testi-text"><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
                    <div class="author">
                        <h3 class="turner-testi-author"><?php echo wp_kses($turner_testimonials_meta['testi_author_name'], true ); ?></h3>
                        <span class="turner-testi-designation"><?php echo wp_kses($turner_testimonials_meta['test_designation'], true ); ?></span>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
    	</div>
    </div>
        
      <?php }
		wp_reset_postdata();
	}
}