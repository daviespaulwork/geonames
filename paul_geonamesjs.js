$(document).ready(function (){

  $("#button").click(function(){


    var inputText = document.getElementById("inputText").value;

    var cleanText = inputText.replace(/\s+/g,"");

    $.ajax({
      type: "GET",
      url: 'paul_geonames.php',
      data: {'q' : cleanText},
      dataType: "json",
      success: function(response){
        displayResult(response);

      } 

    });
    
  
  })

  function displayResult(response){

    for(x in response.postalCodes[0]){
      document.getElementById("results").appendChild(document.createElement("p")).innerHTML = response.postalCodes[0][x];
  
    }

  }

  })
  
  