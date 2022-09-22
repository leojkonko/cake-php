

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

	validarDados() {

			for (let i in this){

				if (this[i] == undefined || this[i] == '' || this[i] == null) {
					return false
				}
		}
		return true 
	}
}
 

 class Bd {

 		constructor() {
 			let id = localStorage.getItem('id')

 			if (id === null) {
 				localStorage.setItem('id', 0)
 			}
 		}

 		getProximoId() {
 			let proximoId = localStorage.getItem('id')
 			return parseInt(proximoId) + 1
 		}

		gravar(d) {
			
			let id = this.getProximoId()

			localStorage.setItem(id, JSON.stringify(d))

			localStorage.setItem('id', id)
		}

		recuperarRegistros() {

			let despesas = Array()

			let id = localStorage.getItem('id')

			for (let i = 1; i <= id; i++) {

				let despesa = JSON.parse(localStorage.getItem(i))

				if (despesa === null) {continue}

				despesa.id=i
				despesas.push(despesa)

			}

			return despesas
			
		}

		pesquisar(despesa) {
			
			let despesasFiltradas = Array()

		 despesasFiltradas = this.recuperarRegistros()

			//console.log(despesasFiltradas)

			if (despesa.ano != '') {
				despesasFiltradas = despesasFiltradas.filter(function(d) {
							if (d.ano == despesa.ano) {return true} else {return false}
				})
			}

			if (despesa.mes != '') {
				despesasFiltradas = despesasFiltradas.filter(d => d.mes == despesa.mes)
			}

			if (despesa.dia != '') {
				despesasFiltradas = despesasFiltradas.filter(d => d.dia == despesa.mes)
			}
			if (despesa.tipo != '') {
				despesasFiltradas = despesasFiltradas.filter(d => d.tipo == despesa.mes)
			}
			if (despesa.descricao != '') {
				despesasFiltradas = despesasFiltradas.filter(d => d.descricao == despesa.mes)
			}
			if (despesa.valor != '') {
				despesasFiltradas = despesasFiltradas.filter(d => d.valor == despesa.mes)
			}

			return despesasFiltradas
		}

		remover(id) {
			localStorage.removeItem(id)
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
	
	if (despesa.validarDados() === true) {
		$('#registraDespesa').modal('show')
		bd.gravar(despesa)
		document.getElementById('modaltit').innerHTML = "Registro inserido com sucesso"
		document.getElementById('modaltit').style.color = 'green'
		document.getElementById('modalparagr').innerHTML = 'Seus dados foram registrados!'
		document.getElementById('modalbotao').className = 'btn btn-success'

		document.getElementById('ano').value = 0 
		document.getElementById('mes').value = ''
		document.getElementById('dia').value = ''
		document.getElementById('tipo').value = ''
		document.getElementById('descricao').value = ''
		document.getElementById('valor').value = ''
	} else {
		//alert('Preencha todos os campos')
		$('#registraDespesa').modal('show')
		document.getElementById('modaltit').innerHTML = "Falha no registro dos dados"
		document.getElementById('modaltit').style.color = 'red'
		document.getElementById('modalparagr').innerHTML = 'Verifique se os seu dados estão completos.'
		document.getElementById('modalbotao').className = 'btn btn-danger'
	}
}

function carregaListaDespesa() {

	let despesa = Array()
		despesa = bd.recuperarRegistros()

		//console.log(despesa)

		//elemento tbody da tabela
		let listaDespesas = document.getElementById('listaDespesas')

		//percorrendo o array 
		despesa.forEach(function(d) {

			//criando linha <tr>
			let linha = listaDespesas.insertRow()

			//criando coluna dentro da linha <td>
			linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`

			switch(parseInt(d.tipo))  {
					case 1: d.tipo = 'Alimentação' 
					break
					case 2: d.tipo = 'Educação' 
					break
					case 3: d.tipo = 'Lazer' 
					break
					case 4: d.tipo = 'Saúde' 
					break 
					case 5: d.tipo = 'Transporte' 
					break
			} 

			linha.insertCell(1).innerHTML = d.tipo 
			linha.insertCell(2).innerHTML = d.descricao
			linha.insertCell(3).innerHTML = d.valor 
			let btn = document.createElement('button')
			btn.className = 'btn btn-primary'
			btn.innerHTML = '<i class="fas fa-times"></i>'
			btn.id = 'id_despesaa' + d.id
			btn.onclick = function() {

				let id = this.id.replace('id_despesaa', '')

					bd.remover(this.id)

					window.location.reload()


			}
			linha.insertCell(4).append(btn)
			
		})
}


function pesquisaDespesa() {
	let ano = document.getElementById('ano').value
	let dia = document.getElementById('dia').value 
	let mes = document.getElementById('mes').value 
	let tipo = document.getElementById('tipo').value
	let descricao = document.getElementById('descricao').value
	let valor = document.getElementById('valor').value

	let despesa = new Despesa(ano, dia, mes, tipo, descricao, valor)

	let despesas = bd.pesquisar(despesa)

			//elemento tbody da tabela
		let listaDespesas = document.getElementById('listaDespesas')
		listaDespesas.innerHTML = ''

		//percorrendo o array 
		despesas.forEach(function(d) {

			//criando linha <tr>
			let linha = listaDespesas.insertRow()

			//criando coluna dentro da linha <td>
			linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`

			switch(parseInt(d.tipo))  {
					case 1: d.tipo = 'Alimentação' 
					break
					case 2: d.tipo = 'Educação' 
					break
					case 3: d.tipo = 'Lazer' 
					break
					case 4: d.tipo = 'Saúde' 
					break 
					case 5: d.tipo = 'Transporte' 
					break
			} 

			linha.insertCell(1).innerHTML = d.tipo 
			linha.insertCell(2).innerHTML = d.descricao
			linha.insertCell(3).innerHTML = d.valor 

			
		})		
	
}

