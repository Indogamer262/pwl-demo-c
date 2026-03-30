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
                  <a href="{{ route('category.create') }}" class="btn btn-primary" role="button">Add Books</a>
                </div>
              @endif
              <div class="card-body">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>ISBN</th>
                      <th>TITLE</th>
                      <th>AUTHOR</th>
                      <th>PUBLISH YEAR</th>
                      <th>DESCRIPTION</th>
                      <th>CATEGORY ID</th>
                      @if(Auth::user()->role_id==1)
                        <th>ACTION</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $book)
                      <tr>
                        <td>{{ $books->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publish_year }}</td>
                        <td>{{ $book->description }}</td>
                        @if(Auth::user()->role_id==1)
                          <td>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm" role="button">Edit</a>
                            <form method="post" action="{{ route('book.delete', $book->id) }}" id="delform">
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