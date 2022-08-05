@extends('admin.layouts.layout')
@section('content')
    <main class="main" id="main">
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">About Section:</h5>

                    <form action="{{ route('about') }}" method="post" enctype="multipart/form-data">

                        @if (session('message'))
                            <div class="alert alert-success" role="success">
                                {{ session('message') }}
                            </div>
                        @endif

                        @csrf

                        {{-- tagline --}}
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tagline:</label>
                            <div class="col-sm-10">
                                <input type="text" name="tagline" class="form-control @error('tagline') border-red-500 @enderror"
                                    value="{{ $about_details['tagline'] }}" >

                                @error('tagline')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        {{-- current Designation --}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Current Designation:</label>
                            <div class="col-sm-10">
                                <input type="text" name="curr_designation"
                                    class="form-control @error('title') border-red-500 @enderror"
                                    value="{{ $about_details['curr_designation'] }}" required>

                                @error('curr_designation')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>



                        {{-- profile Image --}}
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Profile Image:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="profile_image" id="formFile" accept="image/*" 
                                value="{{ $about_details['image'] }}">

                                @error('profile_image')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        
                        <div class="row mb-3">

                            {{-- Degree --}}
                            <label for="inputText" class="col-sm-2 col-form-label">Degree:</label>
                            <div class="col-sm-4">
                                <input type="text" name="degree"
                                    class="form-control @error('degree') border-red-500 @enderror"
                                    value="{{ $about_details['degree'] }}">

                                @error('degree')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- D.O.B --}}
                            <label for="inputText" class="col-sm-2 col-form-label">Date Of Birth:</label>
                            <div class="col-sm-3">
                                <input type="date" name="dob"
                                    class="form-control @error('dob') border-red-500 @enderror"
                                    value="{{ $about_details['dob'] }}">

                                @error('dob')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            
                            {{-- Contact No --}}
                            <label for="inputText" class="col-sm-2 col-form-label">Contact No:</label>
                            <div class="col-sm-4">
                                <input type="tel" name="contact_no"
                                    class="form-control @error('contact_no') border-red-500 @enderror"
                                    value="{{ $about_details['contact_no'] }}">

                                @error('contact_no')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Email --}}
                            <label for="inputText" class="col-sm-1 col-form-label">Email:</label>
                            <div class="col-sm-4">
                                <input type="email" name="email"
                                    class="form-control -mx-2 @error('email') border-red-500 @enderror"
                                    value="{{ $about_details['email'] }}">

                                @error('email')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">

                            {{-- City --}}
                            <label for="inputText" class="col-sm-2 col-form-label">City:</label>
                            <div class="col-sm-4">
                                <input type="text" name="city"
                                    class="form-control @error('city') border-red-500 @enderror"
                                    value="{{ $about_details['city'] }}">                                    

                                @error('city')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">

                            {{-- FreeLance --}}
                            <label for="inputText" class="col-sm-2 col-form-check-label">FreeLance:</label>
                            <div class="col-sm-4">
                               
                                <input type="checkbox" name="freelance"
                                    class="form-check-input @error('freelance') border-red-500 @enderror" 
                                    @if (  $about_details['freelance']  == 'available')
                                        checked
                                    @endif
                                    value="available" >
                              

                                @error('freelance')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                   

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">About Yourself:</label>
                            <div class="col-sm-10">
                                <textarea name="about_yourself" class="form-control @error('about_yourself') border-red-500 @enderror"
                                    value="{{ $about_details['about_yourself'] }}" style="height: 100px"></textarea>

                                @error('about_yourself')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Submit Button</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>




     
    </main>
@endsection
