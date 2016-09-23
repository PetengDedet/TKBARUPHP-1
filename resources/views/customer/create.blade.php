@extends('layouts.adminlte.master')

@section('custom_css')
    <style>
        .tab-pane {
            height: inherit;
        }
    </style>
@endsection

@section('title', 'Customer Management')

@section('page_title')
    <span class="fa fa-@lang('customer.icon') fa-fw"></span>&nbsp;@lang('customer.create.title')
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

    <div class="panel panel-default">
        <form class="form-horizontal" action="{{ route('db.master.customer.create') }}" method="post">
            <div id="exTab1" class="panel-body">
                <div id="exTab2" class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#1" data-toggle="tab"><i class="fa fa-home"></i> Customer</a>
                        </li>
                        <li><a href="#2" data-toggle="tab"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li><a href="#3" data-toggle="tab"><i class="fa fa-bank"></i> Bank Account</a>
                        </li>
                    </ul>


                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">@lang('customer.name')</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" type="text" class="form-control"
                                               placeholder="@lang('customer.name')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address"
                                           class="col-sm-2 control-label">@lang('customer.address')</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" id="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-sm-2 control-label">@lang('customer.city')</label>
                                    <div class="col-sm-10">
                                        <input id="city" name="city" type="text" class="form-control"
                                               placeholder="@lang('customer.city')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">@lang('customer.phone')</label>
                                    <div class="col-sm-10">
                                        <input id="phone" name="phone" type="tel" class="form-control"
                                               placeholder="@lang('customer.phone')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="remarks"
                                           class="col-sm-2 control-label">@lang('customer.remarks')</label>
                                    <div class="col-sm-10">
                                        <input id="remarks" name="remarks" type="text" class="form-control"
                                               placeholder="@lang('customer.remarks')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tax_id" class="col-sm-2 control-label">@lang('customer.tax_id')</label>
                                    <div class="col-sm-10">
                                        <input id="tax_id" name="tax_id" type="text" class="form-control"
                                               placeholder="@lang('customer.tax_id')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="payment_due_date"
                                           class="col-sm-2 control-label">@lang('customer.payment_due_date')</label>
                                    <div class="col-sm-10">
                                        <input id="payment_due_date" name="payment_due_date" type="text"
                                               class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="profileFirstName[]" class="control-label col-sm-2">First Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="profileFirstName[]" id="profileFirstName[]"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profileLastName[]" class="control-label col-sm-2">Last Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="profileLastName[]" id="profileLastName[]"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profileFirstName[]" class="control-label col-sm-2">User ID</label>
                                    <div class="col-md-10">
                                        <input type="text" name="profileFirstName[]" id="profileFirstName[]"
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3">
                            <h3>add clearfix to tab-content (see the css)</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <label for="inputButton" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <a href="{{ route('db.master.customer') }}" class="btn btn-default btn-warning"><i
                                    class="fa fa-times"></i> Cancel</a>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
