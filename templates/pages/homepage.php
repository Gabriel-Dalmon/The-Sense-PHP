<?php require_once("templates/components/head.php"); ?> 
<div class="logo-pages"></div>
<div>
    <?php require_once("/templates/components/intro_transition.php"); 
    foreach($experiences as $experience){
        require("/templates/components/experience_card.php");
    }
    require_once("templates/components/reservation-table.php"); ?>
    <div class="row">
        <?php require("templates/components/news-card.php"); ?>
        <?php require("templates/components/news-card.php"); ?>
    </div>
</div>
<?php require_once("templates/components/press-carousel.php"); ?>
<?php require_once("templates/components/faq.php"); ?>
<?php require_once("templates/components/footer.php"); ?>