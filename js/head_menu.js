let menu_opened = false
function menu_click() {
	const btn = document.querySelector(".head_menu")
	const navbar = document.querySelector(".navmenu")
	
	if (!menu_opened) {
		btn.classList.toggle("active")
		navbar.classList.toggle("active")
		menu_opened = true
	} else {
		btn.classList.remove("active")
		navbar.classList.toggle("active")
		menu_opened = false
	}

}