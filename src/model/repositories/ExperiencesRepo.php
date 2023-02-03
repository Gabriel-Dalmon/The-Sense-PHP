<?php

    require_once("/src/model/repositories/Repository.php");
    require_once("/src/model/entities/Experience.php");

    class ExperiencesRepo extends Repository {

        const TABLE_NAME = "experiences";

        public function getAllByPageId($page_id){
            $query = "SELECT * FROM ".self::TABLE_NAME." WHERE page_id=:page_id";
            $dataBind = array(
                ":page_id" => $page_id
            );

            $request = $this->dbConnection->prepare($query);
            $request->execute($dataBind);
            $experiencesData = $request->fetchAll(PDO::FETCH_ASSOC);
            
            $experience = $this->mapMultiple($experiencesData);

            return $experience;
        }

        protected function mapSingle($experienceData) {
            $mappedExperience = new Experience($experienceData["id"],$experienceData["page_id"],$experienceData["name"],$experienceData["description"],$experienceData["duration"],$experienceData["player_amount"],$experienceData["banner"],$experienceData["pegi"]);
            return $mappedExperience;
        }

    }