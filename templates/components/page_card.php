<div class=" page-card">
    <div class="page-info">
        <h4>Page :<?php echo $page->name; ?></h4>
        <p>Template :<?php echo $page->template; ?></p>
        <p>Langue :<?php echo $page->language; ?></p>
        <a class="cta" href="<?php echo $url->head."/edit/page?id=".$page->id;?>">Modifier</a>
    </div>
</div>