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
        
        // dd($gpus);

        return view('gpulist', compact('gpus'));
    }

    public function delete()
    {
        try{
            $id = request()->id;
            $gpus = Gpu::find($id);
            $gpus->delete();
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

        return redirect()->route('gpu.index');
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
            'gpu' => 'required'
        ]);

        //get post by ID
        $gpus = Gpu::findOrFail($id);

        $gpus->update([
            'gpu'         => $request->gpu

        ]);
        //redirect to index
        return redirect()->route('gpu.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
