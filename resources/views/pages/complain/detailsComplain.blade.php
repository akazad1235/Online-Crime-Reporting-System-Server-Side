@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="header-title font-weight-bold">Complain Details</h4>
                    
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
                        @foreach ($dataArr as $value)
                            <div class="col-md-12">
                                <div class="row my-1  border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Name</div>
                                    <div class="col-md-8">{{$value->name}}</div>
                                </div>
                                <div class="row my-1  border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Complain Status</div>
                                    <div class="col-md-8 align-self-center"><span class="badge badge-{{randomStatusColor($value->comp_status)}}">{{statusName($value->comp_status)}}</span> <button class="btn btn-info btn-sm">...</button></div>
                                </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Email</div>
                                    <div class="col-md-8">{{$value->email}}</div>
                                </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Phone Number</div>
                                    <div class="col-md-8">+880{{$value->phone}}</div>
                                 </div>
                                <div class="row my-1  border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Police Station</div>
                                    <div class="col-md-8">{{$value->policeStationName}}</div>
                                 </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Gender</div>
                                    <div class="col-md-8">{{$value->gender}}</div>
                                </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Date of Birth</div>
                                    <div class="col-md-8">{{$value->birth_day}}</div>
                                 </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Address</div>
                                    <div class="col-md-8">{{$value->address }}</div>
                                </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Email</div>
                                    <div class="col-md-8">{{$value->address }}</div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-md-3 font-weight-bold align-self-center text-dark">Description</div>
                                    <div class="col-md-8">{{$value->desc}}</div>
                                </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold align-self-center text-dark">Avidance Image</div>
                                    <div class="col-md-8">
                                        @for ($i = 0; $i <count($file); $i++)
                                            @php
                                                $fileName = $file[$i];
                                                $path = pathinfo($file[$i]);
                                                $extName = $path['extension'];
                                            @endphp
                                            @if(  $extName ==  'jpg'|| $extName ==  'jpeg' || $extName ==  'png' || $extName == 'gif')
                                                <img class="document-image" src="{{asset('admin/images/complain/'.$file[$i])}}" alt="image">  
                                            @endif 
                                        @endfor
                                    </div>
                                </div>
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold align-self-center text-dark">Avidance PDF & Docs</div>
                                    <div class="col-md-8">
                                        @for ($i = 0; $i <count($file); $i++)
                                            @php
                                                $fileName = $file[$i];
                                                $path = pathinfo($file[$i]);
                                                $extName = $path['extension'];
                                            @endphp
                                            @if( $path['extension']== 'pdf') 
                                                <a href="{{asset('admin/images/complain/'.$file[$i])}}" class="docs text-danger" target="_blank" title="this is PDF file"><i class="far fa-file-pdf"></i></a> 
                                            @endif
                                            @if( $path['extension']== 'docx') 
                                                <a href="{{asset('admin/images/complain/'.$file[$i])}}" class="docs" title="this is WORD file"><i class="fas fa-file-alt"></i></a> 
                                            @endif 
                                        @endfor
                                    </div>
                                </div>
                                
                                <div class="row my-1 border-bottom">
                                    <div class="col-md-3 font-weight-bold align-self-center text-dark">Avidance Media</div>
                                    <div class="col-md-8">
                                        @for ($i = 0; $i <count($file); $i++)
                                            @php
                                                $fileName = $file[$i];
                                                $path = pathinfo($file[$i]);
                                                $extName = $path['extension'];
                                            @endphp
                                            @if($extName == 'mp4' || $extName == 'mkv' || $extName == '3gp'|| $extName == 'avi') 
                                            <video width="320" height="240" controls>
                                                <source src="{{asset('admin/images/complain/'.$file[$i])}}" type="video/mp4">
                                            </video>
                                            @endif
                                            @if($extName == 'mp3') 
                                                <audio  controls>
                                                    <source src="{{asset('admin/images/complain/'.$file[$i])}}" type="audio/mp3">
                                                </audio>
                                            @endif 
                                        @endfor
                                    </div>
                                </div>  
                            </div> 
                         @endforeach
                
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