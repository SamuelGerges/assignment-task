@extends('layouts.site')
@section('content')

    <input type="hidden" class="delete_image_url" value="{{ url("admin/images/delete-image") }}">


    <div>
        <h2>Albums</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item">Add New Images</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post">
                    @csrf
                    @method('post')
                    @include('layouts.includes.partials._errors')
                    {{--name--}}
                    <div class="form-group">
                        <input type="hidden" class="save_images_url" value="{{ url("admin/images/store/{$id}") }}">                    </div>
                    <div class="form-group">
                        <div class="dropzone dropzone-area saveAlbumImages">
                            <div class="dz-message">Add Images</div>
                        </div>
                        <br><br>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Save</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->


@endsection
@section('script')
    <script src="{{asset('assets/admin/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>
    <script>
        Dropzone.autoDiscover = false;
    </script>
    <script src="{{asset('js/saveImage.js')}}" type="text/javascript"></script>
@endsection
