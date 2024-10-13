<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }
    public function index()
    {
        $medias = Media::paginate(10);
        return view('admin.settings.list', compact('medias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'page' => 'required|unique:media,page',
            'type' => 'required',
            'file' => is_null($request->youtube) && is_null($request->file) && is_null($request->vimeo) ? 'required' : '',
        ]);

        $media = Media::create([
            'name' => $request->name,
            'page' => $request->page,
            'type' => $request->type,
            'status' => $request->status
        ]);

        if( isset($request->file) ){

            ini_set('memory_limit', '2048M');
            ini_set('max_execution_time', '900');

            $file = $request->file('file'); 
            $ext = $file->getClientOriginalExtentsion();
            $name = time().'.'.$ext;
            $file->storeAs('uploads/media/',$name,'public');

            $media->file = $name;
            $media->save();

        } else {
            $file = isset( $request->youtube ) ? $request->youtube : $request->vimeo;
            $media->file = $file;
            $media->save();
        }

        return redirect()->route('admin.settings.index')->with('success', 'Media added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $media = Media::find($id);
        return view('admin.settings.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $this->validate($request, [
            'name' => 'required',
            'page' => [
                'required',
                'string',
                Rule::unique('media')->ignore($id)
            ],
            'type' => 'required',
            'file' => ( is_null($request->youtube) && is_null($request->vimeo) ) && $request->type != 'upload_files' ? 'required' : '',
        ]);

        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', '900');

      //  dd($request->all());
            $media = Media::find($id);
            
            $media->name   = $request->name;
            $media->page   = $request->page;
            $media->type   = $request->type;
            $media->status = $request->status;

        if(  !is_null($request->file) ){

           // dd(1);
            $file = $request->file('file'); 
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $file->storeAs('uploads/media/',$name,'public');

            $media->file = $name;

        } else if( isset( $request->youtube ) ||  isset( $request->vimeo ) ) {
            $file = isset( $request->youtube ) ? $request->youtube : $request->vimeo;
            $media->file = $file;
        }

        $media->save();

        return redirect()->route('admin.settings.index')->with('success', 'Media updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Media::find($id)->delete();
        return redirect()->back()->with('success','Media deleted successfully.');
    }
}
