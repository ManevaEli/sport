<?= $this->extend('layouts/admin_layout') ?> <?= $this->section('content') ?>
<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE 8 — ADMIN CRÉNEAUX (admin/creneaux.php)            ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<section id="page-admin-creneaux">
  <div class="app-wrapper">

    <div class="main-content">
      <div class="topbar">
        <span class="topbar-title">Gestion des créneaux</span>
      </div>

      <div class="page-content">

        <!-- Flash info -->
        <div class="flash-message flash-info">
          <i class="bi bi-info-circle-fill"></i>
          Créneau mis à jour avec succès.
        </div>

        <!-- Formulaire ajout créneau -->
        <div class="form-section">
          <h3><i class="bi bi-plus-circle" style="color:var(--accent);margin-right:6px;"></i>Ajouter un créneau</h3>
          <form>
            <div class="form-grid-2" style="margin-bottom:1rem;">
              <div class="form-group">
                <label class="form-label">Ressource</label>
                <select class="select-custom">
                  <option>Salle Zen</option>
                  <option>Salle Cross</option>
                  <option>Terrain squash A</option>
                  <option>Bloc Muscu</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Nombre de places</label>
                <input type="number" class="form-control" value="10" min="1" />
              </div>
              <div class="form-group">
                <label class="form-label">Date et heure de début</label>
                <input type="datetime-local" class="form-control" value="2025-06-16T08:00" />
              </div>
              <div class="form-group">
                <label class="form-label">Date et heure de fin</label>
                <input type="datetime-local" class="form-control" value="2025-06-16T09:30" />
              </div>
            </div>
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
              <button type="submit" class="btn-submit"><i class="bi bi-plus"></i> Ajouter le créneau</button>
              <button type="reset" class="btn-secondary-custom">Réinitialiser</button>
            </div>
          </form>
        </div>

        <!-- Liste des créneaux -->
        <div class="data-card">
          <div class="data-card-header">
            <h3>Tous les créneaux</h3>
            <span style="font-size:0.8rem;color:var(--muted);"><?=$total?> créneaux</span>
          </div>
          <table class="table-custom">
            <thead>
              <tr>
                <th>Ressource</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Places dispo</th>
                <th>Actif</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php if(!empty($creneaux)): ?>
              <?php foreach($creneaux as $creneau) : ?>
              <tr>
                <td class="td-name">
                  <?= esc($creneau['titre']) ?> 
                  <span class="creneau-type type-cours" style="font-size:0.65rem;margin-left:5px;">
                    <?= esc($creneau['type']) ?>
                  </span>
                </td>
                <td class="td-muted"><?= $creneau['date_jour'] ?> · <?= $creneau['heure_debut'] ?></td>
                <td class="td-muted"><?= $creneau['date_jour'] ?> · <?= $creneau['heure_fin'] ?></td>
                <td>
                  <span class="<?= $creneau['est_complet'] ? 'text-danger fw-bold' : '' ?>">
                    <?= $creneau['places_restantes'] ?>
                  </span> / <?= $creneau['capacite_totale'] ?>
                </td>
                <td>
                  <?php if($creneau['actif'] == 1): ?>
                    <span class="badge-statut s-confirmee" style="font-size:0.68rem;">Oui</span>
                  <?php else: ?>
                    <span class="badge-statut s-annulee" style="font-size:0.68rem; background-color: var(--danger);">Non</span>
                  <?php endif; ?>
                </td>
                <td>
                  <div class="action-btns">
                    <button class="btn-sm-custom btn-edit"><i class="bi bi-pencil"></i> Éditer</button>
                    <button class="btn-sm-custom btn-del"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" style="text-align: center; color: var(--muted); padding: 2rem;">
                  Aucun créneau disponible pour le moment.
                </td>
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