<?php $_SESSION["edit"]["name"] = "homepage"; ?>

<div class="container row">
    <form class="col s12" method="post" enctype="multipart/form-data" action="../edit/page?action=<?php echo $editType."_page" ?>">
        <div class="row">
            <div class="input-field col s6">
                <input type="text" name="language" id="language-input" class="validate">
                <label for="language-input">Langue</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="headline&h1" id="h1-input" class="validate">
                <label for="h1-input">H1</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="paragraph&intro" id="intro-input" class="materialize-textarea"></textarea>
                <label for="intro-input">Introduction</label>
            </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>Bannière</span>
                <input type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Uploader un fichier image">
            </div>
        </div>
        <div class="row">
            <div class="col s4">
                <label for="intro-input">Couleur de fond</label>
                <input type="color" id="background-color-input" name="color&background-color">
            </div>
            <div class="col s4">
                <label for="intro-input">Couleur de fond</label>
                <input type="color" id="font-color-input" name="color&font-color">
            </div>
            <div class="col s4">
                <label for="intro-input">Couleur de fond</label>
                <input type="color" id="navigation-color-input" name="color&navigation-color">
            </div>
        </div>

        <input class="cta" type="submit" value="<?php echo ($editType == "edit")? "Modifier" : "Ajouter";?>">
    </form>
</div>
