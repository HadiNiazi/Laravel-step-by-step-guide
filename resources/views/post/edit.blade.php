@extends('layouts.master')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://parsleyjs.org/src/parsley.css" />
@endsection


@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-8 offset-2 mt-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h4><b>Edit Posts</b></h4>
       <form method="POST" action="{{ route('post.update') }}" id="form">
            @csrf
            @method('PUT')

                 <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" autocomplete="off" minlength="6" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $post->description }}" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label class="form-label">Published</label>
                    <select name="is_publish" class="form-control">
                        <option selected disabled>Choose Status</option>
                        <option @if($post->is_publish == 1) selected @endif value="1">Yes</option>
                        <option @if($post->is_publish == 0) selected @endif value="0">No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option selected disabled>Choose Status</option>
                        <option @if($post->status == 1) selected @endif value="1">Yes</option>
                        <option @if($post->status == 0) selected @endif value="0">No</option>
                    </select>
                </div>

                <input type="hidden" name="user_id" value="1">

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
       </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script>
    $('#form').parsley();
  </script>
@endsection
