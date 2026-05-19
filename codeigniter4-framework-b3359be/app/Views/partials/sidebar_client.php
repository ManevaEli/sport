<aside class="sidebar">

    <div class="sidebar-logo">
        Fit<span>Space</span>
    </div>

    <div class="sidebar-section">
        Menu
    </div>

    <ul class="sidebar-nav">

        <li>
            <a href="<?= base_url('/client') ?>" class="<?= url_is('dashboard') ? 'active' : '' ?>">
                <i class="bi bi-grid-1x2-fill"></i>
                Tableau de bord
            </a>
        </li>

                <li>
            <a href="<?= base_url('/calendar') ?>" class="<?= url_is('calendar') ? 'active' : '' ?>">
                <i class="bi bi-calendar-event"></i>
                Planning interactif
            </a>
        </li>

        <li>
            <a href="<?= base_url('/creneaux') ?>" class="<?= url_is('creneaux') ? 'active' : '' ?>">
                <i class="bi bi-calendar3"></i>
                Voir les créneaux
            </a>
        </li>

        <li>
        <a href="<?= base_url('/reservations') ?>" class="<?= url_is('reservations') ? 'active' : '' ?>">
                <i class="bi bi-bookmark-check-fill"></i>
                Mes réservations
            </a>
        </li>

        <li>
            <a href="<?= base_url('/profil') ?>" class="<?= url_is('profil') ? 'active' : '' ?>">
                <i class="bi bi-person-fill"></i>
                Mon profil
            </a>
        </li>

    </ul>

    <div class="sidebar-footer">

        <div class="sidebar-user">

            <div class="avatar">
                JD
            </div>

            <div class="user-info">
                <div class="name">Jean Dupont</div>
                <div class="role">Client</div>
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