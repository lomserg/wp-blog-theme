<div class="sidebar-menu">
    <?php
    if (is_singular('product')) {
        // Display the product sidebar
        dynamic_sidebar('smartslider_area_1');
        
    } else {
        // Display the default blog sidebar if not a product page
        dynamic_sidebar('blog-sidebar');
    }
    ?>
</div>