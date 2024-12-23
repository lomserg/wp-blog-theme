<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wayup
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>
    <header class="page-header">
        <h1 class="page-title">Products Archive</h1>
    </header>
    <div class="products-listing">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="product-item">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php the_posts_navigation(); ?>
    <?php else : ?>
    <p><?php esc_html_e( 'No products found.', 'text-domain' ); ?></p>
    <?php endif; ?>


</main><!-- #main -->

<?php
get_footer();