@extends('admin.layout')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password
                            <a href="{{ route('admin.dashboard') }}" style="text-decoration: none;color:black"><i
                                    class="typcn typcn-times" style="float: right;font-size: 30px;"></i></a>
                        </h4>
                        <form class="forms-sample" method="POST" action="{{ route('changepassword.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Current Password</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Current Password" name="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    id="exampleInputPassword4" placeholder="New Password" name="new_password">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Re-type Password</label>
                                <input type="password"
                                    class="form-control @error('new_confirm_password') is-invalid @enderror"
                                    id="exampleInputPassword4" placeholder="Re-type Password" name="new_confirm_password">
                                @error('new_confirm_password')
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
