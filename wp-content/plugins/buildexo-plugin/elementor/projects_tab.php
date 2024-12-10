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

class Projects_Tab extends Widget_Base {



	/**

	 * Get widget name.

	 * Retrieve button widget name.

	 *

	 * @since  1.0.0

	 * @access public

	 * @return string Widget name.

	 */

	public function get_name() {

		return 'turner_projects_tab';

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

		return esc_html__( 'Turner Projects Tab', 'turner' );

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

		wp_register_script( 'project-script', YT_URL . 'assets/js/project-tabs-slider.js', [ 'elementor-frontend' ], '1.0.0', true );

		return [ 'project-script' ];

	}

	

	/**

	 * Register button widget controls.

	 * Adds different input fields to allow the user to change and customize the widget settings.

	 *

	 * @since  1.0.0

	 * @access protected

	 */

	protected function _register_controls() {

		$this->start_controls_section(

			'projects_tab',

			[

				'label' => esc_html__( 'Projects Tab', 'turner' ),

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

				'name' => 'Shape Image',							

				'label' => esc_html__('Slide Image ', 'turner'),							

				'type' => Controls_Manager::MEDIA,							

				'default' => ['url' => Utils::get_placeholder_image_src(),],

				'condition' => [ 'layout_control'      => '2'],

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

				'placeholder' => __( 'Enter your title', 'turner' ),

			]

		);

		

		//Project Tabs

		$repeater = new Repeater();			

		$repeater->add_control(		

			 'tab_title',

			[

				'label'       => __( 'Tabs Title', 'turner' ),				

                'type'        => Controls_Manager::TEXT,

				'label_block' => true,				

				'dynamic'     => [				

					'active' => true,

				],				

				'placeholder' => __( 'Enter your Tabs Title', 'turner' ),

			]

		);

		$repeater->add_control(

			'text_limit',

			[

				'label'   => esc_html__( 'Number ofText', 'turner' ),

				'type'    => Controls_Manager::NUMBER,

				'default' => 10,

				'min'     => 1,

				'max'     => 100,

				'step'    => 1,

			]

		);

		$repeater->add_control(

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

		$repeater->add_control(

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

		$repeater->add_control(

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

		$repeater->add_control(

            'query_category', 

			[

			  'type' => Controls_Manager::SELECT,

			  'label' => esc_html__('Category', 'turner'),

			  'label_block' => true,

			  'options' => get_project_categories()

			]

		);		

		$this->add_control(

			'projects_tabs',

			[

				'label'                 => __('Add Tabs Item', 'turner'),

				'type'                  => Controls_Manager::REPEATER,

				'fields'                => $repeater->get_controls(),								

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

	?>

    

    <?php if($settings['layout_control'] == '2') : ?>

    

    <!-- portfolio start -->

    <section class="portfolio z-index-1 pos-rel pb-150">

        <div class="container">

            <div class="row align-items-center">

                <?php if($settings['sub_title'] || $settings['title']) { ?>

                <div class="col-lg-6">

                    <div class="section-heading section-heading--3 mb-50">

                        <?php if($settings['sub_title']) { ?><div class="heading-subtitle wow fadeInRight"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>

                        <?php if($settings['title']) { ?><h3 class="heading-title tx-split-text split-in-right"><?php echo wp_kses($settings['title'], true); ?></h3><?php } ?>

                    </div>

                </div>

                <?php } ?>

                <div class="col-lg-6">

                    <div class="feature-tab-wrap portfolio-tab__wrap mb-30">

                        <ul class="tx-item--tab nav nav-tabs" id="portTab" role="tablist">

                            <?php $i = 1; foreach ($settings['projects_tabs'] as $key => $item):?>

                            <li class="nav-item" role="presentation">

                            <button class="nav-link <?php if($i == 1) echo 'active';?>" id="p-tab-0<?php echo esc_attr($i);?>" data-bs-toggle="tab" data-bs-target="#p-tab-<?php echo esc_attr($i);?>" type="button" role="tab" aria-controls="p-tab-<?php echo esc_attr($i);?>" aria-selected="<?php if($i == 1) echo 'true'; else echo 'false'; ?>"><?php echo wp_kses($item['tab_title'], true); ?></button>

                            </li>

                            <?php $i++; endforeach; ?>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="tab-content tab_has_slider" id="portTabContent">

                <?php 

					$i = 1; 

					foreach ($settings['projects_tabs'] as $key => $item):

					

					$paged = get_query_var('paged');

					$paged = turner_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

					

					$this->add_render_attribute( 'wrapper', 'class', 'templatepath-turner' );

					

					$args = array(

						'post_type'      => 'project',

						'posts_per_page' => turner_set( $item, 'query_number' ),

						'orderby'        => turner_set( $item, 'query_orderby' ),

						'order'          => turner_set( $item, 'query_order' ),

						

						'paged'         => $paged

					);			

					

					if( turner_set( $item, 'query_category' ) ) $args['project_cat'] = turner_set( $item, 'query_category' );

					$query = new \WP_Query( $args );

					if ( $query->have_posts() ) 

					{ 

				?>

                <div class="tab-pane fade <?php if($i == 1) echo 'show active';?>" id="p-tab-<?php echo esc_attr($i);?>" role="tabpanel" aria-labelledby="p-tab-0<?php echo esc_attr($i);?>">

                    <div class="portfolio__slider-wrap pos-rel">

                        <div class="portfolio-active swiper-container">

                            <div class="swiper-wrapper">

                                <?php 

									while ( $query->have_posts() ) :  $query->the_post(); 

									$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));

									$turner_projects_meta = get_post_meta( get_the_ID(), 'turner_meta_projects', true );

								?>

                                <div class="swiper-slide portfolio-item pos-rel">

                                    <div class="tx-item--img">

                                        <?php the_post_thumbnail('turner_592x529'); ?>

                                    </div>

                                    <div class="tx-item--holder">

                                        <span class="tx-item--cat"><?php echo implode( ', ', (array)$term_list );?></span>

                                        <h2 class="tx-item--title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>

                                        <div class="tx-item--content"><?php echo wp_kses(wp_trim_words(get_the_content(), $item['text_limit']), true); ?></div>

                                        <ul class="tx-item--meta ul_li">

                                            <li><i class="fas fa-user"></i><?php echo wp_kses($turner_projects_meta['project_builder'], true ); ?></li>

                                            <li><i class="fas fa-clock"></i><?php echo wp_kses($turner_projects_meta['project_end_date'], true ); ?></li>

                                        </ul>

                                    </div>

                                </div>

                                <?php endwhile; ?>

                            </div>

                        </div>

                        

                        <?php if( $settings[ 'arrows' ] === 'yes' ){?>

                        <div class="tx-swiper-arrow-wrap">

                            <div class="tx-swiper-arrow tx-button-prev"><i class="far fa-arrow-left"></i></div>

                            <div class="tx-swiper-arrow tx-button-next"><i class="far fa-arrow-right"></i></div>

                        </div>

                        <?php };?>

                        <?php if( $settings[ 'dots' ] === 'yes' ){?>

                        <div class="swiper-pagination blog-swiper-pagination"></div>

                        <?php };?>                         

                    </div>

                </div>

                <?php } $i++; endforeach; ?>

            </div>

        </div>

        <div class="portfolio-shape-bg" style="background-image:url('<?php echo esc_url(wp_get_attachment_url($settings['shape_image']['id'])); ?>')"></div>

    </section>

    <!-- portfolio end -->

    

    <?php else: ?>

    

    <!-- project start -->

    <section class="project">

        <div class="container">

            <div class="row align-items-end">

                <?php if($settings['sub_title'] || $settings['title']) { ?>

                <div class="col-lg-6">

                    <div class="section-heading section-heading--2 mb-35">

                        <?php if($settings['sub_title']) { ?><div class="heading-subtitle wow fadeInRight"><?php echo wp_kses($settings['sub_title'], true); ?></div><?php } ?>

                        <?php if($settings['title']) { ?><h2 class="heading-title tx-split-text split-in-right"><?php echo wp_kses($settings['title'], true); ?></h2><?php } ?>

                    </div>

                </div>

                <?php } ?>

                <div class="col-lg-6">

                    <ul class="nav nav-tabs project-nav mb-35" id="myTab" role="tablist">

                        <?php $count = 1; foreach ($settings['projects_tabs'] as $key => $item):?>

                        <li class="nav-item" role="presentation">

                          <button class="nav-link <?php if($count == 1) echo 'active';?>" id="home-tab<?php echo esc_attr($count);?>" data-bs-toggle="tab" data-bs-target="#home<?php echo esc_attr($count);?>" type="button" role="tab" aria-controls="home<?php echo esc_attr($count);?>" aria-selected="<?php if($count == 0) echo 'true'; else echo 'false'; ?>"><?php echo wp_kses($item['tab_title'], true); ?> </button>

                        </li>

                        <?php $count++; endforeach; ?>

                    </ul>                              

                </div>

            </div>

        </div>

        <div class="container-fluid p-0">

            <div class="tab-content" id="myTabContent">

                <?php 

					$count = 1; foreach ($settings['projects_tabs'] as $key => $item):

					$paged = get_query_var('paged');

					$paged = turner_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

					

					$this->add_render_attribute( 'wrapper', 'class', 'templatepath-turner' );

					

					$args = array(

						'post_type'      => 'project',

						'posts_per_page' => turner_set( $item, 'query_number' ),

						'orderby'        => turner_set( $item, 'query_orderby' ),

						'order'          => turner_set( $item, 'query_order' ),

						'paged'         => $paged

					);

					

					if( turner_set( $item, 'query_category' ) ) $args['project_cat'] = turner_set( $item, 'query_category' );

					$query = new \WP_Query( $args );

					if ( $query->have_posts() ) 

					{

				?>

                <div class="tab-pane fade  <?php if($count == 1) echo 'show active';?>" id="home<?php echo esc_attr($count);?>" role="tabpanel" aria-labelledby="home-tab<?php echo esc_attr($count);?>">

                    <div class="row g-0">

                    	<?php 

							while ( $query->have_posts() ) :  $query->the_post(); 

							$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));

							$turner_projects_meta = get_post_meta( get_the_ID(), 'turner_meta_projects', true );

						?>

                        <?php $turner_projects_meta = get_post_meta( get_the_ID(), 'turner_meta_projects', true );?>

                        <div class="col-lg-3 col-md-6 col-sm-6">

                            <div class="tx-project">

                                <div class="tx-item--inner text-center">

                                    <div class="tx-item--image">

                                         <?php the_post_thumbnail('turner_596x973'); ?>

                                    </div>

                                    <div class="tx-item--holder">

                                        <div class="tx-item--category"><?php echo implode( ', ', (array)$term_list );?></div>

                                        <h3 class="tx-item--title mb-30"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>

                                        <div class="tx-item--links ul_li_center">

                                            <a class="tx-item--link popup-video" href="<?php echo esc_url($turner_projects_meta['project_video_link'] ); ?>"><i class="fas fa-play"></i></a>                                            

                                            <a class="tx-item--link" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><i class="far fa-link"></i></a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                         <?php endwhile; ?>

                    </div>

                </div>

                 <?php } $count++; endforeach; ?>

            </div>

        </div>

    </section>

    <!-- project end -->

    

    <?php endif; ?>

    <?php 

	}

}