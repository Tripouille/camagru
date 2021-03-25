<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display Webcam Stream</title>
 
<style>
#container {
	margin: 0px auto;
	width: 500px;
	height: 375px;
	border: 10px #333 solid;
}
#videoElement, canvas {
	width: 500px;
	height: 375px;
	background-color: #666;
}

canvas {
	background-color: rgb(157, 122, 122);
}
</style>
</head>
 
<body>
<div id="container">
	<video autoplay="true" id="videoElement">
	
	</video>
	<button>Bouton</button>
	<canvas id="canvas"></canvas>
</div>
<script>
	var video = document.querySelector("#videoElement");
	var button = document.querySelector("button");
	var canvas = document.querySelector("canvas");
	var width = 200, height;


	if (navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({ video: true }).then(function (stream) {video.srcObject = stream;}).catch(function (err0r) {
				console.log("Something went wrong!");
			});
	}

	video.addEventListener('canplay', function(ev){
		console.log("Debug");
		height = (video.videoHeight / video.videoWidth) * width;
		video.setAttribute('width', width);
		video.setAttribute('height', height);
		canvas.setAttribute('width', width);
		canvas.setAttribute('height', height);
		streaming = true;
	}, false);

	function takepicture() {
		canvas.width = width;
		canvas.height = height;
		canvas.getContext('2d').drawImage(video, 0, 0, width, height);
	}

	button.addEventListener('click', function(ev) { takepicture(); ev.preventDefault();}, false);
</script>
</body>
</html>
