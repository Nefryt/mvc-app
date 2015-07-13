<section class="login-section">

    <h2>Panel logowania</h2><hr>

    <form class="login" action="<?php echo Url::getUrl( 'login', 'login') ?>" method="POST">
        <input class="form-control" type="text" name="login" placeholder="Login">
        <input class="form-control" type="password" name="password" placeholder="Password">
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
    </form><br><br>

    <p class="not_have">Nie masz konta? <a title="Utwórz konto" href="<?php echo Url::getUrl('register', 'register'); ?>">Zarejestruj się!</a></p>

</section>