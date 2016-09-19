@extends('layouts.adminlte.master')

@section('title', 'Bank Management')

@section('page_title')
    <span class="fa fa-bank fa-fw"></span>&nbsp;Bank
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
            <h3 class="box-title">@lang('bank.index.table.header.title')</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">@lang('bank.index.table.header.name')</th>
                    <th class="text-center">@lang('bank.index.table.header.short_name')</th>
                    <th class="text-center">@lang('bank.index.table.header.branch')</th>
                    <th class="text-center">@lang('bank.index.table.header.branch_code')</th>
                    <th class="text-center">@lang('bank.index.table.header.status')</th>
                    <th class="text-center">@lang('bank.index.table.header.remarks')</th>
                    <th class="text-center">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($bank as $key => $bank)
                    <tr>
                        <td class="text-center">{{ $bank->id }}</td>
                        <td class="text-center">{{ $bank->name }}</td>
                        <td class="text-center">{{ $bank->short_name }}</td>
                        <td class="text-center">{{ $bank->branch }}</td>
                        <td class="text-center">{{ $bank->branch_code }}</td>
                        <td>{{ $bank->status }}</td>
                        <td>{{ $bank->remarks }}</td>

                        <td class="text-center" width="20%">
                            <a class="btn btn-xs btn-info" href="{{ route('db.admin.bank.show', $bank->id) }}"><span class="fa fa-info fa-fw"></span></a>
                            <a class="btn btn-xs btn-primary" href="{{ route('db.admin.bank.edit', $bank->id) }}"><span class="fa fa-pencil fa-fw"></span></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['db.admin.bank.delete', $bank->id], 'style'=>'display:inline'])  !!}
                            <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-close fa-fw"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <a class="btn btn-success" href="{{ route('db.admin.bank.create') }}"><span class="fa fa-plus fa-fw"></span>&nbsp;@lang('bank.index.button.new_phone_provider')</a>
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
@endsection
