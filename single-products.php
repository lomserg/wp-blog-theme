<?php get_header(); ?>
<section class="blog-section blog-section-bg">
    <?php
global $post;
$parent_permalink = get_permalink( $post->post_parent );
?>
    <?php echo $parent_permalink; ?>
    <!--./Blog-breadcrumb-->
    <!--  -->
    <div class="blog-wrapper">
        <!------ BEGIN BLOG WRAPPER ------>
        <div class="container">
            <div class="row">
                <div class="blog-list clearfix">
                    <!-- BLOG CONTENT -->
                    <div class="col-md-9">
                        <div class="content">
                            <?php the_content( ) ?>
                        </div>
                        <div class="blog-content mt-5">
                            <div class="blog-img-frame ">
                                <?php the_post_thumbnail( ); ?>
                            </div>


                        </div>
                        <!-- tabs -->
                        <div class="tab__container">
                            <div class="tab__box">
                                <button class="tab__btn">Описание</button>
                                <button class="tab__btn">Характеристики</button>
                                <button class="tab__btn">Документы</button>
                                <div class="line"></div>
                            </div>
                            <div class="content__box">


                                <div class="content_tab active">
                                    <?php
                                        // Example for retrieving custom field 'speed_gbps'
                                        $description = get_field('description');
                                        echo $description;
                                        ?>
                                </div>
                                <div class="content_tab">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Характеристика</th>
                                                <th>Значение</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Пропускная способность</td>
                                                <td>8 Gbps</td>
                                            </tr>
                                            <tr>
                                                <td>Кол-во интерфейсов 1 GbE</td>
                                                <td>8</td>
                                            </tr>
                                            <tr>
                                                <td>Кол-во интерфейсов 1 GbE Fiber (SFP)</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>Кол-во интерфейсов Е1*</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>Система хранения</td>
                                                <td>500 Gb SSD</td>
                                            </tr>
                                            <tr>
                                                <td>Интерфейс управления</td>
                                                <td>RJ45</td>
                                            </tr>
                                            <tr>
                                                <td>Консольный порт</td>
                                                <td>RJ45</td>
                                            </tr>
                                            <tr>
                                                <td>Питание</td>
                                                <td>200W ATX 100-240 VAC, Optional -10-36 DC</td>
                                            </tr>
                                            <tr>
                                                <td>Охлаждение</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="content_tab">


                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae
                                        veritatis inventore quam autem repellat repellendus officiis
                                        expedita, nesciunt dolor quod debitis modi non. Praesentium eaque
                                        nisi fugiat cum, corporis voluptas dignissimos eum dicta, possimus
                                        molestiae tempore soluta fugit ipsam quo quam, molestias natus
                                        explicabo earum quia! Possimus, sapiente qui!
                                    </p>
                                </div>
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