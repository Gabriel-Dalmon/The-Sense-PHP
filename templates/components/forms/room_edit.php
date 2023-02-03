<?php $_SESSION["edit"]["name"] = "roompage"; ?>

<div class="container row">
    <form class="col s12" method="post" enctype="multipart/form-data" action="../edit/page?action=<?php echo $editType."_page" ?>">
        <input type=hidden name="language" value="en">
        <div class="file-field input-field">
            <div class="btn">
                <span>Bannière</span>
                <input name="image&banner" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Uploader un fichier image">
            </div>
        </div>
        <input class="cta" type="submit" value="<?php echo ($editType == "edit")? "Modifier" : "Ajouter";?>">
    </form>
</div>