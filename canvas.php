<!DOCTYPE HTML>
<html>
    <head>
        <title>Example</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <style>
.gradientBoxesWithOuterShadows { 
width:600px;
height:570px;
padding: 50px;
float: left;
background-color: white; 

/* outer shadows  (note the rgba is red, green, blue, alpha) */
-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

/* rounded corners */
-webkit-border-radius: 12px;
-moz-border-radius: 7px; 
border-radius: 7px;

/* gradients */
background: -webkit-gradient(linear, left top, left bottom, 
color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
}
        </style>
    </head>
    <body>
        <div class="gradientBoxesWithOuterShadows">
            <p>We'll use a circular clipping path to restrict the drawing of a set of random stars to a particular region. There are two button. One is used to redraw a set of randow stars and the other is userd to add a set of randows stars.</p>
            <canvas id="canvas" width="300" height="300"></canvas>
            <button type="button" class="btn btn-primary" onclick="addMore()">Add More</button>
            <button type="button" class="btn btn-success" onclick="redraw()">reDraw</button>
        </div>
        <div class="gradientBoxesWithOuterShadows">
            <p>Demonstrate the implementation of the draw text, scale, rotate, and translate methods in canvas.</p>
            <canvas id="canvas1" width="400" height="200"></canvas>
       </div>
        <script>
            
         function draw() {
  var ctx = document.getElementById('canvas').getContext('2d');
  ctx.fillRect(0,0,300,300);
  ctx.translate(150,150);

  // Create a circular clipping path
  ctx.beginPath();
  ctx.arc(0,0,120,0,Math.PI*2,true);
  ctx.clip();

  // draw background
  var lingrad = ctx.createLinearGradient(0,-150,0,150);
  lingrad.addColorStop(0, '#232256');
  lingrad.addColorStop(1, '#143778');
  
  ctx.fillStyle = lingrad;
  ctx.fillRect(-150,-150,300,300);

  // draw stars
  for (var j=1;j<50;j++){
    ctx.save();
    ctx.fillStyle = '#fff';
    ctx.translate(150-Math.floor(Math.random()*300),
                  150-Math.floor(Math.random()*300));
    drawStar(ctx,Math.floor(Math.random()*4)+2);
    ctx.restore();
  }
  
}

function drawStar(ctx,r){
  ctx.save();
  ctx.beginPath();
  ctx.moveTo(r,0);
  for (var i=0;i<9;i++){
    ctx.rotate(Math.PI/5);
    if(i%2 === 0) {
      ctx.lineTo((r/0.525731)*0.200811,0);
    } else {
      ctx.lineTo(r,0);
    }
  }
  ctx.closePath();
  ctx.fill();
  ctx.restore();
}
draw();

function redraw(){
    var ctx = document.getElementById('canvas').getContext('2d');
    var lingrad = ctx.createLinearGradient(0,-150,0,150);
  lingrad.addColorStop(0, '#232256');
  lingrad.addColorStop(1, '#143778');
  
  ctx.fillStyle = lingrad;
  ctx.fillRect(-150,-150,300,300);

  // draw stars
  for (var j=1;j<50;j++){
    ctx.save();
    ctx.fillStyle = '#fff';
    ctx.translate(150-Math.floor(Math.random()*300),
                  150-Math.floor(Math.random()*300));
    drawStar(ctx,Math.floor(Math.random()*4)+2);
    ctx.restore();
  }
}


function addMore(){
    var ctx = document.getElementById('canvas').getContext('2d');
    for (var j=1;j<50;j++){
    ctx.save();
    ctx.fillStyle = '#fff';
    ctx.translate(150-Math.floor(Math.random()*300),
                  150-Math.floor(Math.random()*300));
    drawStar(ctx,Math.floor(Math.random()*4)+2);
    ctx.restore();
  }
}
 
  var ctx = document.getElementById("canvas1").getContext("2d");
                         
            ctx.fillStyle = "lightgrey";
            ctx.strokeStyle = "black";
            ctx.lineWidth = 3;

            ctx.clearRect(0, 0, 300, 120);
            ctx.globalAlpha = 1.0;
            ctx.font = "100px sans-serif";
            ctx.fillText("Hello", 10, 100);
            ctx.strokeText("Hello", 10, 100);       
                            
            ctx.scale(1.3, 1.3);
            ctx.translate(100, -50);
            ctx.rotate(0.5);                            
                            
            ctx.fillStyle = "red";
            ctx.globalAlpha = 0.5;
            ctx.fillRect(100, 10, 150, 100);
            
            ctx.strokeRect(0, 0, 300, 200);
        </script>
    </body>
</html>
