<?php include 'layouts/header.php';

$data_nascimento = $_POST['data_nascimento'] ?? null;

if (!$data_nascimento) {
    echo "Erro: Data de nascimento não informada";
    exit;
}

$signos = simplexml_load_file("signos.xml");
if (!$signos) {
    echo "Erro: Não foi possível carregar o arquivo de signos";
    exit;
}

$data_nascimento = str_replace('/', '-', $data_nascimento);
$data_nascimento_obj = DateTime::createFromFormat('Y-m-d', $data_nascimento);

if (!$data_nascimento_obj || !checkdate($data_nascimento_obj->format('m'),
    $data_nascimento_obj->format('d'), $data_nascimento_obj->format('Y'))) {
    echo "Erro: Data de nascimento inválida";
    exit;
}

$dia_nascimento = $data_nascimento_obj->format('d');
$mes_nascimento = $data_nascimento_obj->format('m');

$signo_encontrado = null;
foreach ($signos->signo as $signo) {
    $data_inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
    $data_fim = DateTime::createFromFormat('d/m', $signo->dataFim);

    if (isWithinRange($dia_nascimento, $mes_nascimento, $data_inicio, $data_fim)) {
        $signo_encontrado = $signo;
        break;
    }
}

if ($signo_encontrado) {
    echo "<div class='container'><h1>{$signo_encontrado->signoNome}</h1>";
    echo "<p>{$signo_encontrado->descricao}</p>";
    echo "<button onclick='window.history.back()' class='back-button'>Voltar</button></div>";
} else {
    echo "<div class='error-message'>Erro: Data de nascimento não informada";
}
function isWithinRange($dia, $mes, $dataInicio, $dataFim) {
    $diaInicio = $dataInicio->format('d');
    $mesInicio = $dataInicio->format('m');
    $diaFim = $dataFim->format('d');
    $mesFim = $dataFim->format('m');

    return ($mes == $mesInicio && $dia >= $diaInicio) ||
           ($mes == $mesFim && $dia <= $diaFim) ||
           ($mes > $mesInicio && $mes < $mesFim);
}