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
            <form class="form-horizontal" action="{{ url('admin/profile') }}" id="edit_profile" name="edit_profile" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{auth()->user()->first_name}}">
                    <p class="error help-block" id="first_name">
                      @if($errors->has('first_name'))
                        <i class="error"></i> {{ $errors->first('first_name') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{auth()->user()->last_name}}">
                    <p class="error help-block" id="last_name">
                      @if($errors->has('last_name'))
                        <i class="error"></i> {{ $errors->first('last_name') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{auth()->user()->email}}">
                    <p class="error help-block" id="email">
                      @if($errors->has('email'))
                        <i class="error"></i> {{ $errors->first('email') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" value="{{auth()->user()->contact_no}}">
                    <p class="error help-block" id="contact_no">
                      @if($errors->has('contact_no'))
                        <i class="error"></i> {{ $errors->first('contact_no') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">File input</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image">
                    <p class="error help-block" id="image">
                      @if($errors->has('image'))
                        <i class="error"></i> {{ $errors->first('image') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/dashboard')}}"><button type="button" class="btn btn-default">Back</button></a>
                <a href="{{url('admin/change-password')}}"><button type="button" class="btn btn-default">Change Password</button></a> 
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
