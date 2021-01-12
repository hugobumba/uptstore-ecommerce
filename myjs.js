window.onscroll = function() {
	scrollFunction()
};
function scrollFunction() {
	if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
		document.getElementById("nav").style.position = "fixed";
		document.getElementById("nav").style.background = "white";
		document.getElementById("nav").style.color = "black";
		document.getElementById("nav").style.transition = "0.3s";
		document.getElementById("nav").style.borderBottom = "1px";
	} else {
		document.getElementById("nav").style.position = "absolute";
		document.getElementById("nav").style.transition = "0.3s";
		document.getElementById("nav").style.background = "rgba(255,255,255,0)";
		document.getElementById("nav").style.borderBottomStyle = "none";
	}
}