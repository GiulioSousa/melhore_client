<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container">
        <?php require 'components/message.php'; ?>
        <section class="section">
            <?php foreach ($videosHighlight as $videoHighlight) : ?>
                <h1 class="section-title"><?= $videoHighlight->getVideoTitle(); ?></h1>
                <div class="section-videobox">
                    <iframe class="video card" width="560" height="315" src="https://www.youtube.com/embed/<?= $videoHighlight->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p class="section-text"><?= $videoHighlight->getVideoDescription(); ?></p>
            <?php endforeach; ?>
        </section>
        <div class="section-highlight__logo">
            <img src="/assets/img/logo-transp.png" alt="" class="section-highlight__logo-img">
        </div>
        <section class="section" id="laudo">
            <h2 class="section-title">Dados do Cliente</h2>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Métrica</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($metrics as $metric) : ?>
                        <tr>
                            <td><?= $metric->getFormattedDate(); ?></td>
                            <td><?= $metric->getMetricData(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3 class="section-title">Diagnóstico</h3>
            <?php foreach ($diagnostics as $diagnostic) : ?>
                <p class="section-text"><?= $diagnostic->getDiagnosticText(); ?></p>
            <?php endforeach; ?>
        </section>
        <section class="section" id="o-que-faremos">
            <h3 class="section-title">O que faremos</h3>
            <?php foreach ($videosWhatDo as $video) : ?>
                <article class="section-videos__item card">
                    <div class="list-videobox">
                        <iframe class="video video-list" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <h4 class="section-videos__item-title"><?= $video->getVideoTitle(); ?></h4>
                    <p class="section-videos__item-description"><?= $video->getVideoDescription(); ?></p>
                </article>
            <?php endforeach; ?>
        </section>
        <section class="section" id="como-faremos">
            <h3 class="section-title">Como faremos</h3>
            <?php foreach ($videosHowDo as $video) : ?>
                <article class="section-videos__item card">
                    <div class="list-videobox">
                        <iframe class="video video-list" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <h4 class="section-videos__item-title"><?= $video->getVideoTitle(); ?></h4>
                    <p class="section-videos__item-description"><?= $video->getVideoDescription(); ?></p>
                </article>
            <?php endforeach; ?>
        </section>
        <section class="section" id="equipe">
            <h3 class="section-title">Processos da equipe</h3>
            <?php foreach ($videosTeam as $video) : ?>
                <article class="section-videos__item card">
                    <div class="list-videobox">
                        <iframe class="video video-list" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <h4 class="section-videos__item-title"><?= $video->getVideoTitle(); ?></h4>
                    <p class="section-videos__item-description"><?= $video->getVideoDescription(); ?></p>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
    <?php require 'components/footer.php'; ?>
</body>

</html>