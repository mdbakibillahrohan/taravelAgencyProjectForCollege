@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="card card-primary col-md-6 offset-3">
            <div class="card-header">
                <h3 class="card-title">Add Review</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('review.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Reviewer Name</label>
                        <input name="reviewer_name" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Reviewer Name....">
                        @error('reviewer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Comments</label>
                        <textarea name="reviewer_comments" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        @error('reviewer_comments')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="reviewer_image" type="file" class="custom-file-input" id="image-choose">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Add Review</button>
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
