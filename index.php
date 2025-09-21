<?php


require_once 'classes/User.php';
require_once 'classes/UserRepository.php';
require_once 'classes/UserValidator.php';
require_once 'classes/UserManager.php';


$userRepository = new UserRepository();
$userValidator = new UserValidator();
$userManager = new UserManager($userRepository, $userValidator);


echo "<h1>Testes de Autenticação</h1>";

echo "<h2>1. Cadastro Válido</h2>";
try {
    $user = $userManager->register('Maria Oliveira', 'maria@email.com', 'Senha123');
    echo "<p style='color: green;'>Usuário cadastrado com sucesso! ID: {$user->id}</p>";
} catch (InvalidArgumentException $erro) {
    echo "<p style='color: red;'>Erro: " . $erro->getMessage() . "</p>";
}

echo "<h2>2. Cadastro com E-mail Inválido</h2>";
try {
    $userManager->register('Pedro', 'pedro@@email', 'Senha123');
} catch (InvalidArgumentException $erro) {
    echo "<p style='color: red;'>Erro: " . $erro->getMessage() . "</p>";
}

echo "<h2>3. Cadastro com E-mail Duplicado</h2>";
try {
    $userManager->register('João Duplicado', 'joao@email.com', 'Senha456');
} catch (InvalidArgumentException $erro) {
    echo "<p style='color: red;'>Erro: " . $erro->getMessage() . "</p>";
}

echo "<h2>4. Tentativa de Login com Senha Errada</h2>";
try {
    $userManager->login('joao@email.com', 'Errada123');
} catch (InvalidArgumentException $erro) {
    echo "<p style='color: red;'>Erro: " . $erro->getMessage() . "</p>";
}

echo "<h2>5. Reset de Senha Válido</h2>";
try {
    $user = $userManager->resetPassword(1, 'NovaSenha1');
    echo "<p style='color: green;'>Senha do usuário {$user->name} alterada com sucesso!</p>";
} catch (InvalidArgumentException $erro) {
    echo "<p style='color: red;'>Erro: " . $erro->getMessage() . "</p>";
}

?>