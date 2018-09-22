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
function classify($tabela) 
{
	$objectFreq = [];
	foreach ($tabela as $letter => $freq) {
		$objectFreq[] = new Node($freq, $letter);
	}

	return $objectFreq;
}

function diminuir($tabela)
{
	foreach ($tabela as $letra => $frequencia) {
		$proximo = next($tabela);
		$letraProximo = key($tabela);
		echo $letraProximo;
		die;
		$soma = $frequencia + $proximo;
		
		$tabela[$letra] = 
		[ 
			$letra . $letraProximo,
			$soma,
		];

    	unset($tabela[$letraProximo]);
    	unset($tabela[$letra]);
    	$tabela[$letra . $letraProximo] = $soma;
    	asort($tabela);
		return $tabela;
	}
}

$frequencyTable = generateFrequency($fraseQuebrada);
$obTb = classify($frequencyTable);
$x = diminuir($frequencyTable);
$arrayCount = count($frequencyTable);

for ($i = $arrayCount; $i >= 2; $i--) {
	$x = diminuir($x);
}

print_r($x);
/*
echo "<br>";

$tabelaAux = [];




}
echo "<br>";
foreach ($tabelaAux as $letra => $num) {
	echo $letra . ' [ 0 : '  . $tabelaAux[$letra][0] . 
	              ' - 1 : ' . $tabelaAux[$letra][1] . ' ] ';
	echo "<br>";
}

print_r($tabelaAux);
*/