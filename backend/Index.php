<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

function buscarDadosCEP($cep) {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response);
}

$cep = $_REQUEST['cep'];
// $cep = "06448160";

$dadosCEP = buscarDadosCEP($cep);

if (isset($dadosCEP->erro)) {
    echo json_encode(['erro' => "Erro ao buscar o CEP: {$cep}"]);
} else {
    $map = [
        'cep' => $dadosCEP->cep,
        'logradouro' => $dadosCEP->logradouro,
        'complemento' => $dadosCEP->complemento,
        'bairro' => $dadosCEP->bairro,
        'localidade' => $dadosCEP->localidade,
        'uf' => $dadosCEP->uf,
        'ibge' => $dadosCEP->ibge,
        'gia' => $dadosCEP->gia,
        'ddd' => $dadosCEP->ddd,
        'siafi' => $dadosCEP->siafi
    ];
    echo json_encode($map);
}

// $cep = $_REQUEST['cep'] ?? '';
// $dadosCEP = buscarDadosCEP($cep);

// if (isset($dadosCEP['erro'])) {
//     echo json_encode(['erro' => "Erro ao buscar o CEP: {$cep}"]);
// } else {
//     $map = array_intersect_key($dadosCEP, array_flip([
//         'cep', 'logradouro', 'complemento', 'bairro', 
//         'localidade', 'uf', 'ibge', 'gia', 'ddd', 'siafi'
//     ]));
//     echo json_encode($map);
// }

?>


