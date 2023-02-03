<?php 

    class Experience {

        public $id,$pageId,$name,$description, $duration, $playerAmount, $banner, $pegi;

        public function __construct($id,$pageId,$name,$description, $duration, $playerAmount, $banner, $pegi){
            $this->id = $id;
            $this->pageId = $pageId;
            $this->name = $name;
            $this->description = $description;
            $this->duration = $duration;
            $this->playerAmount = $playerAmount;
            $this->banner = $banner;
            $this->pegi = $pegi;
        }
    }