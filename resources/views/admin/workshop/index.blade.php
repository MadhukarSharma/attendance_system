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
              <h3 class="box-title">workshops</h3>
              <a href="{{route('workshop.create')}}"><button type="submit" class="btn btn-primary btn-lg pull-right">Add</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>workshop_logo</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th width="200px">Description</th>
                  <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $id = 1?>
              
                @foreach($workshops as $workshop)
                
                <tr>
                  <td>{{$id++}}</td>
                  <td><img src ="{{asset($workshop->image)}}" style="height: 60px;"</td>
                  <td>{{$workshop->title}}</td>
                  <td>{{$workshop->status}}</td>
                  <td>{{$workshop->description}}</td>
                  <td>
                  <a href="{{route('workshop.edit', $workshop->workshop_id)}}"><button type="submit" class="btn btn-primary btn-sm">Edit</button>
                  </a>

                  <a href="">
                  <button type="submit" class="btn btn-primary btn-sm">View</button>
                  </a>
                  </td>
                  <td>
                 {!! Form::open([
                   'method' => 'DELETE',
                   'route' => ['workshop.destroy', $workshop->workshop_id]
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