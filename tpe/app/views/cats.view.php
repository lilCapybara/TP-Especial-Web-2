<?php

class catsView {
    public function showCats($cats) {
        $count = count($cats);  //Cuenta la cantidad de campeones que se estan mostrando

        require 'templates/header.phtml';
        require 'templates/catsList.phtml';   
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }


}