<?php
/**
 * Created by PhpStorm.
 * User: GitzJoey
 * Date: 9/7/2016
 * Time: 12:33 AM
 */

namespace App\Http\Controllers;

use App\Bank;

class BankController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bank = Bank::paginate(10);
        return view('bank.index')->with('bank', $bank);
    }

    public function show($id)
    {
        $bank = Bank::find($id);
        return view('bank.show')->with('bank', $bank);
    }

    // public function create()
    // {
    //     $statusDDL = Lookup::where('category', '=', 'STATUS')->get()->pluck('description', 'code');

    //     return view('phoneProvider.create', compact('statusDDL'));
    // }

    // public function store(Request $data)
    // {
    //     $validator = Validator::make($data->all(),[
    //         'name'    => 'required|string|max:255',
    //         'short_name' => 'required|string|max:255',
    //         'prefix'          => 'required|string|max:255',
    //         'status'          => 'required',
    //         'remarks'         => 'required|string|max:255',

    //     ]);

    //     if ($validator->fails()) {
    //         return redirect(route('db.admin.phoneProvider.create'))->withInput()->withErrors($validator);
    //     } else {

    //         PhoneProvider::create([
    //             'name'       => $data['name'],
    //             'short_name' => $data['short_name'],
    //             'prefix'     => $data['prefix'],
    //             'status'     => $data['status'],
    //             'remarks'    => $data['remarks']
    //         ]);
    //         return redirect(route('db.admin.phoneProvider'));
    //     }
    // }

    // private function changeIsDefault()
    // {

    // }

    // public function edit($id)
    // {
    //     $phoneProvider= PhoneProvider::find($id);

    //     $statusDDL = Lookup::where('category', '=', 'STATUS')->get()->pluck('description', 'code');

    //     return view('phoneProvider.edit', compact('phoneProvider', 'statusDDL'));
    // }

    // public function update($id, Request $req)
    // {
    //     PhoneProvider::find($id)->update($req->all());
    //     return redirect(route('db.admin.phoneProvider'));
    // }

    // public function delete($id)
    // {
    //     PhoneProvider::find($id)->delete();
    //     return redirect(route('db.admin.phoneProvider'));
    // }
}