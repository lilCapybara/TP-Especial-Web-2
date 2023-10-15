<?php

class SkinsView {
    public function showSkins($Skins) {
        $count = count($Skins);
        
        require 'templates/formSkins.phtml';
        require 'templates/SkinsList.phtml';

        require_once 'templates/footer.phtml';
    }

    public function showDetailedSkin($Skins){

        require 'templates/header.phtml';
        
        require 'templates/detailedSkin.phtml';

        require_once 'templates/footer.phtml';
    }
    

    public function showError($error) {
        require 'templates/error.phtml';
    }

   
}
