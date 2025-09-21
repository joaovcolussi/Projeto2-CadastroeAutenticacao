<?php

class UserValidator
{
    public function validateEmail(string $email, UserRepository $repository): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email inválido.");
        }
        
        if ($repository->findByEmail($email)) {
            throw new InvalidArgumentException("Email já está em uso.");
        }
    }

    public function validatePassword(string $password): void
    {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("A senha deve conter no mínimo 8 caracteres.");
        }
        
        if (!preg_match('/[0-9]/', $password)) {
            throw new InvalidArgumentException("A senha deve conter ao menos um número.");
        }
        
        if (!preg_match('/[A-Z]/', $password)) {
            throw new InvalidArgumentException("A senha deve conter ao menos uma letra maiúscula.");
        }
    }
}