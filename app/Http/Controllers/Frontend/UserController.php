<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use App\Advertisement;

class UserController extends Controller
{
    public function myprofile(){


        return view('users.profile');
    }
    public function myads(){

      $sellerid = Auth::user()->id;
      $advertisements = Advertisement::select('id' , 'productname', 'description',
      'photos',
      'sellername',
      'expsellprice',
      'location',
      'description')
      ->where(['sellerid'=>$sellerid])
      ->get();


    return view('users.myads', ['advertisements'=>$advertisements]);
    }


    public function update(Request $request){

    $user_id = Auth::user()->id;
    $user = User::findOrFail($user_id);
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->phonenumber = $request->input('phonenumber');
    $user->update();

        return redirect()->back()->with('status','Profile Information Updated.');
    }


    public function myadsupdate(Request $request, $id){

    $advertisement = Advertisement::find($id);
    $advertisement->productname = $request->input('productname');
    $advertisement->description = $request->input('description');
    $advertisement->expsellprice = $request->input('expsellprice');
    $advertisement->location = $request->input('location');
    $advertisement->update();

        return redirect()->back()->with('status','Ad Information Updated.');
    }

    public function deletead($id){

      $advertisement = Advertisement::find($id);
      $advertisement->delete();
      return redirect()->back()->with('status','Advertisement Deleted Sucessfully.');

    }

}
