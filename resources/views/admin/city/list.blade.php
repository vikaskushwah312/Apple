@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header box-header-background with-border">
                    <h3 class="box-title">{{$title}}</h3>
                    <a href="{{url('admin/add-city')}}" class="btn btn-danger pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
                </div>

                <!-- /.box-header --> 
                <div class="box-body table-responsive">
                    <table id="city-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Status</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection

@section('js')

<script type="text/javascript" src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
         
         window.datatable = $('#city-table').DataTable({
            //"order": [[ 0, "desc" ]],
            "columnDefs": [ {
                  "targets": 'removeSortingClass',
                  "orderable": false,
            } ],
            "aaSorting" : [],
            "pageLength" : 10,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url : "{{url('admin/city-list-data')}}",
                type : 'GET'
            },
        });

    });
   
  </script>

@endsection
