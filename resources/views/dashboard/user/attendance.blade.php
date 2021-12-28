@extends('layouts.app')
@section('content')

<div class="container">
    <div class=" row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <table class="table table-sm table-hover table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Classes Absent</th>
                            <th scope="col">percentage Absent</th>
                            <th scope="col">Classes Present</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($teachers as $index => $teacher)
                        @if ($teacher->class->id ==2)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->subject->name }}</td>
                            <td>4</td>
                            <td>10%</td>
                            <td>40</td>
                        </tr>
                        @endif

                         @endforeach </tbody>
                </table>
            </div>
            <!-- partial -->
            @endsection
