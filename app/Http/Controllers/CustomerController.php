<?php
//PetengDedet

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

use App\DataTables\CustomerDataTable;

use App\Lookup;
use App\Customer;
use App\PhoneProvider;
use App\Bank;
use App\BankAccount;
use App\Profile;
use App\PhoneNumber;

class CustomerController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(CustomerDataTable $dataTable)
    {   
        return $dataTable->render('customer.index');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.show')->with('customer', $customer);
    }

    public function create()
    {
        $phoneProviders = PhoneProvider::all();
        $banks          = Bank::all();
        return view('customer.create')->with('phoneProviders', $phoneProviders)->with('banks', $banks);
    }

    public function store(Request $data)
    {
        // dd($data->all());

        $rules = [
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
            'city'    => 'required|string|max:255',
            'phone'   => 'required',
            'tax_id'  => 'required|string|max:255' 
        ];

        foreach ($data['profileFirstName'] as $key => $value) {
            
            $rules['profileFirstName'][$key] = 'required';
            $rules['profileLastName'][$key] = 'required';
            $rules['profileIcNum'][$key] = 'required';
            
            foreach ($data['profilePhoneProvider'][$key] as $k => $v) {
                
                $rules['profilePhoneProvider'][$key][$k] = 'required';
                $rules['profilePhoneNumber'][$key][$k] = 'required';
                $rules['profilePhoneStatus'][$key][$k] = 'required';
            }
        }

        foreach ($data['bankName'] as $key => $value) {

            $rules['bankName'][$key] = 'required';
            $rules['bankAccount'][$key] = 'required';
            $rules['bankStatus'][$key] = 'required';
        }

        $validator = Validator::make($data->all(), $rules);

        if ($validator->fails()) {
            return redirect(route('db.master.customer.create'))->withInput()->withErrors($validator);
        } else {
            // dd($rules);
            $customer = new Customer();
            $customer->name              = $data['name'];
            $customer->address           = $data['address'];
            $customer->city              = $data['city'];
            $customer->phone             = $data['phone'];
            $customer->tax_id            = $data['tax_id'];
            $customer->remarks           = $data['remarks'];
            $customer->payment_due_date  = explode('/', $data['payment_due_date'])[2] . '-' . explode('/', $data['payment_due_date'])[1] . '-' . explode('/', $data['payment_due_date'])[0];

            if (!$customer->save()) {
                return redirect(route('db.master.customer.create'))->withInput()->withErrors('err');
            }

            foreach ($data['profileFirstName'] as $p => $prof) {
                
                $profile = new Profile();
                $profile->customer_id = $customer->id;
                $profile->first_name = $data['profileFirstName'][$p];
                $profile->last_name = $data['profileLastName'][$p];
                $profile->ic_num = $data['profileIcNum'][$p];
                $profile->address = $data['profileAddress'][$p];
                
                if (array_key_exists($p, $data->profileImage)) {
                    $filename = str_random(10) . '.jpg';
                    $data->file('profileImage')[$p]->move('uploads/profile/', $filename) OR die('Can not upload photo');
                    $profile->image_filename = $filename;
                }

                if (!$profile->save()){
                    die('can not save profile');
                }

                foreach ($data['profilePhoneProvider'][$p] as $k => $v) {
                    $phone = new PhoneNumber();
                    $phone->profile_id = $profile->id;
                    $phone->provider_id = $data['profilePhoneProvider'][$p][$k];
                    $phone->number = $data['profilePhoneNumber'][$p][$k];
                    $phone->remarks = $data['profilePhoneRemarks'][$p][$k];
                    if (!$phone->save()){
                        die('can not save phone');
                    }                    
                }            
            }

            foreach ($data['bankName'] as $b => $bnk) {
                $bank = new BankAccount();
                $bank->customer_id      = $customer->id;
                $bank->bank_id          = $data['bankName'][$b];
                $bank->account_number   = $data['bankAccount'][$b];
                $bank->status           = $data['bankStatus'][$b];
                $bank->remarks          = $data['bankRemarks'][$b];

                if (!$bank->save()) {
                    die('can not save bank');
                }
            }
            return redirect(route('db.master.customer'));
        }
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $phoneProviders = PhoneProvider::all();
        $banks          = Bank::all();
        return view('customer.edit')->with('customer', $customer)->with('banks', $banks)->with('phoneProviders', $phoneProviders);
    }

    public function update($id, Request $req)
    {
        Customer::findOrFail($id)->update($req->all());
        return redirect(route('db.master.customer'));
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $bankAccount = BankAccount::where('customer_id', $customer->id)->delete();
        $profile = Profile::where('customer_id', $customer->id)->get();
        foreach ($profile as $key => $value) {
            $profile[$key]->delete();
            $phone = PhoneNumber::where('profile_id', $value->id)->delete();
        }
        $customer->delete();

        return redirect(route('db.master.customer'));
    }
}
