@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        <form action="{{ route('user.register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}">

                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Admission Number</label>
                <input type="text" name="username" id="username" placeholder="Username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ old('username') }}">

                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="parentName" class="sr-only">Parent Name</label>
                <input type="text" name="parentName" id="parentName" placeholder="Name of Parent"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('parentName') border-red-500 @enderror"
                    value="{{ old('parentName') }}">

                @error('parentName')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phoneNumber" class="sr-only">"parent PhoneNumber"</label>
                <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Phone Number of Parent"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phoneNumber') border-red-500 @enderror"
                    value="{{ old('phoneNumber') }}">

                @error('phoneNumber')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="yob" class="sr-only">Year of Birth</label>
                <input type="date" name="yob" id="yob" placeholder="yob"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('yob') border-red-500 @enderror"
                    value="{{ old('yob') }}">

                @error('yob')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="yearJoined" class="sr-only">Year Joined</label>
                <input type="year" name="yob" id="yearJoined" placeholder="year Joined"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('yearJoined') border-red-500 @enderror"
                    value="{{ old('yearJoined') }}">

                @error('yearJoined')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="classAssigned" class="sr-only">Assigned Class</label>
                <input type="classAssigned" name="yob" id="yearJoined" placeholder="Assigned Class"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('classAssigned') border-red-500 @enderror"
                    value="{{ old('classAssigned') }}">

                @error('classAssigned')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">

                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value="">

                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Repeat your password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror"
                    value="">

                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
