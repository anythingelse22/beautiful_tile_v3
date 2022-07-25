const about_ar = [

	"ИП: Безгубов Владос",
	"Адрес: ул.Пушкина, д.Колотушкина",
	"ИНН: 12391231828491",

]

const cont_arr = {
	// email
	email: "random123@gmail.com",
	// phone
	phone: "+7-800-555-35-35",
}

add_contacts()
function add_contacts() {
	const main_cont = document.querySelector(".cont_top")

	for (i=0; i < about_ar.length; i++) {
		const text_cont = document.createElement("p")
		text_cont.innerText = about_ar[i]
		text_cont.setAttribute("class", "top_text")
		main_cont.appendChild(text_cont)
	}

};

render_str()
function render_str() {
	const em = document.getElementById("email_id")
	const ph = document.getElementById("phone_id")

	const em_str = cont_arr.email
	const ph_str = cont_arr.phone

	em.innerText = em_str
	ph.innerText = ph_str

	em.href = "mailto:" + em_str
	const new_ph_str = ph_str.replaceAll("-", "")
	ph.href = "tel:" + new_ph_str
};