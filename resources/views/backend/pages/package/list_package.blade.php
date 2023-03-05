@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <h3 class="text-center my-3">List of Packages</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Location</th>
                        <th>Title</th>
                        <th>Old Price</th>
                        <th>New Price</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($Packages as $package)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $package->package_location }}</td>
                            <td>{{ $package->package_title }}</td>
                            <td>{{ $package->package_old_price }}</td>
                            <td>{{ $package->package_new_price }}</td>
                            <td><img width="50px" src="{{ asset('storage/' . $package->package_image) }}" alt="">
                            </td>
                            <td>
                                <button class="btn-sm btn-secondary">Edit</button>
                                <a href="{{ route('package.delete', $package->id) }}" class="btn-sm btn-danger">Delete</a>
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
