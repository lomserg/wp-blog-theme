<?php get_header('page') ?>

<section class="blog-section blog-section-bg">

    <div class="breadcrumb">
        <nav class="container">
            <ul>
                <li><a href="index.html">home</a></li>
                <li class="active">blog</li>
            </ul>
        </nav>
    </div>
    <!--./Blog-breadcrumb-->
    <!--  -->
    <div class="blog-wrapper">
        <!------ BEGIN BLOG WRAPPER ------>
        <div class="container">
            <div class="row">
                <div class="blog-list clearfix">
                    <!-- BLOG CONTENT -->
                    <div class="col-md-9">
                        <div class="blog-content">
                            <?php
                            $query_args = array(
                            'posts_per_page' => 4,
                                'paged' => get_query_var('paged') ?: 1
                            );
                            ?>
                            <?php wp_reset_query();
                            $query = new WP_Query($query_args); ?>

                            <?php if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post(); ?>

                            <div class="col-md-6 col-sm-6">
                                <div class="content-box">
                                    <div class="blog-img-frame">
                                        <a class="blog-img" href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(array(371, 288), ); ?>
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
                                            <a href="<?php the_permalink(); ?>">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php        } ?>
                            <!-- PGINATION -->
                            <div class="col-md-12">
                                <?php 
                               the_posts_pagination(array(
                                'show_all'     => false, // Show all pages
                                'prev_next'    => true,  // Show next/prev
                                'prev_text'    => 'Back',
                                'next_text'    => 'Next',
                                'type'          => 'list', // Display as list
                                'class'         => 'box-pagination', // Custom class for pagination
                            ));
                              ?>

                            </div>
                            <?php the_posts_pagination(); ?>

                            <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
                            <?php    } ?>


                            <!-- PAGE NUMBER -->
                            <!-- <div class="col-md-12">
                                <nav class="box-pagination text-center">
                                    <ul class="blog-pagination">
                                        <li class="back arrow"><a href="#">back</a></li>
                                        <li class="active">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">6</a></li>
                                        <li class="next arrow"><a href="#">next</a></li>
                                    </ul>
                                </nav>
                            </div> -->
                        </div>
                    </div>
                    <!-- BLOG SIDEBAR -->
                    <div class="col-md-3">
                        <?php get_sidebar() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ END BLOG WRAPPER ------>
    </div>
    <!-- / -->
</section>
<!--./content-->

<?php get_footer() ?>