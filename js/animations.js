"use strict";
 
setInterval(newsImg, 1000);
var src=["https://www.nasa.gov/sites/default/files/thumbnails/image/orbital.jpg","media/nasa-logo.svg","media/share.svg"];
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
