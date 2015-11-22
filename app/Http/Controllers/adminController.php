<?php

namespace App\Http\Controllers;

use App\Spaceships; // for database
use App\Http\Requests\SpaceshipRequest; // for validation
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File; // for file deleting
use Hash; // for random string generate for preview image name
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class adminController extends Controller
{
    public $destinationPath = 'uploads/spaceships/'; // File uploads folder
    public $spaceships_json_file = 'files/spaceships.json'; // json file for search


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

        // If has detail image
        if($request->hasFile('detail_image')) {
            $detail_image = $this->UploadImage($request, $request->file('detail_image'), 'detail_image');
            $spaceships['detail_image'] = $detail_image;
        }

        // If has preview image
        if($request->hasFile('preview')) {
            $preview = $this->UploadImage($request, $request->file('preview'), 'preview');
            $spaceships['preview'] = $preview;
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

            // Delete last char (Иначе трабл при удалении картинки)
            $carouselAllPath = rtrim($carouselAllPath, ";");
            $spaceships['carousel'] =  $carouselAllPath;
        } else {
            $spaceships['carousel'] = '';
        }

        // Create json file for search
        $this->createJsonFile($spaceships->name);


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
        $spaceship = Spaceships::findOrFail($id);

        if($spaceship->carousel) {
            $carouselArr = explode(';', $spaceship->carousel);
        } else {
            $carouselArr = 0;
        }

        return view('admin.edit', compact('spaceship', 'carouselArr'));
    }


    /**
     * Update spaceship
     * @param $id
     * @param SpaceshipRequest $request
     * @return Redirect
     */
    public function update($id, SpaceshipRequest $request) {
        $spaceships = new Spaceships();
        $flight = $spaceships->findOrFail($id);

        // Иначе не обновит
        $data = $request->all();

        // If has detail image
        if($request->hasFile('detail_image')) {
            // Upload new file
            $detailName = $this->UploadImage($request, $request->file('detail_image'), 'detail_image');

            $r = File::delete($this->destinationPath . $flight->detail_image); // delete old preview image
            $data['detail_image'] = $detailName;
        }


        // If has preview image
        if($request->hasFile('preview')) {
            // Upload new file
            $previewName = $this->UploadImage($request, $request->file('preview'), 'preview');

            File::delete($this->destinationPath . $flight->preview); // delete old preview image
            $data['preview'] = $previewName;
        }


        // If has carousel image
        if($request->hasFile('carousel')) {
            $carousel_request = $request->file('carousel');

            // Carousel Arr from DB
            $carousel_arr = explode(';', $flight->carousel);

            // If carousel from DB not empty
            if($carousel_arr[0] !== "") {
                // Get uniq name of carousel
                foreach($carousel_arr as $name) {
                    $carousel_arr_uniq[] = $this->getUniqCarouselName($name);
                }

                foreach($carousel_request as $key => $image) {
                    $imageName = $image->getClientOriginalName();
                    if(in_array($flight->carousel, $carousel_arr_uniq)) continue;

                    // generate hash for uniq image name
                    $imageName = $this->generateNameForPreview($imageName);
                    // Add to db fiel
                    $flight->carousel .= ';' . $imageName;
                    // Upload file
                    $request->file('carousel')[$key]->move($this->destinationPath, $imageName);
                }
            } else {
                foreach($carousel_request as $key => $image) {
                    $imageName = $image->getClientOriginalName();
                    // generate hash for uniq image name
                    $imageName = $this->generateNameForPreview($imageName);
                    // Add to db field
                    $flight->carousel .= ';' . $imageName;
                    // Upload file
                    $request->file('carousel')[$key]->move($this->destinationPath, $imageName);
                }

                // Delete first char (Иначе трабл при удалении картинки)
                $flight->carousel = ltrim($flight->carousel, ";");
            }
            // Add to data to update
            $data['carousel'] =  $flight->carousel;
        }

        // Update Json file
        $this->updateJsonFile($flight->name, $data['name']);


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

        // Delete detail image
        if($flight->detail_image) {
            File::delete($this->destinationPath . $flight->detail_image);
        }

        // delete preview image
        if($flight->preview) {
            File::delete($this->destinationPath . $flight->preview);
        }

        // Detele carousel images
        if($flight->carousel) {
            $carousel_arr = explode(';', $flight->carousel);
            foreach($carousel_arr as $image) {
                File::delete($this->destinationPath . $image); // delete preview image
            }
        }

        // delete Json file
        $this->deleteJsonFile($flight->name);

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
     * Upload image
     * @param $request
     * @param $image
     * @param $mode
     * @return string (name of image)
     */
    public function UploadImage($request, $image, $mode) {
        // Upload preview image
        $image_name = $this->renameAndUploadImage($image, $request, $mode);
        return $image_name;
    }



    /**
     * Rename & upload image
     * @param $preview
     * @param $request
     * @return string (full name)
     */
    public function renameAndUploadImage($preview, $request, $mode) {
        $previewName = $preview->getClientOriginalName();

        // generate hash for uniq image name
        $previewName = $this->generateNameForPreview($previewName);
        $request->file($mode)->move($this->destinationPath, $previewName);

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

        return $imageName;
    }


    /**
     * Delete carousel image
     * @param $id
     * @param $name
     * @return mixed
     */
    public function deleteCarouselImage($id, $name) {
        $carousel = Spaceships::where('id', $id)->pluck('carousel');

        $carousel_arr = explode(';', $carousel);

        foreach($carousel_arr as $key => $image) {
            // Delete from arr
            if($name === $image) {
                array_splice($carousel_arr, $key, 1);
                // Delete file
                File::delete($this->destinationPath . $image);
            }
        }

        $carousel = implode(';', $carousel_arr);

        // Add to db
        Spaceships::where('id', $id)->update(['carousel' => $carousel]);

        return redirect()->back();
    }


    /** Get uniq name of carousel image from DB
     * @param $name
     * @return string
     */
    public function getUniqCarouselName($name) {
        $name = substr($name, 5);
        return $name;
    }



    /**
     * Create Json file for search
     * @param $spaceship_name
     */
    public function createJsonFile($spaceship_name) {
        if($f = fopen($this->spaceships_json_file, "a+")) {
            // get the file
            $json_data = file_get_contents($this->spaceships_json_file);
            if(empty($json_data)) {
                $arr['name'] = $spaceship_name;
                $json_data[] = $arr;
            } else {
                $json_data = json_decode($json_data, true);
                $arr['name'] = $spaceship_name;
                $json_data[] = $arr;
            }

            $json_data = json_encode($json_data);
            file_put_contents($this->spaceships_json_file, $json_data);
        }
    }



    /**
     * Update Json file for search
     * @param $old_name
     * @param $new_name
     */
    public function updateJsonFile($old_name, $new_name){
        if($f = fopen($this->spaceships_json_file, "a+")) {
            // get the file
            $json_data = file_get_contents($this->spaceships_json_file);
            $json_data = json_decode($json_data, true);

            // change array
            foreach($json_data as &$value) {
                if($old_name === $value['name']) {
                    $value['name'] = $new_name;
                }
            }

            $json_data = json_encode($json_data);
            file_put_contents($this->spaceships_json_file, $json_data);
        }
    }


    /**
     * Delete Json file for search
     * @param $name
     */
    public function deleteJsonFile($name) {
        if($f = fopen($this->spaceships_json_file, "a+")) {
            // get the file
            $json_data = file_get_contents($this->spaceships_json_file);
            $json_data = json_decode($json_data, true);

            // search name array
            foreach($json_data as $key => $value) {
                if($name === $value['name']) {
                    unset($json_data[$key]);
                }
            }
            $json_data = json_encode($json_data);
            file_put_contents($this->spaceships_json_file, $json_data);
        }
    }
}



