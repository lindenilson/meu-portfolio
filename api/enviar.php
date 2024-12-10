<?php
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Dados de conexão com o banco de dados
$host = 'localhost';
$dbname = 'portfolio';
$user = 'root';
$password = '';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Salva os dados no banco de dados
    $stmt = $pdo->prepare("INSERT INTO mensagens (nome, email, telefone, mensagem) VALUES (:nome, :email, :telefone, :mensagem)");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':mensagem' => $mensagem
    ]);

    // Configuração do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP do Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'dev.lindenilson@gmail.com'; // Seu e-mail
        $mail->Password = 'hpqo nlnv dgth pzqe'; // Senha do aplicativo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuração do e-mail
        $mail->setFrom($email, $nome); // De quem está enviando
        $mail->addAddress('dev.lindenilson@gmail.com'); // Para onde será enviado
        $mail->Subject = 'Contato portfolio';
        $mail->Body = "Nome: $nome\nTelefone: $telefone\nE-mail: $email\nMensagem: $mensagem";

        // Envia o e-mail
        $mail->send();

        // Redireciona para a página de sucesso
        header('Location: ../sucesso.html');
        exit;
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
} catch (PDOException $e) {
    echo "Erro ao salvar os dados: " . $e->getMessage();
}
?>

