<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTestmonialRequest;
use App\Models\Testmonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestmonialAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testmonials = Testmonial::orderBy('order', 'desc')
            ->paginate(5);
        return view('admin.index', ['testmonials' => $testmonials]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testmonial = Testmonial::findOrFail($id);
        return view('admin.edit', ['testmonial' => $testmonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestmonialRequest $request, $id)
    {
        // dd($request);
        $testmonial = Testmonial::findOrFail($id);
        $testmonial->titre = $request->input('titre');
        $testmonial->message = $request->input('message');
        $testmonial->statut = $request->input('statut');

        if (!empty($request->file)) {
            Storage::delete($testmonial->path);
            $file = $request->file;
            $filename = date('Y-m-d-H-i-s') . '-' . Str::slug($testmonial->titre, '-') . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/testmonial-piece-jointe', $filename);
            $testmonial->path = $path;
        }

        $testmonial->save();
        $request->session()->flash('status', 'Testmonial Est Modifié !');
        return redirect()->route('admin.testmonial.index');
    }

    /**
     * Change The Order Of The Listing 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_order()
    {
        dd("Admin Change Order");
    }
}
