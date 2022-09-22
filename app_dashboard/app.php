<?php 

	/**
	 * 
	 */
	class Dashboard
	{
		public $data_inicio;
		public $data_fim;
		public $num_vendas;
		public $total_vendas;
		public $clientes_ativos;
		//public $clientes_invativos;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			 $this->$atributo = $valor;
			 return $this;
		}
	}



	//classe conexao c/ banco de dados

	class Conexao {

		private $host = 'localhost';
		private $dbname = 'dashboard';
		private $user = 'root';
		private $pass = '';

		public function conectar(){
			try{

				$conexao = new PDO(
					"mysql:host=$this->host;dbname=$this->dbname",
					"$this->user",
					"$this->pass"
				);

				$conexao->exec('set charset set utf8');

				return $conexao;

			} catch (PDOException $e) {
				echo '<p>' . $e->getMessege() . '</p>';
			}

		}

	}



//criar uma classe p manipular objetos no banco

	class Bd {

		private $conexao;
		private $dashboard;


		public function __construct(Conexao $conexao, Dashboard $dashboard) {
			$this->conexao = $conexao->conectar();
			$this->dashboard = $dashboard;

		}

		public function getNumVendas() {
			$query = "select 
				count(*) as numero_vendas 
			from 
				tb_vendas 
			where 
				data_venda 
			between
				:data_inicio and :data_fim";

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
		}

		public function getTotalVendas() {
			$query = "select 
				SUM(total) as total_vendas 
			from 
				tb_vendas 
			where 
				data_venda 
			between
				:data_inicio and :data_fim";

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		public function getClientesAtivos() {
			$query = " 
			select 
				count(*) 
			from 
				tb_clientes 
			where 
				cliente_ativo = 1;";

			$stmt = $this->conexao->prepare($query);
			//$stmt->bindValue(':x', 1);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}
	}


	$dashboard = new Dashboard();

	$conexao = new Conexao();

	$competencia = explode('-', $_GET['competencia']);
	$ano = $competencia[0];
	$mes = $competencia[1];

	$dia = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

	$data_final_dias = $ano.'-'.$mes.'-'.$dia;
	$data_inicio_dias = $ano.'-'.$mes.'-01';

	$dashboard->__set('data_inicio', $data_inicio_dias);
	$dashboard->__set('data_fim', $data_final_dias);

	$bd = new Bd($conexao, $dashboard);

	$dashboard->__set('num_vendas', $bd->getNumVendas());
	$dashboard->__set('total_vendas', $bd->getTotalVendas());
	

	$dashboard->__set('clientes_ativos', $bd->getClientesAtivos());
	$teste = $bd->getTotalVendas();
	$teste2 = $bd->getClientesAtivos();
	//echo ('o retorno é:'.$teste.'heheheh'.$teste2);
	//print_r($dashboard);
	echo json_encode($dashboard);


?>