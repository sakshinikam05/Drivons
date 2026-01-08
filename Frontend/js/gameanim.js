document.addEventListener("DOMContentLoaded", function() {
  const funContent = document.querySelector('.fun-content');

  // Create an IntersectionObserver to detect when the element is in view
  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              // Apply animation when element enters the viewport
              funContent.classList.add('visible');
              observer.unobserve(funContent); // Stop observing after animation triggers
          }
      });
  }, { threshold: 0.5 }); // Trigger when 50% of the element is visible

  observer.observe(funContent);
});