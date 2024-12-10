<?php



namespace buildexo\Includes\Classes;





/**

 * Header and Enqueue class

 */

class OptionsCodeStar

{



	public static $instance;



	/**

	 * Set this value for theme options key

	 *

	 * @var string

	 */

	private $opt_name = 'turner' . '_options';



	private $menu_title = '';



	private $page_title = '';



	private $menu_type = 'submenu';



	private $page_slug = 'turner' . '_options';



	private $customizer = true;



	private $admin_bar_icon = 'dashicons-portfolio';



	private $page_parent = 'themes.php';



	private $menu_icon = 'dashicons-settings';



	private $docs_link = 'https://docs.thegenious.com';



	private $google_api_key = '';



	function init()

	{



		if (!class_exists('CSF')) {

			return;

		}



		$this->menu_title = esc_html__('TURNESFR Options', 'buildexo');

		$this->page_title = esc_html__('TURNESFR Options', 'buildexo');



		$this->args();



		$this->sections();

	}



	public static function instance()

	{



		if (is_null(self::$instance)) {

			self::$instance = new self();

		}



		return self::$instance;

	}



	/**

	 * [args description]

	 *

	 * @return [type] [description]

	 */

	function args()

	{

		$theme = wp_get_theme();



		\CSF::createOptions($this->opt_name, array(

			'menu_title' => $this->menu_title,

			'menu_slug'  => $this->page_slug,

			'framework_title'	=> $theme->get('Name') . ' <small>v' . $theme->get('Version') . '</small>',

			'menu_type'	=> $this->menu_type, // menu or submenu

			'menu_parent'	=> $this->page_parent, // Slug name for the parent menu (or the file name of a standard WordPress admin page). for eg. themes.php plugins.php options-general.php tools.php Note: menu_type must be submenu

			'menu_capability'	=> 'manage_options',

			'menu_icon'	=> $this->menu_icon, // URL to the icon to be used for this menu. for eg. "dashicons-chart-pie"

			'menu_position'	=> 100, // Position in the menu.

			'menu_hidden'	=> false, // Flag to display menu in the admin panel.

			'show_bar_menu'	=> true, // Flag to display menu in the admin bar.

			'show_sub_menu'	=> false, // Flag to display sub menus in the admin bar.

			'show_in_network'	=> false, //

			'show_in_customizer'	=> true, //

			'show_search'	=> true, // Flag to display search of the framework.

			'show_reset_all'	=> true, // Flag to display reset button of the framework.

			'show_reset_section'	=> true, // Flag to display reset section button of the framework.

			'show_all_options'	=> true, // Flag to display show all options of the framework.

			'show_form_warning'	=> true, // Flag to display "form warning" when changed any option of the framework.

			'sticky_header'	=> true, // Flag to display sticky header feature of the framework.

			'save_defaults'	=> true, // Flag to save to default values of the framework.

			'ajax_save'	=> true, // Flag to enable ajax save feature of the fr

			'footer_text'	=> '', // Text to display in the footer of the framework.

			'footer_after'	=> '', // Content to display after of the framework footer.

			'footer_credit' => '', // ext to display in footer of the framework.

			'database'	=> 'option', // Database save data type. for eg. option theme_mod transient network

			'transient_time'	=> 0, // The time until expiration in seconds from now, or 0 for never expires. If used database as transient.

			'contextual_help'	=> array(), // Contextual helps of the framework.

			'contextual_help_sidebar'	=> '', // Contextual sidebar help of the framework.

			'enqueue_webfont'	=> true, // Flag to load web fonts of the framework.

			'async_webfont'	=> false, // Flag to load google fonts with async method of the framework.

			'output_css'	=> false, // Flag to load output css of the framework.

			'nav'	=> '', // The nav style of the framework. for eg. normal - inline

			'theme' => 'light', // he theme of the framework. for eg. dark - light

			'class' => '', // Extra CSS classes (space separated) to append to the main framework wrapper.

			'defaults'	=> array(), // Sets all default values from a external array. (optional)

		));

	}





	function sections()
	{



		$sections = array(

			'general_setting',
			'color_scheme_setting',
			'typography_setting',

			'logo_setting',

			'headers_setting',

			'headers_sidebar_setting',

			'footer_setting',

			'blog_setting',

			'tag_setting',

			'archive_setting',

			'author_setting',

			'category_setting',

			'search_setting',

			'404_setting',

			'single_post_setting',

			'sidebar_setting',

			'social_setting',

			'body_font_setting',

			'backup'

		);





		$sections_path = array();



		// Set the path for options.

		foreach ($sections as $sec) {

			$sections_path[$sec] = get_template_directory() . '/includes/resource/options/' . $sec . '.php';

		}



		$sections_path = apply_filters('turner_codestar_sections', $sections_path);



		$count = 1;





		foreach ($sections_path as $key => $file) {



			if (file_exists($file)) {



				$options = include($file);



				// $options['priority'] = $count;



				$options = apply_filters("turner_codestar_sections_{$key}", $options);



				\CSF::createSection($this->opt_name, $options);

			}



			$count++;

		}

	}

}
