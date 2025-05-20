<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        return view('products.index',['products'=>Product::get()]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
   {
    //validate the data
     $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'project_url' => 'required|url|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        'status' => 'required|in:draft,published',
    ]);
       //upload image to a folder
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'),$imageName);
         $product = new Product(); // Capital 'P' for model class name
    
         $product = new Product();
          $product->{'Project Title'} = $request->name;
          $product->{'Description'} = $request->description;
          $product->{'Project URL'} = $request->project_url;
          $product->{'Image'} = $imageName;
          $product->{'Status'} = $request->status;
        try {
         $product->save();
     } catch (\Exception $e) {
    dd('Save failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Project Created');
    

   }
   public function edit($id)
   {
    $product=Product::where('id',$id)->first();
    return view('products.edit',['product'=>$product]);
   }
   public function update(Request $request, $id)
  {
    //validate the data
     $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'project_url' => 'required|url|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        'status' => 'required|in:draft,published',
    ]);
    $product=Product::where('id',$id)->first();
     if ($request->hasFile('image'))
     {
       //upload image to a folder
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product->{'Image'} = $imageName;
     }
    
          $product->{'Project Title'} = $request->name;
          $product->{'Description'} = $request->description;
          $product->{'Project URL'} = $request->project_url;
          
          $product->{'Status'} = $request->status;
        try {
         $product->save();
     } catch (\Exception $e) {
    dd('Save failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Project Updated');
  }
  public function destroy($id)
  {
    $product=Product::where('id',$id)->first();
    $product->delete();
    return back()->with('success', 'Project Deleted');
  }
  
 }
