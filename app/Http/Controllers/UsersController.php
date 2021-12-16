<?php
/**
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use DB;
use App\MainCategory;
use App\report;
use App\SubCategory;
use App\Advertisement;

class UsersController extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function retrieve(Request $request){
      $data = MainCategory::get();
      $output = '';
      if($data->count()>0){
        foreach($data as $row){
          $output.= '<option value='.$row->id.'>' .$row->maincategory.'</option>';
        }
          $output.= '';
          echo $output;
      }
    }

public function postad(){
  $categories = MainCategory::select('main_categories.id', 'main_categories.maincategory')
  ->get();
  return view('users.postad', ['categories'=>$categories]);
}

public function categories(Request $request, $maincategory, $id){
  $categories = MainCategory::select('main_categories.id', 'main_categories.maincategory')
  ->get();
  $subcategories = MainCategory::where(['main_categories.id'=>$id])
  ->join('sub_categories', 'sub_categories.maincategoryid', '=','main_categories.id')
  ->select('*')
  ->get();
  $main = MainCategory::where(['id'=>$id])
  ->first();
return view('users.publishads.index', ['categories'=>$categories,'main'=>$main,
 'subcategories'=>$subcategories]);
}

public function publishadvertisement(Request $request){
  $this->validate($request, [
  'subcategoryid' => 'required',
  'productname' => 'required',
  'sellername' => 'required',
  'expsellprice' => 'required',
  'contactmethod' => 'required',
  'location' => 'required',
  'description' => 'required',
  'photos' => 'required',
  'photos.*' => 'mimes:png,jpg,jpeg,gif,svg|max:2048'

]);

  $ads = new Advertisement;
  $images = $request->file('photos');
  $count = 0;
  if($request->file('photos')){
    foreach($images as $item){
      if($count < 4){
        $var = date_create();
        $date = date_format($var, 'Ymd');
        $imageName = $date.'_'.$item->getClientOriginalName();
        $item->move(('/var/www/html/uploads'), $imageName);
        $url = '/uploads/'.$imageName;
        $arr[] = $url;
        $count++;
      }
    }
    $image = implode(",", $arr);
    $ads->maincategoryid = $request->input('maincategoryid');
    $ads->subcategoryid = $request->input('subcategoryid');
    $ads->sellerid = $request->input('sellerid');
    $ads->productname = $request->input('productname');
    $ads->sellername = $request->input('sellername');
    $ads->expsellprice = $request->input('expsellprice');
    $ads->contactmethod = $request->input('contactmethod');
    $ads->location = $request->input('location');
    $ads->description = $request->input('description');
    $ads->photos = $image;
    $ads->save();
    return redirect('/viewAds/AllCategories/1')->with('status','Advertisement published sucessfully.');
  }
}

    public function getAds(){

      $ads =  Advertisement::get();
      $output = '';
      if($ads->count()>0){
        foreach($ads as $row){
          $output.='<div class="col-md-3">
          <div>
          <img src='.strtok($row->photos, ',').'
          style="padding:10px!important;width:100%;height:182px;"/>
          <h3>'.$row->productname.'</h3>
          <p>'.$row->expsellprice.'</p>
          <p>'.$row->location.'</p>

          <a href='.$_SERVER['HTTP_REFERER'].'product/view/'.$row->id.'>VIEW</a>
          </div>

          </div>';
        }
        $output.='';
        echo $output;
      }else{
        $output.='<p>
        Not Found!
        </p>';
      }

    }



public function viewsubsads(Request $request, $maincategoryid, $subcategory, $id){
  $categories = MainCategory::select('main_categories.id', 'main_categories.maincategory')
  ->get();
  $subcategories = SubCategory::where(['maincategoryid'=>$maincategoryid])
  ->get();
  $sub = SubCategory::where(['id'=>$id])
  ->first();
  $main = MainCategory::where(['id'=>$maincategoryid])
  ->first();
  $ads = Advertisement::where(['subcategoryid'=>$id])
  ->get();

  return view('users.subcategories.index', ['categories'=>$categories,
  'sub'=>$sub,
  'main'=>$main,
  'subcategories'=>$subcategories,
  'ads'=>$ads]);

}

public function viewAds(Request $request, $maincategory, $id){
  $categories = MainCategory::select('main_categories.id', 'main_categories.maincategory')
  ->get();
  $ads = Advertisement::where(['maincategoryid'=>$id])
  ->get();
  if($id==1){
  $ads = Advertisement::get();
    return view('users.categories.all', ['categories'=>$categories,

     'ads'=>$ads]);

  }

    else {
      $subcategories = SubCategory::where(['maincategoryid'=>$id])
      ->get();
      $main = MainCategory::where(['id'=>$id])
      ->first();
      return view('users.categories.index', ['categories'=>$categories,
      'main'=>$main,
      'subcategories'=>$subcategories,
       'ads'=>$ads]);
    }

}

public function searchproduct(Request $request){
if($request->get('searchonproduct')){
$query = $request->get('searchonproduct');
$categories = MainCategory::select('main_categories.id', 'main_categories.maincategory')
  ->get();
  $data = Advertisement::where('productname','like','%'.$query.'%')
  ->get();
  return view('users.categories.searchonproduct', ['categories'=>$categories, 'data'=>$data]);

}
}

public function viewproduct(Request $request, $id){
  $categories = MainCategory::select('main_categories.id', 'main_categories.maincategory')
    ->get();
    $product = Advertisement::where(['id'=>$id])
    ->get();
  return view('users.productview', ['categories'=>$categories, 'product'=>$product]);
}

public function contactus(){

  return view('contactus.contactus');
  }


public function reportsend(Request $request){

  $this->validate($request, [

  'description' => 'required',

]);

    $report = new report;
    $report->description = $request->input('description');
    $report->save();
    return redirect('/contactus')->with('status','Report sent sucessfully.');
  }

  public function aboutus(){

    return view('contactus.aboutus');
    }

  //  public function email(){

    //  return view('users.email');  }

    public function pagenotfound(){


      return view('errors.503');
    }




}
