@extends('layouts/admin')


@section('title')
    <title>Create Category</title>
@endsection

 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'category','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/categories/" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="InputCategory">Category Name:</label>
                      <input type="text" name="name" class="form-control" id="InputCategory"  placeholder="Enter category">
                    </div>
                    <div class="form-group">
                        <label for="SelectCategoryParent">--Select Category Parent--</label>
                        <select class="form-control" id="SelectCategoryParent" name="parent_id">
                            <option value="0">--None--</option>
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
