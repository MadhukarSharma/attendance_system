@extends('admin.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fill the textfields  
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
    
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Banner Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form class="form-horizontal" action="{{route('banner.update',$banner->banner_id)}}" method="post" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title"  value="{{$banner->title}}">
                  </div>
                 </div>

                 <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="description">{{$banner->description}}</textarea>
                </div>

                 </div>
                 <div class="form-group">
                  <label for="heading" class="col-sm-2 control-label">Heading</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="heading" value="{{$banner->heading}}">
                  </div>
                 </div>
                 
                 <div class="form-group">
                  <label for="banner_image" class="col-sm-2 control-label">Banner_Image</label>

                  <div class="col-sm-10">
                  <input type="file" name="banner_image">
                  </div>
                  
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-primary btn-lg pull-right ">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
