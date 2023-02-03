<div id="intro" class="row">
    <div class="col s3 m3 l3 offset-s1 offset-m1 offset-l1">
        <div class="trailer">
            <a class="play-icon modal-trigger" href="#modal-trailer"><i class="set-play-icon material-icons">play_arrow</i></a>
            <img class="trailer-button-img" src="<?php echo $url->rootRelation."templates/assets/image_42.svg";?>">
        </div>
    </div>
    <div class="intro col s4 m4 l4 offset-m1 offset-l1">
        <h1 class="title">Qu'est ce que The Sense ?</h1>
        <p class="description"><?php echo $page->components["intro"]->content;?></p>
        <a class="discovery-link" href="#">découvrez the sense →</a>
    </div>
</div>

<div id="modal-trailer" class="modal">
    <div class="modal-content">
        <video class="trailer-full" controls>
            <source src="<?php echo $url->rootRelation."templates/assets/Trailer_The_Sense.mp4";?>" type="video/mp4">
        </video>
    </div>
</div>