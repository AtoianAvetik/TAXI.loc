<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$slides = $atts['slides'];

?>

<section class="slider">
    <div class="swiper-container" data-js="swiper">
        <div class="swiper-wrapper">
            <?php
                foreach($slides as $slide){
            ?>
                <div class="swiper-slide">
                    <section class="hero -large" style="background-image: url(<?php echo $slide['bg_image']['url'] ?>)">
                        <div class="hero-container container -narrow">
                            <h1 class="hero_heading h2"><?php echo $slide['title']; ?></h1>
                            <div class="hero_content text-content"><?php echo $slide['text_content']; ?></div>
                            <a class="btn-primary -large hero_btn" href="#" <?php echo $slide['button'][0]['attrs']; ?>><?php echo $slide['button'][0]['button_label']; ?></a>
                        </div>
                    </section>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination swiper-pagination-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</section>