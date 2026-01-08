document.addEventListener("DOMContentLoaded", function () {
    let thrillContainer = document.querySelector(".thrill-container");
    let thrillContent = document.querySelector(".thrill-content");

    let observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    thrillContent.classList.add("slide-in");
                }
            });
        },
        { threshold: 0.5 } // Trigger when 50% of the container is visible
    );

    observer.observe(thrillContainer);
});
