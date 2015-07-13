<section class="login-section">

    <h2>Rejestracja</h2><hr>

    <form class="login" action="<?php echo Url::getUrl('register', 'register'); ?>" method="POST">
        <input class="form-control" type="email" name="email" placeholder="Adres e-mail">
        <input class="form-control" type="text" name="login" placeholder="Login">
        <input class="form-control" type="password" name="password" placeholder="Hasło">
        <button class="btn btn-primary" type="submit">Zapisz</button>
    </form>

    <p class="not_have">Masz już konto? <a title="Zaloguj się" href="<?php echo Url::getUrl('login', 'login'); ?>">Zaloguj się!</a></p>

</section>