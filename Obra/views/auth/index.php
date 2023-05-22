<h1 class="center"><b>Login</b></h1>

<?php
if(isset($erro))
{
    echo "Erro: " . $erro;
}
?>
<form action="index.php?c=auth&a=login" method="POST">
    <label for="name">Nome</label>
    <input type="text" id="name" name="name"><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <input type="submit">
</form>

</html>