<?php get_header('category'); ?>

<section class="blog-section blog-section-bg">
    <div class="breadcrumb">
        <nav class="container">
            <ul>
                <?php custom_breadcrumbs(); ?>
            </ul>
        </nav>
    </div>
    <!--./Blog-breadcrumb-->
    <div class="blog-wrapper">
        <!-- BEGIN BLOG WRAPPER -->
        <div class="container">
            <div class="row">
                <div class="blog-list clearfix">
                    <!-- BLOG CONTENT -->
                    <div class="col-md-9">
                        <!-- BEGIN BLOG CONTENT -->
                        <div class="blog-content">
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="col-md-6 col-sm-6">
                                <div class="content-box">
                                    <div class="blog-img-frame">
                                        <a class="blog-img" href="<?php the_permalink(); ?>">
                                            <?php 
                                                    // Display the post's featured image with specific dimensions
                                                    the_post_thumbnail(array(371, 288)); 
                                                    ?>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="<?php the_permalink(); ?>">
                                            <h4 class="blog-text-uppercase"><?php the_title(); ?></h4>
                                        </a>
                                        <p class="block-date"><?php the_author(); ?> -
                                            <?php echo get_the_date('n-j-Y'); ?></p>
                                        <p><?php the_excerpt(); ?></p>
                                        <div class="blog-buttons">
                                            <a href="<?php the_permalink(); ?>">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>

                            <!-- Pagination -->
                            <div class="pagination">
                                <?php 
                                    // Default pagination
                                    echo paginate_links(array(
                                        'total' => $wp_query->max_num_pages, // Use the main query for pagination
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
                    </div>
                    <!-- BLOG SIDEBAR -->
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>