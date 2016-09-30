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
            <table class="table table-condensed table-hover table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>No. Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                @forelse($customer as $k => $v)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->address}}</td>
                        <td>{{$v->phone}}</td>
                        <td>
                             <div class="btn-group btn-group-xs">
                                <a href="/dashboard/master/customer/show/{{$v->id}}" class="btn  btn-default" style="color:blue;"><i class="fa fa-eye"></i></a>
                                <a href="/dashboard/master/customer/edit/{{$v->id}}" class="btn btn-default" style="color:green;"><i class="fa fa-pencil"></i></a>
                                <a href="/dashboard/master/customer/delete/{{$v->id}}" class="btn btn-default" onclick="return confirm(\'Hapus?\')" style="color:red;"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </table>
            {{-- {!! $dataTable->table() !!} --}}
        </div>
        <div class="box-footer clearfix">
            <a class="btn btn-success" href="{{ route('db.master.customer.create') }}"><span class="fa fa-plus fa-fw"></span>&nbsp;@lang('customer.index.button.create')</a>
            {{$customer->links()}}
        </div>
    </div>


@endsection
@section('custom_js')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {{-- {!! $dataTable->scripts() !!} --}}
    <script type="text/javascript">
        $(document).ready(function () {
//            notie.alert(1, 'Success!', 0.5);
        });
    </script>
@endsection
