<?php
require_once("/src/model/repositories/PagesRepo.php");
require_once("/src/model/repositories/ExperiencesRepo.php");

$pagesRepo = new PagesRepo($dbConnection);
$page = $pagesRepo->getByNameAndLang("homepage","fr");


ob_start();?>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/style.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/experience_card.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/rooms_nav.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/style.css"/>
<?php $headProperties = ob_get_clean();

$experiencesRepo = new ExperiencesRepo($dbConnection);
$experiences = $experiencesRepo->getAllByPageId(1);

require_once("/templates/pages/homepage.php");

?>