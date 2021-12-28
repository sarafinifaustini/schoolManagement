@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header text-center">

                    Add Student</div>

                <div class="card-body">
                    <form action="addUser" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class=" required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 form-group row ">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                }}</label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="Your email"
                                    class="form-control @error('email') is-invalid  @enderror"
                                    value="{{ old('email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Admission Number</label>
                            <div class="col-md-6">
                                <input type="int" name="username" id="username" placeholder="Username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="parentName" class="col-md-4 col-form-label text-md-right">Parent Name</label>
                            <div class="col-md-6">
                                <input type="text" name="parentName" id="parentName" placeholder="Name of Parent"
                                    class="form-control @error('parentName') is-invalid @enderror"
                                    value="{{ old('parentName') }}">

                                @error('parentName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">parent
                                PhoneNumber</label>
                            <div class="col-md-6">
                                <input type="tel" name="phoneNumber" id="phoneNumber"
                                    placeholder="Phone Number of Parent"
                                    class="form-control @error('phoneNumber') is-invalid @enderror"
                                    value="{{ old('phoneNumber') }}">

                                @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="yob" class="col-md-4 col-form-label text-md-right">Year of Birth</label>
                            <div class="col-md-6">
                                <input type="date" name="yob" id="yob" placeholder="yob"
                                    class="form-control @error('yob') is-invalid @enderror" value="{{ old('yob') }}">

                                @error('yob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="yearJoined" class="col-md-4 col-form-label text-md-right">Year Joined</label>
                            <div class="col-md-6">
                                <input type="date" name="yearJoined" id="yearJoined" placeholder="year Joined"
                                    class="form-control @error('yearJoined') is-invalid @enderror"
                                    value="{{ old('yearJoined') }}">

                                @error('yearJoined')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="classAssigned" class="col-md-4 col-form-label text-md-right">Assigned
                                Class</label>
                            <div class="col-md-6">
                                <input type="classAssigned" name="classAssigned" id="classAssigned"
                                    placeholder="Assigned Class"
                                    class="form-control @error('classAssigned') is-invalid @enderror"
                                    value="{{ old('classAssigned') }}">

                                @error('classAssigned')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" placeholder="Choose a password"
                                    class="form-control @error('password') is-invalid @enderror" value="">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm
                                Password
                            </label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Repeat your password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" value="">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-4 form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Student') }}
                                    </button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
