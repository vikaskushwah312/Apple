@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <h3>My Complain List</h3>
    <table class="manage-table">
        <tbody>
            
        @if(count($property) == 0)
            <!--  <tr class="responsive-table">
               <td class="title-container">
                   <h4 ><strong class="error"> !! NO Record found !!</strong> </h4>            
               </td>
                        </tr> -->
        @else
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
                <a href="javascript:void(0)" class="delete" id="complain_delete" data-id="{{$pro->id}}"><i class="fa fa-remove"></i> Delete</a>
                @if(in_array($pro->id,$complian_reply))
                <a href="{{url('pg/complain-status/'.$pro->id)}}"><i class="fa fa-pencil"></i> Resolved or Not</a>
                @endif
                <!-- <a href=""><i class="fa  fa-eye-slash"></i> Hide</a> -->
            </td>
        </tr>
        @endforeach
        @endif
        
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
                    url: "{{'delete'}}",
                    data:{'id':p_delete},
                    cache: false,
                    success: function(res){
                    // console.log('res',res);
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
         
        });
        $('#complain_list-active').addClass('active');
    })
</script>

@endsection