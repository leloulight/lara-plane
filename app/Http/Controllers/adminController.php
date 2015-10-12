<?php

namespace App\Http\Controllers;

use App\Spaceships; // for database
use App\Http\Requests\CreateSpaceshipRequest; // for validation
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index() {
        $spaceships = Spaceships::latest('created_at')->get();

        return view('admin.index', compact('spaceships'));
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

    public function show($id) {
        $spaceship = Spaceships::findOrFail($id);

        return view('admin.show', compact('spaceship'));
    }

    // Add to db from the form
    public function store(CreateSpaceshipRequest $request) {
        // validation
        $spaceships = new Spaceships();
        $spaceships->create($request->all());
        return redirect('admin');
    }


}
