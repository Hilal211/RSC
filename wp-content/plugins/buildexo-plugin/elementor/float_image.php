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
class Float_Image extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'turner_float_image';
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
		return esc_html__( 'Turner Float Image', 'turner' );
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
		return 'eicon-image';
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
			'float_image',
			[
				'label' => esc_html__( 'Float Image', 'turner' ),
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
					'5' => esc_html__( 'Style Five ', 'turner'),
					'6' => esc_html__( 'Style Six ', 'turner'),
					'7' => esc_html__( 'Style Seven ', 'turner'),
					'8' => esc_html__( 'Style Eight ', 'turner'),
					'9' => esc_html__( 'Style Nine ', 'turner'),
					'10' => esc_html__( 'Style Ten ', 'turner'),
					'11' => esc_html__( 'Style Eleven ', 'turner'),
					'12' => esc_html__( 'Style Twelve ', 'turner'),
					'13' => esc_html__( 'Style Threeteen ', 'turner'),
				),
			]
		);
		
		$this->add_control(
			'image1',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,
				'condition' => [ 'layout_control' => ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'], ],						
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'exp_sub_title',
			[
				'label'       => __( 'Sub Title', 'turner' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [ 'layout_control' => ['7', '9', '13'], ],	
				'placeholder' => __( 'Enter your Sub Title', 'turner' ),
			]
		);
		$this->add_control(
			'exp_title',
			[
				'label'       => __( 'Title', 'turner' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [ 'layout_control' => ['3', '7', '9', '13'], ],	
				'placeholder' => __( 'Enter your Title', 'turner' ),
			]
		);
		
		$this->add_control(
			'exp_value',
			[
				'label'       => __( 'Experience Value', 'turner' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [ 'layout_control' => ['3', '7', '9', '13'], ],	
				'placeholder' => __( 'Enter your Experience Value', 'turner' ),
			]
		);
				
		$this->add_control(
			'btn_title',
			[
				'label' => esc_html__( 'Button Title', 'turner' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [ 'layout_control' => '7', ],	
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Button Title', 'turner' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__('External Url', 'turner'),
				'label_block' => true,
				'condition' => [ 'layout_control' => ['7', '8'], ],	
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		
		$this->add_control(
			'image2',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,
				'condition' => [ 'layout_control' => ['1', '2', '6', '8', '10', '12'], ],								
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'image3',
			[
				'label' => esc_html__('Choose Image ', 'turner'),							
				'type' => Controls_Manager::MEDIA,
				'condition' => [ 'layout_control' => ['1', '6'], ],								
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
		
	?>
    
    

    <?php if($settings['layout_control'] == '12') :?>
	
    <?php if($settings['image1']['id'] || $settings['image2']['id']) { ?>    
    <div class="appointment__img pos-rel">
        <?php if($settings['image1']['id']) { ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"><?php } ?>
        <?php if($settings['image2']['id']) { ?>
        <div class="appointment__inner-img">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
    </div>
    <?php } ?>

	<?php elseif($settings['layout_control'] == '13') :?>
	
    <?php if($settings['image1']['id'] || $settings['image2']['id']) { ?>    
		<div class="tur-about-img-counter position-relative wow slideInLeft"  data-wow-delay="00ms" data-wow-duration="1500ms">
		<?php if($settings['image1']['id']) { ?>
			<div class="tur-about-img">			
				<img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
			</div> 			
			<?php } ?>
			<div class="tur-about-exp-counter d-flex text-uppercase">
				<h2><span class="counter"><?php echo wp_kses($settings['exp_value'], true ); ?></span><sup>+</sup></h2>
				<div class="exp-text">
					<span><?php echo wp_kses($settings['exp_sub_title'], true ); ?></span>
					<h3><?php echo wp_kses($settings['exp_title'], true ); ?></h3>
				</div>
			</div>
		</div>
    <?php } ?>
    
	
    <?php elseif($settings['layout_control'] == '11') :?>
	
    <?php if($settings['image1']['id']) { ?>
    <div class="contact-img-left">
        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
    </div>
    <?php } ?>
	
	<?php elseif($settings['layout_control'] == '10') :?>
	
    <div class="faq-img pos-rel">
        <?php if($settings['image1']['id']) { ?>
        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        <?php } ?>
        <?php if($settings['image2']['id']) { ?>
        <div class="faq-img__inner">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
    </div>
    
	<?php elseif($settings['layout_control'] == '9') :?>
	
    <div class="about__banner-img">
        <?php if($settings['image1']['id']) { ?>
        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        <?php } ?>
        <div class="about__experience ul_li">
            <h2><?php echo wp_kses($settings['exp_value'], true ); ?></h2>
            <div class="content">
                <span><?php echo wp_kses($settings['exp_sub_title'], true ); ?></span>
                <h3><?php echo wp_kses($settings['exp_title'], true ); ?></h3>
            </div>
        </div>
    </div>
    
	<?php elseif($settings['layout_control'] == '8') :?>
	
    <div class="faq-img pos-rel">
        <?php if($settings['image1']['id']) { ?>
        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"><?php } ?>
        <?php if($settings['btn_link']['url']) { ?>
        <a class="feature-tab__video popup-video" href="<?php echo esc_url($settings['btn_link']['url']);?>"><i class="fas fa-play"></i><span><img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"></span></a>
    	<?php } ?>
    </div>
        
	<?php elseif($settings['layout_control'] == '7') :?>
	
    <div class="feature-content">
        <div class="feature-price d-flex align-items-center mb-40">
            <?php if($settings['image1']['id']) { ?>
            <div class="feature-price__img">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
            </div>
            <?php } ?>
            <div class="feature-price__holder">
                <h3><?php echo wp_kses($settings['exp_sub_title'], true ); ?></h3>
                <span><?php echo wp_kses($settings['exp_title'], true ); ?></span>
                <h2><?php echo wp_kses($settings['exp_value'], true ); ?></h2>
                <span class="interest"></span>
                <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], true ); ?><i class="far fa-chevron-double-right"></i></a>
            </div>
        </div>
    </div>
    
	<?php elseif($settings['layout_control'] == '6') :?>
    
    <div class="about-img__inner pos-rel">
        <?php if($settings['image1']['id']) { ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>"><?php } ?>
        <?php if($settings['image2']['id']) { ?>
        <div class="about-img about-img--one">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
        <?php if($settings['image3']['id']) { ?>
        <div class="about-img about-img--two">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
    </div>
    
	<?php elseif($settings['layout_control'] == '5') :?>
    
    <?php if($settings['image1']['id']) { ?>
    <div class="contact__img">
        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
    </div>
    <?php } ?>
    
	<?php elseif($settings['layout_control'] == '4') :?>
    
    <?php if($settings['image1']['id']) { ?>
    <div class="about__img">
    	<img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
  	</div>
    <?php } ?>
    
	<?php elseif($settings['layout_control'] == '3') :?>
    
    <div class="cta__img">
        <?php if($settings['image1']['id']) { ?>
        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        <?php } ?>
        <?php if($settings['exp_value'] || $settings['exp_title']) { ?>
        <div class="cta__experience">
            <div class="cta__experience-inner ul_li">
                <?php if($settings['exp_value']) { ?><h2 class="number"><?php echo wp_kses($settings['exp_value'], true ); ?></h2><?php } ?>
                <?php if($settings['exp_title']) { ?>
                <div class="content">
                    <?php echo wp_kses($settings['exp_title'], true ); ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
    
    <?php elseif($settings['layout_control'] == '2') :?>    
    
    <div class="faq__img d-flex">
        <?php if($settings['image1']['id']) { ?>
        <div class="image">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
        <?php if($settings['image2']['id']) { ?>
        <div class="image">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
    </div>
    
    
    <?php else: ?>
    
    <div class="feature__img">
        <?php if($settings['image1']['id']) { ?>
        <div class="image image--1">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image1']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
        <?php if($settings['image2']['id']) { ?>
        <div class="image image--2">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
        <?php if($settings['image3']['id']) { ?>
        <div class="image image--3">
            <img src="<?php echo esc_url(wp_get_attachment_url($settings['image3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image','turner');?>">
        </div>
        <?php } ?>
    </div>
        
    <?php endif;
	}
}