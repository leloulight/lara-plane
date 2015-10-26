<?php

namespace App\Http\Controllers;

use App\Spaceships; // for database
use App\Http\Requests\SpaceshipRequest; // for validation
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File; // for file deleting
use Illuminate\Support\Facades\Request;

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
        $destinationPath = 'uploads/spaceships'; // uploads folder

        $spaceships = new Spaceships(Array(
            'name' => $request->get('name'),
            'assignment' => $request->get('assignment'),
            'real' => $request->get('real'),
            'description' => $request->get('description'),
            'meta-description' => $request->get('meta-description'),
            'country' => $request->get('country'),
            'video' => $request->get('video'),
            'cost' => $request->get('cost'),
            'crew' => $request->get('crew'),
            'speed' => $request->get('speed'),
            'length' => $request->get('length'),
            'width' => $request->get('width'),
            'height' => $request->get('height'),
        ));

        // If has preview image
        if($request->hasFile('preview')) {
            $preview = $request->file('preview');
            $previewName = $preview->getClientOriginalName();

            $request->file('preview')->move($destinationPath, $previewName);
            // add to model
            $previewName = $destinationPath . '/' . $previewName;
            // update the data from form
            $spaceships['preview'] = $previewName;
        }

        $spaceships->save();
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

        File::delete($flight->preview); // delete preview image

        $flight->delete();

        session()->flash('flash_message', 'Корабль ' . $flight->name . ' был удален!');
        return redirect('admin');
    }
}
