<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //

    function  homepage(){
        return view('homepage');
    }

    function getCourses(){
        $courses = ["php", 'Laravel', "Python", 'Django'];
//        return $courses;
        $name = 'Ahmed';
        return view("courseslist", ['courses'=>$courses,
            'name'=>$name
            ]);
    }
}
