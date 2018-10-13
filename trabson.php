<?php 
require ("Node.php");

	$string = 'ABRACADABRA';
	$string1 = 'ABRACADABRA SIM SALABIN BIM BIM';
	$arvore = [];
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
/*
function classify($tabel) 
{
	$objectFreq = [];
	foreach ($tabel as $letter => $freq) {
		$objectFreq[] = new Node($freq, $letter);
	}

	return $objectFreq;
}
*/
function comprimir($tabela)
{
	foreach ($tabela as $letra => $frequencia) {
		
		$frequProximo = next($tabela);
		$letraProximo = key($tabela);

		$soma = $frequencia + $frequProximo;
		
    	$letraJunta = $letra . $letraProximo;
		// novo nó. o Nó recebe parametros da arvore 
    	// se ajudar, colocar mais um campo de numero para a busca
    	$arvore[] = new Node($soma, $letraJunta, $letraProximo, $letra);
		echo "<br>";
    	print_r($arvore);
		echo "<br><br><br>";
		// buscar na objFreq o nó de esq e dir e botar esse nó novo de upper node
		$tabela[$letraJunta] = $soma;
    	unset($tabela[$letraProximo]);
    	unset($tabela[$letra]);
    	//var_dump($tabela);
    	asort($tabela);
		
		return $tabela; //retornar tabela de frequencia atualizada
		
	}
}

$tabelaFreq = generateFrequency($fraseQuebrada);

$tabelaAtualizada = comprimir($tabelaFreq);
print_r($tabelaAtualizada);
while(count($tabelaAtualizada) != 1) {
	$tabelaAtualizada = comprimir($tabelaAtualizada);
}
echo "<br>";
var_dump($arvore);
echo "<br>";

//BUSCA