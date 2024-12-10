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
class Team_Grid extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_team_grid';
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
		return esc_html__( 'Turner Team Grid', 'turner' );
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
			'team_grid',
			[
				'label' => esc_html__( 'Team Grid', 'turner' ),
			]
		);
		
		$this->add_control(
			'layout_control',
			[
				'label'   => esc_html__( 'Choose Layout Style', 'turner' ),
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
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'turner' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 12,
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
			  'label_block' => true,
			  'label' => esc_html__('Category', 'turner'),
			  'options' => get_team_categories()
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
			'post_type'      =>  'team',
			'posts_per_page' => turner_set( $settings, 'query_number' ),
			'orderby'        => turner_set( $settings, 'query_orderby' ),
			'order'          => turner_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
				
		if( turner_set( $settings, 'query_category' ) ) $args['team_cat'] = turner_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ 
	?>
    
    <?php if($settings['layout_control'] == '2') : ?>
    <div class="row justify-content-center">
        <?php 
			while ( $query->have_posts() ) : $query->the_post(); 			 
		?>
        <?php $turner_team_meta = get_post_meta( get_the_ID(), 'turner_meta_team', true );?>
        <div class="<?php echo esc_attr( $classes );?>">
            <div class="team-item2 tg-content-box">
                <div class="tx-item--image pos-rel">
                    <?php the_post_thumbnail('turner_403x399'); ?>
                    <?php
						$icons = $turner_team_meta['social_profile'];
						if ( ! empty( $icons ) ) :								
					?>
                    <div class="tx-item--social">
                        <div class="tx-item--social-inner tg-service-btn">					
							<?php foreach ( $icons as $h_icon ) {
            
                                $icon_class = explode( '-', turner_set( $h_icon, 'icon' ) ); 
                            ?>
                            <a href="<?php echo esc_url(turner_set( $h_icon, 'url' )); ?>" <?php if( turner_set( $h_icon, 'background' ) || turner_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(turner_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(turner_set( $h_icon, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( turner_set( $h_icon, 'icon' ) ); ?>"></i></a>
                            <?php } ?>
						</div>
                    </div>
					<?php endif; ?>
                </div>
                <div class="tx-item--holder">
                    <h3 class="tx-item--name tg-service-title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                    <span class="tx-item--desig tg-service-text"><?php echo wp_kses($turner_team_meta['team_designation'], true ); ?></span>
                </div>
            </div>
        </div> 
        <?php endwhile; ?>     
    </div>
            
	<?php else: ?>
    
    <div class="row justify-content-center mt-none-30">
        <?php 
			while ( $query->have_posts() ) : $query->the_post(); 			 
		?>
        <?php $turner_team_meta = get_post_meta( get_the_ID(), 'turner_meta_team', true );?>
        <div class="<?php echo esc_attr( $classes );?> mt-30">
            <div class="team-item pos-rel tg-content-box">
                <div class="tx-item--image">
                    <?php the_post_thumbnail('turner_389x607'); ?>
                </div>
                <div class="tx-item--bg"></div>
                <div class="tx-item--holder">
                    <h3 class="tx-item--name tg-service-title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                    <span class="tg-service-text"><?php echo wp_kses($turner_team_meta['team_designation'], true ); ?></span>
                    <a class="tx-item--link" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="far fa-chevron-double-right"></i></a>
                </div>
                <?php
					$icons = $turner_team_meta['social_profile'];
					if ( ! empty( $icons ) ) :								
				?>
				<ul class="tx-item--social tg-service-btn">
					<?php foreach ( $icons as $h_icon ) {
	
						$icon_class = explode( '-', turner_set( $h_icon, 'icon' ) ); 
					?>
					<li><a href="<?php echo esc_url(turner_set( $h_icon, 'url' )); ?>" <?php if( turner_set( $h_icon, 'background' ) || turner_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(turner_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(turner_set( $h_icon, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( turner_set( $h_icon, 'icon' ) ); ?>"></i></a></li>
					<?php } ?>
				</ul>
				<?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    
	<?php endif; ?>
      <?php }
		wp_reset_postdata();
	}
}