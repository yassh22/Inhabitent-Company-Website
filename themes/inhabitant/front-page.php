<?php get_header(); ?>

<div class='homeLogo'>
    <img src="<?php echo get_template_directory_uri().'/images/logos/inhabitent-logo-full.svg'; ?>" class="bigLogo" alt="Inhabitent logo" />
</div>

<h1>Shop Stuff</h1>

<?php
  $terms = get_terms ( array(
    'taxonomy' => 'product-type',
    'hide_empty' => 0,
  ));?>

<div class="shopGrid">
    <?php foreach ( $terms as $term ) :
    ?>
    <div class = "shopContainer">
        <img class="shopLogos" src = "<?php echo get_template_directory_uri() . '/images/product-type-icons/' . $term->slug; ?>.svg" alt = "<?php echo $term->name; ?>"/>    <p><?php echo $term->description; ?></p>
        <p>
            <a href = "<?php echo get_term_link( $term ); ?>" class="CatBtn"><?php echo $term->name; ?> Stuff</a>
        </p>
    </div>
    <?php endforeach; ?>
</div>
   
<div class="homeJournal">
    <h1>Inhabitent Journal</h1> 
    <div class = "journalGrid">

        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'order' => 'DESC'
        );

        $posts = get_posts($args);

        foreach($posts as $post) :
            setup_postdata($post);
            ?>

            <div class="jorChildren">
                <div class='image'> <?php the_post_thumbnail('medium'); ?> </div>
                <p><?php the_time('j F, Y'); ?> / <?php comments_number(); ?></p>
                <h3><a href="<?php the_permalink(); ?>"></a><?php the_title();?></h3>   
                <a class= "click" href="<?php the_permalink(); ?>">Read Entry</a>
            </div>

        <?php
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer();?>