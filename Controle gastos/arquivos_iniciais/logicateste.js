

// cadastrar
class Despesa {
	constructor(ano, dia, mes, tipo, descricao, valor){
		this.ano = ano 
		this.dia = dia 
		this.mes = mes 
		this.tipo = tipo
		this.descricao = descricao
		this.valor = valor
	}
}
 class Bd {

 	constructor() {
 		let id = localStorage.getItem('id')

 		if (id === null) {
 			localStorage.setItem('id',0)
 		}
 	}


 	getProximoId() {
 		let proximoId = localStorage.getItem()
 		return parseInt(proximoId) + 1
 	}


 	gravar(d) {
		let id = this.getProximoId()
		localStorage.setItem('despesa', JSON.stringify(d))
		localStorage.setItem('id', id)
	}
}
	let bd = new Bd()
 

function iniciaCadastro() {

	var ano = document.getElementById('ano')
	var dia = document.getElementById('dia')
	var mes = document.getElementById('mes')
	var tipo = document.getElementById('tipo')
	var descricao = document.getElementById('descricao')
	var valor = document.getElementById('valor')


let despesa = new Despesa(
	ano.value,
	dia.value,
	mes.value,
	tipo.value, 
	descricao.value, 
	valor.value,
)

	bd.gravar(despesa)
}

//    gravar a despesa

