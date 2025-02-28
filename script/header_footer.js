document.addEventListener("DOMContentLoaded", () => {

    // Select the menu dropdown element, countries button, and the open icon
    const menuderoulant = document.querySelector(".menu-deroulant")
    const btncountries = document.querySelector("#btncountries")
    let openicon = document.querySelector("#openicon")

    // Select the header element
    const header = document.querySelector("header")
    // Initialize variables to track scroll position and menu state
    let lastscrollpos = 0
    let isopened = 0

    // Add event listener for scroll events
    window.addEventListener("scroll", () => {
        // Get the current scroll position
        let scrollpos = window.scrollY

        // Check if the user is scrolling down or up
        if (scrollpos > lastscrollpos) {
            header.style.transform = "translateY(-100%)"
            if (isopened === 1) {
                menuderoulant.style.transform = "translateY(41vw)"
            }
        }
         // If scrolling up, show the header
        else
        {
            header.style.transform = "translateY(0%)"
            // If the menu is opened, adjust its position accordingly
            if (isopened === 1) {
            menuderoulant.style.transform = "translateY(46.7vw)"
            }
        }

        // Update the last scroll position
        lastscrollpos = scrollpos
    })

    // Add event listener for clicks on the countries button
    btncountries.addEventListener("click", () => {
        // Toggle the menu state
        if (isopened === 0) {
            menuderoulant.style.transform = "translateY(46.7vw)"
            openicon.style.transform = "rotate(180deg)"
            isopened = 1
        }
        // If the menu is opened, close it
        else {
            menuderoulant.style.transform = "translateY(0)"
            openicon.style.transform = "rotate(0)"
            isopened = 0
        }
    })
})