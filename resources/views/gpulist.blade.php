@extends('layout.main')

@section('gpulist')
<a href="gpucreate" class="btn btn-success">Create</a>
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Gpu</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($gpus as $key => $gpu)
        
        <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ $gpu->gpu }}</td>

            <td style="height: 40px">
                <form method="POST" class="action"  onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('gpu.delete', $gpu->id) }}">
                    <a href="{{ route('gpu.edit', $gpu->id) }}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>    
                </form>
            </td>
        </tr>
        
    </tbody>
    
    @empty
    <div class="alert alert-danger">
       Tidak Ada gpu Terisi.
    </div>
    @endforelse 
    
</table>
@endsection