<?php 
/**
 * Template name: products
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="product__container">
        <h1 class="page-title">Каталог продуктов</h1>

        <?php
        // Custom query to show all products
        $args = [
            'post_type' => 'products',
            'posts_per_page' => -1, // Show all products (no limit)
            'orderby' => 'date', // Order by date (latest first)
            'order' => 'DESC' // Latest products first
        ];

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) : ?>
        <div class="products">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="product">
                <div class="product__wrapper" <?php
                            // Get the terms for the 'product_category' taxonomy
                            $terms = get_the_terms( $post->ID, 'product_category' );
                            if ( $terms && ! is_wp_error( $terms ) ) {
                                $term_names = wp_list_pluck( $terms, 'name' );
                                echo 'data-product="' . implode( ', ', $term_names ) . '"';
                            } else {
                                echo 'data-product="No categories assigned."';
                            }
                            ?>>

                    <div class="product__img-wrapper">
                        <img src=" <?php echo get_field('image1'); ?> " alt="" srcset="">
                    </div>

                    <div class="products__info-wrapper">
                        <h2 class="product__name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="product__feture">
                            <button class="product__feture-btn">
                                <?php
                                        // Get the terms for the 'product_category' taxonomy
                                        $terms = get_the_terms( $post->ID, 'product_category' );
                                        if ( $terms && ! is_wp_error( $terms ) ) {
                                            $term_names = wp_list_pluck( $terms, 'name' );
                                            echo implode( ', ', $term_names ); // Join category names with a comma separator
                                        } else {
                                            echo 'No categories assigned.'; // Fallback if no categories exist
                                        }
                                        ?>
                            </button>

                            <button class="product__feture-btn">
                                <?php
                                        // Example for retrieving custom field 'speed_gbps'
                                        $type_model = get_field('speed_gbps');
                                        echo $type_model;
                                        ?>
                            </button>
                        </div>
                        <p class="product__description">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                        <!-- Corrected href attribute -->
                        <a href="<?php the_permalink(); ?>" class="product__btn">Подробнее</a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>

        <?php else : ?>
        <p><?php esc_html_e( 'No products found.', 'text-domain' ); ?></p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </section>
</main>

<?php get_footer(); ?>