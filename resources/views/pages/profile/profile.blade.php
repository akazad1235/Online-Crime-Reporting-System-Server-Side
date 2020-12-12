@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">Profile</h3>
                        <div class="text-center">
                            <img src="{{asset('admin/images/users/user-2.jpg')}}" alt="">
                            <h4 class="my-2 font-weight-bold">Police Inspactor</h4>
                        </div>
                        <a href="" type="button" class="btn btn-danger form-control p-2 my-3 font-weight-bold">Edit Profile</a>

                        
                    </div>
                    <div class="col-md-8">
                      <div class="row my-1  border-bottom">
                          <div class="col-md-3 font-weight-bold">Name</div>
                          <div class="col-md-8">Md. Azad Hosen</div>
                      </div>
                      <div class="row my-1  border-bottom">
                        <div class="col-md-3 font-weight-bold">Police Station</div>
                        <div class="col-md-8">Dhanmonid</div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Phone Number</div>
                        <div class="col-md-8">01726756074</div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Employee Id</div>
                        <div class="col-md-8">Id-5214</div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Date of Birth</div>
                        <div class="col-md-8">12-50-2020</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-3 font-weight-bold">Description</div>
                        <div class="col-md-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut at nostrum vero saepe ipsum consequuntur adipisci, ex nisi modi deserunt!</div>
                    </div>
                    
                    </div>
                </div>
            </div> <!-- end col-->
        </div>

@endsection