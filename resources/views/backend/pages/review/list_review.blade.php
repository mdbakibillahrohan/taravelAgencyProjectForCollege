@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h3 class="text-center my-3">List of Reviewers</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Comments</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($Reviewers as $reviewer)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $reviewer->reviewer_name }}</td>
                            <td>{{ $reviewer->reviewer_comments }}</td>
                            <td><img width="50px" src="{{ asset('storage/' . $reviewer->reviewer_image) }}" alt="">
                            </td>
                            <td>
                                <button class="btn-sm btn-secondary">Edit</button>
                                <a href="{{ route('review.delete', $reviewer->id) }}" class="btn-sm btn-danger">Delete</a>
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
