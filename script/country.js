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

    // Select all star rating buttons and their corresponding rectangles
    const starone = document.querySelector(".one")
    const startwo = document.querySelector(".two")
    const starthree = document.querySelector(".three")
    const starfour = document.querySelector(".four")
    const starfive = document.querySelector(".five")

    const rectone = document.querySelector("#one")
    const recttwo = document.querySelector("#two")
    const rectthree = document.querySelector("#three")
    const rectfour = document.querySelector("#four")
    const rectfive = document.querySelector("#five")
        
    // Add event listeners for mouseover and mouseout for each star rating button
    starfive.addEventListener("mouseover", () => {
        // Move all rectangles to the right to highlight the stars
        rectfive.style.transform = "translateX(6vw)"
        rectfour.style.transform = "translateX(6vw)"
        rectthree.style.transform = "translateX(6vw)"
        recttwo.style.transform = "translateX(6vw)"
        rectone.style.transform = "translateX(6vw)"
    })

    // Reset all rectangles to their original positions
    starfive.addEventListener("mouseout", () => {
        rectfive.style.transform = "translateX(0)"
        rectfour.style.transform = "translateX(0)"
        rectthree.style.transform = "translateX(0)"
        recttwo.style.transform = "translateX(0)"
        rectone.style.transform = "translateX(0)"
    })

    // Similar event listeners for other star ratings
    // (four, three, two, one)

    starfour.addEventListener("mouseover", () => {
        rectfour.style.transform = "translateX(6vw)"
        rectthree.style.transform = "translateX(6vw)"
        recttwo.style.transform = "translateX(6vw)"
        rectone.style.transform = "translateX(6vw)"
    })

    starfour.addEventListener("mouseout", () => {
        rectfour.style.transform = "translateX(0)"
        rectthree.style.transform = "translateX(0)"
        recttwo.style.transform = "translateX(0)"
        rectone.style.transform = "translateX(0)"
    })

    starthree.addEventListener("mouseover", () => {
        rectthree.style.transform = "translateX(6vw)"
        recttwo.style.transform = "translateX(6vw)"
        rectone.style.transform = "translateX(6vw)"
    })

    starthree.addEventListener("mouseout", () => {
        rectthree.style.transform = "translateX(0)"
        recttwo.style.transform = "translateX(0)"
        rectone.style.transform = "translateX(0)"
    })

    startwo.addEventListener("mouseover", () => {
        recttwo.style.transform = "translateX(6vw)"
        rectone.style.transform = "translateX(6vw)"
    })

    startwo.addEventListener("mouseout", () => {
        recttwo.style.transform = "translateX(0)"
        rectone.style.transform = "translateX(0)"
    })
    
    starone.addEventListener("mouseover", () => {
        rectone.style.transform = "translateX(6vw)"
    })

    starone.addEventListener("mouseout", () => {
        rectone.style.transform = "translateX(0)"
    })

    // Select buttons for expanding/collapsing text areas
    const btnsizespots = document.querySelector(".sizespots")
    const btnsizerestaurants = document.querySelector(".sizerestaurants")
    const btnsizeactivities = document.querySelector(".sizeactivities")

     // Select text areas for spots, restaurants, and activities
    const txtspots = document.querySelector("#txtspots")
    const txtrestaurants = document.querySelector("#txtrestaurants")
    const txtactivities = document.querySelector("#txtactivities")

    // Initially set the height of text areas to a smaller value
    txtspots.style.height = "2.5vw"
    txtrestaurants.style.height = "2.5vw"
    txtactivities.style.height = "2.5vw"

    // Add event listeners for expanding/collapsing text areas
    btnsizespots.addEventListener("click", () => {
        // If the text area is collapsed, expand it
        if (txtspots.style.height === "2.5vw") {
            txtspots.style.height = "10vw"
            btnsizespots.style.transform = "rotate(180deg)"
        }
         // If the text area is expanded, collapse it
        else {
            txtspots.style.height = "2.5vw"
            btnsizespots.style.transform = "rotate(0deg)"
        }
    })

    btnsizerestaurants.addEventListener("click", () => {
        if (txtrestaurants.style.height === "2.5vw") {
            txtrestaurants.style.height = "10vw"
            btnsizerestaurants.style.transform = "rotate(180deg)"
        }
        else {
            txtrestaurants.style.height = "2.5vw"
            btnsizerestaurants.style.transform = "rotate(0deg)"
        }
    })

    btnsizeactivities.addEventListener("click", () => {
        if (txtactivities.style.height === "2.5vw") {
            txtactivities.style.height = "10vw"
            btnsizeactivities.style.transform = "rotate(180deg)"
        }
        else {
            txtactivities.style.height = "2.5vw"
            btnsizeactivities.style.transform = "rotate(0deg)"
        }
    })
})