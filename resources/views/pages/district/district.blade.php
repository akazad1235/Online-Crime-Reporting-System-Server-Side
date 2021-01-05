@extends('layouts.master')
@section('content')
<div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="header-title text-primary font-weight-bold font">All District</h4>
                    
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
                            <th data-field="No" data-sortable="true" data-formatter="dateFormatter">No</th>
                            <th data-field="Name" data-sortable="true" data-formatter="dateFormatter">District</th>
                            <th data-field="action" data-sortable="true">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                    @php
                    $list = 1;
                    @endphp
                        @foreach($allDistrict as $value)
                        <tr>
                            <td>{{ $list++ }}</td>
                            <td>{{ $value->district }}</td>
                            <td><a class="btn btn-info btn-sm" href="{{ route('district.edit', base64_encode($value->id))}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{ route('district.delete', base64_encode($value->id))}}">Delete</a></td>
                        </tr>
                        @endforeach
                       
                        
                        </tbody>
                    </table>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>

@endsection