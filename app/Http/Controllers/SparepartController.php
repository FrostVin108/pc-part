<?php

namespace App\Http\Controllers;

use App\Models\sparepart;
use App\Models\ramlist;
use App\Models\Gpu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SparepartController extends Controller
{
    public function index()
    {
        $sparepart= sparepart::get(); 
        // $rams = ramlist::get();
        // $gpus =  Gpu::get();

        foreach ($sparepart as $part) {
            $part->gpu = Gpu::where('id', $part->gpu_id)->first();
        }

        foreach ($sparepart as $part) {
            $part->rams = ramlist::where('id', $part->ram_id)->first();
        }
        
        // dd($gpus);

        return view('list', compact('sparepart'));
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
        $gpus =  Gpu::get();
        return view('create', compact('rams', 'gpus'));
    }

    public function store(Request $request): RedirectResponse
    {

        $messages = [
            'mobo' => ':attribute di isi dulu sebelum kirim',
            'cpu'    => ':attribute tidak ada isi',
        ];
        

        $request->validate([
            'mobo' => 'required',
            'cpu' => 'required',
            'ram_id' => 'required',
            'gpu_id' => 'required',
            'hdd' => 'required_without:ssd',
            'ssd' => 'required_without:hdd',
            'psu' => 'required',
        ], $messages);

        // if()

        sparepart::create([
            'mobo'         => $request->mobo,
            'cpu'          => $request->cpu,
            'ram_id'          => $request->ram_id,
            'gpu_id'          => $request->gpu_id,
            'hdd'          => $request->hdd,
            'ssd'          => $request->ssd,
            'psu'          => $request->psu,
            // dd($request)
        ]);
        return redirect()->route('pc.index');
    }

    public function edit(string $id):view
    {
        $sparepart = sparepart::findOrFail($id);

        $gpus = Gpu::where('id', $sparepart->gpu_id )->firstOrFail();

        $gpus = Gpu::get(); 

        $rams = ramlist::where('id', $sparepart->ram_id )->firstOrFail();

        $rams = ramlist::get(); 
        // foreach ($sparepart as $part) {
        //     $part->rams = ramlist::where('id', $part->ram_id)->first();
        // }
        //render view with post
        return view('edit', compact('sparepart', 'gpus', 'rams'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'mobo' => 'required',
            'cpu' => 'required',
            'ram_id' => 'required',
            'gpu_id' => 'required',
            'hdd' => 'required_without:ssd',
            'ssd' => 'required_without:hdd',
            'psu' => 'required',

        ]);

        //get post by ID
        $sparepart = sparepart::findOrFail($id);

        $sparepart->update([
            'mobo'         => $request->mobo,
            'cpu'          => $request->cpu,
            'ram_id'          => $request->ram_id,
            'gpu_id'          => $request->gpu_id,
            'hdd'          => $request->hdd,
            'ssd'          => $request->ssd,
            'psu'          => $request->psu,
        ]);
         //redirect to index
         return redirect()->route('pc.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
