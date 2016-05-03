
var imgInput = document.getElementById("img");
imgInput.addEventListener("change", getSize, false);


var widthBox 	= 	document.getElementById("widthBox");
var heightBox	=	document.getElementById("heightBox");
var width;
var height;
var file;

function getSize() {
	var file = imgInput.files[0];
    img = document.createElement("img");
	var reader = new FileReader();
    reader.onload = (function (aImg) {
		return function(e) {
			aImg.src = e.target.result;
			width = widthBox.value = aImg.width;
			height = heightBox.value = aImg.height;
		}
    })(img);
    reader.readAsDataURL(file);
}

var ifrate = document.getElementById("rate");
var wh = document.getElementsByTagName("input");

wh[1].addEventListener("input", rate, false);
wh[2].addEventListener("input", rate, false);
ifrate.addEventListener("change", rate, false);

console.log(wh);

function rate(){
	if(ifrate.checked){
		heightBox.value = (height*1.0)/(width*1.0)*(1.0*widthBox.value);
	}
}

