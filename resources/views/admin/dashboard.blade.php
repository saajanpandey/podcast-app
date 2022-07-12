@inject('podcast', 'App\Http\Controllers\PodcastController')
@inject('user', 'App\Http\Controllers\Api\UserController')
@extends('admin.layout')
@section('title', 'DashBoard')
@section('contents')
    <div class="content-wrapper">


        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                            <div>
                                <p class="mb-2 text-md-center text-lg-left">Total Podcast</p>
                                <h1 class="mb-0">{{ $podcast->list() }}</h1>
                            </div>

                            <i class="fa-solid fa-microphone icon-xl text-secondary"></i>
                        </div>
                        <canvas id="expense-chart" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                            <div>
                                <p class="mb-2 text-md-center text-lg-left">Total Listeners</p>
                                <h1 class="mb-0">{{ $user->list() }}</h1>
                            </div>
                            <i class="fa-solid fa-users icon-xl text-secondary"></i>
                        </div>
                        <canvas id="budget-chart" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                            <div>
                                <p class="mb-2 text-md-center text-lg-left">Total Artists</p>
                                <h1 class="mb-0">{{ $user->artistList() }}</h1>
                            </div>
                            <i class="fa-solid fa-user-check icon-xl text-secondary"></i>
                        </div>
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th class="ml-5">ID</th>
                                    <th>Project name</th>
                                    <th>Customer</th>
                                    <th>Deadline</th>
                                    <th>Payouts </th>
                                    <th>Traffic</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#D1</td>
                                    <td>Consectetur adipisicing elit </td>
                                    <td>Beulah Cummings</td>
                                    <td>03 Jan 2019</td>
                                    <td>$ 5235</td>
                                    <td>1.3K</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#D2</td>
                                    <td>Correlation natural resources silo</td>
                                    <td>Mitchel Dunford</td>
                                    <td>09 Oct 2019</td>
                                    <td>$ 3233</td>
                                    <td>5.4K</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#D3</td>
                                    <td>social capital compassion social</td>
                                    <td>Pei Canaday</td>
                                    <td>18 Jun 2019</td>
                                    <td>$ 4311</td>
                                    <td>2.1K</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#D4</td>
                                    <td>empower communities thought</td>
                                    <td>Gaynell Sharpton</td>
                                    <td>23 Mar 2019</td>
                                    <td>$ 7743</td>
                                    <td>2.7K</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#D5</td>
                                    <td> Targeted effective; mobilize </td>
                                    <td>Audrie Midyett</td>
                                    <td>22 Aug 2019</td>
                                    <td>$ 2455</td>
                                    <td>1.2K</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                                Delete
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
