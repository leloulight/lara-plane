<?php

namespace App\Http\Controllers;

use App\Spaceships; // for database
use App\Http\Requests\SpaceshipRequest; // for validation
use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index() {
        $spaceships = Spaceships::latest('created_at')->paginate(5);

        return view('admin.index', compact('spaceships'));
    }

    public function show($id) {
        $spaceship = Spaceships::findOrFail($id);

        return view('admin.show', compact('spaceship'));
    }

    public function create() {
        return view('admin.create');
    }

    // Add to db from the form
    public function store(SpaceshipRequest $request) {
        Spaceships::create($request->all());
        session()->flash('flash_message', 'Корабль добавлен в базу.');
        return redirect('admin');
    }

    public function edit($id) {
        $spaceships = Spaceships::findOrFail($id);
        return view('admin.edit', compact('spaceships'));
    }

    public function update($id, SpaceshipRequest $request) {
        $spaceships = new Spaceships();
        $flight = $spaceships->findOrFail($id);
        $flight->update($request->all());
        session()->flash('flash_message', 'Корабль обновлен.');
        return redirect('admin');
    }

    public function destroy($id) {
        $flight = Spaceships::find($id);
        $flight->delete();

        session()->flash('flash_message', 'Корабль ' . $flight->name . ' был удален!');
        return redirect('admin');
    }
}
