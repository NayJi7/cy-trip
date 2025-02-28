// Wait for the DOM content to be fully loaded
document.addEventListener("DOMContentLoaded", () => {

    // Select the background video element
    const bgvideo = document.querySelector("#bgvideo")
    // Select the play/pause button
    const playpausebtn = document.querySelector("#playpausebtn")

    // Add an event listener for click on the background video
    bgvideo.addEventListener("click", () => {
        // Check if the video is paused
        if (bgvideo.paused) {
            bgvideo.play()
            playpausebtn.innerHTML="<span>&#9658;</span>"
            playpausebtn.style.display="flex"
            playpausebtn.style.opacity="1"
            setTimeout(function(){
                playpausebtn.style.display="none"
                playpausebtn.style.opacity="0"
        },700)
        }
        else {
            // If the video is playing, pause it
            bgvideo.pause()
            playpausebtn.innerHTML="<span>&#10074;&#10074;</span>"
            playpausebtn.style.display="flex"
            playpausebtn.style.opacity="1"
            setTimeout(function(){
                playpausebtn.style.display="none"
                playpausebtn.style.opacity="0"
        },700)
        }
    })
});

// Select a container element, but it seems to not be used in this script
const container = document.getElementById('container');