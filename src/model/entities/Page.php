<?php

    class Page {

        public $id,$name,$template,$language,$components;

        public function __construct($id, $name, $template, $language, $components) {
            $this->id = $id;
            $this->name = $name;
            $this->template = $template;
            $this->language = $language;
            $this->components = $components;
        }
    }