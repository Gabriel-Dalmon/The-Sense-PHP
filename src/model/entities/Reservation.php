<?php

    class Reservation {

        public $id, $experienceId, $userId, $date, $playersAmount, $status;

        public function __construct($id, $experienceId, $userId, $date, $playersAmount, $status){
            $this->id = $id;
            $this->experienceId = $experienceId;
            $this->userId = $userId;
            $this->date = $date;
            $this->playersAmount = $playersAmount;
            $this->status = $status;
        }
    }
