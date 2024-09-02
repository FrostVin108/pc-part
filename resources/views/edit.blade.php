@extends('layout.main')

@section('edit')

<form method="POST" action="{{ route('pc.update', $sparepart->id) }}">
    @csrf
    @method('put')
           
    <div class="form-group">
        <label for="exampleInputEmail">Masukan Nama Mobo</label><br>
        <input class="form-control @error('mobo') is-invalid @enderror" type="text" placeholder="Nama Mobo" name="mobo" value="{{ old('mobo', $sparepart->mobo) }}">
    </div>
    @error('mobo')
    <div class="alert alert-danger mt-2">
        Invalid, Input tidak terisi!
    </div>
    @enderror

    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Nama Cpu</label><br>
        <input class="form-control @error('cpu') is-invalid @enderror" type="text" placeholder="Masukkan Cpu" name="cpu" value="{{ old('cpu', $sparepart->cpu) }}">
    </div>
    @error('cpu')
    <div class="alert alert-danger mt-2">
        Invalid, Input tidak terisi!
    </div>
    @enderror

    <div class="form-group">
        <label for="exampleInputEmail">Masukkan banyak Ram </label><br>
        <select name="ram_id" class="form-control @error('ram_id') is-invalid @enderror">

            <option value="{{ old('ram_id', $sparepart->ram_id) }}" selected>{{$sparepart->ram->ram}}</option> 
            @foreach ($rams as $ram )
                <option value="{{$ram->id}}">{{$ram->ram}}</option> 
            @endforeach
        </select>
    </div>
    @error('ram_id')
    <div class="alert alert-danger mt-2">
        Invalid, Input tidak terisi!
    </div>
    @enderror
    
    
    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Nama gpu</label><br>
        <select name="gpu_id" class="form-control @error('gpu_id') is-invalid @enderror">
            <option value="{{ old('gpu_id', $sparepart->gpu_id) }}" selected>{{$sparepart->gpu->gpu}}</option> 
            @foreach ($gpus as $gpu )
                <option value="{{$gpu->id}}">{{$gpu->gpu}}</option> 
            @endforeach
        </select>
    </div>
    @error('gpu_id')
    <div class="alert alert-danger mt-2">
        Invalid, Input tidak terisi!
    </div>
    @enderror
    
    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Berapa Besar Storage HDD</label><br>
        <input class="form-control " type="text" placeholder="Masukkan HDD" name="hdd" value="{{ old('hdd', $sparepart->hdd) }}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail">Masukkan Berapa Besar Storage SSD</label><br>
        <input class="form-control " type="text" placeholder="Masukkan Ssd" name="ssd" value="{{ old('ssd', $sparepart->ssd) }}">
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail">Besar Wat PSU</label><br>
        <input class="form-control @error('psu') is-invalid @enderror" type="text" placeholder="Masukkan Psu" name="psu" value="{{ old('psu', $sparepart->psu) }}">
    </div>
    @error('psu')
    <div class="alert alert-danger mt-2">
        Invalid, Input tidak terisi!
    </div>
    @enderror


        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a class="btn btn-warning" href="{{ route('pc.index')}}">Return</a>
        </div>  
</form> 

@endsection