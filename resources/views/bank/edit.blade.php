@extends('layouts.adminlte.master')

@section('title', 'Bank Management')

@section('page_title')
    <span class="fa fa-bank fa-fw"></span>&nbsp;Bank
@endsection
@section('page_title_desc', '')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Bank</h3>
        </div>
        {!! Form::model($bank, ['method' => 'PATCH','route' => ['db.master.bank.edit', $bank->hId()], 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">@lang('bank.name')</label>
                <div class="col-sm-10">
                    <input id="inputName" name="name" type="text" class="form-control" value="{{ $bank->name }}" placeholder="@lang('bank.name')">
                </div>
            </div>
            <div class="form-group">
                <label for="inputShortName" class="col-sm-2 control-label">@lang('bank.short_name')</label>
                <div class="col-sm-10">
                    <input id="inputShortName" name="short_name" type="text" class="form-control" value="{{ $bank->short_name }}" placeholder="@lang('bank.short_name')">
                </div>
            </div>
            <div class="form-group">
                <label for="inputBranch" class="col-sm-2 control-label">@lang('bank.branch')</label>
                <div class="col-sm-10">
                    <input id="inputBranch" name="branch" type="text" class="form-control" value="{{ $bank->branch }}" placeholder="@lang('bank.branch')">
                </div>
            </div>
            <div class="form-group">
                <label for="inputBranchCode" class="col-sm-2 control-label">@lang('bank.branch_code')</label>
                <div class="col-sm-10">
                    <input id="inputBranch" name="branch_code" type="text" class="form-control" value="{{ $bank->branch_code }}" placeholder="@lang('bank.branch_code')">
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="inputStatus" class="col-sm-2 control-label">@lang('bank.status')</label>
                <div class="col-sm-10">
                    {{ Form::select('status', $statusDDL, null, array('class' => 'form-control', 'placeholder' => 'Please Select')) }}
                    <span class="help-block">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRemarks" class="col-sm-2 control-label">@lang('bank.remarks')</label>
                <div class="col-sm-10">
                    <input id="inputRemarks" name="remarks" type="text" class="form-control" value="{{ $bank->remarks }}" placeholder="@lang('bank.remarks')">
                </div>
            </div>
            <div class="form-group">
                <label for="inputButton" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <a href="{{ route('db.master.bank') }}" class="btn btn-default">Cancel</a>
                    <button class="btn btn-default" type="submit">Submit</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection