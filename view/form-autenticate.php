<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container card-container">
        <section class="section card">
            <form class="form" action="/validar-acesso" method="post" enctype="multipart/form-data">
                <h3 class="section-title"><?= isset($user) ? 'Editar conta' : 'Nova conta'; ?></h3>
                <div class="form__area">
                    <div class="form__field form__img">
                        <div class="input__img">
                            <img src="../assets/img/<?= $user->getPhotoName() !== null ? $user->getPhotoName() : 'profile-blank.png'; ?>" alt="" class="account__profile">
                        </div>
                    </div>
                    <div class="form__field">
                        <p class="form__label">Confirme sua senha</p>
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
                        <input type="submit" name="save" value="Salvar" class="form__btn-submit">
                    </div>
                </div>
            </form>
        </section>
    </main>
    <?php require 'components/footer.php'; ?>
</body>

</html>