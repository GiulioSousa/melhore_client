<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php' ?>
    <main class="main-container card-container">
        <section class="section card">
            <h3 class="section-title">Informações da conta</h3>
            <div class="account__container">
                <img src="../assets/img/<?= $user->getPhotoName() !== null ? $user->getPhotoName() : 'profile-blank.png'; ?>" alt="" class="account__profile">
                <div class="account__field">
                    <h3 class="account__title">Nome de usuário</h3>
                    <p class="account__description"><?= $user->getUserName(); ?></p>
                </div>
                <div class="account__field">
                    <h3 class="account__title">E-mail</h3>
                    <p class="account__description"><?= $user->getEmail() !== null ? $user->getEmail() : 'Nenhum email cadastrado'; ?></p>
                </div>
            </div>
            <div class="btn-form__container">
                <a href="/editar-conta" class="card btn-form">Editar Perfil</a>
            </div>
        </section>
    </main>
    <?php require 'components/footer.php' ?>
    </script>
</body>

</html>