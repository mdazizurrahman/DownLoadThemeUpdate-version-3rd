@extends('layouts.backend.app')

@section('title')
    {{__('Post')}}
@endsection

@push('css')
    <link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <a class="btn btn-info" href="{{ route('admin.post.create') }}">
                    <i class="material-icons">{{__('add')}}</i>
                    {{ __('ADD POST') }}

                </a>
            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{ route('admin.post.index') }}">
                                {{ __('ALL POST') }}
                                <span class="btn btn-warning sm">{{ $posts->count() }}</span>
                            </a>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>{{__('SL')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Body')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th><i class="material-icons">{{__('visibility')}}</i></th>
                                    <th>{{__('Approved')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Create At')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>{{__('SL')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Body')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th><i class="material-icons">{{__('visibility')}}</i></th>
                                    <th>{{__('Approved')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Create At')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($posts as $key=>$post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! str_limit($post->body,20) !!}</td>
                                        <td>
                                            @if($post->price == 0)
                                                <span class="btn btn-info">{{_('Free')}}</span>
                                            @else
                                                <span class="btn btn-default">{{$post->price}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->view_count }}</td>
                                        <td>
                                            @if($post->is_approved == true)
                                                <span class="btn btn-success">{{__('Approved')}}</span>
                                            @else
                                                <span class="btn btn-danger">{{__('Panding')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->status == true)
                                                <span class="btn btn-primary">{{__('Published')}}</span>
                                            @else
                                                <span class="btn btn-warning">{{__('Unpublished')}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td >

                                            @if($post->is_approved == false)
                                                <button type="button" class="btn btn-success waves-effect" onclick="approvePost({{$post->id}})">
                                                    <i class="material-icons">{{__('done')}}</i>
                                                </button>
                                                <form action="{{ route('admin.post.approvel',$post->id) }}" method="POST" id="approvel-form" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>

                                            @endif
                                            <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">{{__('visibility')}}</i>
                                            </a>
                                            <a href="{{ route('admin.post.edit',$post->id) }}" title="Edit" class="btn btn-info waves-effect">
                                                <i class="material-icons">{{__('edit')}}</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deletepost({{ $post->id }})">
                                                <i class="material-icons">{{__('delete')}}</i>
                                            </button>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection


@push('js')
    <script src="{{asset ('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{asset ('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script type="text/javascript">
        function deletepost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
        function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approvel-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your post remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>
@endpush