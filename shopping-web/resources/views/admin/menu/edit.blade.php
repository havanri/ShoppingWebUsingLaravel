@extends('layouts/admin')


@section('title')
    <title>Edit Menu</title>
@endsection

 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'menu','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/menus/{{ $menu->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="Inputmenu">Menu Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputmenu"  placeholder="Enter menu" value="{{ $menu->name }}">
                    </div>
                    <div class="form-group">
                        <label for="SelectmenuParent">--Select menu Parent--</label>
                        <select class="form-control" id="SelectmenuParent" name="parent_id">
                            <option value="0">--None--</option>
                            {!! $htmlOption !!}
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
              
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
