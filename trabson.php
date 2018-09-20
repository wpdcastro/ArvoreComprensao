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

$frequencyTable = generateFrequency($fraseQuebrada);
$obTb = classify($frequencyTable);


public function diminuir($obj)
{
	$i = 0;
	do {

		$obj[$i]->getFreq();

	} while();
}
/*
echo "<br>";

$tabelaAux = [];


foreach ($tabela as $letra => $frequencia) {
	if ($letra != $letraProximo) {
		$proximo = next($tabela);
		$letraProximo = key($tabela);
		$soma = $frequencia + $proximo;
		
		$tabelaAux[$soma] = 
		[ 
			0 => $letra,
			1 => $letraProximo,
		];
    	unset($tabela[$letraProximo]);
    	unset($tabela[$letra]);
    	$tabela[$letra . $letraProximo] = $soma;
    	asort($tabela);
		print_r($tabela); echo "<br>";
	}

}
echo "<br>";
foreach ($tabelaAux as $letra => $num) {
	echo $letra . ' [ 0 : '  . $tabelaAux[$letra][0] . 
	              ' - 1 : ' . $tabelaAux[$letra][1] . ' ] ';
	echo "<br>";
}

print_r($tabelaAux);
*/