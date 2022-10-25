<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container card-container">
        <section class="section card">
            <form class="form" action="/<?= isset($diagnostic) ? 'atualizar-diagnostico' : 'adicionar-diagnostico'; ?>?id=<?= $id; ?>" method="post">
            <h3 class="section-title"><?= isset($diagnostic) ? 'Editar diagnóstico' : 'Novo Diagnóstico'?></h3>
            <div class="form__area">
                <div class="form__field">
                    <div class="form__input-box">
                        <input type="textarea" name="diagnostic" value="<?= isset($diagnostic) ? $diagnostic->getDiagnosticText() : ''; ?>" required>
                        <label for="diagnostic" class="form__label">Diagnóstico</label>
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
    <script src="/assets/js/header.js"></script>
</body>

</html>