@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="container w-50">
                <form method="POST" action="{{route('user.update-post', $post->id)}}">
                    @csrf
                    <div class="form-group p-2">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{$post->title}}" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group p-2">
                        <label for="exampleInputEmail1">Author Name</label>
                        <input type="text" name="author_name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{$post->author_name}}" placeholder="Author Name">
                    </div>
                    {{-- <div class="form-group p-2">
                        <label for="exampleInputContent">Content</label>
                        <input type="text" name="content" class="form-control" 
                            aria-describedby="emailHelp" placeholder="Content" >
                    </div> --}}
                    <div class="form-group p-2">
                        <label for="exampleFile">Content</label>
                        <textarea name="content" value="{{$post->content}}" class="form-control" id="exampleInputContent" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group p-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</div>


</div>
@endsection