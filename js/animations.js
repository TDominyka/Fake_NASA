"use strict";
 

var slideIndex = 1;
newsImg();

function newsImg() {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.visibility = "hidden";
	}
	slideIndex++;
	if (slideIndex > slides.length) {slideIndex = 1}
	console.log(slideIndex);
	slides[slideIndex-1].style.visibility = "visible";
	setTimeout(newsImg, 30000); 
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
