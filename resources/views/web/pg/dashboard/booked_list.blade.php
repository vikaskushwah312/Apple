@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <h3>My Properties List</h3>
    <table class="manage-table">
        <tbody>
        @foreach($property as $pro)
        <tr class="responsive-table">
            <td class="listing-photoo">
                {!! myPropertiesImage($pro->id)!!}
            </td>
            <td class="title-container">
                <h2><a href="javascript:void(0)">{{ $pro->title }}</a></h2> <!-- {{url('owner/property-details')}} -->
                <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i>{{ $pro->address }}</h5>
                <h6 class="table-property-price">{{ $pro->price }} / monthly</h6>
            </td>
            <!-- <td class="expire-date"></td> $pro->created_at -->
            <td class="action">
                <div class="send-btn">
                            <a href="{{url('pg/complain/'.$pro->id)}}" class="btn btn-md button-theme pull-right">Complain</a>
                        </div>
                <!-- <button class="send-btn"><a href="{{url('pg/complain/'.$pro->id)}}"><i class=""></i> Complain</a></button> -->
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>    
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#booked-active').addClass('active');
    })
</script>
@endsection