@extends('layouts.merchant')
@section('content')
    <div class="container">
        <div class="alert alert-primary alert-dismissible show fade fs-6">
            Hallo, {{ Auth::user()->name }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

@endsection