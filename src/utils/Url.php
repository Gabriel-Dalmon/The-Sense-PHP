<?php

    class Url {

        /**
         * @var int $lengthUrl is the amount of "/" in the relative url to reference the distance between root and last url data
         * @var string $rootRelation is the chain "../" * $length to get back to root
         */
        public $original, $relative, $head, $length, $rootRelation, $GET;

        protected function __construct(){
        }

        public static function constructWithoutBreakpoint( $url){
            $urlInstance = new self();
            $urlInstance->original = explode("?",$url)[0];
            $urlInstance->relative = $urlInstance->original;
            $urlInstance->head="";
            $urlInstance->length = count(explode("/", $urlInstance->relative))-1;
            $urlInstance->buildrootRelation();
            return $urlInstance;
        }

        public static function constructWithBreakpoint($url, $relBreakpoint){
            $urlInstance = new self();
            $urlInstance->original = explode("?",$url)[0];
            $urlInstance->relative = explode($relBreakpoint, $url)[1];
            $urlInstance->relative = explode("?", $urlInstance->relative)[0];
            $urlInstance->head=explode($relBreakpoint, $url)[0].$relBreakpoint;
            $urlInstance->length = count(explode("/", $urlInstance->relative))-1;
            $urlInstance->buildrootRelation();
            $urlInstance->buildGET($url);
            return $urlInstance;
        }

        protected function buildGET($url){
            $mappedParams = array();
            $splitUrl=explode("?", $url);
            if(count($splitUrl) == 2){
                $paramsList = $splitUrl[1];
                $paramsList = explode("&",$paramsList);
                
                foreach ($paramsList as $param){
                    $param = explode("=", $param);
                    if($param[0]=="id"){
                        $param[1] = intval($param[1]);
                    }
                    $mappedParams[$param[0]] = $param[1];
                }
                $this->GET = $mappedParams;
            } else {
                $this->GET = null;
            }
        }

        protected function buildrootRelation(){
            $this->rootRelation = "";
            for ($i = 0;$i < $this->length-1; $i++) {
                $this->rootRelation = $this->rootRelation . "../";
            }
        }


    }