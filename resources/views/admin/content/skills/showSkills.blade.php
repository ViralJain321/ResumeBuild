@extends('admin.layouts.layout')
@section('content')





<div  class="modal" id="mymodal"  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('showSkills')}}"  method="POST">

        @csrf

      <div class="modal-header">
        <h5 class="modal-title">Delete Record</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this record?</p>
        <input type="hidden" name="delete_name" id='nameinput' value="" >
      </div>
      <div class="modal-footer">
        <h2 id = "modal_body"></h2>
        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>


    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Skills</h5>
               
                <table class="table table-sm">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Aquired(in %)</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 1;
                            
                        @endphp

                        @foreach ($all_skills as $sk)



           
                            <tr>

                                <th scope="row">{{ $i++ }}
                                    <div class="col-4">

                                        {{-- <label for="inputNanme4" class="form-label">Your Name</label> --}}

                                        <form action="{{ route('showSkills') }}" method="POST" class="row g-3">
                                            @csrf
                                <td><input type="text" name="name" class="form-control" id="inputName"
                                        value="{{ $sk['name'] }}" readonly> </td>

                                <div class="col-4">

                                    <td> <button type="button" value="-" onClick="subtract_one()"
                                            class="btn btn-light">-</button>

                                        0 <input type="range" id="slider{{ $i - 1 }}" min="0" max="100"
                                            step="1" name="val" value="{{ $sk['value'] }}"
                                            onchange="show_value{{ $i }}(this.value)"> 100

                                        <button type="button" value="+"
                                            onClick="add_one({{ 'slider' . $i - 1 }})"class="btn btn-light">+</button>
                                    </td>

                                    <td class="text-center">
                                        <div class="col-4">
                                            <div> <label for="val" class="form-label">(%)</label></div>
                                            <span id="slider_value{{ $i - 1 }}"></span><br>
                                        </div>
                                    </td>



                                </div>




                                {{-- <td><input type="text" name="val" class="form-control" id="inputNanme4" value="{{ $sk['value'] }}"> </td> --}}

                               <td>  <button type="button" class="btn btn-primary del" data-bs-toggle="modal" name ="deletion" 
                                        data-bs-target = "#mymodal" value="{{$sk['name']}}" >Delete</button> </td>

                                {{-- <td align="center"> <button type="submit" class="btn btn-primary" name='delete'
                                        id="delete">Delete</button> </td> --}}
                                <td align="center"> <button type="submit" class="btn btn-primary" name='save'
                                        id="save">Save</button> </td>

                                </form>

                                {{-- <td>  <button class="btn btn-primary" data-bs-toggle="modal"
                                  data-bs-target = "#mymodal" >Confirmation</button> </td> --}}
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
        <button type="reset" class="btn btn-secondary">Reset</button> --}}
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

        $(".del").click(function () {

          // e.preventDefault();

            var name = $(this).val();
            $('#nameinput').val(name);
            console.log(name);
            // var marks = $("#marks").val();
            // var str = "You Have Entered " 
            //     + "Name: " + name ;
            //     // + " and Marks: " + marks;
            // $("#modal_body").html(str);
            // $("#mymodel").model('show');
        });




        // function show_value(x) {
        //     document.getElementById("slider_value").innerHTML = x;
        // }

       
      

        function show_value{{ $i }}(x) {
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
            document.getElementById('slider{{ $i - 1 }}').value = parseInt(document.getElementById(
                'slider{{ $i - 1 }}').value) - 1;
            show_value2(document.getElementById('slider{{ $i - 1 }}').value);
        }
    </script>
@endsection
