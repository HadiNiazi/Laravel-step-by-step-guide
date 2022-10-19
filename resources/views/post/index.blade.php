@extends('layouts.master')

@section('styles')
<style>
    #outer
    {
        width:100%;
        text-align: center;
    }
    .inner
    {
        display: inline-block;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 offset-1" style="margin-top: 70px">
            <h3><b>Posts</b></h3>
            <h4>
                <a class="btn btn-primary" href="{{ url('posts/create') }}">Add New</a>
            <a href="{{ route('post.restore') }}"><i class="fa fa-undo"></i></a>
            </h4>
           @if ($posts->count() > 0)


            <table class="table table-dark ">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Published</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)

                  <tr>
                    <td><img src="{{ $post->image }}" style="width: 50px;border-radius: " alt="image"></td>
                    <td> {{ $post->id }} </td>
                    <td> {{ Str::limit($post->title, 5, '...') }} </td>
                    <td> {{ Str::limit($post->description, 5, '...') }} </td>
                    <td> {{ $post->is_publish }} </td>
                    <td id="outer">
                        <a class="btn btn-sm btn-info inner" href="{{ route('post.show', $post->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-primary inner" href="{{ url('posts', $post->id). '/edit' }}">
                            <i class="fa fa-edit"></i>
                        </a>

                    <form method="POST" class="inner" action="{{ route('post.destroy', $post->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash-o"></i> </button>
                    </form>

                   </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


              {{ $posts->links() }}

              @else
              <h3 class="text-danger">No Posts found.</h3>
              @endif
        </div>
    </div>
</div>
@endsection
