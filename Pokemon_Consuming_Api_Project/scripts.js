// Starta Angular
var app = angular.module('myApp', []);
app.controller('pokedexCtrl', function($scope, $http){
// Pega o pokemon
$http({
  method: 'GET',
  url: 'https://pokeapi.co/api/v2/pokemon'
}).then(function successCallback(data) {
  $scope.characters = data.data;
  console.log($scope.characters);
}, function errorCallback(response) {});
});

jQuery(window).load(function () {
  $(".loader").delay(3000).fadeOut("slow"); 
  $("#TudoDaPagina").toggle("fast");
});

function preencheTabela(){
  $('#cadastroPokemon').html("Carregando as pokebolas no Servidor, espere por favor :)");
  var id = $( "#pokelist option:selected" ).val();
//Capturar Dados Usando Método AJAX do jQuery

$.ajax({
  url: id
}).then(function(data) {
  $('#cadastroPokemon').html(
  "<label>Peso : </label><input type='text'  value ='"+data.weight+"' class='form-control' id='weight' name='weight'><br><label>Altura : </label><input type='text' value ='"+data.height+"' class='form-control' id='height' name='altura'> <br> <label>Experiência base:</label><input type='text' value ='"+data.base_experience+"' class='form-control' id='base_experience' name='base_experience'> <br>  <input type='submit' id='addPoke' onclick ='addPoke()' value = 'Adicionar' class = 'form-control'>"	   
);
});


}
  $("#btnCriarTime").click(function(){
  $("#time").toggle();
});

function addPoke(){
  var fireHeading            = document.getElementById('fireHeading');     
  var team                   = document.getElementById('team');
  //Tratamento de erro para o caso de mais 6 times
  if(team.value.length <= 0 ){
    alert("Digite um nome para o time, por favor ")
  }  
  else{
    var name                   =  $('#pokelist option:selected').text();
    var name                    = name.replace(/ /g, "");  
    var base_experience        = document.getElementById('base_experience');  
    var weight                 = document.getElementById('weight');  
    var height                 = document.getElementById('height');  
    var firebaseRef = firebase.database().ref();
    var newItem ={
      pokemon:name,
      team:team.value,
      base_experience : base_experience.value,
      weight          : weight.value,
      height          : height.value,
      MainSkill       : 0
    };

    firebaseRef.child('team').push().set(newItem);

    var dbRef = firebase.database();
    var teamRef = dbRef.ref('team');

    teamRef.on("child_added", function(snap) {
      $('#table_body').append(teamHtml(snap.val()));
    });

    alert("Salvo no Banco!");
  }
}

