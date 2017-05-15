@extends('adminlte::layouts.app')


@section('main-content')
<h2><b>Tablas</b> Predefinidas</h1><hr>
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
    
    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirm')}}/{{$id}}" >
    {{ csrf_field() }}
  		<div class="form-group">
  		<label for="update"></label>
    	<tr>
      	@for ($i = 0; $i < count($categoria); $i++)
        <th scope="row">{{$categoria[$i]->Nombre}}</th> 
	        @for ($j = 0; $j < count($years); $j++)
	          @for ($k = 0; $k < 12; $k++)   
	            @if(empty($values[($i * count($years))+$j][$k][0]->Valor))
	            <td><input type="text" class="form-control input-sm" placeholder="-" name="update[]"></td>
	            @else
	            <td><input type="text" class="form-control input-sm" placeholder="{{$values[($i * count($years))+$j][$k][0]->Valor}}" name="update[]"></td>
	            @endif
	          @endfor
	        @endfor
      	</tr>  
      	@endfor
     	</div>
     	<div class="form-group">
         		<input class="btn btn-success" name="enviar" type="submit" value="Enviar" />
		</div>
	</form>
    </tbody>
</table>

		
@endsection