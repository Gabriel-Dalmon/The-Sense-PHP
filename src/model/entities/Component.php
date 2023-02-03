<?php 

    class Component {

        public $id,$type,$name,$content;

        public function __construct($id, $type,$name, $content){
            $this->id = $id;
            $this->type = $type;
            $this->name = $name;
            $this->content = $content;
        }
    }