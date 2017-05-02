@extends('admin.master')

 @section('content')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">contact</h3>
              <a href="{{route('contact.create')}}"><button type="submit" class="btn btn-primary btn-lg pull-right">Add</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th width="200px">Message</th>
                  <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $id = 1?>
                @foreach ($contacts as $contact)
                
                <tr>
                  <td>{{$id++}}</td>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->email}}</td>
                  <td>{{$contact->subject}}</td>                
                  <td>{{$contact->message}}</td>
                  <td>
                  <a href="{{route('contact.edit', $contact->contact_id)}}"><button type="submit" class="btn btn-primary btn-sm">Edit</button>
                  </a>

                  <a href="">
                  <button type="submit" class="btn btn-primary btn-sm">View</button>
                  </a>

                   <a href="">
                  <button type="submit" class="btn btn-primary btn-sm">Reply</button>
                  </a>
                  </td>
                  <td>
                 {!! Form::open([
                   'method' => 'DELETE',
                   'route' => ['contact.destroy', $contact->contact_id]
                   ]) 
                  !!}
                 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                     {!! Form::close() !!}
                 </td>
               </tr>
                  
                @endforeach
              
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection