function buscar_datos(consulta){
	$.ajax({
		url: '?view=asistencia&mode=bus' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}
/*
$(document).ready(function() {
    function getRandValue(){
        value = $('#caja_busqueda').text();
        //var dataString = 'value='+value;
						console.log("emepzo");
        $.ajax({
            type: "POST",
            url: "?view=asistencia&mode=bus",
            //data: dataString,
            success: function(data) {
                $('#caja_busqueda').text(data);
								console.log(data);
            }
        });
    }
requestAnimationFrame(getRandValue);
    //setInterval(getRandValue, 3000);
});
*/
var video = document.createElement("video");
var canvasElement = __("canvas");
var canvas = canvasElement.getContext("2d");
var loadingMessage = __("loadingMessage");
var outputContainer = __("output");
var outputMessage = __("outputMessage");
var outputData = __("outputData");

function drawLine(begin, end, color) {
	canvas.beginPath();
	canvas.moveTo(begin.x, begin.y);
	canvas.lineTo(end.x, end.y);
	canvas.lineWidth = 4;
	canvas.strokeStyle = color;
	canvas.stroke();
}

// Use facingMode: environment to attemt to get the front camera on phones
navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
	video.srcObject = stream;
	video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
	video.play();
	requestAnimationFrame(tick);
});

function tick() {
	loadingMessage.innerText = "⌛ Loading video..."
	if (video.readyState === video.HAVE_ENOUGH_DATA) {
		loadingMessage.hidden = true;
		canvasElement.hidden = false;
		outputContainer.hidden = false;

		canvasElement.height = video.videoHeight;
		canvasElement.width = video.videoWidth;
		canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
		var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
		var code = jsQR(imageData.data, imageData.width, imageData.height, {
			inversionAttempts: "dontInvert",
		});
		if (code) {
			drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
			drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
			drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
			drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
			outputMessage.hidden = true;
			outputData.parentElement.hidden = false;
			outputData.innerText = code.data;
			
			var valor =code.data;
			if (valor != "") {
				buscar_datos(valor);
			}
		} else {
			outputMessage.hidden = false;
			outputData.parentElement.hidden = true;
		}
	}
	requestAnimationFrame(tick);
}

/*$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});*/
