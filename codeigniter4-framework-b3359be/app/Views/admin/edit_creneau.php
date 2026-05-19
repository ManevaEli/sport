<?= $this->extend('layouts/admin_layout') ?> <?= $this->section('content') ?>
<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE — ÉDITION CRÉNEAU (admin/edit_creneau.php)        ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<section id="page-edit-creneau">

  <div class="app-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

      <div class="sidebar-logo">
        Fit<span>Space</span>
        <span style="font-size:0.6rem;background:var(--accent);color:#fff;padding:2px 6px;border-radius:4px;vertical-align:middle;">
          Admin
        </span>
      </div>

      <ul class="sidebar-nav" style="margin-top:1rem;">

        <li>
          <a href="#page-dashboard-admin">
            <i class="bi bi-speedometer2"></i>
            Vue d'ensemble
          </a>
        </li>

        <li>
          <a href="#page-admin-reservations">
            <i class="bi bi-bookmark-star-fill"></i>
            Réservations
          </a>
        </li>

        <li>
          <a href="#page-admin-creneaux" class="active">
            <i class="bi bi-calendar-week-fill"></i>
            Créneaux
          </a>
        </li>

        <li>
          <a href="#page-admin-clients">
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

        </div>
      </div>

    </aside>

    <!-- CONTENU -->
    <div class="main-content">

      <!-- TOPBAR -->
      <div class="topbar">

        <span class="topbar-title">
          Modifier un créneau
        </span>

        <div class="topbar-actions">

          <a href="#page-admin-creneaux" class="icon-btn" title="Retour">
            <i class="bi bi-arrow-left"></i>
          </a>

        </div>

      </div>

      <!-- PAGE CONTENT -->
      <div class="page-content">

        <!-- Flash message -->
        <div class="flash-message flash-info">

          <i class="bi bi-pencil-square"></i>

          Modification du créneau : 
          <strong>Yoga Détente</strong>

        </div>

        <!-- FORMULAIRE -->
        <div class="form-section">

          <h3>
            <i class="bi bi-pencil-fill" style="color:var(--accent);margin-right:6px;"></i>
            Éditer les informations du créneau
          </h3>

          <form>

            <div class="form-grid-2">

              <!-- Nom -->
              <div class="form-group">
                <label class="form-label">Nom du créneau</label>

                <input 
                  type="text"
                  class="form-control"
                  value="Yoga Détente"
                />
              </div>

              <!-- Type -->
              <div class="form-group">

                <label class="form-label">Type</label>

                <select class="select-custom">
                  <option selected>Cours collectif</option>
                  <option>Salle</option>
                  <option>Terrain</option>
                </select>

              </div>

              <!-- Ressource -->
              <div class="form-group">

                <label class="form-label">Ressource</label>

                <select class="select-custom">
                  <option selected>Salle Zen</option>
                  <option>Salle Cross</option>
                  <option>Bloc Muscu</option>
                  <option>Terrain squash A</option>
                </select>

              </div>

              <!-- Places -->
              <div class="form-group">

                <label class="form-label">Nombre de places</label>

                <input 
                  type="number"
                  class="form-control"
                  value="10"
                  min="1"
                />

              </div>

              <!-- Début -->
              <div class="form-group">

                <label class="form-label">
                  Date et heure de début
                </label>

                <input 
                  type="datetime-local"
                  class="form-control"
                  value="2025-06-16T08:00"
                />

              </div>

              <!-- Fin -->
              <div class="form-group">

                <label class="form-label">
                  Date et heure de fin
                </label>

                <input 
                  type="datetime-local"
                  class="form-control"
                  value="2025-06-16T09:30"
                />

              </div>

            </div>

            <!-- Description -->
            <div class="form-group" style="margin-top:1rem;">

              <label class="form-label">
                Description
              </label>

              <textarea 
                class="form-control"
                rows="4"
                placeholder="Description du créneau..."
              >Cours de yoga relaxation et étirements pour débutants et intermédiaires.</textarea>

            </div>

            <!-- État -->
            <div class="form-group" style="margin-top:1rem;">

              <label class="form-label">
                Statut du créneau
              </label>

              <select class="select-custom">
                <option selected>Actif</option>
                <option>Inactif</option>
                <option>Complet</option>
              </select>

            </div>

            <!-- Infos -->
            <div 
              style="
                margin-top:1.5rem;
                padding:1rem;
                border-radius:10px;
                background:var(--surface);
                border:1px solid var(--border);
              "
            >

              <div style="font-size:0.82rem;color:var(--muted);">

                <div style="margin-bottom:6px;">
                  <i class="bi bi-info-circle"></i>
                  Créé le : 10 juin 2025 à 14h32
                </div>

                <div>
                  <i class="bi bi-people"></i>
                  4 réservations enregistrées
                </div>

              </div>

            </div>

            <!-- ACTIONS -->
            <div 
              style="
                display:flex;
                gap:10px;
                margin-top:1.5rem;
                flex-wrap:wrap;
              "
            >

              <button type="submit" class="btn-submit">

                <i class="bi bi-check-lg"></i>
                Enregistrer les modifications

              </button>

              <a 
                href="#page-admin-creneaux"
                class="btn-secondary-custom"
              >

                <i class="bi bi-arrow-left"></i>
                Retour

              </a>

              <button 
                type="button"
                class="btn-sm-custom btn-del"
                style="padding:10px 16px;font-size:0.85rem;"
              >

                <i class="bi bi-trash"></i>
                Supprimer le créneau

              </button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</section>
<?= $this->endSection() ?>