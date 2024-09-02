<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg " >
      <div class="container-fluid" >
        
        <a class="navbar-brand" aria-disabled="true" style=" color: white;"> Pc List</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('pc.index')}}" style=" color: white;">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('ram.index')}}" style=" color: white;">Ram</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('gpu.index')}}" style=" color: white;">Gpu</a>
            </li>
             
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" disabled>
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

  	<div id="app">
  		<div class="card" >
	  		<div class="card-body" style="margin: 5px 60px">
	  			@yield('list')
          @yield('create')
          @yield('edit')

          @yield('ramlist')
          @yield('ramcreate')
          @yield('ramedit')

          @yield('gpulist')
          @yield('gpucreate')
          @yield('gpuedit')
	  		</div>
			</div>
		</div>
  </body>
  <style>
    .card{
      margin: 30px;
      margin-top: 70px;
    }

    .navbar{
      position: fixed;
      z-index: 5;
      top: 0; 
      width: 100vw; 
      background-color: #9cc3c9;
     
      border-radius:0px 0px 10px 10px;
    }
  </style>
</html>