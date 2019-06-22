@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="submit-address dashboard-list">
    <form method="GET">
        <div class="row pad-20">
            <div class="col-lg-12">
                <div class="invoice">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead class="bg-active">
                                    <tr>
                                        <td><strong>S.no</strong></td>
                                        <td><strong>User Name</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#invoices-active').addClass('active');
});
</script>
@endsection