<?php 

    class Room extends Page {
        public $experiences;

        public function __construct($id, $name, $template, $language, $components, $experiences) {
            parent::__construct($id, $name, $template, $language, $components);
            $this->experiences = $experiences;
        }

        public function addExperience($experience) {
            array_push($this->experiences, $experience);
        }
    }