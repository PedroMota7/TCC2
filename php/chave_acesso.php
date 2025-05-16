<?php
    session_start();
    $chave_acesso = 'adm';

    if (isset($_POST['chave']) && $_POST['chave'] === $chave_acesso) {
        $_SESSION['autenticado'] = true;
        header('Location: ../pages/cadastro_adm.html');

        exit;
    } else {
        echo
        "<script>
            alert('Chave incorreta, tente novamente!');
            window.location.href = '../pages/chave_acesso.html';
        </script>";
        
    }

?>
