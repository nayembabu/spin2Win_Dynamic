//Usage

//load your JSON (you could jQuery if you prefer)
function loadJSON(callback) {

  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './wheel_data.json', true); 
  xobj.onreadystatechange = function() {
    if (xobj.readyState == 4 && xobj.status == "200") {
      //Call the anonymous function (callback) passing in the response
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}

//your own function to capture the spin results
function myResult(e) {
  //e is the result object
    console.log('Spin Count: ' + e.spinCount + ' - ' + 'Win: ' + e.win + ' - ' + 'Message: ' +  e.msg);
  if(e.spinCount == 3){
    //show the game progress when the spinCount is 3
    console.log(e.target.getGameProgress());
    //restart it if you like
    //e.target.restart();
  }  

}

//your own function to capture any errors
function myError(e) {
  //e is error object
  console.log('Spin Count: ' + e.spinCount + ' - ' + 'Message: ' +  e.msg);

}

function myGameEnd(e) {
  //e is gameResultsArray
  console.log(e);
}

function init() {
  loadJSON(function(response) {
    // Parse JSON string to an object
    var jsonData = JSON.parse(response);
    //if you want to spin it using your own button, then create a reference and pass it in as spinTrigger
    
    // var mySpinBtn = document.querySelector('.spinBtn');
    
    var mySpinBtn = document.querySelector('.search_btn_byid');
    
    //create a new instance of Spin2Win Wheel and pass in the vars object
    var myWheel = new Spin2WinWheel();
    
    //WITH your own button
    myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError,spinTrigger:mySpinBtn});
    
    //WITHOUT your own button
    // myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError});


    // document.getElementById('spinBtn').addEventListener('click', fn1);
    // function fn1 (){
    //   var inputBox = document.getElementById('myInputBox').value;
    //   // console.log(inputBox);
    //   if(inputBox == '') {
    //     alert('Work');
    //   }else {
    //     // myWheel.init({spinTrigger:mySpinBtn});
    //   }
    // }
    


    






  });
}



//And finally call it
init();









