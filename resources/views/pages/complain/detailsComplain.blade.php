@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12" >
                <div class="card-box" id="laodContent">
                    <h3 class="header-title font-weight-bold mb-2 text-primary">Complain Details</h3>
                    
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
                        @foreach ($GetComplainData as $value)
                            <div class="col-md-12">
                                <div class="row my-1  border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Name</div>
                                    <div class="col-md-8">{{$value->name}}</div>
                                </div>
                                <div class="row my-1  border-bottom">
                                    <div class="col-md-3 font-weight-bold  align-self-center text-dark">Complain Status</div>
                                    <div class="col-md-8 align-self-center"><span class="badge badge-{{randomStatusColor($value->comp_status)}}">{{statusName($value->comp_status)}}</span> <button class="btn btn-info btn-sm" id={{$value->id}} onclick="statusUpdate(this.id)"  data-toggle="modal" data-target="#statusModal">...</button></div>
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
                                <div class="row my-1 border-bottom">
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
            {{-- status modal --}}
           <!-- Button trigger modal -->
  
                        <!-- Modal -->
                        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title text-primary " id="exampleModalLabel">Complain Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <select id='currentStatus' class="form-control">
                                    <option value="0">Panding</option>
                                    <option value="1" >Processing</option>
                                    <option value="2">Done</option>
                                </select>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="buttonId" onclick="GetupdateId(this.id)" class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                            </div>
                        </div>
            <script>
                
                //Complain Staus Update by modal
                function statusUpdate(id){
                    //console.log(id);
                   axios.get('/updateStatus', {
                            params: {
                            id: id
                            }
                        })
                    .then(function (res) {
                         let result = res.data;       
                         console.log(res.data.comp_status);   
                        var updateId =  document.getElementsByTagName("option") 
                        console.log(updateId);
                        var para = document.getElementById('p')
                        console.log(para);
                        for (let index = 0; index < updateId.length; index++) {
                            const element = updateId[index];
                           // console.log(element.value);
                            if(res.data.comp_status == element.value){
                               let newSelectValue = (updateId[element.value]); 
                               newSelectValue.setAttribute('selected', 'selected')
                                // console.log(newSelectValue);
                                // console.log('new value');
                               var id =  document.getElementById('buttonId');
                               id.setAttribute('id', res.data.id);
                               console.log(id);
                               
                            }
                        }          
                    //     let  id= document.getElementById('id')
                    //     id.innerHTML = result.id
                    //     let  desc= document.getElementById('desc')
                    //     desc.innerHTML = result.image
                    //     let img = document.getElementById('image')
                    //         let newImg = document.createElement('img')
                    //         newImg.setAttribute('src', result.image)
                    //  // res.data.id
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                }
                //get update id from modal button click
                function GetupdateId(id){
                   // console.log(id);
                     let selectValue = document.getElementById('currentStatus').value
                    // console.log(selectValue);
                    axios.get('/updateId', {
                            params: {
                            id: id,
                            comp_status:selectValue
                            }
                        })
                        .then(function(res){
                            console.log(res.data);
                            // $('#laodContent').load(location.href + '#laodContent');
                            location.reload()
                            $('#statusModal').modal('toggle');
                        } )
                        .catch(function (error) {
                        console.log(error);
                    })
                }
            </script>
        </div>

@endsection