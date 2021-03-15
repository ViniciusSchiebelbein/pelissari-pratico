<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário email</title>
</head>

<body>
    <h1>Contato via Formulário</h1>
    <p>Nome: {{ $dados->contato_nome }}</p>
    <p>Telefone: {{ substr_replace($dados->contato_telefone,'-',-4,-0) }}</p>
    <p>Email: {{ $dados->contato_email }}</p>
    <p>Mensagem: {{ $dados->contato_msgm }}</p>
</body>

</html>