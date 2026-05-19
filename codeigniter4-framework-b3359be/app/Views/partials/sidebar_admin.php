<aside class="sidebar">

    <div class="sidebar-logo">
        Fit<span>Space</span>

        <span
            style="
                font-size:0.6rem;
                background:var(--accent);
                color:#fff;
                padding:2px 6px;
                border-radius:4px;
                vertical-align:middle;
            "
        >
            Admin
        </span>
    </div>

    <div class="sidebar-section">
        Gestion
    </div>

    <ul class="sidebar-nav">

        <li>
            <a href="<?= base_url('/admin') ?>" class="<?= url_is('admin') ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i>
                Vue d'ensemble
            </a>
        </li>

        <li>
            <a href="<?= base_url('/admin/reservations') ?>" class="<?= url_is('admin/reservations') ? 'active' : '' ?>">
                <i class="bi bi-bookmark-star-fill"></i>
                Réservations
            </a>
        </li>

        <li>
            <a href="<?= base_url('/admin/creneaux') ?>" class="<?= url_is('admin/creneaux*') ? 'active' : '' ?>">
                <i class="bi bi-calendar-week-fill"></i>
                Créneaux
            </a>
        </li>

        <li>
            <a href="<?= base_url('/admin/clients') ?>" class="<?= url_is('admin/clients') ? 'active' : '' ?>">
                <i class="bi bi-people-fill"></i>
                Clients
            </a>
        </li>

    </ul>

    <div class="sidebar-footer">

        <div class="sidebar-user">

            <div class="avatar" style="background:#0f3460;">
                AD
            </div>

            <div class="user-info">
                <div class="name">Admin</div>
                <div class="role">Administrateur</div>
            </div>

            <a
                href="<?= base_url('/logout') ?>"
                style="margin-left:auto;color:rgba(255,255,255,0.3);font-size:1.1rem;"
            >
                <i class="bi bi-box-arrow-right"></i>
            </a>

        </div>

    </div>

</aside>