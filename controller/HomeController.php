<?php


namespace Controller;


class HomeController {


    // public function redirect(){

    //     header("location : index.php?action=homePage");
    // }

    public function homePage(){

        require ("view/home.php");
    }
}