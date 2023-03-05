@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <h3 class="text-center my-3">List of Contact</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($Contacts as $contact)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->number }}</td>
                            </td>
                            <td>
                                <a href="{{ route('contact.show', $contact->id) }}" class="btn-sm btn-success">View</a>
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
