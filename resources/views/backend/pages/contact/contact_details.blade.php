@extends('backend.layouts.backend_layout')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Contact Detail</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <h4>Message</h4>
                    <div class="border p-2 my-3 rounded">
                        {{ $Contact->message }}
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> AdminLTE v3</h3>
                    <p class="text-muted">
                    </p>


                    <h5 class="mt-5 text-muted">Details of Mail</h5>
                    <div>
                        <span class="font-weight-bold">Name: </span>
                        <span>{{ $Contact->name }}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold">Subject: </span>
                        <span>{{ $Contact->subject }}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold">Email: </span>
                        <span>{{ $Contact->email }}</span>
                    </div>
                    <div>
                        <span class="font-weight-bold">Contact Number: </span>
                        <span>{{ $Contact->number }}</span>
                    </div>


                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
