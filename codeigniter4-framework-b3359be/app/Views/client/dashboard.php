<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE 5 — DASHBOARD CLIENT (client/dashboard.php)        ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->
<?= $this->extend('layouts/client_layout') ?> <?= $this->section('content') ?>

<section id="page-dashboard-client">
  <div class="app-wrapper">

    <!-- CONTENU -->
    <div class="main-content">
      <div class="topbar">
        <span class="topbar-title">Tableau de bord</span>
        <div class="topbar-actions">
          <a href="#page-creneaux" class="icon-btn" title="Voir les créneaux"><i class="bi bi-plus-lg"></i></a>
        </div>
      </div>

      <div class="page-content">

        <!-- Flash success -->
        <div class="flash-message flash-success">
          <i class="bi bi-check-circle-fill"></i>
          Votre réservation a bien été enregistrée. Elle est en attente de confirmation.
        </div>

        <!-- Métriques -->
        <div class="metrics-row">
          <div class="metric-card">
            <div class="metric-icon yellow"><i class="bi bi-hourglass-split"></i></div>
            <div class="metric-value">2</div>
            <div class="metric-label">En attente</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon green"><i class="bi bi-check-circle-fill"></i></div>
            <div class="metric-value">5</div>
            <div class="metric-label">Confirmées</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon red"><i class="bi bi-x-circle-fill"></i></div>
            <div class="metric-value">1</div>
            <div class="metric-label">Annulées</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon blue"><i class="bi bi-calendar-check"></i></div>
            <div class="metric-value">3</div>
            <div class="metric-label">À venir</div>
          </div>
        </div>

        <!-- Prochains créneaux réservés -->
        <div class="data-card">
          <div class="data-card-header">
            <h3>Mes prochaines réservations</h3>
            <a href="#page-mes-reservations" style="font-size:0.8rem;color:var(--accent);text-decoration:none;">Voir tout →</a>
          </div>
          <table class="table-custom">
            <thead>
              <tr>
                <th>Créneau</th>
                <th>Date</th>
                <th>Horaire</th>
                <th>Statut</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="td-name">Yoga Détente</td>
                <td class="td-muted">Lun 16 juin 2025</td>
                <td class="td-muted">08h00 – 09h30</td>
                <td><span class="badge-statut s-attente">en attente</span></td>
                <td>
                  <button class="btn-sm-custom btn-cancel"><i class="bi bi-x"></i> Annuler</button>
                </td>
              </tr>
              <tr>
                <td class="td-name">Salle musculation</td>
                <td class="td-muted">Mar 17 juin 2025</td>
                <td class="td-muted">10h00 – 12h00</td>
                <td><span class="badge-statut s-confirmee">confirmée</span></td>
                <td><span style="font-size:0.75rem;color:var(--muted);">—</span></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>