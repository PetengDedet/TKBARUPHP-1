@extends('layouts.adminlte.master')

@section('custom_css')
<style>
    .fi {
        margin: 5px;
        border: 1px solid #d2d6de;
    }
</style>
@endsection

@section('title', 'Detail Management')

@section('page_title')
<span class="fa fa-@lang('customer.icon') fa-fw"></span>&nbsp; Detail Customer
@endsection
@section('page_title_desc', '')

@section('content')

    <div class="panel panel-default">
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


                    <div class="tab-content form-horizontal">
                        <div class="tab-pane active" id="1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">@lang('customer.name')</label>
                                    <div class="col-sm-10">
                                       {{$customer->name}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address"
                                    class="col-sm-2 control-label">@lang('customer.address')</label>
                                    <div class="col-sm-10">
                                       {{$customer->address}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-sm-2 control-label">@lang('customer.city')</label>
                                    <div class="col-sm-10">
                                       {{$customer->city}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">@lang('customer.phone')</label>
                                    <div class="col-sm-10">
                                       {{$customer->phone}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tax_id" class="col-sm-2 control-label">@lang('customer.tax_id')</label>
                                    <div class="col-sm-10">
                                       {{$customer->tax_id}}
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="payment_due_date"
                                    class="col-sm-2 control-label">@lang('customer.payment_due_date')</label>
                                    <div class="col-sm-10">
                                       {{$customer->payment_due_date}}

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="remarks"
                                    class="col-sm-2 control-label">@lang('customer.remarks')</label>
                                    <div class="col-sm-10">
                                       {{$customer->remarks}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="p">
                                @forelse($customer->profile as $key => $value)
                                    <fieldset class="fi">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="profileFirstName[1]" class="control-label col-sm-2">First Name</label>
                                                <div class="col-md-10">
                                                    {{$value->first_name}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="profileLastName[1]" class="control-label col-sm-2">Last Name</label>
                                                <div class="col-md-10">
                                                    {{$value->last_name}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="profileAddress[1]" class="control-label col-md-2">Address</label>
                                                <div class="col-md-10">
                                                    {{$value->address}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="profileIcNum[1]" class="control-label col-md-2">IC Num</label>
                                                <div class="col-md-10">
                                                    {{$value->ic_num}}
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="profileImage[1]" class="control-label col-md-2">Image</label>
                                                <div class="col-md-10">
                                                    @if($value->image_filename != null)
                                                        <img src="{{asset('uploads/profile/') . '/' . $value->image_filename}}" alt="Photo" class="img-rounded" width="100">
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label col-md-2">Phone Numbers</label>
                                                <div class="col-md-10">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Provider</th>
                                                                <th>Number</th>
                                                                <th>Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="profPhones1">
                                                            @forelse($value->phoneNumber as $k => $v)
                                                                <tr>
                                                                    <td>
                                                                        {{$v->phoneProvider->name}}
                                                                    </td>
                                                                    <td>
                                                                        {{$v->number}}
                                                                    </td>
                                                                    <td>
                                                                       {{$v->remarks}}
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </fieldset>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane" id="3">
                            <div class="box-body">
                                <table class="table table-borderes">
                                    <thead>
                                        <tr>
                                            <th>Bank</th>
                                            <th>Account Number</th>
                                            <th>Reamrks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="containerBank">
                                        @forelse($customer->bankAccount as $bank)
                                        <tr>
                                            <td>
                                                {{$bank->bank->name}}
                                            </td>
                                            <td>
                                                {{$bank->account_number}}
                                            </td>
                                            <td>
                                                {{$bank->remarks}}
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="/customer" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                <div class="btn-group pull-right">
                    <a href="/dashboard/master/customer/edit/{{$customer->id}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="/dashboard/master/customer/delete/{{$customer->id}}" class="btn btn-default"><i class="fa fa-trash"></i> Hapus</a>
                </div>
            </div>
    </div>
@endsection

@section('custom_js')
@endsection
