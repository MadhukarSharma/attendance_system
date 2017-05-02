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
              <h3 class="box-title">Course Form</h3>
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
            <form class="form-horizontal" action="{{route('course.update',$course->course_id)}}" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="{{$course->title}}">
                  </div>
                </div>

                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>

                      <div class="col-sm-10">
                        <form>
                         <textarea  id="editor1" name="description" rows="10" cols="80">{{$course->description}}
                         </textarea>
                        </form>
                      </div>
                   </div>

              <div class="form-group">
                  <label for="course_name" class="col-sm-2 control-label">Course_name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="course_name" value=" {{$course->course_name}}">
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
               

                 <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Course_Image</label>

                  <div class="col-sm-10">
                  <input type="file" name="image">
                  </div>
                  
                </div>
               
              <div class="box-footer">
               
                <button type="submit" class="btn btn-primary btn-lg ">Update</button>
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
