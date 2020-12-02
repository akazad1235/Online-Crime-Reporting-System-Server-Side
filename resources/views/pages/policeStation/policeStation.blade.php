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
                                            <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">Id</th>
                                            <th data-field="name" data-sortable="true">Name</th>
                                            <th data-field="date" data-sortable="true" data-formatter="dateFormatter">District</th>
                                            <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Create Date</th>
                                            <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td>UB-1609</td>
                                            <td>Boudreaux</td>
                                            <td>22 Jun 2017</td>
                                            <td>$ 35.00</td>
                                            <td><span class="badge badge-success">Success</span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>UB-1609</td>
                                            <td>Boudreaux</td>
                                            <td>22 Jun 2017</td>
                                            <td>$ 35.00</td>
                                            <td><span class="badge badge-danger">Inactive</span></td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>

@endsection