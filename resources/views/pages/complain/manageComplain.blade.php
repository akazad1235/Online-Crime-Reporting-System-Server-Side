@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="header-title font-weight-bold">All Police Station</h4>
                    
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
                
                    <button id="demo-delete-row" class="btn btn-danger btn-sm" disabled><i class="mdi mdi-close mr-1"></i>Delete</button>
                    <table id="demo-custom-toolbar"  data-toggle="table"
                            data-toolbar="#demo-delete-row"
                            data-search="true"
                            data-show-refresh="true"
                            data-show-columns="true"
                            data-sort-name="id"
                            data-page-list="[5, 10, 20]"
                            data-page-size="5"
                            data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                        <thead class="thead-light">
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="name" data-sortable="true" >Name</th>
                            <th data-field="station" data-sortable="true">Station</th>
                            <th data-field="complainName" data-sortable="true">Complain Name</th>
                            <th data-field="time" data-sortable="true">Time</th>
                            <th data-field="status" data-sortable="true">Status</th>
                            <th data-field="action" data-sortable="true">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                    @if(auth()->user()->is_admin == 1  )
                        @foreach($allComplain as $value)
                             <tr>
                            <td></td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->policeStationName }}</td>
                            <td>{{ $value->complain_name }}</td>
                            <td>{{ date('d-M-Y h:i:a', strtotime($value->created_at))  }}</td>
                            <td><span class="badge  badge-{{ randomStatusColor($value->comp_status)}} text-capitalize">{{statusName($value->comp_status)}}</span></td>

                            <td> <a class="btn btn-warning btn-sm" href="{{ route('complain.details', base64_encode($value->id))}}">Info</a> <a class="btn btn-info btn-sm" href="{{ route('station.edit', base64_encode($value->id))}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{ route('station.delete', base64_encode($value->id))}}">Delete</a></td>
                        </tr> 
                        @endforeach
                        
                    @elseif(auth()->user()->is_admin == 0)
                    @foreach($comById as $value)
                            <tr>
                            <td></td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->policeStationName }}</td>
                            <td>{{ $value->complain_name }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td><span class="badge  badge-{{ randomStatusColor($value->comp_status) }} text-capitalize">{{$value->comp_status}}</span></td>

                            <td> <a class="btn btn-danger btn-sm" href="{{ route('complain.details', base64_encode($value->id))}}">Info</a><a class="btn btn-info btn-sm" href="{{ route('station.edit', base64_encode($value->id))}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{ route('station.delete', base64_encode($value->id))}}">Delete</a></td>
                        </tr>
              
               @endforeach

                    @endif
                       
                        
                        </tbody>
                    </table>
                
                </div> <!-- end card-box-->
            </div> <!-- end col-->

             <!-- sample modal content -->

             <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="full-width-modalLabel">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <h4>Text in a modal</h4>
                            <p id="id"></p>
                            <p id="desc"></p>
                            <img src="" alt="">
                               
                            </div>
                            
                            
                            <hr>
                            <h4>Overflowing text to show scroll behavior</h4>
                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          
            <script>
                function show(id){
                   // console.log(id);
                   axios.get('/details', {
                            params: {
                            id: id
                            }
                        })
                    .then(function (res) {
                        let result = res.data                        
                        let  id= document.getElementById('id')
                        id.innerHTML = result.id
                        let  desc= document.getElementById('desc')
                        desc.innerHTML = result.image
                        let img = document.getElementById('image')
                            let newImg = document.createElement('img')
                            newImg.setAttribute('src', result.image)
                     // res.data.id
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                }
            </script>
        </div>

@endsection