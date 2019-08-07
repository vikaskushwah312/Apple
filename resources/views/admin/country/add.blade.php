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
            <form class="form-horizontal" action="{{ url('admin/add-country') }}" id="add_country" name="add_country" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Country Name" value="{{old('name')}}">
                    <p class="error help-block" id="name">
                      @if($errors->has('name'))
                        <i class="error"></i> {{ $errors->first('name') }}
                      @endif
                    </p>
                  </div>
                </div>
                </div>
                <!-- <div class="col-md-6">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                </div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('admin/country')}}"><button type="button" class="btn btn-default">Back</button></a> 
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
 <div class='col-sm-6'>
            <input type='text' class="form-control" id='datetimepicker4' />
        </div>
@endsection

@section('js')
<script src="{{ asset('public/admin/custom-validation.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
        $('#datetimepicker4').datetimepicker();
    });
   
  </script>

@endsection
