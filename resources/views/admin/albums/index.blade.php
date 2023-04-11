@extends('layouts.site')

@section('content')

    <div>
        <h2>Albums</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item">Albums</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12">
                            <a href="{{ route('admin.albums.createAlbum') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Album</a>
                    </div>

                </div><!-- end of row -->
                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @isset($albums)
                                    @foreach($albums as $album)
                                        <tr>
                                            <td>{{ $album->album_name }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                     aria-label="Basic example">
                                                    <a href="{{route('admin.albums.editAlbum',$album->id)}}"
                                                       class="btn btn-info btn-min-width box-shadow-3 mr-2 mb-2">
                                                        Edit
                                                    </a>
                                                    <a href="{{route('admin.images.showImages',$album->id)}}"
                                                       class="btn btn-info btn-min-width box-shadow-3 mr-2 mb-2">
                                                        Show Images
                                                    </a>
                                                    <a href="{{route('admin.images.AddImages',$album->id)}}"
                                                       class="btn btn-info btn-min-width box-shadow-3 mr-2 mb-2">
                                                        Add New Images
                                                    </a>

                                                    <button class="btn btn-danger btn-min-width box-shadow-3 mr-2 mb-2"
                                                       data-toggle="modal" data-target="#delete_album">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal" id="delete_album" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Album</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Ayr you sure for Deleting Album??</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-danger" href="{{route('admin.albums.deleteAlbumOnly',$album->id)}}">Delete Album only</a>
                                                        <a type="button" class="btn btn-danger" href="{{route('admin.albums.deleteAlbumWithImages',$album->id)}}">Delete Album With Images</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endisset
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

