<?php

foreach ($articles as $article): ?>
    <h2> <?= $article->getTitle()?></h2>
    <time><?= $article->getDate() ?></time>
<?php endforeach; ?>