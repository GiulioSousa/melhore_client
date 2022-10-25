<!DOCTYPE html>
<html lang="pt-br">
<?php require 'components/head.php'; ?>

<body>
    <?php require 'components/header.php'; ?>
    <main class="main-container">
        <?php require 'components/message.php'; ?>
        <h1 class="section-title">Conteúdo - <?= $clientName; ?></h1>
        <section class="section">
            <?php foreach ($videosHighlight as $video) : ?>
                <h2 class="section-title"><?= $video->getVideoTitle(); ?></h2>
                <div class="section-videobox">
                    <iframe class="video card" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p class="section-text"><?= $video->getVideoDescription(); ?></p>
                <div class="menu__edit-delete">
                    <a href="/editar-video?id=<?= $video->getId(); ?>&tag=<?= $tag[0]; ?>" class=" card btn-delete--content">Editar</a>
                    <a href="/excluir-video?id=<?= $video->getId(); ?>&tag=<?= $tag[0]; ?>" class="card btn-delete--content">Excluir</a>
                </div>
                </li>
            <?php endforeach; ?>
            <button class="item-btn-add">
                <a href="/novo-video?id=<?= $id; ?>&tag=<?= $tag[0]; ?>">
                    <span>Adicionar novo conteúdo</span>
                </a>
            </button>
        </section>
        <div class="division"></div>
        <section class="section">
            <h2 class="section-title">Métricas</h2>
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
                            <td>
                                <div class="metric-menu">
                                    <span class="metric-menu__btn">...</span>
                                    <span class="card metric-menu__btn-close">Fechar</span>
                                    <a href="/editar-metrica?id=<?= $metric->getId(); ?>" class="btn-delete--content card metric-menu__edit">Editar</a>
                                    <a href="/excluir-metrica?id=<?= $metric->getId(); ?>" class="btn-delete--content card metric-menu__delete">Excluir</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="item-btn-add">
                <a href="/nova-metrica?id=<?= $id; ?>" class="btn-add-border">
                    <span>Adicionar novo conteúdo</span>
                </a>
            </button>
        </section>
        <div class="division"></div>
        <section class="section">
            <h2 class="section-title">Diagnóstico</h2>
            <?php foreach ($diagnostics as $diagnostic) : ?>
                <p class="section-text"><?= $diagnostic->getDiagnosticText(); ?></p>
                <div class="menu__edit-delete">
                    <a href="/editar-diagnostico?id=<?= $diagnostic->getId(); ?>" class="btn-delete--content card">Editar</a>
                    <a href="/excluir-diagnostico?id=<?= $diagnostic->getId(); ?>" class="btn-delete--content card">Excluir</a>
                </div>
            <?php endforeach; ?>
            <button class="item-btn-add">
                <a href="/novo-diagnostico?id=<?= $id; ?>" class="btn-add-border">
                    <span>Adicionar novo conteúdo</span>
                </a>
            </button>
        </section>
        <div class="division"></div>
        <section class="section">
            <h2 class="section-title">O que faremos:</h2>
            <ul class="section-list">
                <?php foreach ($videosWhatDo as $video) : ?>
                    <li class="section-videos__item card">
                        <div class="list-videobox">
                            <iframe class="video video-list" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h4 class="section-videos__item-title"><?= $video->getVideoTitle(); ?></h4>
                        <p class="section-videos__item-description"><?= $video->getVideoDescription(); ?></p>
                        <div class="menu__edit-delete list-btn">
                            <a href="/editar-video?id=<?= $video->getId(); ?>&tag=<?= $tag[1]; ?>" class="btn-delete--content card">Editar</a>
                            <a href="/excluir-video?id=<?= $video->getId(); ?>&tag=<?= $tag[1]; ?>" class="btn-delete--content card">Excluir</a>
                        </div>
                    </li>
                <?php endforeach; ?>
                <button class="item-btn-add">
                    <a href="/novo-video?id=<?= $id; ?>&tag=<?= $tag[1]; ?>" class="btn-add-border">
                        <span>Adicionar novo conteúdo</span>
                    </a>
                </button>
            </ul>
        </section>
        <div class="division"></div>
        <section class="section">
            <h2 class="section-title">Como faremos:</h2>
            <ul class="section-list">
                <?php foreach ($videosHowDo as $video) : ?>
                    <li class="section-videos__item card">
                        <div class="list-videobox">
                            <iframe class="video video-list" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h4 class="section-videos__item-title"><?= $video->getVideoTitle(); ?></h4>
                        <p class="section-videos__item-description"><?= $video->getVideoDescription(); ?></p>
                        <div class="menu__edit-delete list-btn">
                            <a href="/editar-video?id=<?= $video->getId(); ?>&tag=<?= $tag[2]; ?>" class="btn-delete--content card">Editar</a>
                            <a href="/excluir-video?id=<?= $video->getId(); ?>&tag=<?= $tag[2]; ?>" class="btn-delete--content card">Excluir</a>
                        </div>
                    </li>
                <?php endforeach; ?>
                <button class="item-btn-add">
                    <a href="/novo-video?id=<?= $id; ?>&tag=<?= $tag[2]; ?>" class="btn-add-border">
                        <span>Adicionar novo conteúdo</span>
                    </a>
                </button>
            </ul>
        </section>
        <div class="division"></div>
        <section class="section">
            <h2 class="section-title">Processos da equipe:</h2>
            <ul class="section-list">
                <?php foreach ($videosTeam as $video) : ?>
                    <li class="section-videos__item card">
                        <div class="list-videobox">
                            <iframe class="video video-list" width="560" height="315" src="https://www.youtube.com/embed/<?= $video->getVideoUrl(); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h4 class="section-videos__item-title"><?= $video->getVideoTitle(); ?></h4>
                        <p class="section-videos__item-description"><?= $video->getVideoDescription(); ?></p>
                        <div class="menu__edit-delete list-btn">
                            <a href="/editar-video?id=<?= $video->getId(); ?>&tag=<?= $tag[3]; ?>" class="btn-delete--content card">Editar</a>
                            <a href="/excluir-video?id=<?= $video->getId(); ?>&tag=<?= $tag[3]; ?>" class="btn-delete--content card">Excluir</a>
                        </div>
                    </li>
                <?php endforeach; ?>
                <button class="item-btn-add">
                    <a href="/novo-video?id=<?= $id; ?>&tag=<?= $tag[3]; ?>" class="btn-add-border">
                        <span>Adicionar novo conteúdo</span>
                    </a>
                </button>
            </ul>
        </section>
        <a href="/excluir-usuario?id=<?= $id; ?>" class="btn-delete card">Excluir Usuário</a>
    </main>
    <?php require 'components/footer.php'; ?>
    <script src="/assets/js/buttons.js"></script>
</body>

</html>