<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function create() {
        return view('admin.create');
    }

    public function update() {
        return view('admin.update');
    }

    public function delete() {
        return view('admin.delete');
    }


}
