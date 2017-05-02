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
              <h3 class="box-title">Contact</h3>
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
            <form class="form-horizontal" action="{{route('contact.store')}}" method="post">
            {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="subject" class="col-sm-2 control-label">Subject</label>

                  <div class="col-sm-10">
                    <input type="subject" class="form-control" name="subject" placeholder="Subject">
                  </div>
                </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Message</label>

                      <div class="col-sm-10">
                        <form>
                         <textarea  id="editor1" name="message" rows="10" cols="80">
                          Give Message ...
                         </textarea>
                        </form>
                      </div>
                   </div>
               
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
