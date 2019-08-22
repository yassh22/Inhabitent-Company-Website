<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

        <?php if( have_posts() ) :
        // echo '<i class="fab fa-android"></i>';
            
        //The WordPress Loop: loads post content 
            while( have_posts() ) :
                the_post(); ?>
            
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
            
            <!-- Loop ends -->
            <?php endwhile;?>
            <?php the_post_thumbnail('large'); ?>
            <?php the_posts_navigation();?>

        <?php else : ?>
                <p>No posts found</p>
        <?php endif;?>

    </main><!-- #main -->
</div><!-- #primary -->


<?php get_sidebar();?>
<?php get_footer();?>