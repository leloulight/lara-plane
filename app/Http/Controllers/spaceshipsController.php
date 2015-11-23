<?php

namespace App\Http\Controllers;
use App\Spaceships;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class spaceshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaceships = Spaceships::latest('created_at')->paginate(10);

        $meta_title = 'Космические корабли';
        $meta_desc = 'Найти космический корабль';
        return view('spaceships.index', compact('spaceships', 'meta_title', 'meta_desc'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spaceship = Spaceships::findOrFail($id);

        // Split carousel string
        $carousel = explode(';', $spaceship->carousel);

        // Real or Not
        $spaceship->real = ($spaceship->real ? 'Да' : 'Нет');

        $meta_title = $spaceship->meta_title;
        $meta_desc = $spaceship->meta_desc;
        return view('spaceships.show', compact('spaceship', 'carousel', 'meta_title', 'meta_desc'));
    }
}
