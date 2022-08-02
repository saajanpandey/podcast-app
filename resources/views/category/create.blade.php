@extends('admin.layout')
@section('title', 'Add Category')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Category
                            <a href="{{ route('category.index') }}" style="text-decoration: none;color:black"><i
                                    class="typcn typcn-times" style="float: right;font-size: 30px;"></i></a>
                        </h4>

                        <form class="forms-sample" method="POST" action="{{ route('category.store') }}"
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
                                <label>Image upload</label>
                                <input type="file" name="image"
                                    class="file-upload-default @error('image') is-invalid @enderror">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control  file-upload-info" disabled
                                        placeholder="Image upload">
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
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
