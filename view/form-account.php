<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container card-container">
        <section class="section card">
            <form class="form" action="/salvar-conta" method="post" enctype="multipart/form-data">
                <h3 class="form__title"><?= isset($user) ? 'Editar conta' : 'Nova conta'; ?></h3>
                <div class="form__area">
                    <div class="form__field form__img">
                        <div class="input__img">
                            <input type="file" name="file" id="file">
                            <label for="file" class="account__profile-link">Alterar imagem</label>
                            <img src="../assets/img/<?= $user->getPhotoName() !== null ? $user->getPhotoName() : 'profile-blank.png'; ?>" alt="" class="account__profile">
                        </div>
                    </div>
                    <?php require 'components/message.php'; ?>
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="text" name="user_name" value="<?= isset($user) ? $user->getUserName() : ''; ?>" required>
                            <label for="user_name" class="form__label">Nome de usuário</label>
                            <span class="form__line"></span>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="email" name="email" value="<?= isset($user) ? $user->getEmail() : ''; ?>" required>
                            <label for="email" class="form__label">E-mail</label>
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
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="password" name="confirm_password" required>
                            <label for="password" class="form__label">Confirmar senha</label>
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
    <script src="../assets/js/header.js"></script>
    <!-- <script src="../assets/js/photo.js"></script> -->
</body>

</html>