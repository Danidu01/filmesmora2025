document.addEventListener("DOMContentLoaded", () => {
    fetch('movies.php')
      .then(response => response.json())
      .then(data => {
        displayMovies(data);
      });
  
    document.getElementById("search").addEventListener("input", (e) => {
      const value = e.target.value.toLowerCase();
      document.querySelectorAll(".movie").forEach(movie => {
        const title = movie.querySelector("h3").textContent.toLowerCase();
        movie.style.display = title.includes(value) ? "block" : "none";
      });
    });
  });
  
  function displayMovies(movies) {
    const list = document.getElementById("movie-list");
    list.innerHTML = '';
    movies.forEach(movie => {
      const div = document.createElement("div");
      div.classList.add("movie");
      div.innerHTML = `
        <img src="assets/posters/${movie.poster}" alt="${movie.title}" />
        <h3>${movie.title}</h3>
      `;
      list.appendChild(div);
    });
  }
  