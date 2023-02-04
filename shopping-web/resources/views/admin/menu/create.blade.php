@extends('layouts/admin')


@section('title')
    <title>Create Menu</title>
@endsection

 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'menu','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/menus/" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="Inputmenu">Menu Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputmenu"  placeholder="Enter menu">
                    </div>
                    <div class="form-group">
                        <label for="SelectmenuParent">--Select Menu Parent--</label>
                        <select class="form-control" id="SelectmenuParent" name="parent_id">
                            <option value="0">--None--</option>
                            {{-- @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach --}}
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
