@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

@endpush
@section('content')
<div class="container-fluid">
        <div class="block-header">
     <!-- Exportable Table -->
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                {{ __('EDIT TAG') }}
                                                
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <form method="POST" action="{{ route('admin.tag.update',$tag->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input value="{{ old('name') }}{{ $tag->name }}" name="name" type="text" class="form-control">
                                                        <label class="form-label">{{ __('Name') }}</label>
                                                    </div>
                                                </div>
                                                <br>
                                           
                                                <a href="{{ route('admin.tag.index') }}"  class="btn btn-danger m-t-15 waves-effect">{{ __('BACK') }}</a>
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __('SUBMIT') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>
@endsection


@push('js')

@endpush