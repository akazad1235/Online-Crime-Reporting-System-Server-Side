@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="header-title font-weight-bold">All Police Station</h4>

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
                            <th data-field="id" data-sortable="true" >Station Code</th>
                            <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th data-field="date" data-sortable="true" data-formatter="dateFormatter">District</th>
                            <th data-field="action" data-sortable="true">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($getAllStation as $value)

                             <tr>
                            <td></td>
                            <td>{{ $value->stationCode }}</td>
                            <td>{{ $value->policeStationName }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->district }}</td>
                            
                            <td><a class="btn btn-info btn-sm" href="{{ route('station.edit', base64_encode($value->id))}}">Edit</a> <a class="btn btn-danger btn-sm" href="">Delete</a></td>
                        </tr>
                       
                        @endforeach
                       
                        
                        </tbody>
                    </table>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>

@endsection