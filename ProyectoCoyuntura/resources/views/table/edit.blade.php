@extends('adminlte::layouts.app')


@section('main-content')
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="index.php">@foreach($nombreVariable as $nom)
{{$nom->Nombre}}
@endforeach</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation" class="dropdown-header">Añadir</li>
                <li><a role="menuitem" tabindex="-1"  href="/tables/{{$id}}/insertAmbito">Ámbito Geográfico</a></li>
                <li><a role="menuitem" tabindex="-1"  href="/tables/{{$id}}/insertYear">Año</a></li>
                <li><a role="menuitem" tabindex="-1"  href="/tables/{{$id}}/insertCategoria">Categoría</a></li>
                <li role="presentation" class="divider"></li>
                 <li role="presentation" class="dropdown-header">Borrar</li>
                <li><a role="menuitem" tabindex="-1"  href="/tables/{{$id}}/insertAmbito">Ámbito Geográfico</a></li>
                <li><a role="menuitem" tabindex="-1"  href="/tables/{{$id}}/insertYear">Año</a></li>
                <li><a role="menuitem" tabindex="-1"  href="/tables/{{$id}}/insertCategoria">Categoría</a></li>

                </u1>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    



 <form class="form-horizontal" role="form" method="POST" action="{{ url('confirm')}}/{{$id}}" >
    {{ csrf_field() }}
<table  class="table table-striped"  align="center" border="5">
 <thead >
      <tr>
        <th rowspan="2"></th>
        @foreach($years as $year)
        <th colspan="12" align="center" bgcolor= "#60B664" style="color:White;">{{ $year->Year}}</th>
        @endforeach
      </tr>

      <tr  bgcolor= "#01A556" style="color:White;">
        @foreach($years as $year)
        <th scope="col">Ene</th>
        <th scope="col">Feb</th>
        <th scope="col">Mar</th>
        <th scope="col">Abr</th>
        <th scope="col">May</th>
        <th scope="col">Jun</th>
        <th scope="col">Jul</th>
        <th scope="col">Ago</th>
        <th scope="col">Sep</th>
        <th scope="col">Oct</th>
        <th scope="col">Nov</th>
        <th scope="col">Dic</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
  		<div class="form-group">
  		<label for="update"></label>
    	<tr>
      @for ($l = 0; $l < count($ambitos); $l++)

        <tr>
          <th scope="row" bgcolor="#000000" style="color:White;" >{{$ambitos[$l]->Nombre }}
              <td colspan="{{12*count($years)}}" bgcolor="#000000" style="color:White;" ></td>
          </th>
        </tr>
        <tr>
      	@for ($i = 0, $aux = 0; $i < count($categoria); $i++)
          @if(!(empty($supercategorias[$aux][0])))
            @if($idsCategoria[$i][0]->idSuperCategoria == $supercategorias[$aux][0]->idSuperCategoria)
              <tr>
                <th scope="row" bgcolor="#FFFFFF" style="color:Black;" >{{$supercategorias[$aux][0]->Name }}
                  <?php
                    $aux++;
                    while ($supercategorias[$aux][0]->idSuperCategoria == $supercategorias[$aux-1][0]->idSuperCategoria) {
                      $aux++;
                    } 

                
                  ?>
                    <td colspan="{{12*count($years)}}" bgcolor="#FFFFFF" style="color:Black;" ></td>
                </th>
              </tr>
              
            @endif
          @endif
        <th scope="row">{{$categoria[$i]->Nombre}}</th> 

	        @for ($j = 0; $j < count($years); $j++)
	          @for ($k = 0; $k < 12; $k++)   
	            @if(empty($values[$l][($i * count($years))+$j][$k][0]->valor))
	            	<td ><input type="number" step="0.01" class="form-control input-sm" placeholder="-" name="update[]"></td>
	            @else
	            	<td ><input type="number" step="0.01" class="form-control input-sm" placeholder="{{$values[$l][($i * count($years))+$j][$k][0]->valor}}" name="update[]"></td>
	            @endif
	          @endfor
	        @endfor
      	</tr>  
      	@endfor
      @endfor
    </tbody>
</table>
<div>
    <a class= "btn btn-success" href="javascript:history.back(-1);" role="button">Volver</a>
    <input class="btn btn-success"  type="submit" value="Enviar" />
</div>
</form>
		
@endsection
