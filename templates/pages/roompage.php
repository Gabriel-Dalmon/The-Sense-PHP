<section class="top-section" style="background-image: url('<?php echo $url->head."/templates/assets/Vector_78_0.svg";?>'); background-color:<?php echo $page->components["background-color"]->content;?>">
    <?php require_once("/templates/components/rooms_nav.php");?>
    <img class="room-logo" src="<?php echo $url->head.$page->components["logo"]->content;?>">
    <a href="#intro" class="cta">DÉCOUVRIR</a>
</section>
<?php require_once("/templates/components/intro_transition.php");

    foreach($experiences as $experience){
        require("/templates/components/experience_card.php");
    }

