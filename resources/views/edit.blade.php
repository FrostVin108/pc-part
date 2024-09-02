@extends('layout.main')

@section('edit')

<form method="POST" action="{{ route('pc.update', $sparepart->id) }}">
    @csrf
    @method('put')
           
    <div class="form-group">
        <label for="exampleInputEmail">Masukan Nama Mobo</label><br>
        <input class="form-control" type="text" placeholder="Nama Mobo" name="mobo" value="{{ old('mobo', $sparepart->mobo) }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Nama Cpu</label><br>
        <input class="form-control" type="text" placeholder="Masukkan Cpu" name="cpu" value="{{ old('cpu', $sparepart->cpu) }}">
    </div>

    {{-- <div class="form-group">
        <label for="exampleInputEmail">Masukkan banyak Ram </label><br>
        <select name="ram_id" class="form-control">
            <option value="{{ old('ram', $sparepart->ram) }}" selected>{{$sparepart->ram}}</option> 
            @foreach ($rams as $ram )
                <option value="{{$ram->ram}}">{{$ram->ram}}</option> 
            @endforeach
        </select>
    </div> --}}
    
    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Nama gpu</label><br>
        <select name="gpu_id" class="form-control">
            <option value="{{ old('gpu_id', $sparepart->gpu_id) }}" selected>{{$sparepart->gpu->gpu}}</option> 
            @foreach ($gpus as $gpu )
                <option value="{{$gpu->id}}">{{$gpu->gpu}}</option> 
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Berapa Besar Storage HDD</label><br>
        <input class="form-control" type="text" placeholder="Masukkan HDD" name="hdd" value="{{ old('hdd', $sparepart->hdd) }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Berapa Besar Storage SSD</label><br>
        <input class="form-control" type="text" placeholder="Masukkan Ssd" name="ssd" value="{{ old('ssd', $sparepart->ssd) }}">
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail">Besar Wat PSU</label><br>
        <input class="form-control" type="text" placeholder="Masukkan Psu" name="psu" value="{{ old('psu', $sparepart->psu) }}">
    </div>


        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a class="btn btn-warning" href="{{ route('pc.index')}}">Return</a>
        </div>  
</form> 

@endsection