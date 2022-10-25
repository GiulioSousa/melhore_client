<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container card-container">
        <section class="section card">
            <form class="form" action="/<?= isset($video) ? 'atualizar-video?id=' . $video->getId() : 'adicionar-video?id=' . $id; ?>&tag=<?= $tag; ?>" method="post">
                <h3 class="section-title"><?= isset($video) ? 'Editar Vídeo' : 'Adicionar Video'; ?></h3>
                <?php require 'components/message.php'; ?>
                <div class="form__area">
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="text" name="video_title" value="<?= isset($video) ? $video->getVideoTitle() : ''; ?>" required>
                            <label for="video_title" class="form__label">Título do Vídeo</label>
                            <span class="form__line"></span>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="text" name="video_description" value="<?= isset($video) ? $video->getVideoDescription() : ''; ?>" required>
                            <label for="video_description" class="form__label">Descrição</label>
                            <span class="form__line"></span>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="text" name="video_url" value="<?= isset($video) ? $video->getVideoUrl() : ''; ?>" required>
                            <label for="video_url" class="form__label">URL do video</label>
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
    <?php require 'components/footer.php'; ?>
</body>

</html>