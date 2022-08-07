@extends('admin.layouts.layout')
@section('content')
    <div class="modal" id="mymodal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('showSkills') }}" method="POST">

                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Delete Record</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this record?</p>
                        <input type="hidden" name="delete_name" id='nameinput' value="">
                    </div>
                    <div class="modal-footer">
                        <h2 id="modal_body"></h2>
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

                                  <form action="{{ route('showSkills') }}" method="POST" class="row g-3">
                                            @csrf

                                       <td><input type="text" name="name" class="form-control" id="inputName"
                                           value="{{ $sk['name'] }}" readonly> </td>


                                      <td><input type="text" name="val" class="form-control" id="inputNanme4"
                                          value="{{ $sk['value'] }}"> </td>

                                      <td> <button type="button" class="btn btn-primary del" data-bs-toggle="modal"
                                              name="deletion" data-bs-target="#mymodal"
                                              value="{{ $sk['name'] }}">Delete</button> </td>

                                      <td align="center"> <button type="submit" class="btn btn-primary" name='save'
                                              id="save">Save</button> </td>

                                </form>

            </div>

            </tr>
            @endforeach


            </tbody>
            </table>

        </div>
        </div>


    </main>


    <script>
        $(".del").click(function() {
            var name = $(this).val();
            $('#nameinput').val(name);
            console.log(name);
        });
    </script>
@endsection
