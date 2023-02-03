<?php

    abstract class Repository {
        
        protected $dbConnection;
        const TABLE_NAME = null;


        /**
         * @param $dbConnection is the PDO object, to connect to the database (defined in config.php)
         */
        public function __construct($dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }


        
        // abstract public function insert();
        // abstract public function update();

        public function deleteOneById($id) {
            $query = "DELETE FROM ".self::TABLE_NAME." WHERE id = :id";
            $dataBind = array(
                ":id" => $id
            );
            $req = $this->dbConnection->prepare($query);
            $req->execute($dataBind);
        }

        protected function mapMultiple($entitiesData) {
            $mappedEntities = array();
            foreach ($entitiesData as $entityData) {
                $mappedEntities[$entityData["name"]] = $this->mapSingle($entityData);
            }
            return $mappedEntities;
        }

        abstract protected function mapSingle($entityData);

    }