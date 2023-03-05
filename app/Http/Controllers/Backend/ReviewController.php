<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        return view('backend.pages.review.add_review');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'reviewer_name' => "required",
            'reviewer_comments' => "required",
        ]);
        $reviewer = new Review();
        if ($validate) {
            $reviewer->reviewer_name = $request->reviewer_name;
            $reviewer->reviewer_comments = $request->reviewer_comments;
            if ($request->hasFile("reviewer_image")) {
                $isUploaded = Storage::putFile('public',  $request->reviewer_image);
                if ($isUploaded) {
                    $reviewer->reviewer_image = explode("/", $isUploaded)[1];
                    if ($reviewer->save()) {
                        $notification = [
                            "type" => "success",
                            "msg" => "Successfully added review"
                        ];
                        session()->flash('notification', $notification);
                        return redirect()->back();
                    } else {
                        $notification = [
                            "type" => "error",
                            "msg" => "Error Occured"
                        ];
                        session()->flash('notification', $notification);
                        return redirect()->back();
                    };
                } else {
                    $notification = [
                        "type" => "error",
                        "msg" => "Image Uploading failed"
                    ];
                    session()->flash('notification', $notification);
                    return redirect()->back();
                }
            } else {
                // return "image not found";
                $notification = [
                    "type" => "error",
                    "msg" => "You didn't send any image"
                ];
                session()->flash('notification', $notification);
                return redirect()->back();
            }
        }
    }


    public function list()
    {
        $reviewList = Review::paginate();
        return view('backend.pages.review.list_review', ['Reviewers' => $reviewList]);
    }

    public function destroy($id)
    {
        $reviewer = Review::find($id);
        if ($reviewer->delete()) {
            $notification = [
                "type" => "success",
                "msg" => "Successfully deleted review"
            ];
            session()->flash('notification', $notification);
            return redirect()->back();
        } else {
            $notification = [
                "type" => "error",
                "msg" => "Error Occured"
            ];
            session()->flash('notification', $notification);
            return redirect()->back();
        }
    }
}
