<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;
use App\Models\Gpu;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class GpuController extends Controller
{
    public function index()
    {
        $gpus = Gpu::get(); 
        
        // dd($rams);

        return view('gpulist', compact('gpus'));
    }

    public function delete()
    {
        $id = request()->id;
        $gpus = Gpu::find($id);
        $gpus->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('gpucreate');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'gpu' => 'required',
        ]);

        Gpu::create([
            'gpu'         => $request->gpu,
        ]);

        return redirect()->route('ram.index');
    }

    public function edit(string $id):view
    {
        $gpus = Gpu::findOrFail($id);

        //render view with post
        return view('gpuedit', compact('gpus'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'gpu' => 'required',

        ]);

        //get post by ID
        $gpus = Gpu::findOrFail($id);

        $gpus->update([
            'gpu'         => $request->gpu,

        ]);
        //redirect to index
        return redirect()->route('gpu.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
