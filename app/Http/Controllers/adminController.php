<?php

namespace App\Http\Controllers;

use App\Spaceships; // for database
use App\Http\Requests\SpaceshipRequest; // for validation
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File; // for file deleting
use Hash; // for random string generate for preview image name
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

        $data = $request->all();
        $spaceships = new Spaceships($data);

        // If has preview image
        if($request->hasFile('preview')) {
            $preview = $request->file('preview');
            $previewName = $preview->getClientOriginalName();

            // generate hash for uniq image name
            $previewName = $this->generateNameForPreview($previewName);

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
        $destinationPath = 'uploads/spaceships'; // uploads folder

        $spaceships = new Spaceships();
        $flight = $spaceships->findOrFail($id);

        // Иначе не обновит
        $data = $request->all();

        // If has preview image
        if($request->hasFile('preview')) {
            // delete old preview image
            File::delete($flight->preview);

            $preview = $request->file('preview');
            $previewName = $preview->getClientOriginalName();

            // generate new unique name for preview image
            $previewName = $this->generateNameForPreview($previewName);

            $request->file('preview')->move($destinationPath, $previewName);
            $previewName = $destinationPath . '/' . $previewName;
            $data['preview'] = $previewName;
        }

        $flight->update($data);
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


    // generate new unique name for preview image
    public function generateNameForPreview($previewName) {
        // generate hash for uniq image name
        $hash = Hash::make('secret');
        $hash = substr($hash, 0, 4);
        $previewName = $hash . '_' . $previewName;
        return $previewName;
    }

}
