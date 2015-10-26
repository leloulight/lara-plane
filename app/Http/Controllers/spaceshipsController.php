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
        return view('spaceships.index', compact('spaceships'));
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

        return view('spaceships.show', compact('spaceship'));
    }
}
