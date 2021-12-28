@extends('layouts.master')
@section('content')
<div class="container" id="app">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Teacher Details</h3>
                </div>
            </div>
            {{-- <example-component></example-component> --}}
            <teacher-index></teacher-index>
        </div>
    </div>
</div>
@endsection
