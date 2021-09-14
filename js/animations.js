var myVideo = document.getElementById("video"); 

function playPause() { 
	console.log("paspaudziau");
  if (myVideo.paused) 
    myVideo.play(); 
  else 
    myVideo.pause(); 
}
