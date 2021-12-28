@extends('layouts.app')
@section('content')
<div class="py-4">
    <div class="container">
        <div class="row">
            @foreach ($students as $student)
            @if ($student->email == Auth::user()->email)



            <div class="col-lg-4 mt-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="/images/img_avatar2.png" alt="student dp" style="width:40%">
                        <h3>{{ $student->name}}</h3>
                    </div>
                    <div class="card-body">
                        <p class="mb-0"><strong class="pr-1">Student Email:</strong>{{ $student->email }}</p>
                        <p class="mb-0"><strong class="pr-1">Class:</strong>{{ $student->class->name }}</p>
                        <p class="mb-0"><strong class="pr-1">Section:</strong>{{$student->section->name  }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Parent Name</th>
                                <td width="2%">:</td>
                                <td>{{ $student->parentName }}</td>
                            </tr>
                            <tr>
                                <th width="30%">Parent PhoneNumber </th>
                                <td width="2%">:</td>
                                <td>{{ $student->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <th width="30%">Year Joined </th>
                                <td width="2%">:</td>
                                <td>{{ $student->yearJoined }}</td>
                            </tr>
                            <tr>
                                <th width="30%">Age </th>
                                <td width="2%">:</td>
                                <td>{{$student->age}}</td>
                            </tr>
                            <tr>
                                <th width="30%">Year of Birth </th>
                                <td width="2%">:</td>
                                <td>{{ $student->yob }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div style="height: 26px"></div>

            </div>
            @endif

             @endforeach </div>

        </div>

        <div class="container">
            <div class=" row justify-content-center">
               
                    <div class="card">

                            <h3>Attendance</h3>

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

                                @endforeach
                            </tbody>
                        </table>
                    </div>
    </div>
    <!-- partial -->
    @endsection
