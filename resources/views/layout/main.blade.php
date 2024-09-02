<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  	<div id="app">
  		<div class="card" style="margin: 30px">
	  		<div class="card-body" >
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
</html>