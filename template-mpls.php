<?php 
/**
 * Template name: mpls
 */
?>
<?php get_header(); ?>

<!-- <p class="container mt-5">Продукция компании широко востребована в сетях операторского класса, крупных корпоративных
    сетях, а
    также
    разветвлённых ведомственных сетях государственных органов. Все продукты компании имеются у нее в виде полных
    исходных кодов, права на которые принадлежат ООО «РДП Инновации» и защищены законодательством РФ.
</p> -->




<main id="primary" class="site-main container">
    <h1 class="page-title">Каталог продуктов</h1>
    <p>Производительность EcoRouter обеспечивает полосу пропускания трафика до 400 Гбит/с на 1 RU и позволяет работать с
        большими таблицами маршрутизации (до 5 миллионов маршрутов в FIB).</p>
    <br>
    <section class="typ">
        <h3>Младшие модели</h3>
        <?php
        // Custom query to show all products
        $args = array(
            'post_type'      => 'products',
            'posts_per_page' => -1,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_category',
                    'field'    => 'slug',
                    'terms'    => array('small', 'mpls'), // Add multiple category slugs here
                    'operator' => 'AND', // Default is 'IN', retrieves posts that match any of the terms
                ),
            ),
        );
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
                    <div class="product__img-wrapper"
                        style="background-image: url('<?php echo get_field('image1'); ?>');">
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
    <section class="typ">
        <h3>Старшие модели</h3>
        <?php
        // Custom query to show all products
        $args = array(
            'post_type'      => 'products',
            'posts_per_page' => -1,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_category',
                    'field'    => 'slug',
                    'terms'    => array('big', 'mpls'), // Add multiple category slugs here
                    'operator' => 'AND', // Default is 'IN', retrieves posts that match any of the terms
                ),
            ),
        );
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
                    <div class="product__img-wrapper"
                        style="background-image: url('<?php echo get_field('image1'); ?>');">
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
    <section class="mt-5">
        <h3>Маршрутизаторы серии EcoRouter поддерживают следующую функциональность:</h3>
        <ul>
            <li>IPv4 Unicast маршрутизация (Static, RIP, OSPFv2, IS-IS, MP-BGP)</li>
            <li>IPv4 Multicast маршрутизация (IGMPv1/v2/v3, PIM-DM/SM/SSM)</li>
            <li>Коммутация MPLS трафика</li>
            <li>Протоколы сигнализации MPLS меток LDP/Targeted LDP</li>
            <li>Организация MPLS L3 VPN</li>
            <li>Технология MPLS Pseudowire с поддержкой механизма Pseudowire Redundancy</li>
            <li>Поддержка VPLS (LDP-based)</li>
            <li>Гибкие механизмы манипуляции VLAN-тегами на Ethernet-интерфейсах (push/pop/swap)</li>
            <li>Работа в режиме DHCP Relay, DHCP Proxy</li>
            <li>Туннелирование трафика IP с использованием инкапсуляции GRE и IP-in-IP</li>
            <li>Протокол резервирования VRRP</li>
            <li>Иерархическая система обеспечения качества обслуживания H-QoS</li>
            <li>Функции безопасности (L3/L4 ACL, CoPP и др.)</li>
            <li>Управление по протоколам SSH и Telnet с возможностью аутентификации с использованием серверов TACACS+ и
                RADIUS</li>
            <li>Поддержка SNMP v1/2/3, SNMP Trap и Syslog для интеграции с системами мониторинга и сбора статистики</li>
            <li>Технология контейнерной виртуализации</li>
        </ul>


    </section>
</main>

<?php get_footer(); ?>