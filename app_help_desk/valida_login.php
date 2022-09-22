<?php
			session_start();

			echo $_SESSION['autenticado'] ;

		//var q verifica se a autentificação foi realizada
		
		$usuario_autenticacao = false;
		$usuario_id = null;
		$usuario_perfil_id = null;

		//usuários do sistema
		$usuario_app = array(
			array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => 1234, 'perfil_id' => 1),
			array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 1234, 'perfil_id' => 1),
			array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => 1234, 'perfil_id' => 2),
			array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => 1234, 'perfil_id' => 2),
		);

		/*
		echo "<pre>";
		print_r($usuario_app);
		echo "</pre>"; */

		foreach($usuario_app as $user) {
			
			 
			if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
				$usuario_autenticacao = true;
				$usuario_id = $user['id'];
				$usuario_perfil_id = $user['perfil_id'];
				//

			}
		}	 
		
			if ($usuario_autenticacao) {
				echo 'Usuário autenticado com sucesso!';
				$_SESSION['autenticado'] = 'sim';
				$_SESSION['id'] = $usuario_id;
				$_SESSION['perfil_id'] = $usuario_perfil_id;
				header('location: home.php');

			} else {
				//echo 'Erro na autenticação do usuário';
				$_SESSION['autenticado'] = 'não';
				header('location: index.php?login=erro');
				}

		/*
echo "<hr>";
		//$_GET
	 print_r($_POST);
*/
	
?>