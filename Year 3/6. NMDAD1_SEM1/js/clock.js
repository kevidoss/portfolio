;(function() {
	/*
	*Get the .clock element from the DOM
	*/
	var clockElement = document.querySelector('.clock');
	/*
	*Ticking of the clock
	*/
	function updateClock() {
		/*
		*Step 2.1. Get the current Date
		*/
		var date = new Date();
		var h = date.getHours();
		var m = date.getMinutes();
		var s = date.getSeconds();

		/*
		*Step 2.2. Write something in the .clock element
		*/
		clockElement.innerHTML = digitize(h, 2) + ':' + digitize(m, 2) + ':' + digitize(s, 2);

		/*
		*Make the clock update every second
		*/
		window.setTimeout(function() { updateClock(); }, 120);
	}
	/*
	*Call the function updateClock() 
	*/
	updateClock();

	function digitize(cp, n) {
		cp = cp.toString();
		while(cp.length < n) {
			cp = '0' + cp;
		}
		return cp;
	}
})();
