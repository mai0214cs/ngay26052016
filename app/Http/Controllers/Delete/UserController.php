<?php
namespace App\Http\Controllers;
class UserController extends Controller{
    public function index(){
        $users = \App\User::all();
        foreach ($users as $user) {
            echo $user->phone->phone; // Lay so dien thoai
            print_r($user->comments->toArray()); // Lay danh sach binh luan
            print_r($user->roles->toArray()); // Lay danh sach quyen
            
        }
    }
}
