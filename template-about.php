<?php 
/**
 * Template name: about
 */
?>
<?php
/**
 * Template name: About
 */

// Get the page title
the_title();

// Custom query to fetch posts (optional, if you need specific posts)
$args = array(
    'post_type' => 'post',  // Query only posts
    'posts_per_page' => 3    // Limit number of posts to 5, adjust as needed
);

$query = new WP_Query($args); // Start the query

// Start the loop for the queried posts
if ($query->have_posts()) : 
    while ($query->have_posts()) : 
        $query->the_post();  // Set up the post data
        get_template_part('partials/content'); // Load the content template part
    endwhile;
else :
    echo '<p>No posts found.</p>'; // Optional: If no posts are found
endif;

// Reset post data after custom query (important)
wp_reset_postdata();
?>