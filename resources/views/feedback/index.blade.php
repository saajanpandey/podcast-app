@extends('admin.layout')
@section('title', 'Feedback')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Feedbacks <p class="card-description" style="float: right">
                            </p>
                        </h4>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Message
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedbacks as $feedback)
                                        <tr>
                                            <td style="word-wrap: break-word">
                                                {{ $feedback->email ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $feedback->title ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $feedback->message ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            {!! $feedbacks->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
