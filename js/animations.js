"use strict";
 
setInterval(newsImg, 2500);
var src=["style/images/orbital.jpg", "style/images/aeroplane.jpg", "style/images/plate.jpg"];
var i=0;

function newsImg() {
	document.getElementById("first-img").src = src[i];
	if(i==2)
		i=0;
	else
		i+=1;
}

function playPause() { 
	var myVideo = document.getElementById("video");
	var myButton = document.getElementById("play_butt_img");
	if (myVideo.paused){ 
		myVideo.play(); 
		myButton.style.visibility="hidden";
	}
	else {
		myVideo.pause(); 
		myButton.style.visibility="visible";
	}
};
