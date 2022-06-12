@extends('admin.layout')
@section('title', 'Edit Podcast')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Podcast <a href="{{ route('podcasts.index') }}"
                                style="text-decoration: none;color:black"><i class="typcn typcn-times"
                                    style="float: right;font-size: 30px;"></i></a></h4>
                        <form class="forms-sample" method="POST" action="{{ route('podcasts.update', $podcast->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Title" name="title" value="{{ $podcast->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Artist</label>
                                <select class="form-control @error('artist_id') is-invalid @enderror" name="artist_id">
                                    <option value="" disabled selected>Select an artist</option>
                                    @foreach ($artists as $artist)
                                        <option value="{{ $artist->id }}"
                                            {{ $podcast->artist_id == $artist->id ? 'selected' : '' }}>
                                            {{ $artist->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('artist_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="" disabled selected>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $podcast->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Select Status</label>
                                <select class="form-control  @error('status') is-invalid @enderror" name="status">
                                    <option value="" disabled selected>Select status</option>
                                    <option value="1" {{ $podcast->status == 1 ? 'selected' : '' }}>Enable
                                    </option>
                                    <option value="0" {{ $podcast->status == 0 ? 'selected' : '' }}>Disable</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
