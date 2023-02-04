@extends('layouts/admin')


@section('title')
    <title>Category</title>
@endsection

 
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'category','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/categories/create" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($categories); $i++)
                        <tr>
                            <th scope="row">{{ $i+1 }}</th>
                            <td>{{ $categories[$i]->name }}</td>
                            <td style="display: flex;"><a href="/admin/categories/edit/{{ $categories[$i]->id }}" class="btn btn-success btn-md active" role="button" aria-pressed="true">Edit</a>|
                                <form action="/admin/categories/{{ $categories[$i]->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-md active">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endfor  
                    </tbody>
                  </table>
            </div>
            <div class="col-md-12">
              {{ $categories->links('pagination::bootstrap-4') }}
            </div>
            
            
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
