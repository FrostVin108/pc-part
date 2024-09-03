<?php

namespace App\Http\Controllers;

use  Illuminate\Contracts\View\View;
use App\Models\ramlist;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RamController extends Controller
{
    public function index()
    {
        $rams = ramlist::get(); 
        
        // dd($rams);

        return view('ramlist', compact('rams'));
    }

    public function delete()
    {
        
        try{
            $id = request()->id;
            $rams = ramlist::find($id);
            $rams->delete();
            return redirect()->back();
        }catch(\Throwable $th ){
            // dd($th);
            // Store the error message in the session
            \Session::flash('error', "Maaf Item Yang Anda Coba Hilangkan Sedang Terpakai Oleh Salah Satu Data Yang Ada");
            // Redirect back to the previous page
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('ramcreate');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'ram' => 'required',
        ]);

        ramlist::create([
            'ram'         => $request->ram,
        ]);

        return redirect()->route('ram.index');
    }

    public function edit(string $id):view
    {
        $rams = ramlist::findOrFail($id);

        //render view with post
        return view('ramedit', compact('rams'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'ram' => 'required',
        ]);

        //get post by ID
        $rams = ramlist::findOrFail($id);

        $rams->update([
            'ram'         => $request->ram,

        ]);
         //redirect to index
         return redirect()->route('ram.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

}
