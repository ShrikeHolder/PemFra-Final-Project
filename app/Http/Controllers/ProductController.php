<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class productController extends Controller
{
    public function index()
    {
        $pageTitle = 'product List';
        // ELOQUENT
        $products = Product::all();
        return view('home', [
            'pageTitle' => $pageTitle,
            'products' => $products
        ]);
    }

    public function create()
    {
        $pageTitle = 'Create product';
        // ELOQUENT
        $categories = Category::all();
        return view('product.create', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Get File
        $file = $request->file('cv');
        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            // Store File
            $file->store('public/files');
        }
        // ELOQUENT
        $product = new Product;
        $product->firstname = $request->firstName;
        $product->lastname = $request->lastName;
        $product->email = $request->email;
        $product->age = $request->age;
        $product->category_id = $request->category;
        if ($file != null) {
            $product->original_filename = $originalFilename;
            $product->encrypted_filename = $encryptedFilename;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function show(string $id)
    {
        $pageTitle = 'product Detail';
        // ELOQUENT
        $product = Product::find($id);
        return view('product.show', compact('pageTitle', 'product'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit product';
        // ELOQUENT
        $categories = Category::all();
        $product = Product::find($id);
        return view('product.edit', compact(
            'pageTitle',
            'categories',
            'product'
        ));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $product = product::find($id);
        $product->firstname = $request->firstName;
        $product->lastname = $request->lastName;
        $product->email = $request->email;
        $product->age = $request->age;
        $product->category_id = $request->category;
        // Handle file CV
        if ($request->has('delete_cv') && $product->encrypted_filename) {
            // Hapus file lama
            if (Storage::exists('public/files/' . $product->encrypted_filename)) {
                Storage::delete('public/files/' . $product->encrypted_filename);
            }
            // Reset informasi file di database
            $product->original_filename = null;
            $product->encrypted_filename = null;
        } elseif ($request->hasFile('cv') && $request->file('cv')->isValid()) {
            $file = $request->file('cv');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            // Hapus file lama jika ada
            if ($product->encrypted_filename && Storage::exists('public/files/' . $product->encrypted_filename)) {
                Storage::delete('public/files/' . $product->encrypted_filename);
            }
            // Simpan file baru
            $file->store('public/files');
            // Perbarui informasi file di database
            $product->original_filename = $originalFilename;
            $product->encrypted_filename = $encryptedFilename;
        }
        $product->save();
        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        // ELOQUENT
        product::find($id)->delete();
        return redirect()->route('home');
    }

    public function downloadFile($productId)
    {
        $product = product::find($productId);
        $encryptedFilename = 'public/files/' . $product->encrypted_filename;
        $downloadFilename = Str::lower($product->firstname . '_' . $product->lastname . '_cv.pdf');
        if (Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        }
    }
}
