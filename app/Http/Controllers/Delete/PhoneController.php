<?php
namespace App\Http\Controllers;
class PhoneController extends Controller{
    public function index(){
        $phones = \App\Phone::all();
        foreach ($phones as $phone) {
            print_r($phone->user->name);
        }
    }
}
