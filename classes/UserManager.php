<?php

class UserManager{
    private UserRepository $repository;
    private UserValidator $validator;

    public function __construct(UserRepository $repository, UserValidator $validator){
        $this -> repository = $repository;
        $this -> validator = $validator;
    }

    public function register(string $name, string $email, string $password):User{
        $this->validator->validateEmail($email, $this->repository);
        $this->validator->validatePassword($password);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $user = new User(0, $name, $email, $passwordHash);
        $this->repository->save($user);

        return $user;
    }

    public function login(string $email, string $password):User{
        $user = $this->repository->findbyEmail($email);

        if (!$user || !password_verify($password, $user->passwordHash)){
            throw new InvalidArgumentException("Credenciais Inválidas");
        }
        return $user;
    }

    public function resetPassword(int $id, string $newPassword) : User{
        $user = $this->repository->findById($id);

        if (!$user){
            throw new InvalidArgumentException("Usuário não foi encontrado.");
        }

        $this->validator->validatePassword($newPassword);

        $user->passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->repository->save($user);

        return $user;
    }
}