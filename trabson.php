<?php 
require ("Node.php");

	$string = 'ABRACADABRA';
	$string1 = 'ABRACADABRA SIM SALABIN BIM BIM';

	$fraseQuebrada = str_split($string);

// cria a tabela de frequencia a partir da string
function generateFrequency($fraseQuebrada) 
{
	$tabela = [];
	foreach ($fraseQuebrada as $palavra) {
		if (in_array($palavra, $tabela)) {
			$tabela += [ $palavra => 1 ];
		} else {
			$tabela[$palavra] += 1; 
		}
	}

	asort($tabela);

	return $tabela;
}

// transforma a tabela em objeto
function classify($tabel) 
{
	$objectFreq = [];
	foreach ($tabel as $letter => $freq) {
		$objectFreq[] = new Node($freq, $letter);
	}

	return $objectFreq;
}

function comprimir($tabela, $objFreq)
{
	foreach ($tabela as $letra => $frequencia) {
		$frequProximo = next($tabela);
		$letraProximo = key($tabela);

		$soma = $frequencia + $frequProximo;
		
    	$letraJunta = $letra . $letraProximo;

    		
    	$objFreq[] = new Node($soma, $letraJunta, $frequProximo, $letraProximo);
		// buscar na objFreq o nó de esq e dir e botar esse nó novo de upper node
		$n->left = $frequProximo;
		$n->right = $letraProximo;
		$n->freq = $soma;

    	unset($tabela[$letraProximo]);
    	unset($tabela[$letra]);
    	asort($tabela);
    
		return $tabela;
		//retornar tabela e objFreq
	}
}

$frequencyTable = generateFrequency($fraseQuebrada);
$obTb = classify($frequencyTable);
$x = comprimir($frequencyTable);

print_r($x);
//BUSCA