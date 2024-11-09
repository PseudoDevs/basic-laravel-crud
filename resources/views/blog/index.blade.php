@extends('layouts.app')
 
@section('content')

<div class="row">
    <a class="btn btn-primary w-25" href="{{ route('create')}}">Create Blog</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</div>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table" id="blog-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)  
                  <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>
                        @if($blog->category_id == 1)
                            Programming
                        @elseif($blog->category_id == 2)
                            Design
                        @elseif($blog->category_id == 3)
                            Marketing
                        @elseif($blog->category_id == 4)
                            Business
                        @endif
                    </td>
                    <td>{{ $blog->author->name }}</td>
                    <td>
                        @if($blog->status == 'PUBLISHED')
                            <span class="badge bg-success">PUBLISHED</span>
                        @elseif($blog->status == 'ARCHIVED')
                            <span class="badge bg-danger">ARCHIVED</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                        <a href="javascript:void(0)" data-blog_id="{{ $blog->id }}" class="btn btn-danger delete-blog">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    @include('blog.confirm-modal')
@endsection
@once
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#blog-table").on('click', '.delete-blog', function() {
                    var blog_id = $(this).data('blog_id');
                    
                    $('#deleteBlogModal').modal('show');

                    $('#delete-blog').on('click', function() {
                        $.ajax({
                            url: "{{ route('delete', '') }}/" + blog_id,
                            type: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data, status, xhr) {
                                console.log(data);
                                if(data.status == 'success') {
                                    $('#deleteBlogModal').modal('hide');
                                    window.location.reload();
                                }
                            },
                            error: function(data, status, xhr) {
                                alert(data);
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endonce