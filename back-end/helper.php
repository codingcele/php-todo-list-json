<?php
    function pass_generator($length) {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!?=$)(/&%{}[]*+@#.:,;-_\"";
        $pass = '';
        
        while (strlen($pass) < $length) {
            $char = substr($alphabet, rand(0, strlen($alphabet)), 1);
            $pass .= $char;
        }

        return $pass;
    }
?>