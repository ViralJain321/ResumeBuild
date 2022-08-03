@extends('admin.layouts.layout')
@section('content')

<main class="main" id="main">
    <section class="section">



<div class="card">
    <div class="card-body">
      <h5 class="card-title">Insert Portfolio Entry</h5>

      <form action="{{ route('insertPortfolioEntry') }}" method="post" enctype="multipart/form-data" >

        @if (session('message'))
      
        <div class="alert alert-success" role="success">
            {{ session('message') }}
        </div>
  
            
        @endif

        @csrf

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Select Category:</label>
            <div class="col-sm-10">
              <select class="form-select" name="category" aria-label="Default select example" required>
                <option selected disabled>Choose a Category</option>
                @foreach ($all_categories as $category )
                    <option value="{{$category['name']}}">{{ucfirst($category['name'])}}</option>
                @endforeach
              
               
              </select>
            </div>
          </div>


        <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Name:</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control">
          </div>
        </div>


        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">PortFolio Image:</label>
            <div class="col-sm-10">
              <input class="form-control" type="file" name="image" id="formFile" accept="image/*" >
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