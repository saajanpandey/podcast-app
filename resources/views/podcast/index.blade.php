@extends('admin.layout')
@section('title', 'Podcasts')
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Podcasts <p class="card-description" style="float: right">
                                <a class="btn btn-rounded btn-primary" href="{{ route('podcasts.create') }}">Add Podcast
                                </a>
                            </p>
                        </h4>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Artist Name
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Total Plays
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($podcasts as $podcast)
                                        <tr>
                                            <td style="word-wrap: break-word">
                                                {{ $podcast->title ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $podcast->artist->name ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $podcast->category->title ?? '-' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $podcast->plays->count() }}
                                            </td>
                                            <td>
                                                @if ($podcast->status == 1)
                                                    <label class="badge badge-success">Enable</label>
                                                @else
                                                    <label class="badge badge-danger">Disable</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm btn-icon-text "
                                                    href="{{ route('podcasts.edit', $podcast->id) }}">
                                                    Edit
                                                    <i class="typcn typcn-edit btn-icon-append"></i>
                                                </a>

                                                <a class="btn btn-info btn-sm btn-icon-text"
                                                    href="{{ route('podcasts.show', $podcast->id) }}">
                                                    View
                                                    <i class="typcn typcn-eye"></i>
                                                </a>

                                                <button type="button" class="btn btn-danger btn-sm btn-icon-text"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-action="{{ route('podcasts.destroy', $podcast->id) }}">
                                                    Delete
                                                    <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                                </button>

                                                <button type="button" class="btn btn-secondary btn-sm btn-icon-text"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                                    data-action="{{ route('podcast.image', $podcast->id) }}">
                                                    Thumbnail upload
                                                    <i class="typcn typcn-upload"></i>
                                                </button>

                                                <button type="button" class="btn btn-secondary btn-sm btn-icon-text"
                                                    data-bs-toggle="modal" data-bs-target="#audioModal"
                                                    data-action="{{ route('podcast.audio', $podcast->id) }}">
                                                    Audio Upload
                                                    <i class="typcn typcn-upload"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            {!! $podcasts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This action is not reversible.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" id="modal-confirm_delete"
                            onclick="">Delete</button>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Image upload --}}
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Thumbnail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary" id="modal-confirm_delete" onclick="">Image
                        Upload</button>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Audio upload --}}
    <div class="modal fade" id="audioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Audio Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="audio">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary" id="modal-confirm_delete" onclick="">Audio
                        Upload</button>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        });

        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        });

        $('#audioModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);
            modal.find('form').attr('action', action);
        });
    </script>

@endsection
