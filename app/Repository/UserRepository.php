<?php


namespace App\Repository;


use App\DesignPatterns\Repository;
use App\User;

class UserRepository extends Repository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function getAllCustomer (){
        return User::where('user_type',1)
            ->get();
    }

    public function getAdmins (){
        return User::where('user_type',3)
            ->get();
    }

    public function countUser(){
        return User::where('user_type','!=',1)->count();
    }

    public function getCustomers (){
        return User::where('user_type','!=',3)
            ->get();
    }

    public function getAllUserByType ($type){
        return User::where('user_type',$type)
            ->get();
    }

}
