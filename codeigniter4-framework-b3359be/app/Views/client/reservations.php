<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE 6 — MES RÉSERVATIONS (client/reservations.php)     ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<?= $this->extend('layouts/client_layout') ?> 
<?= $this->section('content') ?>

<section id="page-mes-reservations">
  <div class="app-wrapper">
    


    <div class="main-content">
      <div class="topbar">
        <span class="topbar-title">Mes réservations</span>
      </div>
      
      <div class="page-content">
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center" role="alert"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="data-card">
          <div class="data-card-header">
            <h3>Toutes mes réservations</h3>
          </div>
          
          <table class="table-custom">
            <thead>
              <tr><th>Ressource</th><th>Date</th><th>Horaire</th><th>Type</th><th>Statut</th><th>Action</th></tr>
            </thead>
            <tbody>
              <?php if (!empty($reservations)): ?>
                <?php foreach ($reservations as $res): ?>
                  <tr>
                    <td class="td-name"><?= esc($res['nom']) ?></td>
                    <td class="td-muted"><?= $res['date'] ?></td>
                    <td class="td-muted"><?= $res['horaire'] ?></td>
                    
                    <td>
                      <?php if ($res['type'] === 'cours'): ?>
                        <span class="creneau-type type-cours" style="font-size:0.68rem;">Cours</span>
                      <?php elseif ($res['type'] === 'salle'): ?>
                        <span class="creneau-type type-salle" style="font-size:0.68rem;">Salle</span>
                      <?php else: ?>
                        <span class="creneau-type type-terrain" style="font-size:0.68rem;">Terrain</span>
                      <?php endif; ?>
                    </td>
                    
                    <td>
                      <?php if ($res['status'] === 'en attente'): ?>
                        <span class="badge-statut s-attente">en attente</span>
                      <?php elseif ($res['status'] === 'confirme' || $res['status'] === 'confirmée'): ?>
                        <span class="badge-statut s-confirmee">confirmée</span>
                      <?php else: ?>
                        <span class="badge-statut s-annulee">annulée</span>
                      <?php endif; ?>
                    </td>
                    
                    <td class="text-center">
  <?php if ($res['status'] === 'en attente' || $res['status'] === 'confirme' || $res['status'] === 'confirmée'): ?>
    <a href="<?= base_url('/reservation/annuler/' . $res['id']) ?>" 
       class="btn-sm-custom btn-cancel" 
       onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
       <i class="bi bi-x-circle"></i> Annuler
    </a>
  <?php else: ?>
    <span style="font-size:0.75rem; color:var(--muted); font-style: italic;">Aucune action</span>
  <?php endif; ?>
</td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" style="text-align: center; color: var(--muted); padding: 2rem;">Aucune réservation enregistrée.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
    
  </div>
</section>

<?= $this->endSection() ?>