<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$advantages = $atts['advantages'];

?>

<div class="container -full -bg-white p-gap">
    <div class="container">
        <div class="row -around -equal-height card-list">
            <?php
                foreach($advantages as $advantage){
            ?>
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="card -advantage"><i class="card_icon <?php echo $advantage['icon']['icon-class-without-root']; ?>"></i>
                        <div class="card_title h3"><?php echo $advantage['title']; ?>&nbsp;<br><span class="primary-text"><?php echo $advantage['colored_title']; ?></span>
                        </div>
                        <div class="card_content text-content"><?php echo $advantage['text_content']; ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>