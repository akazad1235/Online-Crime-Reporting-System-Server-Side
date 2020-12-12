@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title font-weight-bold"> Police Station</h4>
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
                            <sc></sc>ript>
                                toastr.error("{!!Session::get('error_recorded')!!}");
                            </script>
                        @endif
                    </p>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('station.update', base64_encode($getDataById->id))}}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Station Name<apan class="text-danger">*</apan></label>
                                    <input type="text" id="simpleinput" class="form-control" name="policeStationName" value="{{$getDataById->policeStationName}}" require>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-email">Email<apan class="text-danger">*</apan></label>
                                    <input type="email" id="example-email" name="email" class="form-control" value="{{$getDataById->email}}" require>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-textarea">Address<apan class="text-danger">*</apan></label>
                                    <textarea class="form-control" id="example-textarea" rows="5" name="address">{{$getDataById->address}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-textarea"></label>
                                    <input type="submit"  class=" btn btn-danger"  value="Update">
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