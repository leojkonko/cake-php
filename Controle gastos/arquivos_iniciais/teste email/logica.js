
class EmailSenha {
	constructor(e,s){
		this.email = e
		this.senha = s
	}
}

class Validar {

	senha(es) {

		let e1 = es.email
		let s1 = es.senha

		if (e1 == '' || e1 == ' ' || e1 == undefined || e1 == null) { return false} 
			else if (s1 == '' || s1 == ' ' || s1 == undefined || s1 == null) {return false}
				else {return true}

	}
}



class InserirLS {

	constructor() {
		let id = localStorage.getItem('id')

		if (id == null) {
			localStorage.setItem('id', 0)
		} 
	}

	proximagravacao() {
		let proximoid = localStorage.getItem('id')

		return parseInt(proximoid) + 1
	}

	gravar(p) {
		//
		let idnovo = this.proximagravacao()

		localStorage.setItem(idnovo, JSON.stringify(p))

		localStorage.setItem('id', idnovo)

	}
}


let inserirls = new InserirLS


function cadastrar() {
	var email = document.getElementById('email').value
	var senha = document.getElementById('senha').value

	let emailSenha = new EmailSenha(
		email, senha)

	let validar = new Validar

   if (validar.senha(emailSenha) == true)
   {
   	alert('dados gravados!')
	inserirls.gravar(emailSenha)
	}
	else {
		alert('complete todos os dados')
	}
}

