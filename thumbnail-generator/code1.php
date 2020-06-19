<!DOCTYPE html>
<html>
<head>
	<title>Thumbnails</title>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<style type="text/css">
		video{
			width: 100%;
			max-width: 400px;
			height: auto;
			margin: 0 auto;
			margin-top: 30px;
		}
		#output{
			width: 100%;
			max-width: 400px;
			height: auto;
			margin: 0 auto;
		}
		.capture{


		margin-top: 40px;
    background-color: dodgerblue;
    border: none;
    border-radius: 5px;
    color: #fff;
    padding: 10px 12px;
    text-transform: uppercase;
    display: inline-block;
    	}
    	.main-container{
    		border: solid 1px #ccc; 
    		padding: 10px; 
    		text-align: center;
    	}
    	input#videourl {
    padding: 5px 10px;
    width: 300px;
    border-radius: 4px;
    border: 1px solid #d6d3d3;
    font-size: 12px;
}

	</style>
</head>
<body>
<div class="main-container">
	<form name="form" action="" method="post">
	<input type="text" name="video" id="videourl" class="videoinput">
	<button type="button" name="ok" id="geturl" class="capture">Submit Video</button>
	
</form>
    <video id="video" width="320" controls="true" autoplay>
        <source src="" id="videosource"><!-- FireFox 3.5 -->
        
    </video><br/>
    <button onclick="shoot()" class="capture">Create Thumbnail</button><br/>
    <div id="output" style="display: inline-block; top: 4px; position: relative ;border: dotted 1px #ccc; padding: 2px;"></div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$videocontainer = video;

	$('#geturl').click(function(){
		$url = $("#videourl").val();
		$videocontainer.src = $url;
		
		$a = $videocontainer.src;
		
		$a.load();
		$a.play();


	});
	});
</script>

<script type="text/javascript">
	var videoId = 'video';
var scaleFactor = 0.50;
var snapshots = [];

/**
 * Captures a image frame from the provided video element.
 *
 * @param {Video} video HTML5 video element from where the image frame will be captured.
 * @param {Number} scaleFactor Factor to scale the canvas element that will be return. This is an optional parameter.
 *
 * @return {Canvas}
 */
function capture(video, scaleFactor) {
	if(scaleFactor == null){
		scaleFactor = 1;
	}
	var w = video.videoWidth * scaleFactor;
	var h = video.videoHeight * scaleFactor;
	var canvas = document.createElement('canvas');
		canvas.width  = w;
	    canvas.height = h;
	var ctx = canvas.getContext('2d');
		ctx.drawImage(video, 0, 0, w, h);
    return canvas;
} 

/**
 * Invokes the <code>capture</code> function and attaches the canvas element to the DOM.
 */
function shoot(){
	var i;
	var video  = document.getElementById(videoId);
	var output = document.getElementById('output');
	var canvas = capture(video, scaleFactor);
		canvas.onclick = function(){
			window.open(this.toDataURL());
		};
	snapshots.unshift(canvas);
	output.innerHTML = '';
	for(i=0; i<100; i++){
		output.appendChild(snapshots[i]);
	
	}
	// if(output.appendChild(snapshots[i]) >= 2){
	// alert("Screenshot capture Limit Reached.");
	// }

}
</script>
</html>

