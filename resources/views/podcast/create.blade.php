@extends('admin.layout')
@section('title', 'Add Podcast')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Podcast
                            <a href="{{ route('podcasts.index') }}" style="text-decoration: none;color:black"><i
                                    class="typcn typcn-times" style="float: right;font-size: 30px;"></i></a>
                        </h4>

                        <form class="forms-sample" method="POST" action="{{ route('podcasts.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Title" name="title">
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
                                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                    @endforeach
                                </select>
                                @error('artist_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputName1">Category</label>
                                <select
                                    class="form-control js-example-basic-multiple  @error('category_id') is-invalid @enderror"
                                    name="category_id" multiple="multiple">


                                </select>

                            </div> --}}

                            <div class="form-group">
                                <label>Categories</label>
                                <select class="js-example-basic-multiple w-100" multiple="multiple" name="category_id[]">
                                    <option value="" disabled>Select Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Thumbnail upload</label>
                                <input type="file" name="image"
                                    class="file-upload-default @error('image') is-invalid @enderror">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control  file-upload-info" disabled
                                        placeholder="Thumbnail upload">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Audio File Upload</label>
                                <input type="file" name="audio"
                                    class="file-upload-default @error('audio') is-invalid @enderror">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Audio File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                @error('audio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Select Status</label>
                                <select class="form-control  @error('status') is-invalid @enderror" name="status">
                                    <option value="" disabled selected>Select status</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
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
