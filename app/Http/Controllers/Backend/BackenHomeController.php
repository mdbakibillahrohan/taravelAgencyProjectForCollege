<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Review;
use Illuminate\Http\Request;

class BackenHomeController extends Controller
{
    public function index()
    {
        $ReviewersCount = Review::all()->count();
        $PackagesCount = Package::all()->count();
        $GalleryImagesCount = Gallery::all()->count();
        $ContactsCount = Contact::all()->count();
        return view('backend.pages.dashboard', ['ReviewersCount' => $ReviewersCount, 'PackagesCount' => $PackagesCount, 'GalleryImagesCount' => $GalleryImagesCount, 'ContactsCount' => $ContactsCount]);
    }
}
