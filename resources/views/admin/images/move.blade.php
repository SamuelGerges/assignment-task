@extends('layouts.site')

@section('content')

    <div>
        <h2>Images of {{ $image->album->album_name }}</h2>
    </div>
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item">Images</li>
        <li class="breadcrumb-item">Edit </li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <form method="post" action="{{ route('admin.images.updateMoveImage',$image->id ) }}">
                    @csrf
                    @method('post')
                    @include('layouts.includes.partials._errors')
                    <div class="form-group">
                        <label for="prjectinput1">
                           Album
                        </label>
                        <select name="album_id" class="select2 form-control">
                            <optgroup
                                label="Select Album ">
                                @if($albums && $albums -> count() > 0)
                                    @foreach($albums as $album)
                                        <option
                                            value="{{$album -> id }}"
                                            @if($album->id == $image->album_id) selected @endif
                                        >
                                            {{$album -> album_name}}
                                        </option>
                                    @endforeach
                                @endif
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Save</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
