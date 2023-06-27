<form action="index.php?c=definicoes&a=updateEmail" method="post" class="mt-2">
    <div class="mb-2">
        <label for="currrent_mail">Email Atual</label>
        <input type="email" class="form-control" name="current_email" id="current_email" value="<?=$_SESSION['email'] ?>" readonly>
    </div>
    <div class="mb-2">
        <label for="new_email">Novo Email</label>
        <input type="email" name="new_email" id="new_email" class="form-control" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Guardar Email">
</form>