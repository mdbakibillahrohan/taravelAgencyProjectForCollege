<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $GalleryImages = Gallery::all();
        return view('backend.pages.gallery.list_gallery_image', ['GalleryImages' => $GalleryImages]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'gallery_title' => "required",
            'gallery_description' => "required",
            'gallery_image' => 'image|required',
        ]);

        if ($validate) {
            $gallery = new Gallery();
            $gallery->gallery_title = $request->gallery_title;
            $gallery->gallery_description = $request->gallery_description;

            if ($request->hasFile('gallery_image')) {
                $isUploaded = Storage::putFile('public', $request->gallery_image);
                if ($isUploaded) {
                    $gallery->gallery_image = explode('/', $isUploaded)[1];
                    if ($gallery->save()) {
                        $notification = [
                            "type" => "success",
                            "msg" => "Successfully added Gallery Image"
                        ];
                        session()->flash('notification', $notification);
                        return redirect()->back();
                    } else {
                        $notification = [
                            "type" => "error",
                            "msg" => "Something went wrong"
                        ];
                        session()->flash('notification', $notification);
                        return redirect()->back();
                    }
                } else {
                    $notification = [
                        "type" => "error",
                        "msg" => "Image Uploading failed"
                    ];
                    session()->flash('notification', $notification);
                    return redirect()->back();
                }
            } else {
                $notification = [
                    "type" => "error",
                    "msg" => "You didn't send any image"
                ];
                session()->flash('notification', $notification);
                return redirect()->back();
            }
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
