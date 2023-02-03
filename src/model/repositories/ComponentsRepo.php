<?php

    require_once("/src/model/repositories/Repository.php");
    require_once("/src/model/entities/Component.php");
    class ComponentsRepo extends Repository {

        const TABLE_NAME = "components";
        //const FIELDS_LIST = array("type", "name", "content");


        public function getAllByPageId($page_id){
            $query = "SELECT * FROM ".self::TABLE_NAME." WHERE page_id=:page_id";
            $dataBind = array(
                ":page_id" => $page_id
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);

            $componentsData = $request->fetchAll(PDO::FETCH_ASSOC);

            $components = $this->mapMultiple($componentsData);

            return $components;
        }

        protected function mapSingle($componentData) {
            $mappedComponent = new Component($componentData["id"],$componentData["type"],$componentData["name"],$componentData["content"]);
            return $mappedComponent;
        }

        public function insert($pageId, $type, $name, $content){
            $query = "INSERT INTO ".self::TABLE_NAME." (page_id, type, name, content) VALUES (:pageId, :type,:name,:content)";
            $dataBind = array(
                ":pageId" => $pageId,
                ":type" => $type,
                ":name" => $name,
                ":content" => $content
            );
            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }
    }