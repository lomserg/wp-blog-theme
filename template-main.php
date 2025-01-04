<?php 
/**
 * Template name: main
 */
?>


<?php get_header('main') ?>
<!-- Header Section Bottom -->
<section id="contact_header">
    <div class="container">
        <div class="row section_padding">
            <div class="col-md-3 col-sm-3 small_screen">
                <p>Are you looking for</p> <!-- Change text -->
                <p><span>Техническая поддержка и обучение
                    </span></p><!-- Change text -->
            </div>
            <div class="col-md-3 col-sm-3 small_screen">
                <p>Call or email me</p><!-- Change text -->
                <p><span>8 лет на рынке</span></p><!-- Change text -->
            </div>
            <div class="col-md-3 col-sm-3 small_screen">
                <p>Call me</p><!-- Change text -->
                <p><span>Российский програмный код</span></p><!-- Change text -->
            </div>
            <div class="col-md-3 col-sm-3 small_screen">
                <p></p><!-- Change text -->
                <p><span>ТОРП и КИИ</span></p><!-- Change text -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- Contact Form 7 Shortcode -->
<div class="contact-form-wrapper">
</div><!-- END Section Bottom -->

<!-- Section About -->
<?php
// echo do_shortcode('[smartslider3 slider="1"]');
?>




<!-- Section Blog -->
<section id="blog">
    <div class="blog-section">
        <div class="container">
            <!-- Title -->
            <div class="section_header">
                <h2>Новости</h2>
            </div>
            <!-- End Title -->
            <div class="row">
                <?php 
     // Use WP_Query to fetch the latest 2 posts
     $args = array(
         'post_type' => 'post', // Query for posts
         'posts_per_page' => 2, // Number of posts to show
         'suppress_filters' => true // Avoid filtering by plugins or themes
     );
 
     $query = new WP_Query($args); // Custom query
 
     // Start the loop to display posts
     if ($query->have_posts()) :
         while ($query->have_posts()) : $query->the_post(); 
     ?>
                <div class="col-md-6 col-sm-6">
                    <div class="blog_block">
                        <div class="blog-img-frame">
                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                <!-- Display the post's featured image if it exists -->
                                <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                <img src="<?php echo B_IMG_DIR; ?>img-1.jpg" alt="default-image">
                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- ./blog-img-frame -->

                        <div class="brief-content">
                            <h4 class="brief-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="brief-date"><?php the_author(); ?> - <?php the_date(); ?></p>
                            <p class="brief"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                            <div class="blog-buttons">
                                <a href="<?php the_permalink(); ?>">Подробнее<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- ./brief-content -->
                    </div>
                    <!-- /.blog_block -->
                </div>
                <?php 
         endwhile;
         wp_reset_postdata(); // Reset the post data after the custom query
     else : 
     ?>
                <p>No posts found.</p>
                <?php endif; ?>
            </div>

            <div class="blog_read_more">
                <a href="http://localhost/wp-sandbox/blog/">read more</a>
            </div>
            <!--.row-->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.blog-section -->
</section>
<!-- END Section Blog -->
<?php get_footer(); ?>