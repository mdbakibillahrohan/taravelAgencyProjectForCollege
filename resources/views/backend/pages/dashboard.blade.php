@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 ">
                <a href="{{ route('package.list') }}">
                    <div class="border text-center py-3 bg-success h-12 rounded">
                        <h3 class="text-light">{{ $PackagesCount }}</h3>
                        <span class="fw-bold text-light">Packages</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ">
                <a href="{{ route('review.list') }}">
                    <div class="border text-center py-3 bg-success h-12 rounded">
                        <h3 class="text-light">{{ $ReviewersCount }}</h3>
                        <span class="fw-bold text-light">Reviewers</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ">
                <a href="{{ route('contact.list') }}">
                    <div class="border text-center py-3 bg-success h-12 rounded">
                        <h3 class="text-light">{{ $ContactsCount }}</h3>
                        <span class="fw-bold text-light">All Contacts</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ">
                <a href="{{ route('gallery.list') }}">
                    <div class="border text-center py-3 bg-success h-12 rounded">
                        <h3 class="text-light">{{ $GalleryImagesCount }}</h3>
                        <span class="fw-bold text-light">Gallery Images</span>
                    </div>
                </a>
            </div>


        </div>
    </div>
@endsection
