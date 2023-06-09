<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/jeden-krok-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Jeden krok</h1>
        <h2 class="headline headline--medium">Zrób dziś jeden krok w stronę zmiany!</h2>
        <h3 class="headline headline--small">Zobacz, jaki <strong>warsztat</strong> może być dla Ciebie pomocny?</h3>
        <a href="<?php echo get_post_type_archive_link('workshop')?>" class="btn btn--large btn--blue">Znajdź warsztat dla siebie!</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Nadchodzące wydarzenia</h2>
            <?php
            $today = date('Ymd');
            $homeEvents = new WP_Query(array(
               'posts_per_page' => 2,
               'post_type' => 'event',
               'orderby' => 'meta_value_num',
               'meta_key' => 'event_date',
               'order' => 'ASC',
               'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    )
               )
            ));

            while ($homeEvents->have_posts()) {
                $homeEvents->the_post();
                get_template_part('template-parts/content-event');
            } wp_reset_postdata();
            ?>


            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">Zobacz więcej wydarzeń</a></p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Najnowsze wpisy</h2>
            <?php
            $homeBlogPosts = new WP_Query(array(
               'posts_per_page' => 2,
            ));
            while ($homeBlogPosts->have_posts()) {
                $homeBlogPosts->the_post(); ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month"><?php the_time('M'); ?></span>
                        <span class="event-summary__day"><?php the_time('j'); ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                echo wp_trim_words(get_the_content(), 15);
                            } ?><a href="<?php the_permalink(); ?>" class="nu gray"> Więcej</a></p>
                    </div>
                </div>

            <?php } wp_reset_postdata(); /* cleaning after custom query */
            ?>
            <p class="t-center no-margin"><a href="<?php echo site_url('/blog/'); ?>" class="btn btn--yellow">Przejdź do bloga</a></p>
        </div>
    </div>
</div>

<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Transportation</h2>
                        <p class="t-center">All students have free unlimited bus fare.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                        <p class="t-center">Our dentistry program recommends eating apples.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg') ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Food</h2>
                        <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
</div>

<?php  get_footer(); ?>
