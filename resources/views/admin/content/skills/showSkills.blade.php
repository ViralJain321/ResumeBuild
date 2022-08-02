@extends('admin.layouts.layout')
@section('content')

<main id = "main" class ="main">
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Small tables</h5>
      <p>Add <code>.table-sm</code> to make any <code>.table</code> more compact by cutting all cell padding in half.</p>
      <!-- Small tables -->


      {{-- <form action="{{ route("showSkills") }}" method="POST" class = "row g-3"> --}}

        {{-- @csrf --}}

      <table class="table table-sm">
        <thead>
          <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Aquired(in %)</th>
            {{-- <th scope="col">Aquired(in %)</th> --}}
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>

            @php
                   $i = 1;
                  
               @endphp 
            
            @foreach ($all_skills as $sk)

                {{-- @php
                    dd($sk);
                @endphp --}}
            <tr>

                
                {{-- <th scope="row">{{$i}}</th>
                <td>Brandon Jacob</td>
                <td>Designer</td>
                <td>28</td>
                <td>2016-05-25</td>
                <td> <button type="submit" class="btn btn-primary" formaction="datamanager_delete">Delete</button> </td> --}}
                
            
               
               
                <th scope="row">{{$i++}}
                <div class="col-4">
                   
                    {{-- <label for="inputNanme4" class="form-label">Your Name</label> --}}

                    <form action="{{ route("showSkills") }}" method="POST" class = "row g-3">
                        @csrf
                   <td><input type="text" name="name" class="form-control" id="inputNanme4" value="{{ $sk['name'] }}" readonly > </td> 

                   <div class="col-4">
              

                  <div> <label for="val" class="form-label">Value:</label></div>
                 <td> <button type="button" value="-" onClick="subtract_one()" class="btn btn-light">-</button>
                   
                    0 <input type="range" id="slider{{$i-1}}" min="0" max="100" step="1" name="val"  value="{{ $sk['value'] }}"
                        onchange="show_value{{$i}}(this.value)"> 100
                 
                    <button type="button" value="+" onClick="add_one({{'slider'. $i-1}})"class="btn btn-light">+</button>
                </td> 
                
                <td class="text-center">
                    <div class="col-4"> 
                        <div> <label for="val" class="form-label">(%)</label></div>
                        <span id="slider_value{{$i-1}}" ></span><br>
                    </div>
                 </td>    
                 
    
           
                </div>

                


                   {{-- <td><input type="text" name="val" class="form-control" id="inputNanme4" value="{{ $sk['value'] }}"> </td>  --}}

                   <td align="center"> <button type="submit" class="btn btn-primary" name='delete' id="delete" >Delete</button> </td> 
                   <td align="center"> <button type="submit" class="btn btn-primary" name='save' id="save" >Save</button> </td> 

                   </form>
                 </div>

                {{-- <form action="" aria-readonly>
                    <div id = "1">
                         <input type="text" value="hell" readonly>   
                         <input type="text" value="hello123">   
                    </div>
                </form> --}}
              </tr>
            @endforeach


        

        </tbody>
        {{-- <thead>

        <tr class = "text-center">
            {{-- <div class="text-center"> --}}
     {{-- <button type="submit" class="btn btn-primary align-middle">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button> 
         --}}
        {{-- </div> --}}
         {{-- </tr> --}}
       
        {{-- </thead> --}} 
      </table>

      

    {{-- </form> --}}



      <!-- End small tables -->



    </div>
  </div>


</main>


<script>
    // $('button[id="delete"]').click(function(e){
    //     $(this).closest('tr').remove()
    // })

//     window.onload = function() {
//     if (window.jQuery) {  
//         // jQuery is loaded  
//         alert("Yeah!");
//     } else {
//         // jQuery is not loaded
//         alert("Doesn't Work");
//     }
// }




        // function show_value(x) {
        //     document.getElementById("slider_value").innerHTML = x;
        // }


        function show_value{{$i}}(x) {
            console.log(n);
            document.getElementById().innerHTML = x;
        }

        function add_one(m) {
            console.log(m.id);
          
            //  var new_id = 'slider' + m;
            // console.log(new_id);
      
          
            document.getElementById(m.id).value = parseInt(document.getElementById(m.id).value) + 1;
            show_value2(document.getElementById(m.id).value);
        }

        function subtract_one() {
            document.getElementById('slider{{$i-1}}').value = parseInt(document.getElementById('slider{{$i-1}}').value) - 1;
            show_value2(document.getElementById('slider{{$i-1}}').value);
        }

      
    



 </script>
  

  @endsection

 