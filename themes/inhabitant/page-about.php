<?php get_header(); ?>
  
<?php if( have_posts() ) :
// echo '<i class="fab fa-android"></i>';
    
// echo '<br><ol><li>Install Font-Awesome</li><li>Install Fonts using Transfonter</li></ol><br>';
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    
    <div class="backImage"><?php the_title(); ?></div>


    <?php the_content(); ?>
    
    <!-- Loop ends -->
    <?php endwhile;?>

    <?php the_posts_navigation();?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>