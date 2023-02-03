<?php

    class Transaction {

        public $id, $reservationId, $date, $rawPrice, $paymentMethod;

        public function __construct($id, $reservationId, $date, $rawPrice, $paymentMethod){
            $this->id = $id;
            $this->reservationId = $reservationId;
            $this->date = $date;
            $this->rawPrice = $rawPrice;
            $this->paymentMethod = $paymentMethod;
        }
    }