document.addEventListener("DOMContentLoaded", () => {
//  fetchDate();
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

  if (extension === "json") {
    posts.forEach((post) => {
      //console.log(post);
      const postHTML = `
      <div class="post">
  <img src="${post.image}" alt="Image 1" class="image" />
  <h1 class="heading">${post.title}</h1>
  <p class="description">${post.description}</p>
  <p class="duration">${post.duration}</p>
</div>
    `;
      container.insertAdjacentHTML("beforeend", postHTML);
    });
  } else {
    container.innerHTML = posts;
  }
}

//===========================================

const files = [
  ["json", "js/all-achievement.json", "all-achievement"],
  ["json", "js/all-education.json", "all-education"],
  ["txt", "js/all-coding-skill.txt", "all-coding-skill"],
  ["txt", "js/all-github-repo.txt", "all-github-repo"],
  ["txt", "js/all-interest.txt", "all-interest"],
  ["txt", "js/all-problem-solving.txt", "all-problem-solving"],
  ["txt", "js/all-skill.txt", "all-skill"],
];

const fetchDate = () => {
  files
    .forEach((file) => {
      if (file[0] === "json") {
        fetch(file[1])
          .then((res) => {
            if (!res.ok) {
              throw new Error("Network response was not ok for " + file[2]);
            }
            return res.json();
          })
          .then((data) => renderPosts(file[2], data, "json"))
          .catch((err) => console.error("Error fetching data:", err));
      } else {
        fetch(file[1])
          .then((res) => {
            if (!res.ok) {
              throw new Error("Network response was not ok for " + file[2]);
            }
            return res.text();
          })
          .then((data) => renderPosts(file[2], data, "txt"))
          .catch((err) => console.error("Error fetching data:", err));
      }
    })
};
//===========================================