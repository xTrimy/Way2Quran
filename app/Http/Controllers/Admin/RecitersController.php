<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reciter;
use App\Models\Surah;
use Illuminate\Http\Request;

class RecitersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reciters = Reciter::paginate(15);
        return view('admin.reciters.index', compact('reciters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reciters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'slug' => 'required|unique:reciters',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable',
            'bio_en' => 'nullable',
        ]);

        $reciter = new Reciter();
        $reciter->name = $request->name;
        $reciter->name_en = $request->name_en;
        $reciter->slug = $request->slug;
        $reciter->bio = $request->bio??null;
        $reciter->bio_en = $request->bio_en??null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->slug . '.' . $image->getClientOriginalExtension();
            $target_path = "images/reciters/";
            $destinationPath = public_path($target_path);
            $image->move($destinationPath, $name);
            $reciter->image = $target_path . $name;
        }

        $reciter->save();

        return redirect()->route('admin.reciters.index')->with('success', 'Reciter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reciter = Reciter::findOrFail($id);
        $surahs = Surah::all();
        return view('admin.reciters.show', compact('reciter', 'surahs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reciter = Reciter::findOrFail($id);
        return view('admin.reciters.create', compact('reciter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'name_en' => 'required',
            'slug' => 'required|unique:reciters,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable',
            'bio_en' => 'nullable',
        ]);

        $reciter = Reciter::findOrFail($id);
        $reciter->name = $request->name;
        $reciter->name_en = $request->name_en;
        $reciter->slug = $request->slug;
        $reciter->bio = $request->bio??null;
        $reciter->bio_en = $request->bio_en??null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $request->slug . '.' . $image->getClientOriginalExtension();
            $target_path = "images/reciters/";
            $destinationPath = public_path($target_path);
            // Delete old image
            if (file_exists(public_path($reciter->image))) {
                unlink(public_path($reciter->image));
            }
            $image->move($destinationPath, $name);
            $reciter->image = $target_path . $name;
        }

        $reciter->save();

        return redirect()->route('admin.reciters.index')->with('success', 'Reciter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
