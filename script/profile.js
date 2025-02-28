document.addEventListener("DOMContentLoaded", () => {

    // Get the background video and play/pause button elements
    const bgvideo = document.querySelector("#bgvideo")
    const playpausebtn = document.querySelector("#playpausebtn")

    // Add click event listener to the background video element
    bgvideo.addEventListener("click", () => {
        // If the video is paused, play it
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
        // If the video is playing, pause it
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

    // Get edit, valid, pseudo, email, and password zone elements
    const editbtn = document.querySelector("#edit")
    const validbtn = document.querySelector("#valid")
    const pseudozone = document.querySelector(".pseudo")
    const emailzone = document.querySelector(".email")
    const passwordzone = document.querySelector(".password")

    // Add click event listener to the edit button
    editbtn.addEventListener("click", () => {
        editbtn.style.display = "none"
        validbtn.style.display = "flex"

        pseudozone.removeAttribute('disabled')
        emailzone.removeAttribute('disabled')
        passwordzone.removeAttribute('disabled')
        passwordzone.setAttribute('type', 'text')
        pseudozone.focus()
    })
});

// Get the container element by its ID
const container = document.getElementById('container');