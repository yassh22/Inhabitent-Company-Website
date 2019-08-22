<?php

get_header(); ?>

<div id="primary" class="contentArea">
	<main id="main" class="siteMain" role="main">

        <h2 class="shopTitle">Shop Stuff</h2>

        <?php
            $terms = get_terms ( array(
                'taxonomy' => 'product-type',
                'hide_empty' => 0,
            ));
            if ( !empty($terms) ) :
        ?>

        <ul class="shopLinks">
        <?php foreach ( $terms as $term ) :		?>
        <li><a href = "<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <div class = "shopageGrid">
            <?php
            $args = array( 'post_type' => 'product', 'order' => 'DESC', 'posts_per_page' => 16);
            $product_posts = get_posts( $args ); // returns an array of posts
            ?>
            <?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>
            <div class="shopageItem">
            <?php /* Content from your array of post results goes here */ ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' );  ?></a>
                <div class="priceInfo">
                    <p class="productTitle"><?php the_title(); ?></p>
                    <p class="productDots">......................................</p>
                    <p> <?php echo CFS()->get( 'price' ); ?></p>
                </div>
            </div>
                <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </main><!-- #main -->
</div>


	
	



<?php get_footer(); ?>