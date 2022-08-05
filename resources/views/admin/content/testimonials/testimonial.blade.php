@extends('admin.layouts.layout')
@section('content')
    <main class="main" id="main">
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insert a Testimonial</h5>

                    <form action="{{ route('insertTestmonial') }}" method="post" enctype="multipart/form-data">

                        @if (session('message'))
                            <div class="alert alert-success" role="success">
                                {{ session('message') }}
                            </div>
                        @endif

                        @csrf

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name"
                                    class="form-control @error('name') border-red-500 @enderror"
                                    value="{{ old('name') }}">

                                @error('name')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Designation:</label>
                            <div class="col-sm-10">
                                <input type="text" name="designation"
                                    class="form-control @error('designation') border-red-500 @enderror"
                                    value="{{ old('designation') }}">

                                @error('designation')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Image:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="formFile" accept="image/*">

                                @error('image')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control @error('description') border-red-500 @enderror"
                                    value="{{ old('description') }}" style="height: 100px"></textarea>

                                @error('description')
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




        {{-- Display Services --}}
        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Testimonials</h5>

                    <table class="table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Description</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $i = 1;
                            @endphp

                            @foreach ($all_testimonials as $testimonial)
                            <form action="{{route('insertTestmonial')}}" method="post">


                              <input type="hidden" name='id' class="form-control text-center" value="{{ $testimonial['id'] }}" > 

                                @csrf
                                <tr class="text-center">
                                    <div class="col-4">
                                        <th scope="row" align="text-center">{{ $i++ }}


                                       
                                        <td>{{ $testimonial['name'] }}</td>
                                        <td>{{ $testimonial['designation'] }}</td>
                                        <td>{{ $testimonial['description'] }}</td>

                                        <td align="center"> <button type="submit" class="btn btn-primary" name='delete' value="delete"
                                                id="delete">Delete</button> </td>

                                    </div>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>
@endsection
