<?php if (isset($_SESSION['typeMessage'])) : ?>
    <div class="card message message--<?= $_SESSION['typeMessage']; ?>"><?= $_SESSION['message']; ?></div>
<?php endif; ?>
<?php unset($_SESSION['typeMessage']); ?>