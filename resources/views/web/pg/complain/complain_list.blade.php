@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <h3>My Complain List</h3>
    <table class="manage-table">
        <tbody>
        @foreach($property as $pro)
        <tr class="responsive-table">
            <td class="listing-photoo">
                {!! myPropertiesImage($pro->property_id)!!}
            </td>
            <td class="title-container">
                <h2><a href="javascript:void(0)">{{ $pro->title }}</a></h2> <!-- {{url('owner/property-details')}} -->
                <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i>{{ $pro->address }}</h5>
                <h6 class="table-property-price">{{ $pro->price }} / monthly</h6>
            </td>
            <!-- <td class="expire-date"></td> $pro->created_at -->
            <td class="action">
                <a href="{{url('pg/complain-edit/'.$pro->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" class="delete" id="p_delete" data-id="{{$pro->id}}"><i class="fa fa-remove"></i> Delete</a>
                <a href="{{url('pg/complain-status/'.$pro->id)}}"><i class="fa fa-pencil"></i> Resolved or Not</a>
                <!-- <a href=""><i class="fa  fa-eye-slash"></i> Hide</a> -->
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>    
@stop