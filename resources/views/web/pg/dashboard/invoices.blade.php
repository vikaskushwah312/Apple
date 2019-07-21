@extends('web.pg.dashboard.master')
@section('css')
<link rel="stylesheet" href="{{ asset('public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('webcontent')
<div class="submit-address dashboard-list">
    <form method="GET">
        <div class="row pad-20">
            <div class="col-lg-12">
                <div class="invoice">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-condensed" id="invoice_table">
                                    <thead class="bg-active">
                                    <tr>
                                        <td class="text-center"><strong>S.no</strong></td>
                                        <td class="text-center"><strong>Order Id</strong></td>
                                        <td class="text-center"><strong>Payment Id</strong></td>
                                        <td class="text-center"><strong>Property</strong></td>
                                        <td class="text-center"><strong>Amount</strong></td>
                                        <td class="text-center"><strong>Tenure</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($invoices) > 0)
                                        @foreach($invoices as $key=>$invoice)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center">{{$invoice->order_id}}</td>
                                            <td class="text-center">{{$invoice->payment_id}}</td>
                                            <td class="text-center">{!! propertyTitle($invoice->property_id)!!} </td>
                                            <td class="text-center">{{$invoice->amount}}</td>
                                            <td class="text-center">{{$invoice->tenure}}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td>No Record found </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('js')
<script type="text/javascript" src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">

$(document).ready(function(){
    $('#invoices-active').addClass('active');
    //for datatbale
    window.datatable = $('#invoice_tables').DataTable({//invoice_table
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
            url : "{{url('pg/invoices')}}",
            type : 'GET'
        },
    });
});
</script>
@endsection