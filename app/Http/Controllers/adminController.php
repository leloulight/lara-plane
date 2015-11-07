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
    public $destinationPath = 'uploads/spaceships'; // uploads folder


    /**
     * Show main Admin page
     * @return View
     */
    public function index() {
        $spaceships = Spaceships::latest('created_at')->paginate(5);
        return view('admin.index', compact('spaceships'));
    }


    /**
     * Show spaceship
     * @param $id
     * @return View
     */
    public function show($id) {
        $spaceship = Spaceships::findOrFail($id);
        return view('admin.show', compact('spaceship'));
    }


    /**
     * @return View
     */
    public function create() {
        return view('admin.create');
    }


    /**
     * Add to db from the form
     * @param SpaceshipRequest $request
     * @return Redirect
     */
    public function store(SpaceshipRequest $request) {
        $data = $request->all();
        $spaceships = new Spaceships($data);

        // If has preview image
        if($request->hasFile('preview')) {
            $preview = $request->file('preview');

            // Upload preview image
            $previewName = $this->renameAndUploadImage($preview, $request);
            $spaceships['preview'] = $previewName;
        }
        // If has carousel image
        if($request->hasFile('carousel')) {

            $carouselArr = $request->file('carousel');
            $carouselAllPath = '';

            // upload carousel images
            foreach($carouselArr as $key => $image) {
                $imageName = $this->renameAndUploadImageCarousel($image, $key, $request);
                $carouselAllPath .= $imageName . ';';
            }
            $spaceships['carousel'] =  $carouselAllPath;
        } else {
            $spaceships['carousel'] = '';
        }

        $spaceships->save();
        session()->flash('flash_message', 'Корабль добавлен в базу.');

        return redirect('admin');
    }

    /**
     * Edit spaceship
     * @param $id
     * @return View
     */
    public function edit($id) {
        $spaceships = Spaceships::findOrFail($id);

        // split carousel string
        $carouselArr = explode(';', $spaceships->carousel);
        // delete last empty ellement
        array_pop($carouselArr);

        return view('admin.edit', compact('spaceships', 'carouselArr'));
    }


    /**
     * Update spaceship
     * @param $id
     * @param SpaceshipRequest $request
     * @return Redirect
     */
    public function update($id, SpaceshipRequest $request) {

        dd($request);
        $spaceships = new Spaceships();
        $flight = $spaceships->findOrFail($id);

        // Иначе не обновит
        $data = $request->all();

        // If has preview image
        if($request->hasFile('preview')) {
            $preview = $request->file('preview');
            File::delete($flight->preview); // delete old preview image

            // Move uploaded file
            $previewName = $this->renameAndUploadImage($preview, $request);
            $data['preview'] = $previewName;
        }

        $flight->update($data);
        session()->flash('flash_message', 'Корабль обновлен.');

        return redirect('admin');
    }


    /**
     * Delete spaceship
     * @param $id
     * @return Redirect
     */
    public function destroy($id) {
        $flight = Spaceships::find($id);

        File::delete($flight->preview); // delete preview image

        $flight->delete();
        session()->flash('flash_message', 'Корабль ' . $flight->name . ' был удален!');

        return redirect('admin');
    }


//    FORM IMAGE METHODS

    /**
     * Generate new unique name for preview image
     * @param $previewName
     * @return string (name of preview image)
     */
    public function generateNameForPreview($previewName) {
        // generate hash for uniq image name
        $hash = str_random(4);
        $previewName = $hash . '_' . $previewName;

        return $previewName;
    }


    /**
     * Rename & upload image
     * @param $preview
     * @param $request
     * @return string (full name)
     */
    public function renameAndUploadImage($preview, $request) {
        $previewName = $preview->getClientOriginalName();

        // generate hash for uniq image name
        $previewName = $this->generateNameForPreview($previewName);

        $request->file('preview')->move($this->destinationPath, $previewName);
        $previewName = $this->destinationPath . '/' . $previewName;

        return $previewName;
    }

    /**
     * @param $image
     * @param $key
     * @param $request
     * @return string (full name of image)
     */
    public function renameAndUploadImageCarousel($image, $key, $request) {
        $imageName = $image->getClientOriginalName();

        // generate hash for uniq image name
        $imageName = $this->generateNameForPreview($imageName);

        $request->file('carousel')[$key]->move($this->destinationPath, $imageName);
        $imageName = $this->destinationPath . '/' . $imageName;

        return $imageName;
    }
}
