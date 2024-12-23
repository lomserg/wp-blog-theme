<?php get_header('single'); ?>
<section class="blog-section blog-section-bg">
    <div class="breadcrumb">
        <nav class="container">
            <ul>

                <?php custom_breadcrumbs(); ?>

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
                            <div class="blog-img-frame">
                                <?php 
$image = get_field('image1');
if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="info">
                                <ul class="blog-list">
                                    <li>Date:<span>&nbsp; January 11, 2015 </span></li>
                                </ul>
                            </div>
                            <div class="content">
                                <?php the_content( ) ?>
                                <p> <?php the_field('model');?></p>
                            </div>
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