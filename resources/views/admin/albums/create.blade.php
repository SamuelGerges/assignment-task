@extends('layouts.site')

@section('content')

    <div>
        <h2>Albums</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.albums.showAlbum') }}">Albums</a></li>
        <li class="breadcrumb-item">Add New Album</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.albums.storeAlbum') }}">
                    @csrf
                    @method('post')
                    @include('layouts.includes.partials._errors')
                    {{--name--}}
                    <div class="form-group">
                        <input type="text" placeholder="Album Name" name="album_name" autofocus class="form-control" value="{{ old('album_name') }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Save</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
