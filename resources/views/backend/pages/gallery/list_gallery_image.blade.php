@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <h3 class="text-center my-3">List of Packages</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($GalleryImages as $galleryImage)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $galleryImage->gallery_title }}</td>
                            <td>{{ $galleryImage->gallery_description }}</td>
                            <td><img width="50px" src="{{ asset('storage/' . $galleryImage->gallery_image) }}"
                                    alt="">
                            </td>
                            <td>
                                <button class="btn-sm btn-secondary">Edit</button>
                                <a href="" class="btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
