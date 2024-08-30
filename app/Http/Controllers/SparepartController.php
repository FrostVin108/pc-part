<?php

namespace App\Http\Controllers;

use App\Models\sparepart;
use App\Models\ramlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SparepartController extends Controller
{
    public function index()
    {
        $sparepart= sparepart::get(); 
        $rams = ramlist::get();
        
        // dd($buyer);

        return view('list', compact('sparepart', 'rams'));
    }

    public function delete()
    {
        $id = request()->id;
        $sparepart = sparepart::find($id);
        $sparepart->delete();
        return redirect()->back();
    }

    public function create():view
    {
        $rams = ramlist::get();
        return view('create', compact('rams'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'mobo' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'gpu' => 'required',
            'hdd' => 'required_without:ssd',
            'ssd' => 'required_without:hdd',
            'psu' => 'required',

        ]);

        sparepart::create([
            'mobo'         => $request->mobo,
            'cpu'          => $request->cpu,
            'ram'          => $request->ram,
            'gpu'          => $request->gpu,
            'hdd'          => $request->hdd,
            'ssd'          => $request->ssd,
            'psu'          => $request->psu,
        ]);
        return redirect()->route('pc.index');
    }

    public function edit(string $id):view
    {
        $sparepart = sparepart::findOrFail($id);

        $rams = ramlist::get();
        // where('id', $sparepart->ram )->firstOrFail();
        
        //render view with post
        return view('edit', compact('sparepart', 'rams'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'mobo' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'gpu' => 'required',
            'hdd' => 'required_without:ssd',
            'ssd' => 'required_without:hdd',
            'psu' => 'required',

        ]);

        //get post by ID
        $sparepart = sparepart::findOrFail($id);

        $sparepart->update([
            'mobo'         => $request->mobo,
            'cpu'          => $request->cpu,
            'ram'          => $request->ram,
            'gpu'          => $request->gpu,
            'hdd'          => $request->hdd,
            'ssd'          => $request->ssd,
            'psu'          => $request->psu,
        ]);
         //redirect to index
         return redirect()->route('pc.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
