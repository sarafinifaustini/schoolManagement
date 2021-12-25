@extends('layouts.master')
@section('content')
<div class="container" id="app">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Details</h3>
                </div>
            </div>
            {{-- <example-component></example-component> --}}
            <students-index></students-index>
        </div>
    </div>
</div>
@endsection
