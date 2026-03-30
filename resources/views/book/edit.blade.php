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
                <form method="post" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">id</label>
                        <input type="number" class="form-control" name="id" id="id" readonly value="{{ $category->id }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" autofocus required maxlength="60" value="{{ $category->name }}">
                    </div>
                    
                    <div>
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" required maxlength="150" rows="4">{{ $category->description }}</textarea>
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