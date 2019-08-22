<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
 
        <?php if( have_posts() ) : 
            
        //The WordPress Loop: loads post content 
            while( have_posts() ) :
                the_post(); ?>
            
            <h2 class="page-title screen-reader-text"><?php the_title(); ?></h2>
            <?php the_post_thumbnail('medium_large'); ?>
            <?php
            echo wp_trim_words( get_the_content(), 50, '...' );
            ?>
            <a href="<?php the_permalink(); ?>" class="journal-button">Read More &rarr;</a>
            
            <!-- Loop ends -->
            <?php endwhile;?>
            
        <!-- loop for grabbing featured images -->

        <?php else : ?>
                <p>No posts found</p>
        <?php endif;?>

    </main>
</div>

<?php get_sidebar();?>

<?php get_footer();?>