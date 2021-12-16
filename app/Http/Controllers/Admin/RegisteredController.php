<?php
/**
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\report;
use DB;

class RegisteredController extends Controller
{
    public function index(){

      $users = User::all();
      return view('admin.users.index')->with('users', $users);

    }

    public function edit($id){


      $user_roles = User::find($id);
        return view('admin.users.edit')->with('user_roles', $user_roles);
    }

    public function updaterole(Request $request, $id){

      $user = User::find($id);
      $user->name = $request->input('name');
      $user->role_as = $request->input('role_as');
      $user->isban = $request->input('isban');
      $user->update();

      return redirect()->back()->with('status', 'User Updated Sucessfully');

    }

    public function delete($id){

      $user = User::find($id);
      $user->delete();
      return redirect()->back()->with('status','User Deleted Sucessfully.');

    }

    public function reports(){

      $reports = DB::table('reports')->get();
      return view('admin.reports.index')->with('reports', $reports);

    }

    public function reportdelete($id){

      $report = report::find($id);
      $report->delete();
      return redirect()->back()->with('status','Report Deleted Sucessfully.');

    }



}
