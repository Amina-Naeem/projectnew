<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class WishController extends Controller
{
    //function to return addWishView
  public function addWish(){
      return view('addWishView');
  }
  /*
   * Creates the wish by fetching user inputs and storing them into the database
   * Prior to that it checks if the ID of the wish already exists or not
   */
    public function createWish(Request $request){
        $wishid=DB::table('wishes')->where('email',Auth::user()->email)->where('id',$request->id)->first();
       //if ID is unique then store the wish into database where user email and wish ID makes composite key.
        if($wishid==null)
        {    $wish= new Wish();
         $wish->id = $request->id;
         $wish->wish=$request->wish;
        $wish->fulfilled=$request->fulfilled;
        $wish->email=Auth::user()->email;
        $wish->save();
        $msg= Lang::get('home.created');
        return back()->with('wish_created',$msg);}
      //if ID exists then return with msg without storing data into database
        else{
            $msg= Lang::get('home.idExist');
            return back()->with('wish_created',$msg);}
    }
    /*
     * function to get wishs of the loged in user
     *
     */
    public function getWish(){
      $currentuser=Auth::user()->email;
    //$wishes =Wish::orderBy('id','ASC')->get();
      $wishes=DB::table('wishes')->where('email','=',$currentuser)->orderBy('id','ASC')->get();
        return view('wishes',compact('wishes'));
    }
  /*
   * getWishDetails uses the ID of the wish and the email of the user
   * to get the details of the requested wish.
   *
   */
    public function getWishDetails($id){
      $wish=Wish::where('id',$id)->where('email',Auth::user()->email)->first();
return view('wish-details',compact('wish'));
    }
    /*
     * deleteWish uses the id of the wish and the email of the user to delete the unwanted wish.
     */
public function deleteWish($id){
      Wish::where('id',$id)->where('email',Auth::user()->email)->delete();
    $msg= Lang::get('home.deleted');
      return back()->with('wish_deleted',$msg);
}
/*
 * updateWish uses the id of the wish and the email of the logged in user to fetch the stored information of the the wish.
 */
public function updateWish($id){
      $wish=Wish::where('id',$id)->where('email',Auth::user()->email)->first();
      return view('update-wish',compact('wish'));
}
/*
 * updateWishData updates the fulfilled attribute of the wish
 * it gets the user input and updates it in database
 */
    public function updateWishData(Request $request){

     //  $wish=Wish::where('id',$request->id)->where('email',Auth::user()->email)->first();
     //  $wish->id=$request->id;
       //$wish->wish=$request->wish;
     //   $wish->fulfilled=$request->fulfilled;
    //  $wish->email=Auth::user()->email;
       $wish=DB::table('wishes')->where('email',Auth::user()->email)->where('id',$request->id)->update(['fulfilled' => $request->fulfilled]);
      $msg= Lang::get('home.updated');
        return back()->with('wish_updated',$msg);
    }
}
