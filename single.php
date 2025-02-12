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
                    <div class="col-md-9">
                        <div class="blog-content">
                            <div class="blog-img-frame">
                                <?php the_post_thumbnail(array(1024, 576) ); ?>
                            </div>
                            <div class="info">
                                <ul class="blog-list">
                                    <li>Дата:<span>&nbsp; January 11, 2015 </span></li>
                                </ul>
                            </div>
                            <div class="content">
                                <?php the_content( ) ?>
                            </div>
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
</section>

<?php get_footer(); ?>