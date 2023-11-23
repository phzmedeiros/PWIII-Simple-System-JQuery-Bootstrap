<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin:*');

include 'conexao.php';

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
$id = $post['carro_id'];
$dados = array (
    'carro_modelo' => $post['carro_modelo'],
    'carro_placa' => $post['carro_placa']
);
foreach ($dados as $Key => $Value):
    $placeKey[] = $Key . ' = :' . $Key;
endforeach;
$places = implode(', ', $placeKey);

$tabela = 'carro';
$referencia = 'carro_id';
$update = "update {$tabela} set {$places} where {$referencia} = {$id}";
$sth = $pdo->prepare($update);
if($sth ->execute($dados)):
    $json ['error'] = 'success';
    $json ['msg'] = 'Cadastro efetuado com sucesso';
else:
    $json ['error'] = 'error insert';
    $json ['msg'] = 'Não foi possível efetuar o cadastro';
endif;

echo json_encode($json);
