@extends('admin.layout')
@section('title', 'Podcast Information')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $podcast->title }}'s Information <p class="card-description"
                                style="float: right">
                                <a class="btn btn-rounded btn-primary" href="{{ route('podcasts.index') }}">Go Back
                                </a>
                            </p>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-striped projects">
                                <tbody>
                                    <tr>
                                        <td>Podcast Title</td>
                                        <td>{{ $podcast->title ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Artist Name</td>
                                        <td>{{ $podcast->artist->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Podcast Category</td>
                                        <td>{{ $podcast->category->title ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Podcast Published Date</td>
                                        <td>{{ \Carbon\Carbon::parse($podcast->created_at)->toDateString() ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Podcast Status</td>
                                        <td>
                                            @if ($podcast->status == 1)
                                                <label class="badge badge-success">Enable</label>
                                            @else
                                                <label class="badge badge-danger">Disable</label>
                                            @endif
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Podcast Image</td>
                                        <td><img src="{{ '/uploads/images/' . $podcast->image }}" alt="podcast logo"
                                                width="200px" height="200px"></td>
                                    </tr>
                                    <tr>
                                        <td>Podcast Audio</td>
                                        <td>
                                            <audio controls>
                                                <source src="{{ '/uploads/audios/' . $podcast->audio }}" type="audio/mp3">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
