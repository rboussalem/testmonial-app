<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestmonialRequest;
use App\Models\Testmonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestmonialGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testmonials = Testmonial::where('statut', 'approuvé')
            ->orderBy('order', 'desc')
            ->take(4)
            ->get();
        return view('guest.index', ['testmonials' => $testmonials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestmonialRequest $request)
    {
        $testmonial = new Testmonial();
        $testmonial->titre = $request->input('titre');
        $testmonial->message = $request->input('message');
        $testmonial->statut = 'en attente';
        $testmonial->order = count(Testmonial::all()) + 1;
        if (!empty($request->file)) {
            $file = $request->file;
            $filename = date('Y-m-d-H-i-s') . '-' . Str::slug($testmonial->titre, '-') . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/testmonial-piece-jointe', $filename);
            $testmonial->path = $path;
        }
        $testmonial->save();
        $request->session()->flash('status', 'Testmonial Est Ajoutée !');
        return redirect()->route('guest.testmonial.index');
    }
}
