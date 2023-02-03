<?php

require_once("/src/model/repositories/PagesRepo.php");

$pagesRepo = new PagesRepo($dbConnection);
$pagesList = $pagesRepo->getAllByTemplateAndLang($_POST["template"],$_POST["language"]);
ob_start();?>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/adminpanel.css"/>
<?php $headProperties = ob_get_clean();
ob_start();?>
<script src="<?php echo $url->rootRelation; ?>templates/js/adminpanel.js"></script>
<?php $scripts = ob_get_clean();
require_once("/templates/components/head.php");
if(!empty($pagesList)){
    foreach($pagesList as $page){
        require("/templates/components/page_card.php");
     }
}
require_once("/templates/components/footer.php");


?>