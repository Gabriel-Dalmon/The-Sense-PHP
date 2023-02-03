<div class="experience-card">
    <div class="exp-banner">
        <div class="exp-pic-container">
            <img src="<?php echo $url->rootRelation.$experience->banner; ?>" alt="The Sense image expérience">
        </div>
        <div class="row exp-banner-info">
            <div class="col l6 center-align">
                <img src="<?php echo $url->rootRelation."templates/assets/icons/Timer_rest.svg";?>" alt="The Sense temps de partie">
                <p><?php echo $experience->duration; ?></p>
            </div>
            <div class="col l6 center-align">
                <img src="<?php echo $url->rootRelation."templates/assets/icons/Player_number.svg";?>" alt="The Sense nombre de joueurs">
                <p><?php echo $experience->playerAmount; ?></p>
            </div>
        </div>
    </div>
    <div class="exp-detail">
        <ul class="experience-title-list">
            <li class="experience-name"><h4><?php echo $experience->name; ?></h4></li>
            <li class="experience-line"></li>
            <li class="experience-room-name"><h4><?php echo $page->name; ?></h4></li>
        </ul>
        <h5 class="experience-text"><?php echo $experience->description; ?></h5>
        <div class="cs3">
            <a class="cs1 center-align" href="#"><img src="<?php echo $url->rootRelation."templates/assets/Bouton_reserver.svg";?>" alt="The Sense bouton réserver"></a></li>
        </div>
        <a class="discovery-link" href="#">découvrez la battle room  →</a>
    </div>
</div>
