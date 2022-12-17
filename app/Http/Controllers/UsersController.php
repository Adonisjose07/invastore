<?php

namespace App\Http\Controllers;
use \App\Models\User;

use Illuminate\Http\Request;
use DataTables;

class UsersController extends Controller
{
    public function index(){
        return view('admin.users');
    }

    public function getCustomers(Request $request){
        if($request->ajax()){
            $data = User::whereRelation('credentials', 'type', '=', 'user')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(User $row){
                        $actionBtn = '
                            <a href="'.route('users.view', ['id' => $row->id]).'" class="edit btn btn-success btn-sm">
                                View
                            </a> ';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }else{
            abort(404);
        }
    }

    public function viewCustomer(Request $request){
        
    }
}
