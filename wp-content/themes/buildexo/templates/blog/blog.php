<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage TURNER
 * @author     ThemeXriver
 * @version    1.0
 */

if ( class_exists( 'Turner_Resizer' ) ) {
	$img_obj = new Turner_Resizer();
} else {
	$img_obj = array();
}
$allowed_tags = wp_kses_allowed_html('post');
global $post;
$link = get_permalink( $post->ID );
?>
<div <?php post_class(); ?>>

    <article class="blog__post-item format-standard">
        <?php if( has_post_thumbnail() ){?>
        <div class="post-thumb">
            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('full'); ?></a>
        </div>
        <?php };?>
        <div class="post-content">
            <div class="post-meta mb-20">
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><i class="far fa-user"></i><?php esc_html_e('By ', 'buildexo'); ?> <?php the_author(); ?></a>
                <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><i class="far fa-calendar"></i><?php echo get_the_date( ); ?></a>
            </div>
            <h2 class="post-title border-effect"><a href="<?php echo esc_url( $link );?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
            <a class="post-btn" href="<?php echo esc_url( $link );?>"><?php esc_html_e('Read More', 'buildexo'); ?><i class="far fa-long-arrow-right"></i></a>
        </div>
    </article>
    <?php

    ?>

</div>