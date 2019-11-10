@extends('layouts.backend.app')

@section('title')
{{__('Post')}}
@endsection



@push('css')
 <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid">
           <div class="container-fluid">
            <div class="block-header"><a href="{{route('user.post.index')}}"></a></div>
            <!-- Basic Validation -->
            <form action="{{route('user.post.update',$post->id)}}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                @METHOD('PUT')
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{__('EDIT POST')}}</h2>
                        </div>
                        <div class="body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input value="{{old('title')}}{{$post->title}}" type="text" class="form-control" name="title" required>
                                        <label class="form-label">{{__('Post Title')}}</label>
                                    </div>
                                </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input value="{{old('price')}}{{$post->price}}" type="text" class="form-control" name="price">
                                    <label class="form-label">{{__('Price')}}</label>
                                </div>
                            </div>
                                <div class="form-group form-float">
                                    <div class="form-group">
                                        <img src="{{ asset('storage/uploads/post/'.$post->image) }}" width="40px"height="30px" alt=""/>
                                        <input  type="file" class="form-control" name="image" >
                                        <label class="form-label btn btn-primary">{{__(' Your Project ScreenShot')}}</label>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <input type="checkbox" id="status" class="filled-in" name="status" value="1" {{ $post->status ==  true? 'checked' : ''}}>
                                        <label for="status">{{__('Status')}}</label>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input value="{{old('live_demo')}} {{$post->live_demo}}" type="text" class="form-control" name="live_demo" required>
                                            <label class="form-label">{{__('Live Demo')}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input  type="file" class="form-control" name="zip" >
                                        <label class="form-label btn btn-warning">{{__(' Your Project  Upload')}}</label>
                                    </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card ">
                        <div class="header bg-blue">
                            <h2 class="">{{__('Categrories & Tags')}}</h2>
                        </div>
                        <div class="body">

                                <div class="form-group form-float">
                                    <div class="form-line" {{$errors->has('categories') ? 'fucused error' : '' }}>
                                        <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                            <label for="category">{{__('Category Name')}}</label>
                                            @foreach($categories as $category)
                                            <option
                                                @foreach($post->categories as $postCategory)
                                                {{ $postCategory->id  == $category->id? 'selected' : '' }}
                                                @endforeach
                                             value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line" {{$errors->has('tags') ? 'fucused error' : '' }}>
                                        <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                            <label for="tag">{{__('Tag Name')}}</label>
                                            @foreach($tags as $tag)
                                            <option 
                                                @foreach($post->tags as $postTag)
                                                {{$postTag->id == $tag->id? 'selected' : ''}}
                                                @endforeach
                                             value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <a class="btn btn-danger" href="{{route('user.post.index')}}">{{__('BACK')}}</a>
                                <button class="btn btn-primary waves-effect" type="submit">{{__('SUBMIT')}}</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{__('Documanation')}}</h2>
                        </div>
                        <div class="body">
                              <textarea id="tinymce" name="body">
                               {{old('body')}} {!! $post->body!!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
@endsection

@push('js')
<script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
  <script src="{{ asset('backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('backend/plugins/tinymce') }}';
        });
    </script>
@endpush