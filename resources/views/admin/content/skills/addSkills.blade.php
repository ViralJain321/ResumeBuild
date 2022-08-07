@extends('admin.layouts.layout');
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Skills</h5>

                    <form action="{{ route('addSkills') }}" method='post' class="row g-3">

                        @csrf

                        <div class="col-4">
                            <label for="name" class="form-label">Skill Name:</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>

               
                        <div class="col-4">
                       
                          <div> <label for="val" class="form-label">Value:</label></div>
                            <button type="button" value="-" onClick="subtract_one()" class="btn btn-light">-</button>
                           
                            0 <input type="range" id="slider" min="0" max="100" step="10" name="val" value="50"
                                onchange="show_value2(this.value)"> 100
                         
                            <button type="button" value="+" onClick="add_one()"class="btn btn-light">+</button>

                         
                        </div>

                        <div class="col-4">
                            <div> <label for="val" class="form-label">(%)</label></div>
                            <span id="slider_value2" ></span><br> 
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

    <script>
     
        function show_value2(x) {
            document.getElementById("slider_value2").innerHTML = x;
        }

        function add_one() {
            document.getElementById('slider').value = parseInt(document.getElementById('slider').value) + 10;
            show_value2(document.getElementById('slider').value);
        }

        function subtract_one() {
            document.getElementById('slider').value = parseInt(document.getElementById('slider').value) - 10;
            show_value2(document.getElementById('slider').value);
        }

    </script>
@endsection
