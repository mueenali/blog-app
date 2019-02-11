<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminPhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $photos = Photo::paginate(20);
        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.media.upload');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = time() . $file->getClientOriginalName();
        $file->move('images', $path);
        Photo::create(['path' => $path]);
    }

    public function destroy(Request $request)
    {
        if (isset($request->delete_all) && !empty($request->checkbox)) {
            $photos = Photo::findOrFail($request->checkbox);
            foreach ($photos as $photo) {
                unlink(public_path() . '/' . $photo->path);
                $photo->delete();
            }
            return redirect()->back();

        } else {
            return redirect()->back();
        }
    }
}
