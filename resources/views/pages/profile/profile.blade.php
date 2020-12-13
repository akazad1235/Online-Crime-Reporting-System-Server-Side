@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="row">
                    @foreach($profileData as $value)
                    <div class="col-md-4">
                        <h3 class="text-center">Profile</h3>
                        <div class="text-center">
                            <img  src="{{asset('admin/images/users/user-2.jpg')}}" alt="">
                            
                           
                            <div class="checkbox checkbox-success mb-2 mt-3">
                                <input id="checkbox3" type="checkbox" checked >
                                <label for="checkbox3" class='text-secondary font-weight-bold'>
                                    {{$value->designation}}
                                </label>
                            </div>
                            
                        </div>
                        <a href="{{route('profile.edit')}}" type="button" class="btn btn-danger form-control p-2 my-3 font-weight-bold">Edit Profile</a>
                        
                        
                    </div>
                    <div class="col-md-8">
                      <div class="row my-1  border-bottom">
                          <div class="col-md-3 font-weight-bold">Name</div>
                          <div class="col-md-8">{{$value->name}}</div>
                      </div>
                      <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Email</div>
                        <div class="col-md-8">{{$value->email}}</div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Phone Number</div>
                        <div class="col-md-8">+880{{$value->phone_number}}</div>
                    </div>
                      <div class="row my-1  border-bottom">
                        <div class="col-md-3 font-weight-bold">Police Station</div>
                        <div class="col-md-8">{{$value->policeStationName}}</div>
                    </div>
                   
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Employee Id</div>
                        <div class="col-md-8">{{$value->employee_id}}</div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Date of Birth</div>
                        <div class="col-md-8">{{$value->birth_day}}</div>
                    </div>

                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Address</div>
                        <div class="col-md-8">{{$value->address }}</div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Usre Type</div>
                        <div class="col-md-8"><span class="badge badge-{{$value->address == 1 ? 'primary' : 'info' }}">{{$value->address == 1 ? 'Admin': 'User'}}</span></div>
                    </div>
                    <div class="row my-1 border-bottom">
                        <div class="col-md-3 font-weight-bold">Email</div>
                        <div class="col-md-8">{{$value->address }}</div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-3 font-weight-bold">Description</div>
                        <div class="col-md-8">{{$value->desc}}</div>
                    </div>
                    
                    </div>
                    @endforeach
                </div>
            </div> <!-- end col-->
        </div>

@endsection