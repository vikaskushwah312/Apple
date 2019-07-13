@extends('web.pg.dashboard.master')
@section('webcontent')
<div class="dashboard-list">
    <div class="dashboard-message contact-2">
        <form action="{{ url('owner/complain-reply').'/'.$complain->id }}" id="complain_form" name="complain_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Subject <strong class="required"></strong></label>
                    </div>
                    <input type="text" name="subject" id="subject" placeholder="Subject" style="width: 98%" height="37px;" value="{{$complain->subject}}" disabled>
                    <p class="error help-block" id="subject">
                      @if($errors->has('subject'))
                        <i class="error"></i> {{ $errors->first('subject') }}
                      @endif
                    </p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Complain<strong class="required">*</strong></label>
                    </div>
                    <p class="" id="complain" name="complain" >{{$complain->complain}}</p>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Reply Complain <strong class="required">*</strong></label>
                    </div>
                    <textarea class="" id="complain_reply" name="complain_reply" placeholder="Complain" style="height: 240px;width: 1000px;margin-top: 0px;margin-bottom: 0px;"></textarea>
                    <p class="error help-block" id="complain_reply">
                      @if($errors->has('complain_reply'))
                        <i class="error"></i> {{ $errors->first('complain_reply') }}
                      @endif
                    </p>
                </div>

                <input type="hidden" name="property_id" id="property_id" value="{{$complain->property_id}}">
                <div class="col-lg-12">
                    <div class="send-btn">
                        <button type="submit" class="btn btn-md button-theme pull-right">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){

       /* $('.delete').on('click',function(){
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
         
        });*/
        $('#complain_list-active').addClass('active');
    })
</script>

@endsection