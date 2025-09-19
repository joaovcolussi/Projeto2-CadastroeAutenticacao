<?php

class UserValidator{
    public function validateEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new InvalidArgumentException("Email Inválido");
        }
    }

    public function validatePassword($password){
        if (strlen($password) < 8){
            throw new InvalidArgumentException("A senha deve conter no minimo 8 caracteres");
        }
        if (!preg_match("/[0-9]/", $password)){
            throw new InvalidArgumentException("A desenha deve conter ao menos um número");
        }
        if (!preg_match("/[A-Z]/", $password)){
            throw new InvalidArgumentException("A senha deve conter ao menos uma letra maiúscula");
        }
    }
}