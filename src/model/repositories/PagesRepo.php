<?php 

    require_once("/src/model/repositories/Repository.php");
    require_once("/src/model/repositories/ComponentsRepo.php");
    require_once("/src/model/entities/Page.php");

    /**
     * CRUD of the "pages" table in the database. Must give $dbConnection as constructor parameter.
     */
    class PagesRepo extends Repository {

        /**
         * @var TABLE_NAME
         */
        const TABLE_NAME = "pages";

        public function getById($id){
            $query = "SELECT * FROM ".self::TABLE_NAME." WHERE id=:id";
            var_dump($query);
            $dataBind = array(
                ":id" => $id
            );
            $req = $this->dbConnection->prepare($query);
            $req->execute($dataBind);
            $pageData = $req->fetch(PDO::FETCH_ASSOC);

            if(!empty($pageData)){
                $componentsRepo = new ComponentsRepo($this->dbConnection);
                $pageData["components"] = $componentsRepo->getAllByPageId($pageData["id"]);
    
                $page = $this->mapSingle($pageData);
                return $page;
            }
            return null;
        }

        /**
         * 
         * @param string $name
         * @param string $language
         * @return Page $page
         */
        public function getByNameAndLang($name,$language)
        {
            $query = "SELECT * FROM ".self::TABLE_NAME." WHERE name=:name AND language=:language";
            $dataBind = array(
                ":name" => $name,
                ":language" => $language
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
            $pageData = $request->fetch(PDO::FETCH_ASSOC);
            if(!empty($pageData)){
                $componentsRepo = new ComponentsRepo($this->dbConnection);
                $pageData["components"] = $componentsRepo->getAllByPageId($pageData["id"]);
    
                $page = $this->mapSingle($pageData);
                return $page;
            }
            return null;
        }

        public function getAllByTemplateAndLang($template,$language)
        {
            $query = "SELECT * FROM ".self::TABLE_NAME." WHERE template=:template AND language=:language";
            $dataBind = array(
                ":template" => $template,
                ":language" => $language
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
            $pagesData = $request->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($pagesData)){
                foreach ($pagesData as &$pageData) {
                    $pageData["components"]= "empty";
                }
                $pages = $this->mapMultiple($pagesData);
                return $pages;
            }
            return null;
        }

        public function insert($name, $template, $language){
            $query = "INSERT INTO ".self::TABLE_NAME." (name,template,language) VALUES (:name,:template,:language)";
            $dataBind = array(
                ":name" => $name,
                ":template" => $template,
                ":language" => $language
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }

        public function update($id, $name, $template, $language){
            $query = "UPDATE ".self::TABLE_NAME." SET name=:name, template=:template,language=:language WHERE id=:id";
            $dataBind = array(
                ":id" => $id,
                ":name" => $name,
                ":template" => $template,
                ":language" => $language
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
        }


        protected function mapSingle($pageData) {
            $mappedPage = new Page($pageData["id"],$pageData["name"],$pageData["template"],$pageData["language"],$pageData["components"]);
            return $mappedPage;
        }
        
    }