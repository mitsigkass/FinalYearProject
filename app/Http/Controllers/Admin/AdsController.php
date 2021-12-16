<?php
/**
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Advertisement;
class AdsController extends Controller
{
    public function index(){

      $advertisements = Advertisement::all();
      return view('admin.ads.index')->with('advertisements', $advertisements);


    }

    public function delete($id){

      $advertisement = Advertisement::find($id);
      $advertisement->delete();
      return redirect()->back()->with('status','Advertisement Deleted Sucessfully.');

    }
  /*  public function myads(){
      $sellerid = Auth::user('id');
      $advertisements = Advertisement::all($sellerid);
      return view('users.myads')->with('advertisements', $advertisements);

    }
    */

}
