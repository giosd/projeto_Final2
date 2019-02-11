<?php
namespace App\Controller;

use App\Entity\Produto;
use App\Repository\Banco;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProdutoController extends AbstractController {
	/**
	* @Route("/produto/{id}")
	*/
	public function view($id) {
		$banco = new Banco();
		$produto = $banco->getProduto($id);
		
		return $this->render('produto/view.html.twig', [
			'produto' => $produto		    
		]);
	}

	/**
	* @Route("/categoria/{nome}")
	*/
	public function categoria($nome) {
		$banco = new Banco();
		$produtos = $banco->getProdutosByCategoria($nome);

		return $this->render('produto/categoria.html.twig', [
			'produtos' => $produtos    
		]);
	}



	/**
	* @Route("/busca")
	*/
	public function buscar(Request $request) {
		$desc = $request->request->get('desc');
		echo $desc;
		$banco = new Banco();
		$produtos = $banco->getProdutosByBusca($desc);
		return $this->render('produto/buscar.html.twig', [
			'produtos' => $produtos,
			'desc' => $desc   		    
		]);
	}


	
}
