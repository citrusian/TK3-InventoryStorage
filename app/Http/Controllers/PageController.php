<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }

//    public function profile()
//    {
//        return view("pages.profile-static");
//    }
//
//    public function signin()
//    {
//        return view("pages.sign-in-static");
//    }
//
//    public function signup()
//    {
//        return view("pages.sign-up-static");
//    }

    public function itemData()
    {
//        Get All Query
        $query = DB::table('data_barangs')
            ->select('*')
            ->get();

        return view("pages.itemData",['q1'=>$query]);
    }

    public function transactionData()
    {
//        Get All Query
        $query = DB::table('data_barangs')
            ->select('*')
            ->get();

        return view("pages.itemData",['q1'=>$query]);
    }

    public function user_management()
    {
//        Get All Query
        $query = DB::table('users')
            ->select('*')
            ->get();

        return view("pages.user-management",['q1'=>$query]);
    }

    public function new_user()
    {
        return view("pages.new_user");
    }
















}
