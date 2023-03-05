<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Review;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function index()
    {
        $Packages = Package::all();
        $GalleryImages = Gallery::all();
        $Reviewers = Review::all();
        return view('frontend.home', ['Packages' => $Packages, 'GalleryImages' => $GalleryImages, 'Reviewers' => $Reviewers]);
    }
}
