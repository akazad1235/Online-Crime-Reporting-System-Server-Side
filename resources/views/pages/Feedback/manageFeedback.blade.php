@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="header-title font-weight-bold text-primary font">User Feedback</h4>
                    
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
                
                   
                    <table id="demo-custom-toolbar"  data-toggle="table"
                            data-search="true"
                            data-show-refresh="true"
                            data-show-columns="true"
                            data-sort-name="id"
                            data-page-list="[5, 10, 20]"
                            data-page-size="5"
                            data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                        <thead class="thead-light">
                        <tr>

                            <th data-field="no" data-sortable="true" >No</th>
                            <th data-field="name" data-sortable="true" >Name</th>
                            <th data-field="station" data-sortable="true">Email</th>
                            <th data-field="complainName" data-sortable="true">Description</th>
                            <th data-field="time" data-sortable="true">Time</th>
                            <th data-field="status" data-sortable="true">Status</th>
                            <th data-field="action" data-sortable="true">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @php
                            $i=1;
                            @endphp
                    @if(auth()->user()->is_admin == 1  )
                        
                        @foreach($getFeedback as $value)
                             <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ substr($value->desc, 0,20).'...' }}</td>
                            {{-- <td>{{ $value->created_at->diffForHumans() }}</td> --}}
                            <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                            <td><span class="badge  badge-{{$value->approve == 1 ?'success':'danger'}} text-capitalize text-weight-bold">{{$value->approve == 1 ?'Approve':'Panding'}}</span></td>
                            <td><button class="btn btn-info" id="{{$value->id}}"  data-toggle="modal" data-target="#exampleModal"  onclick="feedbackStatusID(this.id)" >info</button></td>
                        </tr> 
                        @endforeach
                    @endif
                       
                        
                        </tbody>
                    </table>
                
                </div> <!-- end card-box-->
            </div> <!-- end col-->

             <!-- sample modal content -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">User Feedback Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <select id='feedbackStatus' class="form-control">
                                <option value="0">Disable</option>
                                <option value="1" >Approve</option>
                            </select>
                            <label class="my-2 text-success font-weight-bold">Description</label>
                            <p id="desc" ></p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="buttonId" onclick="feedbackStatusUpdate(this.id)" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
          
            <script>
                function feedbackStatusID(id){
                    //console.log(id);
                   axios.get('/feedback/get', {
                            params: {
                            id: id
                            }
                        })
                    .then(function (res) {
                        console.log(res.data);
                    //     let result = res.data                        
                         let  desc= document.getElementById('desc')
                         desc.innerHTML = res.data.desc
                         var updateId =  document.getElementsByTagName("option") 
                         console.log(updateId);

                        for (let index = 0; index < updateId.length; index++) {
                            const element = updateId[index];
                           // console.log(element.value);
                            if(res.data.approve == element.value){
                               let newSelectValue = (updateId[element.value]); 
                               newSelectValue.setAttribute('selected', 'selected')
                                // console.log(newSelectValue);
                                // console.log('new value');
                               var id =  document.getElementById('buttonId');
                               id.setAttribute('id', res.data.id);
                               console.log(id);
                            }
                        } 
                     //   let  desc= document.getElementById('desc')
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
                function feedbackStatusUpdate(id){
                    //console.log(id);
                     let selectValue = document.getElementById('feedbackStatus').value
                     console.log(selectValue);
                     var data ={
                         approve:selectValue
                     }
                    axios.put(`/feedback/update/${id}`, data)
                        //     params: {
                        //     id: id,
                        //     approve:selectValue
                        //     }
                        // })
                        .then(function(res){
                            console.log(res.data);
                           // $('#laodContent').load(location.href + '#laodContent');
                           location.reload()
                           
                            $('#exampleModal').modal('toggle');
                        } )
                        .catch(function (error) {
                        console.log(error);
                    })
                }
            </script>
        </div>

@endsection