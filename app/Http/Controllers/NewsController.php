<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return "News List";
    }

    public function show(int $id)
    {
        return "News whit ID={$id}";
    }
}
