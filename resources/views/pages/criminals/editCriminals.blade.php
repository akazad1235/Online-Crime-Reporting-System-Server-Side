@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title font-weight-bold text-primary font">Update Wanted Criminal</h4>
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
                            <form action="{{route('criminals.update', base64_encode($getDataById->id))}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Name<span class="text-danger">*</span></label>
                                    <input type="text" id="simpleinput" class="form-control" name="name" value="{{$getDataById->name}}" required />
                                </div>
                                <div class="form-group mb-3">
                                    
                                        <img src="{{asset('admin/images/criminals/'.$getDataById->image)}}" /><br>
                                    
                                    <label for="example-email">Image<span class="text-danger">*</span></label>
                                    <input type="file" id="example-email" name="image" class="form-control" >
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-textarea">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="example-textarea" rows="5" name="desc" rows="5" name="address">{{$getDataById->desc}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-textarea"></label>
                                    <input type="submit"  class=" btn btn-primary"  value="Update">
                                </div>
                            </form>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
@endsection