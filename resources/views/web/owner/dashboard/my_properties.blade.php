@extends('web.owner.dashboard.master')
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
                <h2><a href="{{url('owner/property-details')}}">{{ $pro->title }}</a></h2>
                <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i>{{ $pro->address }}</h5>
                <h6 class="table-property-price">{{ $pro->price }} / monthly</h6>
            </td>
            <!-- <td class="expire-date"></td> $pro->created_at -->
            <td class="action">
                <a href="{{url('owner/my-properties/edit/'.$pro->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                <!-- <a href=""><i class="fa  fa-eye-slash"></i> Hide</a> -->
                <a href="javascript:void(0)" class="delete" id="p_delete" data-id="{{$pro->id}}"><i class="fa fa-remove"></i> Delete</a>
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
        $('.delete').on('click',function(){
        var p_delete = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{'my-properties/delete'}}",
                    data:{'id':p_delete},
                    cache: false,
                    success: function(res){
                    console.log('res',res);
                    if(res.success){
                        swal("Deleted successfully!", {
                            icon: "success",
                        });
                        setTimeout(function(){ window.location.reload(); }, 1000);
                    }
                  }
                });
            }
        })
          /*  var p_delete = $(this).data('id');
            var result = confirm("Are you sure you want to delete?");
            if (result) {
                $.ajax({
                  url: "{{'my-properties/delete'}}",
                  data:{'id':p_delete},
                  cache: false,
                  success: function(html){
                    $("#results").append(html);
                  }
                });
            }*/
        });
        $('#mypropertis-active').addClass('active');
    })
</script>

@endsection
