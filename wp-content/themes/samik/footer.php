<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package samik
 */

?>

	</main><!-- #content -->

	<footer class="footer">
        <div class="container footer_main">
            <div class="row -middle -center">
                <div class="footer_block col col-md-6 col-xs-12">
                    <div class="logo logo-container"><a class="logo_link" href="/"><img src="<?php echo fw_get_db_settings_option('footer_logo')['url']; ?>" alt=""></a>
                        <div class="logo-text"><span class="logo-label">24/7</span><span class="logo-sub-label">сервис вызова авто</span></div>
                    </div>
                </div>
                <div class="footer_block col-6 col-md-6 col-xs-12">
                    <div class="contact-box"><i class="icon thin-icon-phone-call"></i>
                        <dl>
                            <dt>Позвоните Нам:</dt>
                            <dd></dd><a href="callto:<?php echo fw_get_db_settings_option('phonenumber'); ?>"><?php echo fw_get_db_settings_option('phonenumber'); ?></a>
                        </dl>
                    </div>
                </div>
<!--                <div class="footer_block col-4 col-md-6 col-xs-12">-->
<!--                    <section class="social-block">-->
<!--                        <ul class="social-block_list">-->
<!--                            <li><a class="social-link" href="/"><i class="fa fa-twitter"></i></a></li>-->
<!--                            <li><a class="social-link" href="/"><i class="fa fa-facebook"></i></a></li>-->
<!--                            <li><a class="social-link" href="/"><i class="fa fa-instagram"></i></a></li>-->
<!--                            <li><a class="social-link" href="/"><i class="fa fa-vk"></i></a></li>-->
<!--                        </ul>-->
<!--                    </section>-->
<!--                </div>-->
            </div>
        </div>
        <div class="footer_bottom">
            <p>© <?php echo date("Y"); ?></p>
        </div>
    </footer>
    <div class="backstage" data-module="backstage">
        <div class="modal-container" data-module="modal">
            <?php
                if ( is_page('autopark-page') ) {
                    $data = get_option('autopark_fw_settings_form');

                foreach ($data as $cat_key => $cat) :
                foreach ($cat['cars'] as $car) : ?>
                    <div class="modal -top -gallery" data-js="modal" id="modal-<?php echo $car['id'] ?>">
                        <button class="modal_close-btn" data-js="closeBtn"></button>
                        <div class="modal_body">
                            <div class="gallery" data-module="gallery">
                                <div class="gallery_inner">
                                    <div class="swiper-container gallery_top" data-js="top">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($car['gallery'] as $image) : ?>
                                                <div class="swiper-slide" style="background-image: url(<?php echo $image['url'] ?>)"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="swiper-container gallery_thumbs" data-js="thumbs">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($car['gallery'] as $image) : ?>
                                                <div class="swiper-slide" style="background-image: url(<?php echo $image['url'] ?>)"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;endforeach;
            } ?>
            <div class="modal -top" data-js="modal" id="modal-callback">
                <button class="modal_close-btn" data-js="closeBtn"></button>
                <div class="modal_heading"><?php echo get_option('forms_fw_settings_form')['form-2']['form-title'] ?></div>
                <div class="modal_body">
                    <div class="callback-form">
                        <?php
                            echo do_shortcode( fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->render(get_option('forms_fw_settings_form')['form-3'] ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feedback" data-module="feedback">
        <button class="feedback-launch-button btn-pure feedback-hide" data-js="expandBtn"><i class="icon-email"></i><span><?php echo get_option('forms_fw_settings_form')['form-2']['form-title'] ?></span></button>
        <div class="feedback-container feedback-hide" data-js="container">
            <div class="feedback-top-bar">
                <div class="feedback-top-bar_text heading"><?php echo get_option('forms_fw_settings_form')['form-2']['form-title'] ?></div>
                <div class="feedback-top-bar_button" data-js="collapseBtn"><i class="icon-arrow-down"></i></div>
            </div>
            <div class="feedback-conversation-container">
                <div class="feedback-form-container">
                    <div class="feedback-form">
                        <?php
                            echo do_shortcode( fw()->extensions->get( 'shortcodes' )->get_shortcode( 'contact_form' )->render(get_option('forms_fw_settings_form')['form-2'] ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="callback" data-modal="modal-callback">
        <div class="callback-bg"></div>
        <div class="callback-content">
            <div class="callback-icon"><i class="thin-icon-phone-call"></i></div>
        </div>
    </div>

    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-Mz1aKebyyOWgKLGPkg1KioLdFA9ig2Y&callback=module.mapInit" type="text/javascript"></script>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
