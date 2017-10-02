var current = 1,
	imgs = document.getElementById("particles-js").getElementsByTagName("IMG");

setTimeout(function tick() {
	if (current == imgs.length) {
		current = 0;
	}
	/*document.getElementById("particles-js").classList.toggle("disdlay_none");
	 */
	for (var l = 0; l < imgs.length; l++) {
		if (l == current)
			imgs[l].classList.remove("display_none");
		else imgs[l].classList.add("display_none");
		/*console.log(imgs[l], imgs[l].classList);*/
	}


	current++;
	timerId = setTimeout(tick, 4000);
}, 4000);
/*var h = document.getElementById("particles-js");
window.onresize = function (e) {
	document.getElementsByTagName("main")[0].style.height = h.offsetHeight + "px";}
*/
