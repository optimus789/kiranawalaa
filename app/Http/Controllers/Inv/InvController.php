<?php
#namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Inv;
use App\Inv;
use App\Http\Controllers\Controller;

#namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InvController extends Controller
{


   public function index()
   {
    $inv = Inv::all();
    return view('inv.index')->with('inv',$inv);
   }

   public function create()
   {
    $inv = Inv::all();
    return view('inv.create')->with('inv',$inv);
   }

   /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:200', 'min:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }*/

   public function store(Request $request)
   {
      dd(request()->all());
      $request->validate([
         'title' => ['required', 'string','max:100','unique:inv'],
         'description' => ['required','string','max:255'],
         'category' => ['required','string'],
         'rate' => ['required','numeric'],
         'tax' => ['required','numeric'],
         'stock' => ['required','numeric'],
         'units' => ['required','string'],
         'image' => ['required|image|mimes:jpeg,png,jpg,gif,application/octet-stream'],
      ]);

      #\App\Inv::create($data);

      
      
      $inv = new Inv();
       
      $inv->title = $request->input('title');
      $inv->description = $reques->input('description');
      $inv->category = $request->input('category');
      $inv->rate = $request->input('rate');
      $inv->tax = $request->input('tax');
      $inv->stock = $request->input('stock');
      $inv->units = $request->input('units');

      if ($request->has('image')) {
         // Get image file
         $image1 = $request->file('image');
         // Make a image name based on user name and current timestamp
         $name = Str::slug($request->input('name')).'_'.time();
         // Define folder path
         $folder = '/uploads/images/';
         // Make a file path where image will be stored [ folder path + file name + file extension]
         $filePath = $folder . $name. '.' . $image1->getClientOriginalExtension();
         // Upload image
         $this->uploadOne($image, $folder, 'public', $name);
         // Set user profile image path in database to filePath
         $inv->image = $filePath;
     }

      $inv->save();
      #$inv = Inv::all();
      return view('inv.index')->with('inv',$inv);
   }

   /*public function edit(Request $request, $id)
   {
      $inv = Inv::find($id);
      return view('inv-edit')->with('id',$id);
   }*/

}
