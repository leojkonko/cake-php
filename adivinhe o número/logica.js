


var numero = Math.floor(Math.random() * 100)
var tentativas = 10
var usados = 0
 

function verificaNumero() {

		tentativas--
		//console.log('tentativa1' + tentativas)

		//if (tentativas = 0) {alert('você perdeu')}
			//else 

	var chute = document.getElementById('numero').value

	
	//console.log(tentativas)

	if (chute === " " || chute === "") 
		{alert('digite um número')}

		else { console.log(numero)
				

			if (chute > numero) {
				document.getElementById('resposta').innerHTML = "número muito alto!"
				document.getElementById('resposta').style.border = "3px solid red"
							}

					if (chute < numero) {
						document.getElementById('resposta').innerHTML = "número muito baixo!"
						document.getElementById('resposta').style.border = "3px solid red"
					}

						if (chute == numero) {
							document.getElementById('resposta').innerHTML = "VOCÊ GANHOU!!!"
							document.getElementById('resposta').style.background = "green"
							document.getElementById('resposta').style.border = "1px solid green"
							}

							if (tentativas == 0) {alert('vocÊ perdeu!')}
							//console.log('tentativa2' + tentativas)
							usados++
						//document.getElementById('usados').innerHTML = 'teste1'
						document.getElementById('usados' + usados).innerHTML = chute
							
		}
 
 
}
