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
              <h3 class="box-title">Faculty Member Create</h3>
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
            <form class="form-horizontal" action="{{route('faculty.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="name_of_member" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name_of_member" placeholder="Enter Name of Member">
                  </div>
                 </div>

                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="description" placeholder="Description ..."></textarea>
                </div>

                 </div>
                 <div class="form-group">
                  <label for="job_post" class="col-sm-2 control-label">Job_post</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="job_post" placeholder="Enter position of Faculty Member">
                  </div>
                 </div>
                 
                 <div class="form-group">
                  <label for="member_image" class="col-sm-2 control-label">Member_Image</label>

                  <div class="col-sm-10">
                  <input type="file" name="member_image">
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
