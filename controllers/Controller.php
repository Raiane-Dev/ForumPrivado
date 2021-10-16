<?php

    class Controller{
        public static function index(){

            $url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
            $slug = explode('/',$url)[0];

            if(file_exists('./views/'.$slug.'.php')){
                include('./views/'.$slug.'.php');
            }else{
                die("Não existe");

            }
        }


        public static function uploadImages($file){
            move_uploaded_file($file["tmp_name"], BASE_DIR.$file["name"]);
        }

        public static function login(){
            if(!isset($_SESSION['id_user'])){
                header(INCLUDE_PATH.'access?login');
                die();
            }
        }
    }

?>