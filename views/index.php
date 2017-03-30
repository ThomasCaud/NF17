<div class="row">
    <?php foreach ($links as $link): ?>
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item disabled"><?= $link['label'] ?> <?php if (isset($link['number'])): ?><span class="badge"><?= $link['number']  ?></span><?php endif; ?></a>
                <?php foreach ($link['actions'] as $label => $link): ?>
                    <a href="<?= $link ?>" class="list-group-item"><?= $label ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
