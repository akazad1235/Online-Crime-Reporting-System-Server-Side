@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title font-weight-bold">Add <span class="text-primary"> National ID Card </span>Information</h4>
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
                            <form action="{{route('nid.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" required  />
                                </div>
                                <div class="d-flex align-center">
                                    <div class="form-group mb-3 flex-fill mr-1">
                                        <label for="father">Father's Name<span class="text-danger">*</span></label>
                                        <input type="text" id="father" class="form-control" name="father" placeholder="Father's Name" required  />
                                    </div>
                                    <div class="form-group  flex-fill mb-3">
                                        <label for="mother">Mother's Name<span class="text-danger">*</span></label>
                                        <input type="text" id="mother" class="form-control " name="mother" placeholder="Mothes's Name" required  />
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="birthday">Date of birth<span class="text-danger">*</span></label>
                                    <input type="date" id="birthday" class="form-control" name="birth-day" required  />
                                </div>
                                <div class="d-flex align-center">
                                    <div class="form-group mb-3 flex-fill mr-1">
                                        <label for="blood">Blood Group<span class="text-danger">*</span></label>
                                        <select class="form-control" name="blood-group" id="blood">
                                            <option>A+</option>
                                            <option>AB</option>
                                            <option>A-</option>
                                            <option>B</option>
                                            <option>D</option>
                                        </select>
                                      
                                    </div>
                                    <div class="form-group  flex-fill mb-3 mr-1">
                                        <label for="zipcode">Zip Code<span class="text-danger">*</span></label>
                                        <input type="text" id="zipcode" class="form-control " name="zip-code" placeholder="Zip Code" required  />
                                    </div>
                                    <div class="form-group  flex-fill mb-3">
                                        <label for="nidno">NID No<span class="text-danger">*</span></label>
                                        <input type="text" id="nidno" class="form-control " name="nid-no" placeholder="National Id Card No" required  />
                                    </div>
                                </div>
                                <div class="form-group  flex-fill mb-3">
                                    <label for="nidno">Address<span class="text-danger">*</span></label>
                                   <textarea class="form-control" placeholder="Address" name="address"></textarea>
                                </div>
                                <div class="form-group  flex-fill mb-3">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input type="file" id="image" class="form-control " name="image"required  />
                                </div>
                               
                               
                                <div class="form-group mb-3">
                                    <label for="example-textarea"></label>
                                    <input type="submit"  class="btn btn-primary"  value="submit">
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