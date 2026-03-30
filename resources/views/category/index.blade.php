@extends('layouts.master')

@section('content')
    <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Dashboard</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Pages</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Starter Page</a>
                </li>
              </ul>
            </div>
            <!-- <div class="page-category">Inner page content goes here</div> -->
            <div class="card">
              @if(Auth::user()->role_id==1)
                <div class="card-header">
                  <a href="{{ route('category.create') }}" class="btn btn-primary" role="button">Add Category</a>
                </div>
              @endif
              <div class="card-body">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>DESCRIPTION</th>
                      @if(Auth::user()->role_id==1)
                        <th>ACTION</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                      <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        @if(Auth::user()->role_id==1)
                          <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm" role="button">Edit</a>
                            <form method="post" action="{{ route('category.delete', $category->id) }}" id="delform">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Are you sure want to delete this data?')">Delete</button>
                            </form>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('ExtraCSS')

@endsection