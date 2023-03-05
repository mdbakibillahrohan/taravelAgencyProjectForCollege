<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'package_location' => "required",
            'package_title' => "required",
            'package_old_price' => "required",
            'package_new_price' => "required",
            'package_description' => "required"
        ]);
        if ($validate) {
            $Package = new Package();
            $Package->package_location = $request->package_location;
            $Package->package_title = $request->package_title;
            $Package->package_old_price = $request->package_old_price;
            $Package->package_new_price = $request->package_new_price;
            $Package->package_description = $request->package_description;


            if ($request->hasFile('package_image')) {
                $isUploaded = Storage::putFile('public', $request->package_image);
                $Package->package_image = explode('/', $isUploaded)[1];
                if ($Package->save()) {
                    $notification = [
                        "type" => "success",
                        "msg" => "Successfully added Packages"
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
        }
    }



    public function list()
    {
        $Packages = Package::all();
        return view('backend.pages.package.list_package', ['Packages' => $Packages]);
    }

    public function destroy($id)
    {
        $Package = Package::find($id);
        if (Storage::delete($Package->package_image)) {
            if ($Package->delete()) {
                $notification = [
                    "type" => "success",
                    "msg" => "Successfully Deleted Packages"
                ];
                session()->flash('notification', $notification);
                return redirect()->back();
            }
        }
    }
}
