<nav class="navbar" style="background-color:<?php echo $page->components["navigation-color"]->content."80";?>">
    <div class="nav-wrapper">
        <a href="<?php echo $url->head."/";?>" class="brand-logo "><img class="logo navbar-logo" src="templates/assets/Logo_navbar.svg" alt="The Sense Logo"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="border-right"><a href="<?php echo $url->head."/news";?>" class="navbar-text">NEWS</a></li>
            <li class="navbar-line"></li>
            <li class="border-right"><a href="<?php echo $url->head."/experiences";?>" class="navbar-text">NOS EXPÉRIENCES</a></li>
            <li class="navbar-line"></li>
            <li class="border-right"><a href="<?php echo $url->head."/about-us";?>" class="navbar-text">À PROPOS DE NOUS</a></li>
            <li class="navbar-line"></li>
            <li class="border-right"><a href="<?php echo $url->head."/equipment";?>" class="navbar-text">NOS ÉQUIPEMENT</a></li>
            <li class="navbar-line"></li>
            <?php if (!isset($_SESSION["user"])) {?>
                <li><a href="#login" class="navbar-text text-bold modal-trigger">MON COMPTE</a></li>
            <?php } else {
                      if($_SESSION["user"]["status"] == "admin"){?>
                          <li class="border-right"><a href="<?php echo $url->head."/adminpanel";?>" class="navbar-text">PANEL ADMIN</a></li>
                          <li class="navbar-line"></li>                    
                    <?php }?>
                <li><a href="<?php echo $url->original."?action=logout";?>" class="modal-trigger">SE DÉCONNECTER</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
<ul class="sidenav">
    <li><a href="<?php echo $url->head."/news";?>">NEWS</a></li>
    <li><a href="<?php echo $url->head."/experiences";?>">NOS EXPÉRIENCES</a></li>
    <li><a href="<?php echo $url->head."/about-us";?>">À PROPOS DE NOUS</a></li>
    <li><a href="<?php echo $url->head."/equipment";?>">NOS ÉQUIPEMENT</a></li>
    <?php if (!isset($_SESSION["user"])) {?>
        <li><a href="#login" class="modal-trigger">MON COMPTE</a></li>
    <?php } else {?>
        <li><a href="<?php echo $url->original."?action=logout";?>" class="modal-trigger">SE DÉCONNECTER</a></li>
    <?php } ?>
    
</ul>
<div id="login" class="modal">
    <div class="modal-content">
        <h4>CONNEXION</h4>
        <form method="post" action="<?php echo $url->original."?action=login";?>">
            <div class="input-field col s6">
                  <input type="email" name="email" id="email-input" class="validate">
                  <label for="email-input">Identifiant</label>
              </div>
              <div class="input-field col s6">
                  <input type="password" name="password" id="password-input" class="validate">
                  <label for="password-input">Mot de passe</label>
              </div>
              <a href="#signup" class="cta modal-trigger modal-close">Créer un compte</a>
              <input type="submit" value="Connexion" class="cta">
        </form>
    </div>
</div>
<div id="signup" class="modal">
    <div class="modal-content">
        <h4>INSCRIPTION</h4>
        <form method="post" action="<?php echo $url->original."?action=login";?>">
            <div class="input-field col s6">
                  <input type="text" name="name" id="name-input" class="validate">
                  <label for="name-input">Nom Prénom</label>
              </div>
              <div class="input-field col s6">
                  <input type="email" name="email" id="email-input" class="validate">
                  <label for="email-input">Email</label>
              </div>
              <div class="input-field col s6">
                  <input type="password" name="password" id="password-input" class="validate">
                  <label for="password-input">Mot de passe</label>
              </div>
              <a href="#login" class="cta modal-trigger modal-close">J'ai déjà un compte</a>
              <input type="submit" value="Inscription" class="cta">
        </form>
    </div>
</div>