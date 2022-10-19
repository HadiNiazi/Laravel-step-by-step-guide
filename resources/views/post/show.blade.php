@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 offset-1" style="margin-top: 70px">
            <h3><b>Post</b></h3>

            @if ($post)
            <table class="table">

                <tbody>
                    <tr>
                        <td>ID</td>
                        <td> {{ $post->id }} </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $post->description }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $post->status }}</td>
                    </tr>
                    <tr>
                        <td>Published</td>
                        <td>{{ $post->is_publish }}</td>
                    </tr>
                </tbody>
            </table>
            @else
            <h3 class="text-danger">No Post found.</h3>
            @endif
        </div>
    </div>
</div>
@endsection
