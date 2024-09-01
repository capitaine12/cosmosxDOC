//?::::::::::::::::::::::::::::::::::::::::  SCRIPT DU caroussel  ::::::::::::::::::::::::::::::::::::::::::::::
//?::::::::::::::::::::::::::::::::::::::::  SCRIPT DU caroussel  ::::::::::::::::::::::::::::::::::::::::::::::
//?::::::::::::::::::::::::::::::::::::::::  SCRIPT DU caroussel  ::::::::::::::::::::::::::::::::::::::::::::::

let swiper = new Swiper(".Slider", {
  autoplay: true,
  speed: 2500,
  loop: true,
  parallax: true,

  navigation: {
    prevEl: ".swiper-button-prev",
    nextEl: ".swiper-button-next",
  },
})



//!::::::::::::::::::::::::::::::::::::::::  SCRIPT DES TABS  :::::::::::::::::::::::::::::::::::::::::::!::
//!::::::::::::::::::::::::::::::::::::::::  SCRIPT DES TABS  :::::::::::::::::::::::::::::::::::::::::::!::
//!::::::::::::::::::::::::::::::::::::::::  SCRIPT DES TABS  ::::::::::::::::::::::::::::::::::::::::::::::

document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".tab")
    const courseCards = document.querySelectorAll(".course-card")
  
    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        // Remove active class from all tabs
        tabs.forEach((t) => t.classList.remove("active"))
  
        // Add active class to the clicked tab
        tab.classList.add("active")
  
        // Get the category from the clicked tab
        const category = tab.getAttribute("data-category")
  
        // Show or hide course cards based on the selected category
        courseCards.forEach((card) => {
          if (card.getAttribute("data-category") === category) {
            card.style.display = "block"
          } else {
            card.style.display = "none"
          }
        })
      })
    })
  
    // Initially show only the cards for the active tab
    const activeTab = document.querySelector(".tab.active")
    if (activeTab) {
      const category = activeTab.getAttribute("data-category")
      courseCards.forEach((card) => {
        if (card.getAttribute("data-category") === category) {
          card.style.display = "block"
        } else {
          card.style.display = "none"
        }
      })
    }
  })

  
//*::::::::::::::::::::::::::::::::::::::::  SCRIPT DE L'ANIMATION DES CARDS COMMENTAIRE  ::::::::::::::::::::::::::::::::::::::::::::::
//*::::::::::::::::::::::::::::::::::::::::  SCRIPT DE L'ANIMATION DES CARDS COMMENTAIRE  ::::::::::::::::::::::::::::::::::::::::::::::
//*::::::::::::::::::::::::::::::::::::::::  SCRIPT DE L'ANIMATION DES CARDS COMMENTAIRE  ::::::::::::::::::::::::::::::::::::::::::::::


document.addEventListener('DOMContentLoaded', () => {
  const cards = document.querySelectorAll('.card');

  function getRandomColor() {
      const colors = ['green', 'orange', 'purple', 'blue', 'red', 'yellow'];
      return colors[Math.floor(Math.random() * colors.length)];
  }

  function assignRandomColors() {
      cards.forEach(card => {
          const icon = card.querySelector('.icon');
          const randomColor = getRandomColor();
          icon.style.backgroundColor = randomColor;
      });
  }

  assignRandomColors(); // Set random colors initially
});



//?::::::::::::::::::::::::::::::::::::::::  SCRIPT DU MODAL  ::::::::::::::::::::::::::::::::::::::::::::::
//?::::::::::::::::::::::::::::::::::::::::  SCRIPT DU MODAL  ::::::::::::::::::::::::::::::::::::::::::::::
//?::::::::::::::::::::::::::::::::::::::::  SCRIPT DU MODAL  ::::::::::::::::::::::::::::::::::::::::::::::

// Get the modal
var modal = document.getElementById("id01")

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none"
  }
}



//*::::::::::::::::::::::::::::::::::::::::  SCRIPT DE L'ANIMATION LOGIN  ::::::::::::::::::::::::::::::::::::::::::::::
//*::::::::::::::::::::::::::::::::::::::::  SCRIPT DE L'ANIMATION LOGIN  ::::::::::::::::::::::::::::::::::::::::::::::
//*::::::::::::::::::::::::::::::::::::::::  SCRIPT DE L'ANIMATION LOGIN  ::::::::::::::::::::::::::::::::::::::::::::::

document.addEventListener("DOMContentLoaded", () => {
  const logo = document.getElementById("logo")
  const title = document.getElementById("title")

  // Add classes to start animations
  logo.classList.add("animate-up")
  title.classList.add("animate-down")
})

let slideIndex = 0
showSlides(slideIndex)

function changeSlide(n) {
  showSlides((slideIndex += n))
}




