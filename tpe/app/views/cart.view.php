<?php

class CartView {
    public function showCart($cart) {
        $count = count($cart);

        require 'templates/header.phtml';
        require 'templates/carrito.phtml';
        require 'templates/footer.phtml';
        
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }


}