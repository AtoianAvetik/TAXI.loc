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
                    <div class="logo logo-container"><a class="logo_link" href="/"><img src="img/logo/logo-white.png" alt=""></a>
                        <div class="logo-text"><span class="logo-label">24/7</span><span class="logo-sub-label">сервис вызова авто</span></div>
                    </div>
                </div>
                <div class="footer_block col-3 col-md-6 col-xs-12">
                    <div class="contact-box"><i class="icon thin-icon-phone-call"></i>
                        <dl>
                            <dt>Позвоните Нам:</dt>
                            <dd></dd><a href="callto:#">+7(978) xxx xx xx</a>
                        </dl>
                    </div>
                </div>
                <div class="footer_block col-4 col-md-6 col-xs-12">
                    <section class="social-block">
                        <ul class="social-block_list">
                            <li><a class="social-link" href="/"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="social-link" href="/"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="social-link" href="/"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="social-link" href="/"><i class="fa fa-vk"></i></a></li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p>© <?php echo date("Y"); ?></p>
        </div>
    </footer>
    <div class="feedback" data-module="feedback">
        <button class="feedback-launch-button btn-pure feedback-hide" data-js="expandBtn"><i class="icon-email"></i><span>Свяжитесь с Нами!</span></button>
        <div class="feedback-container feedback-hide" data-js="container">
            <div class="feedback-top-bar">
                <div class="feedback-top-bar_text heading">Свяжитесь с Нами!</div>
                <div class="feedback-top-bar_button" data-js="collapseBtn"><i class="icon-arrow-down"></i></div>
            </div>
            <div class="feedback-conversation-container">
                <div class="feedback-form-container">
                    <form class="feedback-form">
                        <div class="form-group float-label">
                            <input class="form-control -wide" type="text" name="userName" id="userName" required>
                            <label class="form-control-placeholder" for="userName">Введите Ваше имя</label>
                        </div>
                        <div class="form-group float-label">
                            <input class="form-control -wide" type="text" name="userEmail" id="userEmail" required>
                            <label class="form-control-placeholder" for="userEmail">Введите Ваш email</label>
                        </div>
                        <div class="form-group float-label">
                            <textarea class="form-control -textarea -wide" name="userNote" id="userNote" placeholder="Напишите то что думаете" rows="5"></textarea>
                        </div>
                        <p class="error">Вы должны заполнить все поля и указать действительный адрес электронной почты</p>
                        <button class="btn-primary -wide">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-Mz1aKebyyOWgKLGPkg1KioLdFA9ig2Y"></script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
