<form method="post" action="../Controllers/UsuariosController.php?action=login" name="signin-form">
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="Usuario" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="Password" required />
    </div>
    <button type="submit" name="login" value="Ingresar">Ingresar</button>
</form>