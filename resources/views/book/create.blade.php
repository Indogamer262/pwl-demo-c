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
              <div class="card-body">
                <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">ISBN</label>
                        <input type="text" class="form-control" name="isbn" autofocus required maxlength="13">
                    </div>
                    
                    @error('isbn')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" autofocus required maxlength="60">
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="author" autofocus required maxlength="60">
                    </div>

                    <div class="form-group">
                        <label for="publish_year">Publish Year</label>
                        <input type="text" class="form-control" name="publish_year" autofocus required maxlength="60">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option value="" disabled selected>-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" required maxlength="150" rows="4"></textarea>
                    </div>

                     <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" id="cover" name="cover" class="form-control @error('cover') is-invalid @enderror" accept="image/png, image/jpeg, image/jpg">
                        @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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