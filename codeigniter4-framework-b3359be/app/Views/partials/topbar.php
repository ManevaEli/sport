<div class="topbar">

    <span class="topbar-title">
        <?= $title ?? 'Dashboard' ?>
    </span>

    <div class="topbar-actions">

        <?php if(isset($topbarButton)) : ?>

            <a 
                href="<?= $topbarButton['url'] ?>"
                class="icon-btn"
                title="<?= $topbarButton['title'] ?>"
            >
                <i class="<?= $topbarButton['icon'] ?>"></i>
            </a>

        <?php endif; ?>

    </div>

</div>