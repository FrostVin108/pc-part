@extends('layout.main')

@section('list')
<h3>PC Spec Information</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Pc No</th>
                <th scope="col">Mobo</th>
                <th scope="col">Cpu</th>
                <th scope="col">ram</th>
                <th scope="col">gpu</th>
                <th scope="col">hdd</th>
                <th scope="col">ssd</th>
                <th scope="col">psu</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($pc as $key => $pc)
                
                <tr>
                    <td>Pc {{ $key +1 }}</td>
                    <td>{{ $pc->mobo }}</td>
                    <td>{{ $pc->cpu }}</td>
                    <td>{{ $pc->ram }}</td>
                    <td>{{ $pc->gpu }}</td>
                    <td>{{ $pc->hdd }}</td>
                    <td>{{ $pc->ssd }}</td>
                    <td>{{ $pc->psu }}</td>
                    <td style="height: 40px">
                        <form method="POST" class="action"  onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('pc.delete', $pc->id) }}">
                            {{-- <a href="{{ route('buyer.edit', $pc->id) }}" class="btn-edit">Edit</a> --}}
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-destroy">Delete</button>    
                        </form>
                    </td>
                </tr>
                
            </tbody>
            
            @empty
            <div class="alert alert-danger">
                Belum Ada Pc yang teregister.
            </div>
            @endforelse 
            
        </table>

<br>
<br>

<style>
    h3{
        /* border: solid 2px yellow; */
        margin-left: 10px;
    }
</style>
@endsection