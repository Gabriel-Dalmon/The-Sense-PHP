<?php

require_once("/src/model/repositories/PagesRepo.php");

$pagesRepo = new PagesRepo($dbConnection);
$page = $pagesRepo->getByNameAndLang("adminpanel", "fr");


ob_start();?>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/adminpanel.css"/>
<?php $headProperties = ob_get_clean();


require_once("/templates/components/head.php");
require_once("/templates/pages/adminpanel.php");
require_once("/templates/components/footer.php");

?>