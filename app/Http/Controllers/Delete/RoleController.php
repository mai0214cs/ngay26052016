<?php
namespace App\Http\Controllers;
class RoleController extends Controller{
    public function index(){
        $roles = \App\Role::all();
        foreach ($roles as $role) {
            print_r($role->users->toArray()); // Lay danh sach thanh vien
        }
    }
}
