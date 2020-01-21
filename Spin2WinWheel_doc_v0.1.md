# You can view this document online [here](https://gist.github.com/chrisgannon/1afba5c07faeb9947a2e84d987200e3e)

## Documentation for Spin2Win Wheel by Chris Gannon
### Built using Scalable Vector Graphics Spin2Win Wheel is a responsive, flexible, customisable, resolution independent spin wheel game whose outcomes you control.

Spin results, prizes, win/lose, number of spins and more can be controlled using JSON data. You can also customise the look and feel of Spin2Win Wheel to bring it in line with your brand or color scheme and it even has an anti-cheat mechanism to prevent players placing the wheel on a chosen segment.
 
### Features

- Spin destinations can be set to ensure a specific outcome
- Supports infinite random spins
- Smooth intuitive spin/throw physics
- Anti-cheat mechanism
- Customizable colors with unique or alternating pattern
- Customizable size, position and style of the graphics
- Responsive and scalable
- Customizable number of wheel segments
- Use text or images (or both!) as the prize on each segment
- Supports animated GIFs as segment prize
- Touch and mouse input
- Supports desktop and mobile
- Resolution independent SVG graphics means it Spin2Win Wheel looks beautiful on high density displays
- Supports tick sound on/off while spinning
- Supports shadows to add depth
- Info popups can be styled via CSS
- Supports emojis

# API

### Events

`Spin2WinWheel.onResult()` - Returns Object. This can be set on the instance or passed in the init object. Returns the following:

- `target` - Spin2WinWheel - instance of the wheel
- `spinCount `- Integer - the current spin count for that result
- `msg `- String - the result text (this is `resultText` in the JSON)
- `type` - String - will return _'result'_
- `win` - Boolean - will return true or false (based on the `resultText` in the JSON)
- `gameId` - String - the gameId (this is set in the JSON)

`Spin2WinWheel.onError()` - Returns Object. This can be set on the instance or passed in the init object. Returns the following:

- `target` - Spin2WinWheel - instance of the wheel
- `spinCount `- Integer - the current spin count for that error. Remember this is zero-based.
- `msg `- String - the error text (this is `invalidSpinText` in the JSON)
- `type` - String - will return _'error'_
- `win` - String - will return _'null'_
- `gameId` - String - the gameId (this is set in the JSON)

`Spin2WinWheel.onGameEnd()` - Returns Object containing the target (instance of Spin2WinWheel), `gameId `and an array of result objects (object will be either result or error objects as above). This can be set on the instance or passed in the init object.  Returns the following:

- `target` - Spin2WinWheel - instance of the wheel
- `results` - Object - an array of result objects. 
- `gameId` - String - the gameId (this is set in the JSON)

### Calls

`Spin2WinWheel.init(vars:Object)` - Function - initialises the wheel instance. See example under Usage. Accepts the following:

- `onResult` - pass in your own Result function. Called after every spin.
- `onGameEnd` - pass in your own Game End function. Called at the end of the game (unless there is no limit on number of spins).
- `onError` - pass in your own Error function.
- `spinTrigger` - pass in your own HTML button or trigger element to trigger the spin. The variable `clickToSpin` must be true in the JSON.

`Spin2WinWheel.restart()` - Function - call this to reset the wheel based on the current JSON data

`Spin2WinWheel.getGameProgress()` - Returns array of result objects - call this to view the results of the current game during play.

# JSON Properties

`colorArray` - The colors used for each segment. You can set as many or as few as you like. If there are fewer colors than entries in the `segmentValuesArray` then the colors will alternate. This is a useful feature if you wish to style the wheel with your brand palette. For example, if your brand has red, yellow and orange then just include those colors and Spin2Win Wheel will alternate them no matter how many segments there are. To alternate between two colors just include two.

`segmentValuesArray` - an array of objects containing the following:

- `type` - String - the type of value on the segment - can be 'image' or 'string'. You have the flexibility to use text or an image (SVG, PNG, JPG, GIF) - you can even use an animated GIF. Its dimensions are determined by `wheelImageSize`. If the image you use is not square and the `wheelImageSize` is, say, 54, the image will be scaled maintaining its aspect ratio to a width of 54px
- `value` - String -  can be an image URL (SVG image is recommended for resolution independence) or a value like '$450' or 'Holiday'.
- `win` - Boolean - describes whether this segment is a winner or loser. Useful for both frontend display and backend DB 
- `resultText` - String - the text displayed when the wheel lands on the segment 

`svgWidth` - Integer (px) - SVG viewBox width

`svgHeight` - Integer (px) - SVG viewBox height

`wheelStrokeColor` - String - HEX, RGB or RGBA value for the wheel's main outline color

`wheelStrokeWidth` - Integer (px) - wdith of the wheel outline 

