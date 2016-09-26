@extends('layouts.adminlte.master')

@section('custom_css')
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">
<style>
    .tab-pane {
        height: inherit;
    }
    .fi {
        margin: 5px;
        border: 1px solid #d2d6de;
    }
    .pager li a {
        color: #fff;
        background: #2196F3;
        border-color: #2196F3; 
    }
    .pager li a:hover {
        color: #2196F3;
        background: #fff;
        border-color: #2196F3; 
    }
    .pager li a:hover {
        color: #2196F3;
        background: #fff;
        border-color: #2196F3; 
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

<div id="rootwizard">
    <div class="panel panel-default">
        <form class="form-horizontal" id="cstForm" action="/dashboard/master/customer/update/{{$customer->id}}" method="post" enctype="multipart/form-data">
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
                                        <input id="name" name="name" type="text" class="form-control" value="{{$customer->name}}"
                                        placeholder="@lang('customer.name')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address"
                                    class="col-sm-2 control-label">@lang('customer.address')</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" id="address" class="form-control">{{$customer->address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-sm-2 control-label">@lang('customer.city')</label>
                                    <div class="col-sm-10">
                                        <input id="city" name="city" type="text" class="form-control" value="{{$customer->city}}"
                                        placeholder="@lang('customer.city')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">@lang('customer.phone')</label>
                                    <div class="col-sm-10">
                                        <input id="phone" name="phone" type="tel" class="form-control" value="{{$customer->phone}}"
                                        placeholder="@lang('customer.phone')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tax_id" class="col-sm-2 control-label">@lang('customer.tax_id')</label>
                                    <div class="col-sm-10">
                                        <input id="tax_id" name="tax_id" type="text" class="form-control"  value="{{$customer->tax_id}}"
                                        placeholder="@lang('customer.tax_id')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="payment_due_date"
                                    class="col-sm-2 control-label">@lang('customer.payment_due_date')</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="payment_due_date" id="datepicker" value="{{$customer->payment_due_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="remarks"
                                    class="col-sm-2 control-label">@lang('customer.remarks')</label>
                                    <div class="col-sm-10">
                                        <input id="remarks" name="remarks" type="text" class="form-control" value="{{$customer->remarks}}"
                                        placeholder="@lang('customer.remarks')">
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
                                            <label for="profileFirstName[{{$value->id}}]" class="control-label col-sm-2">First Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="profileFirstName[{{$value->id}}]" id="profileFirstName[{{$value->id}}]"
                                                class="form-control" value="{{$value->first_name}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profileLastName[{{$value->id}}]" class="control-label col-sm-2">Last Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="profileLastName[{{$value->id}}]" id="profileLastName[{{$value->id}}]"
                                                class="form-control" value="{{$value->last_name}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profileAddress[{{$value->id}}]" class="control-label col-md-2">Address</label>
                                            <div class="col-md-10">
                                                <input type="text" name="profileAddress[{{$value->id}}]" id="profileAddress[{{$value->id}}]" class="form-control" value="{{$value->address}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="profileIcNum[{{$value->id}}]" class="control-label col-md-2">IC Num</label>
                                            <div class="col-md-10">
                                                <input type="text" name="profileIcNum[{{$value->id}}]" id="profileIcNum[{{$value->id}}]" class="form-control" value="{{$value->ic_num}}" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="profileImage[1]" class="control-label col-md-2">Image</label>
                                            <div class="col-md-10">
                                                <input type="file" name="profileImage[{{$value->id}}]" value="{{$value->image_filename}}" class="form-control">
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
                                                            <th>Status</th>
                                                            <th>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="profPhones{{$value->id}}">
                                                        @forelse($value->phoneNumber as $k => $v)
                                                        <tr>
                                                            <td>
                                                                <select name="profilePhoneProvider[{{$v->id}}][1]" id="profilePhoneProvider[1][1]" class="form-control" required>
                                                                    @forelse($phoneProviders as $key => $provider)
                                                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="profilePhoneNumber[1][1]" id="profilePhoneNumber[1][1]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <select name="profilePhoneStatus[1][1]" id="profilePhoneStatus[1][1]" class="form-control" required>
                                                                    <option value="1">Aktif</option>
                                                                    <option value="0">Non Aktif</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="profilePhoneRemarks[1][1]" class="form-control">
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-sm btn-default pull-right" id="addPhone1" onclick="newPhone(1,1)"><i class="fa fa-plus-square-o"></i> Add Phone</button>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </fieldset>
                            @empty
                            @endforelse
                            </div>
                            <button type="button" class="btn btn-default btn-sm pull-right" id="profileAdd" style="margin-right:5px;" onclick="addProf(1)"><i class="fa fa-user"></i>&nbsp; Add Profile</button>

                        </div>
                        <div class="tab-pane" id="3">
                            <div class="box-body">
                                <table class="table table-borderes">
                                    <thead>
                                        <tr>
                                            <th>Bank</th>
                                            <th>Account Number</th>
                                            <th>Status</th>
                                            <th>Reamrks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="containerBank">
                                        <tr>
                                            <td>
                                                <select name="bankName[]" id="bankName[]" class="form-control" required>
                                                    @forelse($banks as $key => $bank)
                                                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="bankAccount[]" id="bankAccount[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <select name="bankStatus[]" id="bankStatus[]" class="form-control">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Non Aktif</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="bankRemarks[]" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-sm btn-default pull-right" onclick="addBank()"><i class="fa fa-plus-square-o"></i> Add Bank</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <ul class="pager wizard">
                    <li class="previous first" style="display:none;"><a href="#">First</a></li>
                    <li class="previous"><a href="#">Previous</a></li>
                    
                    {{-- <li class="next last" style="display:none;"><a href="#">Last</a></li> --}}
                    <li class="next"><a href="#">Next</a></li>
                    <li class="finish">
                        {{-- <a href="{{ route('db.master.customer') }}" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</a> --}}
                        <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
                    </li>
                </ul>
                <div class="form-group">
                <label for="inputButton" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom_js')
<script src="{{asset('js/bootstrap-wizard.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard({
            onTabClick: function(tab, navigation, index) {
//                alert('on tab click disabled');
                       // return false;
            },
            tabClass: 'nav',
            onNext: function (tab, navigation, index) {
                if(index==1) {
                    // Make sure we entered the name
                    if(!$('#name').val()) {
                        notie.alert('warning', 'Name Field is required', 1);
                        $('#name').focus();
                        return false;
                    }
                    if(!$('#address').val()) {
                        notie.alert('warning', 'Address Field is required', 1);
                        $('#address').focus();
                        return false;
                    }

                    if(!$('#city').val()) {
                        notie.alert('warning', 'City Field is required', 1);
                        $('#city').focus();
                        return false;
                    }
                    if(!$('#phone').val()) {
                        notie.alert('warning', 'Phone number is required', 1);
                        $('#phone').focus();
                        return false;
                    }
                    if(!$('#tax_id').val()) {
                        notie.alert('warning', 'Tax ID is required', 1);
                        $('#tax_id').focus();
                        return false;
                    }
                    if(!$('#datepicker').val()) {
                        notie.alert('warning', 'Payment Due Date is required', 1);
                        $('#datepicker').focus();
                        return false;
                    }
                }
                if(index==2) {
                    // Make sure we entered the name
                    if (!$('[id^=profileFirstName]').val()) {
                        notie.alert('warning', 'Profile First Name is required', 1);
                        return false;
                    }
                    if (!$('[id^=profileLastName]').val()) {
                        notie.alert('warning', 'Profile Last Name is required', 1);
                        return false;
                    }
                    if (!$('[id^=profileIcNum]').val()) {
                        notie.alert('warning', 'Profile IC Num is required', 1);
                        return false;
                    }
                }
                if(index==3) {
                    // Make sure we entered the name
                    if (!$('[id^=bank]').val()) {
                        notie.alert('warning', 'Please Complete all filed is required', 1);
                        return false;
                    }

                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: 'd',
            autoclose:true
        });
    });
