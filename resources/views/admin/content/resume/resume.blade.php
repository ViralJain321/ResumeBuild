@extends('admin.layouts.layout')
@section('content')
    <main class="main" id="main">
        <section class="section">

            <div class="card">
                <form action="{{ route('resume') }}" method="post">

                  
                    @csrf

                    {{-- Summary Section --}}
                    <div class="card-body">
                        <h5 class="card-title">Summary Section</h5>

                        @if (session('message'))
                            <div class="alert alert-success" role="success">
                                {{ session('message') }}
                            </div>
                        @endif

                     
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name"
                                    class="form-control @error('name') border-red-500 @enderror" required
                                    value="{{ $resume_details['name'] }}"
                                    >

                                @error('name')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea name="summ_description" class="form-control @error('summ_description') border-red-500 @enderror"
                                    value="{{ $resume_details['summ_description'] }}"
                                     style="height: 100px"></textarea>

                                @error('summ_description')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>

                    {{-- Education Section --}}
                    <div class="card-body">
                        <h5 class="card-title">Education Section</h5>



                        @if (session('message'))
                            <div class="alert alert-success" role="success">
                                {{ session('message') }}
                            </div>
                        @endif


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Course Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="edu_course_name"
                                    class="form-control @error('edu_course_name') border-red-500 @enderror" required
                                    {{-- value="{{ $resume_details['edu_course_name'] }}" --}}
                                    >

                                @error('edu_course_name')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3 ">
                            <label for="inputText" class="col-sm-2 col-form-label">Start Year:</label>
                            <div class="col-sm-1 align-left">
                                <input type="text" name="edu_st_year"
                                    class="form-control @error('edu_st_year') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['edu_st_year'] }}" --}}
                                    >

                                @error('edu_st_year')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <label for="inputText" class="col-sm-2 col-form-label text-sm-center">End Year:</label>
                            <div class="col-sm-1 align-left">
                                <input type="text" name="edu_end_year"
                                    class="form-control @error('edu_end_year') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['edu_end_year'] }}" --}}
                                    >

                                @error('edu_end_year')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>




                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Institute Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="edu_institute_name"
                                    class="form-control @error('edu_institute_name') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['edu_institute_name'] }}" --}}
                                    >

                                @error('edu_institute_name')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea name="edu_description" class="form-control @error('edu_description') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['edu_description'] }}"  --}}
                                    style="height: 100px"></textarea>

                                @error('edu_description')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>




                    </div>

                    {{-- Professional Section --}}
                    <div class="card-body">
                        <h5 class="card-title">Professional Section</h5>

                        @if (session('message'))
                            <div class="alert alert-success" role="success">
                                {{ session('message') }}
                            </div>
                        @endif

                      
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Role:</label>
                            <div class="col-sm-10">
                                <input type="text" name="work_role"
                                    class="form-control @error('work_role') border-red-500 @enderror" required
                                    {{-- value="{{ $resume_details['work_role'] }}" --}}
                                    >

                                @error('work_role')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3 ">
                            <label for="inputText" class="col-sm-2 col-form-label ">Start Year:</label>
                            <div class="col-sm-1 ">
                                <input type="text" name="work_st_year"
                                    class="form-control  @error('work_st_year') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['work_st_year'] }}" --}}
                                    >

                                @error('work_st_year')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <label for="inputText" class="col-sm-2 col-form-label text-sm-center ">End Year:</label>
                            <div class="col-sm-1">
                                <input type="text" name="work_end_year"
                                    class="form-control @error('work_end_year') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['work_end_year'] }}" --}}
                                    >

                                @error('work_end_year')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Company Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="work_place"
                                    class="form-control @error('work_place') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['work_place'] }}" --}}
                                    >

                                @error('work_place')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea name="work_description" class="form-control @error('work_description') border-red-500 @enderror"
                                    {{-- value="{{ $resume_details['work_description'] }}"  --}}
                                    style="height: 100px"></textarea>

                                @error('work_description')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>



                    </div>



                    <div class="card-body">
                        <div class="row mb-3 mt-5">
                            <label class="col-sm-2 col-form-label">Submit Button</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ">Submit Form</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </section>
    </main>
@endsection
