@extends('admin.layouts.app')
@section('css')
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
            <form class="form-horizontal" action="{{ url('admin/change-password') }}" id="change_password" name="change_password" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NEW PASSWORD</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" value="">
                    <p class="error help-block" id="new_password">
                      @if($errors->has('new_password'))
                        <i class="error"></i> {{ $errors->first('new_password') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">CONFIRM PASSWORD</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
                    <p class="error help-block" id="confirm_password">
                      @if($errors->has('confirm_password'))
                        <i class="error"></i> {{ $errors->first('confirm_password') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/profile')}}"><button type="button" class="btn btn-default">Back</button></a>
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
<script src="{{ asset('public/admin/custom-validation.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
        
    });
   
  </script>

@endsection
