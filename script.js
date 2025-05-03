document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.nav-links a');
  
    links.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth' });
        }
      });
    });
  });
  
  
  // Mostra o nasconde il bottone in base allo scroll
  window.onscroll = function() {
    const scrollTopBtn = document.getElementById("scrollTopBtn");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      scrollTopBtn.style.display = "block";
    } else {
      scrollTopBtn.style.display = "none";
    }
  };
  
  // Funzione per tornare in cima
  document.getElementById("scrollTopBtn").addEventListener("click", function() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
  
  