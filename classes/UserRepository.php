<?php

class UserRepository{
    private array $users = [];
    private int $nextId = 1;

    public function __construct(){
        $this->users = [];
        $this->nextId = 2;
    }

    public function findbyEmail(string $email):?User{
        foreach ($this->users as $user) {
            if ($user->email === $email){
                return $user;
            }
        }
        return null;
    }

    public function findById(int $id):?User{
        return $this->users[$id] ?? null;
    }

    public function save(User $user):void{
        if ($user->id === 0){
            $userid = $this->nextId++;
        }
        $this->users[$user->id] = $user;
    }
}