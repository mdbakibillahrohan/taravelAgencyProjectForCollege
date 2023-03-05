@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="card card-primary col-md-6 offset-3">
            <div class="card-header">
                <h3 class="card-title">Add Package</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('package.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Location</label>
                        <input name="package_location" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Package Location....">
                        @error('package_location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Title</label>
                        <input name="package_title" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Package Title....">
                        @error('package_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Package Old Price</label>
                        <input name="package_old_price" type="number" class="form-control" id="exampleInputEmail1"
                            placeholder="Old Price....">
                        @error('package_old_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Package New Price</label>
                        <input name="package_new_price" type="number" class="form-control" id="exampleInputEmail1"
                            placeholder="New Price....">
                        @error('package_new_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Package Description</label>
                        <textarea name="package_description" class="form-control" rows="5" placeholder="Description ..."></textarea>
                        @error('package_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Package Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="package_image" type="file" class="custom-file-input" id="image-choose">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Add Package</button>
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
