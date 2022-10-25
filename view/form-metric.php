<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container card-container">
        <section class="section card">
            <form class="form" action="/<?= isset($metric) ? 'atualizar-metrica' : 'adicionar-metrica'; ?>?id=<?= $id; ?>" method="post">
                <h3 class="section-title"><?= isset($metric) ? 'Editar Métrica' : 'Nova Métrica'; ?></h3>
                <div class="form__area">
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="date" name="date" value="<?= isset($metric) ? $metric->getFormattedDate() : ''; ?>" required>
                            <label for="date" class="form__label">Data</label>
                            <span class="form__line"></span>
                        </div>
                    </div>
                    <div class="form__field">
                        <div class="form__input-box">
                            <input type="number" name="metric" value="<?= isset($metric) ? $metric->getMetricData() : ''; ?>" required>
                            <label for="metric" class="form__label">Métrica</label>
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