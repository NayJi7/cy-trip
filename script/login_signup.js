document.addEventListener("DOMContentLoaded", () => {
   
    // Select the background video and play/pause button elements
    const bgvideo = document.querySelector("#bgvideo")
    const playpausebtn = document.querySelector("#playpausebtn")

    // Add event listener for clicks on the background video
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
        // If playing, pause the video
        else {
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
})

// Select the container, register button, and login button elements
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Add event listener for clicks on the register button
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

// Add event listener for clicks on the login button
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});