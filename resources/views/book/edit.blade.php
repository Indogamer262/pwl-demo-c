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
                  <a href="#">Category Update Form</a>
                </li>
              </ul>
            </div>
            <!-- <div class="page-category">Inner page content goes here</div> -->
            <div class="card">
              <div class="card-body">
                <form method="post" action="{{ route('book.update', $book->isbn) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">id</label>
                        <input type="number" class="form-control" name="id" id="id" readonly value="{{ $book->isbn }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" autofocus required maxlength="60" value="{{ $book->title }}" >
                    </div>

                    <div class="form-group">
                        <label for="name">Author</label>
                        <input type="text" class="form-control" name="author" autofocus required maxlength="60" value="{{ $book->author }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Publish Year</label>
                        <input type="text" class="form-control" name="publish_year" autofocus required maxlength="60" value="{{ $book->publish_year }}"
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option value="" disabled>-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" required maxlength="150" rows="4">{{ $book->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('ExtraCSS')

@endsection