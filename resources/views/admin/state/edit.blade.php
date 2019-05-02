@extends('admin.layouts.app')
@section('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{$title}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('admin/edit-state/'.$info->id) }}" id="edit_state" name="edit_state" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="country_name" name="country_name">
                      <option value="">Select Country</option>
                      @foreach($country as $con_info)
                        <option value="{{$con_info->id}}" {{($con_info->id == $info->country_id)? ('selected'):('')}}>{{$con_info->name}}</option>
                      @endforeach
                    </select>
                    <p class="error help-block" id="country_name">
                      @if($errors->has('country_name'))
                        <i class="error"></i> {{ $errors->first('country_name') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">State</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="state_name" name="state_name" placeholder="State Name" value="{{$info->state_name}}">
                    <p class="error help-block" id="state_name">
                      @if($errors->has('state_name'))
                        <i class="error"></i> {{ $errors->first('state_name') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/state')}}"><button type="button" class="btn btn-default">Back</button></a> 
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('js')
<!-- Select2 -->
<script href="{{url('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('public/admin/custom-validation.js') }}"></script>

@endsection
