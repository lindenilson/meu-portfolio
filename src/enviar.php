<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém e sanitiza os dados do formulário
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    // Validação básica para campos obrigatórios
    if (empty($nome) || empty($email)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Configurações de e-mail (substitua com suas informações)
        $to = "dev.lindenilson@gmail.com"; // Altere para o seu e-mail
        $subject = "Nova mensagem de contato do portfólio";
        $body = "Nome: $nome\nEmail: $email\nTelefone: $telefone\n\nMensagem:\n$mensagem";
        $headers = "From: $email";

        // Envia o e-mail e verifica se foi enviado com sucesso
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Houve um erro ao enviar a mensagem. Tente novamente mais tarde.";
        }
    }
} else {
    echo "Formulário não enviado corretamente.";
}
?>