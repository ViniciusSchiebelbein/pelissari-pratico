<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <title>Contato PLSS</title>
</head>
<style>
    body {
        background-color: #fcfcfc !important;
    }
</style>

<body>
    <div class="container">
        <div class="p-3 mb-8 shadow-sm rounded col-md-8 offset-md-2">
            <div class="row">
                <h5>Formulário</h5>
                <p><small>Envie sua mensagem através do formulário abaixo.</small></p>
            </div>
            <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle"></i>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                @if (session('status'))
                <div class="alert alert-{{ session('class') }}" role="alert">
                    <i class="bi {{ session('icon') }}"></i>
                    {{ session('status') }}
                </div>
                @endif
                <form action="/contato" method="post" class="formulario-contato" onsubmit="validarCampos(event)" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="txtNome" class="form-label">Nome Completo *:</label>
                        <input type="text" class="form-control" id="txtNome" name="txtNome" maxlength="80" placeholder="Informe seu nome" value="{{ old('txtNome') }}" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="txtTelefone" class="form-label">Telefone para Contato *:</label>
                            <input type="tel" class="form-control fone" id="txtTelefone" onkeyup="mascara(this, mtel)" name="txtTelefone" maxlength="15" placeholder="(00) 0 0000-0000" value="{{ old('txtTelefone') }}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Número de telefone inválido.
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="txtEmail" class="form-label">E-mail *:</label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" maxlength="60" placeholder="name@exemplo.com" value="{{ old('txtEmail') }}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                E-mail inválido.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txtMensagem" class="form-label">Mensagem *:</label>
                        <textarea class="form-control" id="txtMensagem" name="txtMensagem" rows="3" maxlength="300" required>{{ old('txtMensagem') }}</textarea>
                        <div class="invalid-feedback">
                            Campo obrigatório.
                        </div>
                    </div>
                    <p><small> Campos obrigatórios * </small></p>
                    <div class="d-grid  mx-auto">
                        <button type="submit" class="btn btn-primary">Enviar <i class="bi bi-arrow-right-short"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function validarCampos(event) {
        var form = document.querySelector('.formulario-contato')
        if (!form.checkValidity() || !validarTelefone()) {
            event.preventDefault()
            event.stopPropagation()
            form.classList.add('was-validated')
        }
    }

    function validarTelefone() {
        var inputTelefone = document.querySelector("#txtTelefone").value;
        var foneSemMascara = inputTelefone.replace(/[^0-9]/g, '');
        var totalCaracterFone = inputTelefone.length;
        if (totalCaracterFone < 14 || totalCaracterFone > 15) {
            document.querySelector(".fone").classList.add('is-invalid')
            return false;
        }
        document.querySelector(".fone").classList.remove('is-invalid')
        return true
    }

    /* Máscaras ER */
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }

    function mtel(valor) {
        valor = valor.replace(/\D/g, ""); //Remove tudo o que não é dígito
        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        valor = valor.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return valor;
    }
</script>

</html>