</script>
<script>
    function newPhone(prof, numb) {
        if ($("#profilePhoneProvider\\[" + (prof) + "\\]\\[" + (numb) + "\\]").val() != '' && $("#profilePhoneNumber\\[" + (prof) + "\\]\\[" + (numb) + "\\]").val() != '' && $("#profilePhoneStatus\\[" + (prof) + "\\]\\[" + (numb) + "\\]").val() != '') {
            var strVar = "";
            strVar += "<tr>";
            strVar += "                                                    <td>";
            strVar += "                                                        <select name=\"profilePhoneProvider[" + (prof) + "][" + (numb+1) + "]\" id=\"profilePhoneProvider[" + (prof) + "][" + (numb+1) + "]\" class=\"form-control\" required>";
            strVar += "                                                            @forelse($phoneProviders as $key => $provider)";
            strVar += "                                                                <option value=\"{{$provider->id}}\">{{$provider->name}}<\/option>";
            strVar += "                                                                @empty";
            strVar += "                                                            @endforelse";
            strVar += "                                                        <\/select>";
            strVar += "                                                    <\/td>";
            strVar += "                                                    <td>";
            strVar += "                                                        <input type=\"text\" name=\"profilePhoneNumber[" + (prof) + "][" + (numb+1) + "]\" id=\"profilePhoneNumber[" + (prof) + "][" + (numb+1) + "]\" class=\"form-control\" required>";
            strVar += "                                                    <\/td>";
            strVar += "                                                    <td>";
            strVar += "                                                        <select name=\"profilePhoneStatus[" + (prof) + "][" + (numb+1) + "]\" id=\"profilePhoneStatus[" + (prof) + "][" + (numb+1) + "]\" class=\"form-control\" required>";
            strVar += "                                                            <option value=\"1\">Aktif<\/option>";
            strVar += "                                                            <option value=\"0\">Non Aktif<\/option>";
            strVar += "                                                        <\/select>";
            strVar += "                                                    <\/td>";
            strVar += "                                                    <td>";
            strVar += "                                                        <input type=\"text\" name=\"profilePhoneRemarks[" + (prof) + "][" + (numb+1) + "]\" class=\"form-control\" >";
            strVar += "                                                    <\/td>";
            strVar += "                                                <\/tr>";
            $('#profPhones' + prof).append(strVar);
            $('#addPhone').attr('onclick', 'newPhone(' + (prof) + ',' + (numb+1) + ')');
        }else{
            notie.alert('warning', 'Please complete all phone filed', 1);
        }
    }

    function addProf(num) {
        if($("#profileFirstName\\[" + (num) + "\\]").val() != '' && $("#profileLastName\\[" + (num) + "\\]").val() != '' && $("#profileIcNum\\[" + (num) + "\\]").val() != ''){
            var str="";
            str += "<fieldset class=\"fi\">";
            str += "                                <div class=\"box-body\">";
            str += "                                    <div class=\"form-group\">";
            str += "                                        <label for=\"profileFirstName[" + (num+1) + "]\" class=\"control-label col-sm-2\">First Name<\/label>";
            str += "                                        <div class=\"col-md-10\">";
            str += "                                            <input type=\"text\" name=\"profileFirstName[" + (num+1) + "]\" id=\"profileFirstName[" + (num+1) + "]\"";
            str += "                                            class=\"form-control\" required>";
            str += "                                        <\/div>";
            str += "                                    <\/div>";
            str += "                                    <div class=\"form-group\">";
            str += "                                        <label for=\"profileLastName[" + (num+1) + "]\" class=\"control-label col-sm-2\">Last Name<\/label>";
            str += "                                        <div class=\"col-md-10\">";
            str += "                                            <input type=\"text\" name=\"profileLastName[" + (num+1) + "]\" id=\"profileLastName[" + (num+1) + "]\"";
            str += "                                            class=\"form-control\" required>";
            str += "                                        <\/div>";
            str += "                                    <\/div>";
            str += "                                    <div class=\"form-group\">";
            str += "                                        <label for=\"profileAddress" + (num+1) + "]\" class=\"control-label col-md-2\">Address<\/label>";
            str += "                                        <div class=\"col-md-10\">";
            str += "                                            <input type=\"text\" name=\"profileAddress[" + (num+1) + "]\" id=\"profileAddress[" + (num+1) + "]\" class=\"form-control\" required>";
            str += "                                        <\/div>";
            str += "                                    <\/div>";
            str += "                                    <div class=\"form-group\">";
            str += "                                        <label for=\"profileIcNum[" + (num+1) + "]\" class=\"control-label col-md-2\">IC Num<\/label>";
            str += "                                        <div class=\"col-md-10\">";
            str += "                                            <input type=\"text\" name=\"profileIcNum[" + (num+1) + "]\" id=\"profileIcNum[" + (num+1) + "]\" class=\"form-control\" required>";
            str += "                                        <\/div>";
            str += "                                    <\/div>";
            str += "                                    <div class=\"form-group\">";
            str += "                                        <label for=\"profileImage[" + (num+1) + "]\" class=\"control-label col-md-2\">Image<\/label>";
            str += "                                        <div class=\"col-md-10\">";
            str += "                                            <input type=\"file\" name=\"profileImage[" + (num+1) + "]\" class=\"form-control\">";
            str += "                                        <\/div>";
            str += "                                    <\/div>";
            str += "                                    <div class=\"form-group\">";
            str += "                                        <label for=\"\" class=\"control-label col-md-2\">Phone Numbers<\/label>";
            str += "                                        <div class=\"col-md-10\">";
            str += "                                            <table class=\"table table-bordered\">";
            str += "                                                <thead>";
            str += "                                                    <tr>";
            str += "                                                        <th>Provider<\/th>";
            str += "                                                        <th>Number<\/th>";
            str += "                                                        <th>Status<\/th>";
            str += "                                                        <th>Remarks<\/th>";
            str += "                                                    <\/tr>";
            str += "                                                <\/thead>";
            str += "                                                <tbody id=\"profPhones" + (num + 1) + "\">";
            str += "                                                    <tr>";
            str += "                                                        <td>";
            str += "                                                            <select name=\"profilePhoneProvider[" + (num+1) + "][1]\" id=\"profilePhoneProvider[" + (num+1) + "][1]\" class=\"form-control\" required>";
            str += "                                                                @forelse($phoneProviders as $key => $provider)";
            str += "                                                                <option value=\"{{$provider->id}}\">{{$provider->name}}<\/option>";
            str += "                                                                @empty";
            str += "                                                                @endforelse";
            str += "                                                            <\/select>";
            str += "                                                        <\/td>";
            str += "                                                        <td>";
            str += "                                                            <input type=\"text\" name=\"profilePhoneNumber[" + (num+1) + "][1]\" id=\"profilePhoneNumber[" + (num+1) + "][1]\" class=\"form-control\" required>";
            str += "                                                        <\/td>";
            str += "                                                        <td>";
            str += "                                                            <select name=\"profilePhoneStatus[" + (num+1) + "][1]\" id=\"profilePhoneStatus[" + (num+1) + "][1]\" class=\"form-control\" required>";
            str += "                                                                <option value=\"1\">Aktif<\/option>";
            str += "                                                                <option value=\"0\">Non Aktif<\/option>";
            str += "                                                            <\/select>";
            str += "                                                        <\/td>";
            str += "                                                        <td>";
            str += "                                                            <input type=\"text\" name=\"profilePhoneRemarks[" + (num+1) + "][1]\"  class=\"form-control\">";
            str += "                                                        <\/td>";
            str += "                                                    <\/tr>";
            str += "                                                <\/tbody>";
            str += "                                            <\/table>";
            str += "                                            <button type=\"button\" class=\"btn btn-sm btn-default pull-right\" id=\"addPhone"+ (num+1) +"\" onclick=\"newPhone(" + (num+1) + ",1)\"><i class=\"fa fa-plus-square-o\"><\/i> Add Phone<\/button>";
            str += "                                        <\/div>";
            str += "                                        <br>";
            str += "                                    <\/div>";
            str += "                                <\/div>";
            str += "                            <\/fieldset>";

            $('.p').append(str);
            $('#profileAdd').attr('onclick', 'addProf(' + (num+1) + ')');
        }else{
            notie.alert('warning', 'Please complete all Profile filed', 1);
        }
    }

    function addBank(numb) {
        if ($("[id^=bank]").val() != null) {
            var bank="";
            bank += "<tr>";
            bank += "                                            <td>";
            bank += "                                                <select name=\"bankName[]\" id=\"bankName[]\" class=\"form-control\" required>";
            bank += "                                                    @forelse($banks as $key => $bank)";
            bank += "                                                    <option value=\"{{$bank->id}}\">{{$bank->name}}<\/option>";
            bank += "                                                    @empty";
            bank += "                                                    @endforelse";
            bank += "                                                <\/select>";
            bank += "                                            <\/td>";
            bank += "                                            <td>";
            bank += "                                                <input type=\"text\" name=\"bankAccount[]\" id=\"bankAccount[]\" class=\"form-control\" required>";
            bank += "                                            <\/td>";
            bank += "                                            <td>";
            bank += "                                                <select name=\"bankStatus[]\" id=\"bankStatus[]\" class=\"form-control\">";
            bank += "                                                    <option value=\"1\">Aktif<\/option>";
            bank += "                                                    <option value=\"0\">Non Aktif<\/option>";
            bank += "                                                <\/select>";
            bank += "                                            <\/td>";
            bank += "                                            <td>";
            bank += "                                                <input type=\"text\" name=\"bankRemarks[]\" class=\"form-control\">";
            bank += "                                            <\/td>";
            bank += "                                        <\/tr>";
            $('#containerBank').append(bank);
        }else{
            notie.alert('warning', 'Please complete all bank filed', 1);
        }   
    }
</script>
@endsection
