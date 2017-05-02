@extends('admin.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fill the text fields  
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
              <h3 class="box-title">Feature Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form class="form-horizontal" action="{{route('feature.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                  </div>
                 </div>

                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="description" placeholder="Description ..."></textarea>
                </div>

                 </div>
                    <div class="form-group">
                   <label for="status" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                      <select name="status">

                        <option value="1" selected>Enable</option>
                        <option value="0">Disable</option>
                      </select>
                       </div>
                    </div>
                  </div>
                 <div class="form-group">
                  <label for="logo" class="col-sm-2 control-label">Feature_Image</label>

                  <div class="col-sm-10">
                  <input type="file" name="logo">
                  </div>
                  
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-primary btn-lg ">Create</button>
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
