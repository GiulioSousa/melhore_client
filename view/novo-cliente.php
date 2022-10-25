<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container">
        <section class="card">
            <form class="form" action="/inserir-usuario" method="post">
                <h3 class="form__title">Novo Usuário</h3>
                <?php require 'components/message.php'; ?>
                <div class="form__area">
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="text" name="user_name" required>
                            <label for="user_name" class="form__label">Nome de usuário</label>
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
                        <input type="submit" value="Salvar" class="form__btn-submit">
                    </div>
                </div>
            </form>
        </section>
    </main>
    <?php require 'components/footer.php' ?>
</body>

</html>