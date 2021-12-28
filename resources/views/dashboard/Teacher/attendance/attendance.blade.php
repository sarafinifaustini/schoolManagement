@extends('layouts.app')
@section('content')

<section class="content-header">
    <h1 class="pull-left"><i class="fa fa-calendar"> Attendance</i></h1>
    <h1 class="pull-right">
        <a href="#" onclick="$('markAttendance').modal({'backdrop': 'static'});" class="btn btn-success pull-right"></a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body"></div>
    </div>
    <style>
        .btn-block {
            height: 28px;
            text-emphasis: center;
            text-anchor: top;
        }
    </style>
    @php
    @date=date('d-m-y'); //to format current date
    @endphp
    <div class="panel-default">
        <div class="panel-heading">
            <a href="#">
                <button class="btn bg-navy pull-right" data-toggle="modal" data-target="#ReportList">Attendance
                    Report</button>
            </a>
            @isset($class_id)
            <a href="{{ route('teacher.attendanceList',$class_id->teacher->id) }}" style="margin-right:10px;">
                <button class="btn bg-navy pull-right">Attendance List</button>
            </a>

            @endisset
            <h3 style="text-align:left; font-weight:bold; text-transform:uppercase">
                <i class="fa fa-calendar""></i>mark <b class=" color-red"> attendance</b>
            </h3>
        </div>
        {{-- Seach form --}}
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ url('sesarch/attendance/by/roll_no') }}" method="get">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" name="roll_no" placeholder="Roll No." id="roll_no"
                                    class="form-control" />
                                <button class="btn btn-primary btn-block" id="filter" onclick="searchStationTable();">
                                    <span class="glyphicon glyphicon-search">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- --}}
        <div class="row">
            <div class="col-md-3">
                <form action="{{ url('/search/attendance/by/class') }}" method="get">//search by class
                    <div class="form-group">
                        <div class="input-group">
                            <select name="class_id" id="class_id" class="form-control select_2_sibngle">
                                <option value="" selected dialog>Select class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $classs->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">
                                <button id="filter" class="btn btn-primary btn-block" onclick="searchStationTable();">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3">
            <form action="{{ url('/search/attendance/by/date') }}" method="get">//search by date
            <div class="form-group">
                <div class="input-group">
                    <input type="search" name="attendance_date" id="attendance_date" placeholder="Date" class="form-control" autocomplete="off">
               <span class="input-group-btn">
                   <button id="filter" class="btn btn-primary btn-block" onclick="searchStationTable();">
                <span class="glyphicon glyphicon-search"></span>
                </button>
               </span>
                   
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@if ($attendances != $date)
<form action="{{ url('MarkAttendanceClass') }}" method="post">
@csrf
@isset($students)
$include('teacher.attendance.mark_attendance')  
@endisset
<button type="submit" id="addAttendance" class="btn bg-navy pull-right"><i class="fa fa-pencil"></i> Mark Attendance</button>
</form>    
@endif
<div class="text-center"></div>
@endsection

@include('dashboard.Teacher.attendance.day_attendance')
@section('scripts')
    <script type="text/javascript">
    $('#semester_id').on('change', function(e){
        var semester_id = $(e.target).val()
    })


    </script>
@endsection