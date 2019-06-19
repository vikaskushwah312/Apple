@extends('web.owner.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <h3>My Properties List</h3>
    <table class="manage-table">
        <tbody>
        @foreach($property as $pro)
        <tr class="responsive-table">
            <td class="listing-photoo">
                <img src="{{url('public/uploads/gallery_image').'/'.$pro->imgGallery->image}}" alt="listing-photo" class="img-fluid">
            </td>
            <td class="title-container">
                <h2><a href="{{url('owner/property-details')}}">{{ $pro->title }}</a></h2>
                <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i>{{ $pro->address }}</h5>
                <h6 class="table-property-price">{{ $pro->price }} / monthly</h6>
            </td>
            <td class="expire-date">{{ $pro->created_at }}</td>
            <td class="action">
                <a href="{{url('owner/my-properties/edit/'.$pro->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
            </td>
        </tr>
        @endforeach
       <!--  <tr class="responsive-table">
           <td class="listing-photoo">
               <img src="http://placehold.it/180x120" alt="listing-photo" class="img-fluid">
           </td>
           <td class="title-container">
               <h2><a href="#">Travel To England</a></h2>
               <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i> 123 Kathal St. Tampa City, </h5>
               <h6 class="table-property-price">$900 / monthly</h6>
           </td>
           <td class="expire-date">4.01.2018</td>
           <td class="action">
               <a href="#"><i class="fa fa-pencil"></i> Edit</a>
               <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
               <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
           </td>
       </tr>
        -->
       
       
        </tbody>
    </table>
    </div>
@stop