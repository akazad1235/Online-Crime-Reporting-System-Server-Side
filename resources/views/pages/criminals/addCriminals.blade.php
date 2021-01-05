@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="header-title font-weight-bold text-primary font">Wanted Criminal</h2>
                    <p class="sub-header">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('added_recorded'))
                            <script>
                                toastr.success("{!!Session::get('added_recorded')!!}");
                            </script>
                        @endif
                         @if(Session::has('error_recorded'))
                            <script>
                                toastr.error("{!!Session::get('error_recorded')!!}");
                            </script>
                        @endif
                    </p>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('criminals.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Name<span class="text-danger">*</span></label>
                                    <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Criminals Name" required />
                                </div>
                                <div class="form-group mb-3">
                                    
                                    <label for="example-email">Image<span class="text-danger">*</span></label>
                                    <input type="file" id="example-email" name="image" class="form-control" onChange="loadFile(event)"/>
                                    <img id="output" style="width:200px; height:200px; margin:3px" />
                    
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-textarea">desc<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="example-textarea" rows="5" name="desc" rows="5" name="address" placeholder="Criminals Description"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-textarea"></label>
                                    <input type="submit"  class=" btn btn-primary"  value="submit">
                                </div>
                            </form>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <script>

        const loadFile = (event) => {
           let file = document.getElementById('output');
           file.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection