<?php 

    class User {

        public $id,$name,$email,$phoneNumber,$status,$discountPoints,$newsletterSub;

        protected function __construct() {

        }

        public static function constructFullData($id, $name, $email, $phoneNumber, $status, $discountPoints, $newsletterSub){
            $userInstance = new self();
            $userInstance->id = $id;
            $userInstance->name = $name;
            $userInstance->email = $email;
            $userInstance->phoneNumber = $phoneNumber;
            $userInstance->status = $status;
            $userInstance->discountPoints = $discountPoints;
            $userInstance->newsletterSub = $newsletterSub;
            return $userInstance;
        }

        
    }
