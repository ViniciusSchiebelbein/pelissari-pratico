<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Contato</title>
</head>

<body>
    <div class="container shadow-sm p-3 mb-5 bg-body rounded">
        <div class="row">
            <h5>Formulário</h5>
            <p><small>Utilize o formulário para entrar em contato conosco.</small></p>
        </div>
        <div class="row">
            <form action="/contato" method="post">
                @csrf
                <div class="mb-3">
                    <label for="txtNome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Informe seu nome">
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="txtTelefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="(00) 0 0000-0000">
                    </div>
                    <div class="col mb-3">
                        <label for="txtEmail" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="name@examplo.com">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="txtMensagem" class="form-label">Mensagem:</label>
                    <textarea class="form-control" id="txtMensagem" name="txtMensagem" rows="3"></textarea>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
