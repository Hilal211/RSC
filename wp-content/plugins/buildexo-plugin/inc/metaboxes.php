<?php

namespace TURNERPLUGIN\Inc;

class Metaboxes
{

    /**
     * Post metaboxes fields.
     * 
     * @var $posts
     */
    protected $posts = [
        'page.php',
        'projects.php',
		'careers.php',
        'service.php',
        'team.php',
        'testimonials.php',
    ];

    /**
     * Taxonomy metaboxes fields.
     * See example in inc/tax-metaboxes/example.php
     * 
     * @var $tax
     */
    protected $tax = [
        // 'example.php',
    ];

    /**
     * Taxonomy metaboxes fields.
     * See example in inc/tax-metaboxes/example.php
     * 
     * @var $tax
     */
    protected $widgets = [
        'yt-about-company.php',
		'yt-about-company-2.php',
		'yt-popular-posts.php',
		'yt-gallery-posts.php',
		'yt-about-company-3.php',
		'yt-contact-us.php',
		'yt-gallery-posts-2.php',
		'yt-recent-posts.php',
		'yt-call-to-action.php',		
    ];

    public function boot()
    {
        $this->post_metaboxes();
        $this->tax_metaboxes();
        $this->nav_fields();
        $this->user_fields();
        $this->widget_fields();
        $this->comment_fields();
    }

    /**
     * Register posts metaboxes using code start framework
     * 
     * @return void
     */
    private function post_metaboxes()
    {
        foreach ( $this->posts as $file ) {
			$this->load_file( TURNERPLUGIN_PLUGIN_PATH . '/inc/metaboxes/' . $file );
		}
    }

    /**
     * Register taxonomy metaboxes using code start framework
     * 
     * @return void
     */
    private function tax_metaboxes()
    {
        foreach ( $this->tax as $file ) {
			$this->load_file( TURNERPLUGIN_PLUGIN_PATH . '/inc/tax-metaboxes/' . $file );
		}
    }

    /**
     * Register nav menu fields using code start framework
     * 
     * @return void
     */
    private function nav_fields()
    {
        $this->load_file( TURNERPLUGIN_PLUGIN_PATH . '/inc/nav-fields.php' );
    }

    /**
     * Register user edit screen fields using code start framework
     * 
     * @return void
     */
    private function user_fields()
    {
        $this->load_file( TURNERPLUGIN_PLUGIN_PATH . '/inc/user-fields.php' );
    }

    /**
     * Register comment form fields using code start framework
     * 
     * @return void
     */
    private function comment_fields()
    {
        $this->load_file( TURNERPLUGIN_PLUGIN_PATH . '/inc/comment-fields.php' );
    }

    /**
     * Register WordPress widgets using code start framework
     * 
     * @return void
     */
    private function widget_fields()
    {
        foreach ( $this->widgets as $file ) {
			$this->load_file( TURNERPLUGIN_PLUGIN_PATH . '/inc/widgets/' . $file );
		}
    }

    /**
     * Check if file exists then load it.
     * 
     * @return void
     */
    protected function load_file($file) {
        if ( file_exists( $file ) ) {
            require $file;
        }
    }
}


(new Metaboxes)->boot();