<?php

namespace App\Http\Controllers;
use App\Inv;
use App\Http\Controllers\Controller;

#namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InvController extends Controller
{
   public function index()
   {
    $inv = Inv::all();
    return view('inv')->with('inv',$inv);
   }

   public function create()
   {
    $inv = Inv::all();
    return view('inv-create')->with('inv',$inv);
   }

   public function store(Request $request)
   {
      $inv = new Inv();
       
      $inv->title = $request->input('title');
      $inv->description = $request->input('description');
      $inv->category = $request->input('category');
      $inv->rate = $request->input('rate');
      $inv->tax = $request->input('tax');
      $inv->stock = $request->input('stock');
      $inv->units = $request->input('units');

      if ($request->hasfile('image'))
      {
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         $filename = time().'.'.$extension;
         $file->move('uploads/inv/',$filename);
         $highlights->image = $filename;
      }
      else {
         return $request;
         $inv->image = '';
      }

      $inv->save();

      return view('inv')->with('inv','$inv');
   }

   public function edit(Request $request, $id)
   {
      $inv = Inv::find($id);
      return view('inv-edit')->with('id',$id);
   }

}
