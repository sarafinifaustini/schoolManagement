@extends('layouts.master')
@section('content')
<div class="container" id="app">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Calendar</h3>
                </div>
            </div>
            <agenda-index></agenda-index>
        </div>
    </div>
</div>
@endsection
