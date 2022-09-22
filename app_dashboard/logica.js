
$(document).ready(() => {
	
	$('#documentacao').on('click', () => {
			$('#pagina').load('documentacao.html')		
	})

	$('#suporte').on('click', () => {
			$('#pagina').load('suporte.html')		
	})


	//ajax
	$('#competencia').on('change', e => {

		let competencia = $('#competencia').val()


		var ajax = $.ajax({

			type: 'GET',
			url: 'app.php',
			data: 'competencia=' + competencia ,
			dataType: 'json',
			success: dados => {
				console.log(dados)
				$('#num_vendas').html(dados.num_vendas) 
				$('#total_vendas').html(dados.total_vendas)
				$('#clientes_ativos').html(dados.clientes_ativos)

				var testando = dados.clientes_ativos
				console.log(testando)

			},
			error: erro => {console.log(erro + "teste")}
		})

		console.log(ajax)
		

	})
})
