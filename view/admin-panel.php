<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container">
        <ul class="client-list">
            <?php require 'components/message.php'; ?>
            <?php foreach ($clients as $client) : ?>
                <li class="client-card card">
                    <a href="/cliente-info?id=<?= $client->getId(); ?>" class="client-card__link">
                        <img src="/assets/img/<?= $client->getPhotoName(); ?>" alt="" class="client-card__img">
                        <h3 class="client-card__title"><?= $client->getUserName(); ?></h3>
                        <span class="client-card__description">Clique para mais informações</span>
                    </a>
                </li>
            <?php endforeach; ?>
            <li class="client-card client-card--new card">
                <a href="/novo-cliente" class="client-card__link">
                    <img src="/assets/img/profile-blank.png" alt="" class="client-card__img">
                    <h3 class="client-card__title">Novo Cliente</h3>
                </a>
            </li>
        </ul>
    </main>
    <?php require 'components/footer.php'; ?>
</body>

</html>