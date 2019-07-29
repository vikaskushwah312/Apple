<!-- modal section here #vigit -->
<div id="vigit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Vigiter Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="submit-address dashboard-list">
        <form method="post" action="{{url('owner/submit-property')}}" id="submit_property" name="submit_property" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="search-contents-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Property Title <strong class="required">*</strong></label>
                            <input type="text" class="input-text" id="title" name="title" placeholder="Property Title" value="{{old('title')}}" required>
                            <p class="error help-block" id="title">
                              @if($errors->has('title'))
                                <i class="error"></i> {{ $errors->first('title') }}
                              @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>