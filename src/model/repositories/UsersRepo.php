<?php 

    require_once("/src/model/repositories/Repository.php");

    /**
     * CRUD of the "pages" table in the database. Must give $dbConnection as constructor parameter.
     */
    class UsersRepo extends Repository {

        const TABLE_NAME = "users"; 
        const PASSWORD_CRYPT_KEY = "es6[{#[4f('[gd[{#(12dfg12f{[y-[@^";

        public function getByEmailAndPassword($email, $password){
            $query = "SELECT id,name,email,phone_number,status,discount_points,newsletter_sub FROM ".self::TABLE_NAME." WHERE email=:email AND password=:password";
            $dataBind = array(
                ":email" => $email,
                ":password" => md5(self::PASSWORD_CRYPT_KEY.$password)
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
            $userData = $request->fetch(PDO::FETCH_ASSOC);

            return $userData;
        }

        public function insert($name, $email, $password){
            $query = "INSERT INTO ".self::TABLE_NAME." (name,email,password) VALUES (:name,:email,:password)";
            $dataBind = array(
                ":name" => $name,
                ":email" => $email,
                ":password" => md5(self::PASSWORD_CRYPT_KEY.$password)
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }

        public function update($id, $username, $email, $phoneNumber, $password, $status, $discountPoints, $newsletterSub){
            $query = "UPDATE ".self::TABLE_NAME." SET username=:username, email=:email,phone_number=:phone_number, password=:password, status=:status, discount_points=:discount_points, newsletter_sub=:newsletter_sub WHERE id=:id";
            $dataBind = array(
                ":id" => $id,
                ":username" => $username,
                ":email" => $email,
                ":phone_number" => $phoneNumber,
                ":status" => $status,
                ":discount_point" => $discountPoints,
                ":newsletter_sub" => $newsletterSub,
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }

        
        public function updateStatus($id, $status){
            $query = "UPDATE ".self::TABLE_NAME." SET status=:status WHERE id=:id";
            $dataBind = array(
                ":id" => $id,
                ":status" => $status
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }

        public function updatePassword($id, $password){
            $query = "UPDATE ".self::TABLE_NAME." SET password=:password WHERE id=:id";
            $dataBind = array(
                ":id" => $id,
                ":password" => md5(self::PASSWORD_CRYPT_KEY.$password),
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }

        public function delete($id){
            $query = "DELETE FROM ".self::TABLE_NAME." WHERE id=:id";
            $dataBind = array(
                ":id" => $id
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }

        public function mapSingle($userData){
            $mappedUser = new User($userData["id"],$userData["name"],$userData["email"],$userData["phone_number"],$userData["status"], $userData["discount_points"], $userData["newsletter_sub"]);
            return $mappedUser;
        }
    }