<?php
/**
 * The template for displaying all pages
 *
 * @package GrowModo
 */

get_header(); ?>

<div class="container">
    <div class="content-area">
        <main class="site-content">

            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    $herosec = get_field('hero_section');
                    $ctagroup = get_field('cta_group');
                    ?>

                    <section class="hero_sec">
                        <div class="cntent">
                            <h1><?php echo $herosec["hero_title"] ?></h1>
                            <p class="minititle"><?php echo $herosec["hero_mini_title"] ?></p>
                            <div class="button_div">
                                <a href="<?php echo $herosec["button_1"]["link"] ?>"><button class="b1">
                                        <?php echo $herosec["button_1"]["label"] ?>
                                    </button>
                                </a>
                                <a href="<?php echo $herosec["button_2"]["link"] ?>"><button class="b2">
                                        <?php echo $herosec["button_2"]["label"] ?>
                                    </button>
                                </a>
                            </div>
                            <div class="kpi_sec">
                                <div class="kpi_itms">
                                    <p class="value"><?php echo $herosec["kpi"]["kpi1"]["value"] ?></p>
                                    <p class="desc"><?php echo $herosec["kpi"]["kpi1"]["desc"] ?></p>
                                </div>
                                <div class="kpi_itms">
                                    <p class="value"><?php echo $herosec["kpi"]["kp2"]["value"] ?></p>
                                    <p class="desc"><?php echo $herosec["kpi"]["kp2"]["desc"] ?></p>
                                </div>
                                <div class="kpi_itms">
                                    <p class="value"><?php echo $herosec["kpi"]["kpi3"]["value"] ?></p>
                                    <p class="desc"><?php echo $herosec["kpi"]["kpi3"]["desc"] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="iconcircle">
                            <img src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Sub-Container.png" />
                        </div>
                        <div class="img_div">
                            <img src="<?php echo $herosec["hero_image"]["url"] ?>" />
                        </div>
                    </section>
                    <section class="cta_group">
                        <a hre="<?php echo $ctagroup["cta1"]["link"] ?>">
                            <img class="arrow" src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Icon.png" />
                            <div class="cta_box">
                                <img class="icon" src="<?php echo $ctagroup["cta1"]["image"]["url"] ?>" />
                                <p class="cta_desc"><?php echo $ctagroup["cta1"]["desc"] ?></p>
                            </div>
                        </a>
                        <a hre="<?php echo $ctagroup["cta2"]["link"] ?>">
                            <img class="arrow" src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Icon.png" />
                            <div class="cta_box">
                                <img class="icon" src="<?php echo $ctagroup["cta2"]["image"]["url"] ?>" />
                                <p class="cta_desc"><?php echo $ctagroup["cta2"]["desc"] ?></p>
                            </div>
                        </a>
                        <a hre="<?php echo $ctagroup["cta3"]["link"] ?>">
                            <img class="arrow" src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Icon.png" />
                            <div class="cta_box">
                                <img class="icon" src="<?php echo $ctagroup["cta3"]["image"]["url"] ?>" />
                                <p class="cta_desc"><?php echo $ctagroup["cta3"]["desc"] ?></p>
                            </div>
                        </a>
                        <a hre="<?php echo $ctagroup["cta4"]["link"] ?>">
                            <img class="arrow" src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Icon.png" />
                            <div class="cta_box">
                                <img class="icon" src="<?php echo $ctagroup["cta4"]["image"]["url"] ?>" />
                                <p class="cta_desc"><?php echo $ctagroup["cta4"]["desc"] ?></p>
                            </div>
                        </a>
                    </section>
                    <?php
                    $args = array(
                        'post_type' => 'property',   // your custom post type
                        'posts_per_page' => -1,           // get all properties (use a number if you want to limit)
                        'orderby' => 'date',       // order by publish date
                        'order' => 'DESC'
                    );

                    $property_query = new WP_Query($args);

                    if ($property_query->have_posts()): ?>
                        <section class="prop_collection">
                            <img src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Abstract-Design.png" class="icn" />
                            <h3>Featured Properties</h3>
                            <div class="text_and_b">
                                <p class="opening">Explore our handpicked selection of featured properties. Each listing offers a
                                    glimpse into exceptional homes and investments available through Estatein. Click "View Details"
                                    for more information.</p>
                                <a><button class="view">View All Properties</button></a>
                            </div>

                            <div class="repeater_property">
                                <div class="slider_prop">
                                    <?php while ($property_query->have_posts()) : $property_query->the_post(); 
                                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                        $facilities = get_field('facilities');
                                    ?>
                                    
                                    <div class="slide_prop">
                                        <img src="<?php echo $image_url?>"
                                            class="thumb" />
                                        <p class="title"><?php the_title(); ?></p>
                                        <p class="desc"><?php the_excerpt(); ?>
                                        </p>
                                        <div class="facility">
                                            <div class="items_f bedroom">
                                                <?php echo $facilities["bedroom"]?>-Bedroom
                                            </div>
                                            <div class="items_f bathroom">
                                                <?php echo $facilities["bathroom"]?>-Bathroom
                                            </div>
                                            <div class="items_f type">
                                                 <?php echo $facilities["typetype"]?>
                                            </div>
                                        </div>
                                        <div class="price_c">
                                            <div class="p_box">
                                                <p>Price</p>
                                                <p class="value"><?php echo $facilities["price"]?></p>
                                            </div>
                                            <a><button class="p_button">View Property Details</button></a>
                                        </div>
                                    </div>
                                     <?php endwhile; ?>
                                </div>
                                <div class="slider_footer">
                                    <!-- <div class="quote"> 01of60</div> -->
                                    <div class="navigation">
                                        <img src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Icon-1.png"
                                            class="prevs" />
                                        <img src="https://estatein.bayubhuana.com/wp-content/uploads/2025/09/Icon-1.png" class="nexts" />
                                    </div>
                                </div>
                                
                            </div>
                        </section>
                    <?php else: ?>
                        
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                    <?php

                endwhile;
            else:
                ?>
                <p><?php esc_html_e('Sorry, no content found.', 'growmodo'); ?></p>
            <?php endif; ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>