<?php


require_once("/src/model/repositories/PagesRepo.php");


if(isset($url->GET["id"])){
    $pagesRepo = new PagesRepo($dbConnection);
    $editedPage = $pagesRepo->getById($url->GET["id"]);
    $editType = "edit";
} else {
    $editType = "add";
}

$pagesRepo = new PagesRepo($dbConnection);
$page = $pagesRepo->getByNameAndLang("pageEditor", "fr");

$_SESSION["edit"]["type"] = "page";
$_SESSION["edit"]["template"] = $_POST["template"];

ob_start();?>
<link type="text/css" rel="stylesheet" href="<?php echo $url->rootRelation; ?>templates/css/adminpanel.css"/>
<?php $headProperties = ob_get_clean();

ob_start();?>
<script src="<?php echo $url->rootRelation; ?>templates/js/adminpanel.js"></script>
<?php $scripts = ob_get_clean();

require_once("/templates/components/head.php");
require_once("/templates/components/forms/".$_SESSION["edit"]["template"]."_edit.php");
require_once("/templates/components/footer.php");


?>