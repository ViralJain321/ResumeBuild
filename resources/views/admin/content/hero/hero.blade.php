@extends('admin.layouts.layout');
@section('content')

<main id="main" class = "main">
  <section class= "section">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Hero Section</h5>

    @if(session('message'))
      <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif  

    <form action="{{ route('hero') }}" method ='post' class="row g-3">
      
      @csrf

      <div class="col-12">
        <label for="inputNanme4" class="form-label">Your Name</label>
        <input type="text" name="name" class="form-control @error('name') border-red-500 @enderror" id="inputNanme4" value="{{ $hero['name'] }}" >

        @error('name')
        <div class="error text-danger">
            {{ $message }}
        </div>
        @enderror

      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Twitter ID:</label>
        <input type="url"  name="twitter_id"class="form-control" id="inputEmail4" value="{{ $hero['twitter_id'] }}">
      </div>
      <div class="col-12">
        <label for="inputPassword4" class="form-label">Facebook ID</label>
        <input type="url"  name="facebook_id" class="form-control" id="inputPassword4" value="{{ $hero['facebook_id'] }}">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Instagram ID</label>
        <input type="url" name="instagram_id" class="form-control" id="inputAddress" placeholder="" value="{{ $hero['instagram_id'] }}">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Skype ID</label>
        <input type="url"  name="skype_id" class="form-control" id="inputAddress" placeholder="" value="{{ $hero['skype_id'] }}">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">LinkedIn ID</label>
        <input type="url"  name="linkedIn_id" class="form-control" id="inputAddress" placeholder="" value="{{ $hero['linkedIn_id'] }}">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form>

  </div>
</div>
</section>
</main>


  @endsection