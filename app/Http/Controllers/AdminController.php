<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AdminController extends Controller
{
    function index() : View {
        return view('contents.admin.home');
    }
}