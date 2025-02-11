<!-- Новости -->
<?php get_header(); ?>

<section class="blog-section blog-section-bg">
    <!--./Blog-breadcrumb-->
    <!--  -->
    <div class="blog-wrapper">
        <!------ BEGIN BLOG WRAPPER ------>
        <div class="container">
            <div class="row">
                <div class="blog-list clearfix">
                    <!-- BLOG CONTENT -->
                    <div class="blog__list-wrap">
                        <!------ BEGIN BLOG WRAPPER ------>
                        <div class="blog-content">
                            <?php
                                $args = array(
                                'post_type' => 'post', // Ensure it's querying posts
                                'posts_per_page' => 4, // Number of posts to show per page
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Get the current page
                                );
                                $query = new WP_Query($args);
                                ?>

                            <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="blog__item">
                                <div class="content-box">
                                    <div class="blog-img-frame">
                                        <a class="blog-img" href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(array(768, 432), ); ?>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="<?php the_permalink(); ?>">
                                            <h4 class="blog-text-uppercase"><?php the_title(); ?></h4>
                                        </a>
                                        <p class="block-date"><?php the_author(); ?> -
                                            <?php echo get_the_date('n-j-Y'); ?></p>

                                        <p><?php the_excerpt( );?></p>
                                        <div class="blog-buttons">
                                            <a href="<?php the_permalink(); ?>">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endwhile; ?>


                        </div>
                        <!-- Pagination -->
                        <div class="pagination">
                            <?php 
                                    echo paginate_links(array(
                                        'total' => $query->max_num_pages, // Total number of pages
                                        'prev_text' => 'Назад', // Text for the previous page link
                                        'next_text' => 'Далее', // Text for the next page link
                                        'mid_size' => 2, // Number of links to show around the current page number
                                        'end_size' => 1, // Number of links to show at the beginning and end of the pagination
                                        'class' => 'box-pagination'
                                    ));
                                    ?>
                        </div>

                        <?php else : ?>
                        <p>No posts found.</p>
                        <?php endif; ?>
                    </div>
                    <!-- BLOG SIDEBAR -->
                    <div class="col-md-3">
                        <?php get_sidebar() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>