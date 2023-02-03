<?php

require_once("/src/model/repositories/PagesRepo.php");
require_once("/src/model/repositories/ExperiencesRepo.php");

/** $pageName = "/rooms/lightroom";
* $pageName = explode("/rooms/",$pageName)[1]; #gets the targeted room */
if(isset($url->GET["room"])){
    $pageName = $url->GET["room"];
} else {
    $pageName = "lightroom";
}
$pagesRepo = new PagesRepo($dbConnection);
$page = $pagesRepo->getByNameAndLang($pageName, "fr");
$experiencesRepo = new ExperiencesRepo($dbConnection);
$experiences = $experiencesRepo->getAllByPageId($page->id);

ob_start();?>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/experience_card.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/rooms_nav.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/style.css"/>
<?php $headProperties = ob_get_clean();

require_once("/templates/components/head.php");
require_once("/templates/pages/roompage.php");


require_once("/templates/components/footer.php");

?>