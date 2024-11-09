@extends('layouts.app')

@section('content')
    <h5 class="fw-bolder">CREATE BLOG</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                       <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        <option selected>Select Category</option>
                        <option value="1">Programming</option>
                        <option value="2">Design</option>
                        <option value="3">Marketing</option>
                        <option value="4">Business</option>
                      </select>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="author_id" value="1">
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected>Select Status</option>
                            <option value="PUBLISHED">PUBLISHED</option>
                            <option value="ARCHIVED">ARCHIVED</option>
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
