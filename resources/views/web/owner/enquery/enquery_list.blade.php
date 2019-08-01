@extends('web.owner.dashboard.master')
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
                                        <td class="text-center"><strong>S.no</strong></td>
                                        <td class="text-center"><strong>Property</strong></td>
                                        <td class="text-center"><strong>Address</strong></td>
                                        <td class="text-center"><strong>Name</strong></td>
                                        <td class="text-center"><strong>Email</strong></td>
                                        <td class="text-center"><strong>Contact No.</strong></td>
                                        <!-- <td class="text-center"><strong>Action</strong></td> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($property) > 0)
                                        @foreach($property as $key=>$pro)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center">{{$pro->title}}</td>
                                            <td class="text-center">{{$pro->address}}</td>
                                            <td class="text-center">{{$pro->first_name}} {{$pro->last_name}}</td>
                                            <td class="text-center">{{$pro->email}}</td>
                                            <td class="text-center">{{$pro->contact}}</td>
                                            <!-- <td class="text-center"><a href="{{url('vigited').'/'.$pro->id}}"><button class="btn">Vigited</button></a></td> -->
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
<script type="text/javascript">
$(document).ready(function(){
    $('#vigit-active').addClass('active');
});
</script>
@endsection