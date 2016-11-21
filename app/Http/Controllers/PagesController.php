<?php

namespace WebNote\Http\Controllers;

use Illuminate\Http\Request;

use WebNote\Http\Requests;

class PagesController extends Controller
{
    public function index() {
        return view('welcome');
    }
}
