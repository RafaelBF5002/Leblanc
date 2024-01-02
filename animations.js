window.addEventListener('DOMContentLoaded', function() {
	const heading = document.getElementById('quem-somos-heading');
	const text = document.getElementById('quem-somos-text');
	function animateText(element) {
		let opacity = 0;
		const interval = setInterval(function() {
			if (opacity >= 1) {
				clearInterval(interval);
			}
			element.style.opacity = opacity;
			opacity += 0.1;
		}, 200);
	}
	animateText(heading);
	animateText(text);
});
document.addEventListener("DOMContentLoaded", function() {
    var scrollArrow = document.getElementById("scroll-arrow");
  
    if (scrollArrow) {
      scrollArrow.addEventListener("click", function() {
        window.scrollBy({ top: window.innerHeight, behavior: "smooth" });
      });
    }
  });  