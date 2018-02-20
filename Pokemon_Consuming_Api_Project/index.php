  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script> 
  <script type = "text/javascript">
var app = angular.module('myApp', []);
  app.controller('pokedexCtrl', function($scope, $http){
    // get pokemon
      $http({
        method: 'GET',
        url: 'https://pokeapi.co/api/v2/pokemon'
  }).then(function successCallback(data) {
      $scope.characters = data.data;
    console.log($scope.characters);
  }, function errorCallback(response) {});
});
 </script>
 <!DOCTYPE html>
  <html lang="pt-br">
	   <head>
	   	  <meta charset="UTF-8">  
	      <title>PikaCHOOOOOOO</title>

	     
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

	      <style>
	      			body{
						background-color: #fff6ac;
	      			}
			      footer {
		    	position: fixed;
		    	left: 0;
		    	bottom: 0;
		    	width: 100%;
		    	background-color: #7b2929;
		    	color: whitesmoke;
		    	text-align: center;
		    	font-family: Lucida Console, Lucida Sans Typewriter, monaco, Bitstream Vera Sans Mono, monospace;
			}
				.loader {
			    position: fixed;
			    left: 0px;
			    top: 0px;
			    width: 100%;
			    height: 100%;
			    z-index: 9999;
			    background: url('https://m.popkey.co/61d1ca/AVEmw.gif') 50% 50% no-repeat white;
			}
			#TudoDaPagina{
				background-color:#7b2929;
				color:whitesmoke;
				border-style:groove;
				margin: 0 auto;
				width: 50%;
				margin-top: 20px;
				border-radius: 10px;	
				font-family: Lucida Console, Lucida Sans Typewriter, monaco, Bitstream Vera Sans Mono, monospace;		
			}
			@font-face {
			    font-family: 'Pokemon Hollow';
			    src: url('FontesLegais/Pokemon Hollow.ttf');
			    src: url('FontesLegais/Pokemon Hollow.ttf') format('embedded-opentype'),
			        url('FontesLegais/Pokemon Hollow.ttf') format('woff'),
			        url('FontesLegais/Pokemon Hollow.ttf') format('truetype'),
			        url('FontesLegais/Pokemon Hollow.ttf') format('svg');
			    font-weight: normal;
    			font-style: normal;
    			font-color:yellow;
}
    		.loader h1 {
    		 font-family: 'Pokemon Hollow';
    		}

	   		</style>
	   </head>
	   <body  ng-app="myApp">
	 
	   		<div class = "loader"> <h1> ESPERE POR FAVOR!</h1></div>
	   		<div id = "TudoDaPagina"  class="container" style="display: none;">
	   			<center><img src="Imagens/pokebola.png" width="64px;" height="64px;"></center>
	   		   <div class="row">
        			<div class="col-md-12">	
				   		<h1 color="red"> POKEMON MANAGEMENT</h1>
				   			<p> MENU </p>
				   		<input type="button"  class ="form-control" name="btnCriarTime" id ="btnCriarTime" value="CRIAR TIME">	
						<div id="time" style="display:none;">
							<br>
							<label>Pokemons: </label>
								<br>
							<div ng-controller="pokedexCtrl">
								<select id="pokelist" onclick="preencheTabela()" style="color:black;">
										<option  style="color:black;" ng-repeat="(key, val) in characters.results" value='{{val.url}}'><div> {{val.name}}</div></option>
								</select>

							</div>
							<div id="tabelaPokemon"> </div>
							<br>
						</div>
				   		<input type="button"  class ="form-control" name="" value="GERENCIAR TIME">
				   		<input type="button"  class ="form-control" name="" value="SOBRE">
				   		<br>
				    </div>
		       </div>
    	  </div>
    	   	<footer> 
    	   		<p>Criado por Samuel Joshua para fim de processo seletivo</p>
    	   	</footer>
	   </body>
  </html>
<script>

 jQuery(window).load(function () {
      $(".loader").delay(3000).fadeOut("slow"); 
    $("#TudoDaPagina").toggle("fast");
});

function preencheTabela(){
	var id = $( "#pokelist option:selected" ).val();
    //Capturar Dados Usando Método AJAX do jQuery
  $.ajax({
        url: id
    }).then(function(data) {
       $('#tabelaPokemon').html(
		"<label>Peso : </label><input type='text' value ='"+data.weight+"' class='form-control' id='peso' name='peso'><br><label>Altura : </label><input type='text' value ='"+data.height+"' class='form-control' id='altura' name='altura'> <br> <label>Experiência base:</label><input type='text' value ='"+data.base_experience+"' class='form-control' id='altura' name='altura'> <br>  <input type='submit' value = 'Adicionar' class = 'form-control'>"	   
	 
	 );
    });


}

$("#btnCriarTime").click(function(){
    $("#time").toggle();
});


</script>

