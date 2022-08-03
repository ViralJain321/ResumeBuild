@extends('admin.layouts.layout')
@section('content')
    <main class="main" id="main">
        <section class="section">




            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insert a Service</h5>

                    <form action="{{ route('insertService') }}" method="post" enctype="multipart/form-data">

                        @if (session('message'))
                            <div class="alert alert-success" role="success">
                                {{ session('message') }}
                            </div>
                        @endif

                        @csrf



                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" name="title"
                                    class="form-control @error('title') border-red-500 @enderror"
                                    value="{{ old('title') }}">

                                @error('title')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Service Logo:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="logo" id="formFile" accept="image/*">
                                @error('logo')
                                    <div class="error text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Service Description:</label>
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
                    <h5 class="card-title">All Services</h5>

                    <table class="table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description(in %)</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $i = 1;
                            @endphp

                            @foreach ($all_services as $service)
                            <form action="{{route('insertService')}}" method="post">

                                
                              <input type="hidden" name='title' class="form-control text-center" value="{{ $service['title'] }}" > 

                                @csrf
                                <tr class="text-center">
                                    <div class="col-4">
                                        <th scope="row" align="text-center">{{ $i++ }}


                                       
                                        <td>{{$service['title']}}</td>
                                        <td> {{ $service['description'] }}</td>

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
