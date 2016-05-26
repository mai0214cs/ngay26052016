<?php
namespace App\Http\Controllers;
class CountryController extends Controller{
    public function index(){
        $countries = \App\Country::all();
        foreach ($countries as $country) {
            print_r($country->comments->toArray());
        }
    }
}
