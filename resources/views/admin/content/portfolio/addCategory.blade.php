@extends('admin.layouts.layout');
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Portfolio Category</h5>

                    <!-- Vertical Form -->
                    {{-- @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif --}}

                 

                   

                    <form action="{{ route('addPortfolioCategory') }}" method='post' class="row g-3">

                        @csrf

                        <div class="col-4">
                            <label for="name" class="form-label">Category Name:</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                        </div>
                    </form><!-- Vertical Form -->


                    

                </div>
            </div>
        </section>
         
    </main>

   
@endsection
