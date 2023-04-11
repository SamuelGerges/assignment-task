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



                </div><!-- end of row -->
                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Album Name</th>
                                        <th>Image Title</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                @isset($images)
                                    @foreach($images as $image)
                                        <tr>
                                            <td>{{ $image->album->album_name }}</td>
                                            <td>{{ $image->image_title }}</td>
                                            <td>
                                                <img style="width: 150px; height: 100px;" src="{{ asset($image->image_path) }}">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.images.editImage',$image->id)}}"
                                                   class="btn btn-info btn-min-width box-shadow-3 mr-2 mb-2">
                                                    Edit
                                                </a>

                                                <a href="{{route('admin.images.moveImage',$image->id)}}"
                                                   class="btn btn-info btn-min-width box-shadow-3 mr-2 mb-2">
                                                    Move Images
                                                </a>
                                                <a href="{{route('admin.images.deleteImage',$image->id)}}"
                                                   class="btn btn-info btn-min-width box-shadow-3 mr-2 mb-2">
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
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