`wheelSize` - Integer (px) for the diameter of the wheel

`wheelTextOffsetY` - Integer (px) - how far in the segment text should be

`wheelTextSize`  - Value (em, px, integer) for the font size (if you're using text for the segment label)

`wheelImageOffsetY` - Integer (px) - how far in the segment image should be

`wheelImageSize` - Integer (px) - the width of the segment image. Images will be constrained by their aspect ratio

`centerCircleSize` - Integer (px) - the diameter of the central circle 

`centerCircleStrokeColor` - Integer (px) - central circle stroke color

`centerCircleStrokeWidth` - Integer (px) - central circle stroke width

`centerCircleFillColor` - Integer (px) - central circle fill color

`segmentStrokeColor` - String - HEX, RGB or RGBA value for the segment's outline

`segmentStrokeWidth` - Integer (px) - width of the segment outline

`centerX` - Integer (px) - this is usually half the `svgWidth` value

`centerY` - Integer (px) - this is usually half the `svgHeight` value

`hasShadows` - Boolean - applies a shadow to the main and outer wheel and also the segment values (text or image). Using shadows can degrade performance on some mobile devices so a test is advisable.

`numSpins` - Integer - can be any number of random spins - use -1 for infinite spins. This value is ignored if `spinDestinationArray` contains values

`spinDestinationArray` - Array - set which segments each spin will land on. The number of entries will be the number of spins allowed. If this is not defined then `numSpins` is used as the number of allowed spins. Disallowed destination numbers are 0 and any number greater than the length of `segmentValuesArray`.

`minSpinDuration` - Integer - although this sets the minimum amount of time the wheel will spin for it is a guide based on the velocity of the spin. This value is ignored if `spinDestinationArray` contains values (due to the maths required to ensure the wheel lands on the destination segment).

`gameOverText` - String - displayed when the game is over

`invalidSpinText` - String - displayed if the user didn't spin correctly (or tried to cheat by placing the wheel on a segment)

`introText` - String - text show at the start of a game

`hasSound` - Boolean - if false no tick/peg sound will play while the wheel is spinning.

`gameId` - String - an identifier for the game instance.

`clickToSpin` - Boolean - if true clicking the wheel will perform the spin unless you pass in your own button in the `init` object. If this is set to false but you have passed in your own button reference then this will ignored and assumed to be true.


### Notes

For the segment label you have the flexibility to use text or image (SVG, PNG, JPG, GIF you can even use an animated GIF). Its size is determined by `wheelImageSize`. If the image you use is not square and the `wheelImageSize` is, say, 54, the image will be scaled maintaining its aspect ratio to a width of 54px;

The default values in the JSON mean the wheel is already at an optimum size to fit most devices and screen sizes. If you do need to change them, you will need to experiment with the various size settings for the images, wheel and text.

The size and color of the text on a wheel segment is set in the JSON but can be overridden in the CSS (class is `.wheelText`). The font for the wheel text can also be edited via CSS.

The information popup and accompanying text (`toast` popup and p tag) can be styled in the CSS directly (font family, size, color etc). I purposely separated these from the wheel data because they are HTML elements and the wheel elements are pure SVG.

You can edit the peg graphic by locating the path with id `peg` in the HTML (inside the SVG tag) and changing its `fill` property.

`spinCount` is zero-based which means the first spin is spin=0 and the fifth spin is spinCount=4. This is important when viewing your game results using `Spin2WinWheel.onResult()` or if you want to check on game progress during play (via `Spin2WinWheel.getGameProgress()`

## JavaScript Libraries

Spin2Win Wheel is powered the GreenSock Animation Platform (GSAP). The following libraries are used:

- TweenMax ([CDN](https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js))
- Draggable ([CDN](https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/utils/Draggable.min.js))
- ThrowPropsPlugin (Local version only /js/ThrowPropsPlugin.min.js)
- TextPlugin ([CDN](http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/TextPlugin.min.js))

## Fonts

Currently Spin2Win Wheel loads Fjalla One from Google Fonts and this is applied in the CSS.

`<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>`

## Usage

```javascript
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
    //var mySpinBtn = document.querySelector('.spinBtn');
    //create a new instance of Spin2Win Wheel and pass in the vars object
    var myWheel = new Spin2WinWheel();
    
    //WITH your own button
    //myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError, spinTrigger:mySpinBtn});
    
    //WITHOUT your own button
    myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError});
  });
}


//And finally call it
init();

```

## Installation

- Extract the ZIP to a folder _on a web server_. This folder will be your root. If you do not run this on a web server the JSON will not load and the Spin2Win Wheel will not work.
- Ensure your JSON is sitting in the same domain - loading across domains is not allowed due to browser security.
- Ensure the SVG tag is in the HTML page.
