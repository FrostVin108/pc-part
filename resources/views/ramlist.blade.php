@extends('layout.main')

@section('ramlist')
<a href="ramcreate" class="btn btn-success">Create</a>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">ram</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($rams as $key => $ram)
        
        <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ $ram->ram }}</td>

            <td style="height: 40px">
                <form method="POST" class="action"  onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('ram.delete', $ram->id) }}">
                    <a href="{{ route('ram.edit', $ram->id) }}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>    
                </form>
            </td>
        </tr>
        
    </tbody>
    
    @empty
    <div class="alert alert-danger">
       Tidak Ada Ram Terisi.
    </div>
    @endforelse 
    
</table>
@endsection