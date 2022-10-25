<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['title']; ?></title>
    <?php if (isset($_SESSION['description'])) : ?>
    <meta name="description" content="<?= $_SESSION['description']; ?>">
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/login-responsive.css">
</head>

<body>
    <main class="container">
        <section class="card">
            <form action="/validar-login" method="post" class="form">
                <h3 class="form__title">Área do Cliente</h3>
                <?php require 'components/message.php'; ?>
                <div class="form__area">
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="text" name="login" required>
                            <label for="login" class="form__label">Login</label>
                            <span class="form__line"></span>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="password" name="password" required>
                            <label for="password" class="form__label">Senha</label>
                            <span class="form__line"></span>
                        </div>
                    </div>
                </div>
                <div class="form__area">
                    <div class="form__field">
                        <input type="submit" class="form__btn-submit" name="acao" value="Entrar">
                    </div>
                </div>
            </form>
        </section>
        <div class="bg-img bg-img--logo"></div>
        <div class="bg-img bg-img--simbolo"></div>
    </main>
</body>

</html>