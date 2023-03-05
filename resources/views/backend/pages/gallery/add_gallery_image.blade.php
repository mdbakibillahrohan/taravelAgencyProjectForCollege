@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="card card-primary col-md-6 offset-3">
            <div class="card-header">
                <h3 class="card-title">Add Gallery Image</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gallery Image Title</label>
                        <input name="gallery_title" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Gallery Image Title....">
                        @error('gallery_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Gallery Description</label>
                        <textarea name="gallery_description" class="form-control" rows="5" placeholder="Description..."></textarea>
                        @error('gallery_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gallery Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="gallery_image" type="file" class="custom-file-input" id="image-choose">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>

                        </div>
                        @error('gallery_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Add Gallery Image</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('backend_script')
    <script>
        $('#image-choose').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
