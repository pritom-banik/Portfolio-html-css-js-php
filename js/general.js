document.addEventListener("DOMContentLoaded", () => {
fetchDate();
});

//=======================================================
//top navbar char

const navbar = document.getElementById("topNavBar");
let lastScrollY = window.scrollY;

window.addEventListener("scroll", () => {
  const currentScrollY = window.scrollY;

  if (currentScrollY > lastScrollY) {
    // Scrolling down → hide navbar
    navbar.style.transform = "translateY(-200%)";
    navbar.style.transition = "transform 0.3s ease";
  } else {
    // Scrolling up → show navbar
    navbar.style.transform = "translateY(0)";
    navbar.style.transition = "transform 0.3s ease";
  }

  lastScrollY = currentScrollY;
});


//=============================================

function toggleWork(sectionId, arrowId) {
  const allWork = document.getElementById(sectionId);
  const arrow = document.getElementById(arrowId);

   // Toggle show/hide
  if (allWork.style.display === "none" || allWork.style.display === "") {
    allWork.style.display = "block"; // show
    arrow.style.transform = "rotate(180deg)"; // rotate down
  } else {
    allWork.style.display = "none"; // hide
    arrow.style.transform = "rotate(0deg)"; // rotate up
  }


}


//===========================================

function renderPosts(containerId, posts, extension) {
  const container = document.getElementById(containerId);
  container.innerHTML = ""; 

    container.innerHTML = posts;
    console.log(posts);
  
}

//===========================================

const files = [
  ["js/all-coding-skill.txt", "all-coding-skill"],
  ["js/all-github-repo.txt", "all-github-repo"],
  ["js/all-interest.txt", "all-interest"],
  ["js/all-problem-solving.txt", "all-problem-solving"],
  ["js/all-skill.txt", "all-skill"],
];

const fetchDate = () => {
  files
    .forEach((file) => {
        fetch(file[0])
          .then((res) => {
            if (!res.ok) {
              throw new Error("Network response was not ok for " + file[2]);
            }
            return res.text();
          })
          .then((data) => renderPosts(file[1], data, "txt"))
          .catch((err) => console.error("Error fetching data:", err));
      
    })
};
//===========================================