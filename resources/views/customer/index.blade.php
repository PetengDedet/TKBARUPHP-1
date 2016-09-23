{{--PetengDedet--}}
@extends('layouts.adminlte.master')

@section('custom_css')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endsection

@section('title', 'Customer Management')

@section('page_title')
    <span class="fa fa-home fa-fw"></span>&nbsp;Customers
@endsection
@section('page_title_desc', '')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('customer.index.title')</h3>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
        <div class="box-footer clearfix">
            <a class="btn btn-success" href="{{ route('db.master.customer.create') }}"><span class="fa fa-plus fa-fw"></span>&nbsp;@lang('customer.index.button.create')</a>
        </div>
    </div>


@endsection
@section('custom_js')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    <script type="text/javascript">
        $(document).ready(function () {
//            notie.alert(1, 'Success!', 0.5);
        });
    </script>
@endsection
