<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FitSpace — Gestionnaire de réservations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@700;800&display=swap" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet"/>
</head>
<body>


<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE 2 — LISTE DES CRÉNEAUX (client/creneaux.php)       ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->


<section id="page-creneaux" style="padding-top:1rem;">

  <nav class="nav-public">
    <a href="#" class="brand">Fit<span>Space</span></a>
    <div class="nav-links">
      <a href="#page-dashboard-client">Mon espace</a>
      <a href="#">Déconnexion</a>
    </div>
  </nav>

  <div class="page-section">
    <div class="section-head">
      <h2>Créneaux disponibles</h2>
      <!-- Nombre de créneaux dynamique -->
      <span class="count"><?= $total ?> créneau<?= $total > 1 ? 's' : '' ?> trouvé<?= $total > 1 ? 's' : '' ?></span>
    </div>

    <!-- Filtres -->
    <div class="filter-bar">
      <button class="filter-pill active">Tous</button>
      <button class="filter-pill"><i class="bi bi-people-fill"></i> Cours collectifs</button>
      <button class="filter-pill"><i class="bi bi-door-open-fill"></i> Salles</button>
      <button class="filter-pill"><i class="bi bi-dribbble"></i> Terrains</button>
    </div>

    <!-- Grille créneaux dynamique -->
    <div class="creneaux-grid">

      <?php if (!empty($creneaux)): ?>
        <?php foreach ($creneaux as $creneau): ?>
          
          <!-- Carte Créneau (Ajout de la classe 'full' si complet) -->
          <div class="creneau-card <?= $creneau['est_complet'] ? 'full' : '' ?>">
            
            <div class="creneau-header">
              <!-- Type de créneau adaptatif avec sa classe CSS et icône -->
              <?php if ($creneau['type'] === 'cours'): ?>
                <span class="creneau-type type-cours"><i class="bi bi-people-fill"></i> Cours</span>
              <?php elseif ($creneau['type'] === 'salle'): ?>
                <span class="creneau-type type-salle"><i class="bi bi-door-open-fill"></i> Salle</span>
              <?php else: ?>
                <span class="creneau-type type-terrain"><i class="bi bi-dribbble"></i> Terrain</span>
              <?php endif; ?>
              
              <span style="font-size:0.75rem;color:var(--muted);"><?= $creneau['date_jour'] ?></span>
            </div>

            <p class="creneau-title"><?= esc($creneau['titre']) ?></p>
            
            <div class="creneau-meta">
              <div class="meta-row"><i class="bi bi-clock"></i> <?= $creneau['heure_debut'] ?> — <?= $creneau['heure_fin'] ?></div>
              <div class="meta-row"><i class="bi bi-geo-alt"></i> <?= esc($creneau['description']) ?></div>
            </div>
            
            <div>
              <!-- Barre de progression calculée selon la capacité SQLite -->
              <div class="places-bar">
                <div class="places-fill" style="width:<?= $creneau['jauge_pourcentage'] ?>%; <?= $creneau['est_complet'] ? 'background:var(--muted);' : '' ?>"></div>
              </div>
              
              <div class="places-label">
                <?php if ($creneau['est_complet']): ?>
                  Complet — 0 place restante
                <?php else: ?>
                  <?= $creneau['places_restantes'] ?> place<?= $creneau['places_restantes'] > 1 ? 's' : '' ?> restante<?= $creneau['places_restantes'] > 1 ? 's' : '' ?> sur <?= $creneau['capacite_totale'] ?>
                <?php endif; ?>
              </div>
            </div>

            <!-- Bouton d'action variable selon dispo -->
            <?php if ($creneau['est_complet']): ?>
              <button class="btn-reserver disabled" disabled>Complet</button>
            <?php else: ?>
              <a href="<?= base_url('reserver/'.$creneau['id']) ?>" class="btn-reserver">Réserver ce créneau</a>
            <?php endif; ?>

          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <p style="grid-column: 1 / -1; text-align: center; color: var(--muted); padding: 2rem;">Aucun créneau disponible pour le moment.</p>
      <?php endif; ?>

    </div>
  </div>

  <div class="footer-public">FitSpace &copy; 2025 — Projet CodeIgniter 4 · Tous droits <span>réservés</span></div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE 5 — DASHBOARD CLIENT (client/dashboard.php)        ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<section id="page-dashboard-client">
  <div class="app-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-logo">Fit<span>Space</span></div>

      <div class="sidebar-section">Menu</div>
      <ul class="sidebar-nav">
        <li><a href="#page-dashboard-client" class="active"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a></li>
        <li><a href="#page-creneaux"><i class="bi bi-calendar3"></i> Voir les créneaux</a></li>
        <li>
          <a href="#page-mes-reservations">
            <i class="bi bi-bookmark-check-fill"></i> Mes réservations
            <span class="sidebar-badge urgent">2</span>
          </a>
        </li>
        <li><a href="#page-profil"><i class="bi bi-person-fill"></i> Mon profil</a></li>
      </ul>

      <div class="sidebar-footer">
        <div class="sidebar-user">
          <div class="avatar">JD</div>
          <div class="user-info">
            <div class="name">Jean Dupont</div>
            <div class="role">Client</div>
          </div>
          <a href="#page-login" style="margin-left:auto;color:rgba(255,255,255,0.3);font-size:1.1rem;" title="Déconnexion"><i class="bi bi-box-arrow-right"></i></a>
        </div>
      </div>
    </aside>

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


<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE 6 — MES RÉSERVATIONS (client/reservations.php)     ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<section id="page-mes-reservations">
  <div class="app-wrapper">
    <aside class="sidebar">
      <div class="sidebar-logo">Fit<span>Space</span></div>
      <ul class="sidebar-nav" style="margin-top:1rem;">
        <li><a href="#page-dashboard-client"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a></li>
        <li><a href="#page-creneaux"><i class="bi bi-calendar3"></i> Voir les créneaux</a></li>
        <li><a href="#page-mes-reservations" class="active"><i class="bi bi-bookmark-check-fill"></i> Mes réservations</a></li>
        <li><a href="#page-profil"><i class="bi bi-person-fill"></i> Mon profil</a></li>
      </ul>
      <div class="sidebar-footer">
        <div class="sidebar-user">
          <div class="avatar">JD</div>
          <div class="user-info"><div class="name">Jean Dupont</div><div class="role">Client</div></div>
        </div>
      </div>
    </aside>

    <div class="main-content">
      <div class="topbar">
        <span class="topbar-title">Mes réservations</span>
      </div>
      <div class="page-content">
        <div class="data-card">
          <div class="data-card-header">
            <h3>Toutes mes réservations</h3>
          </div>
          <table class="table-custom">
            <thead>
              <tr><th>Ressource</th><th>Date</th><th>Horaire</th><th>Type</th><th>Statut</th><th>Action</th></tr>
            </thead>
            <tbody>
              <tr>
                <td class="td-name">Yoga Détente</td>
                <td class="td-muted">16 juin 2025</td>
                <td class="td-muted">08h00 – 09h30</td>
                <td><span class="creneau-type type-cours" style="font-size:0.68rem;">Cours</span></td>
                <td><span class="badge-statut s-attente">en attente</span></td>
                <td><button class="btn-sm-custom btn-cancel"><i class="bi bi-x"></i> Annuler</button></td>
              </tr>
              <tr>
                <td class="td-name">Salle musculation</td>
                <td class="td-muted">17 juin 2025</td>
                <td class="td-muted">10h00 – 12h00</td>
                <td><span class="creneau-type type-salle" style="font-size:0.68rem;">Salle</span></td>
                <td><span class="badge-statut s-confirmee">confirmée</span></td>
                <td><span style="font-size:0.75rem;color:var(--muted);">—</span></td>
              </tr>
              <tr>
                <td class="td-name">CrossFit Intensif</td>
                <td class="td-muted">10 juin 2025</td>
                <td class="td-muted">18h00 – 19h30</td>
                <td><span class="creneau-type type-cours" style="font-size:0.68rem;">Cours</span></td>
                <td><span class="badge-statut s-annulee">annulée</span></td>
                <td><span style="font-size:0.75rem;color:var(--muted);">—</span></td>
              </tr>
              <tr>
                <td class="td-name">Terrain de squash</td>
                <td class="td-muted">18 juin 2025</td>
                <td class="td-muted">14h00 – 15h00</td>
                <td><span class="creneau-type type-terrain" style="font-size:0.68rem;">Terrain</span></td>
                <td><span class="badge-statut s-attente">en attente</span></td>
                <td><button class="btn-sm-custom btn-cancel"><i class="bi bi-x"></i> Annuler</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ╔══════════════════════════════════════════════════════════╗ -->
<!-- ║  PAGE — PROFIL CLIENT (client/profil.php)               ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<section id="page-profil">
  <div class="app-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-logo">Fit<span>Space</span></div>

      <ul class="sidebar-nav" style="margin-top:1rem;">
        <li><a href="#page-dashboard-client"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a></li>
        <li><a href="#page-creneaux"><i class="bi bi-calendar3"></i> Voir les créneaux</a></li>
        <li><a href="#page-mes-reservations"><i class="bi bi-bookmark-check-fill"></i> Mes réservations</a></li>
        <li><a href="#page-profil" class="active"><i class="bi bi-person-fill"></i> Mon profil</a></li>
      </ul>

      <div class="sidebar-footer">
        <div class="sidebar-user">
          <div class="avatar">JD</div>
          <div class="user-info">
            <div class="name">Jean Dupont</div>
            <div class="role">Client</div>
          </div>
        </div>
      </div>
    </aside>

    <!-- CONTENU -->
    <div class="main-content">

      <!-- TOPBAR -->
      <div class="topbar">
        <span class="topbar-title">Mon profil</span>
      </div>

      <div class="page-content">

        <!-- Message -->
        <div class="flash-message flash-success">
          <i class="bi bi-check-circle-fill"></i>
          Vos informations ont été mises à jour avec succès.
        </div>

        <!-- Carte profil -->
        <div class="form-section">

          <div style="display:flex;align-items:center;gap:1rem;margin-bottom:2rem;flex-wrap:wrap;">

            <div class="avatar" style="width:70px;height:70px;font-size:1.4rem;">
              JD
            </div>

            <div>
              <h3 style="margin-bottom:4px;">Jean Dupont</h3>
              <div style="font-size:0.85rem;color:var(--muted);">
                Client inscrit depuis juin 2025
              </div>
            </div>

          </div>

          <!-- FORM -->
          <form>

            <div class="form-grid-2">

              <div class="form-group">
                <label class="form-label">Nom complet</label>
                <input 
                  type="text" 
                  class="form-control" 
                  value="Jean Dupont"
                />
              </div>

              <div class="form-group">
                <label class="form-label">Adresse email</label>
                <input 
                  type="email" 
                  class="form-control" 
                  value="jean@email.com"
                />
              </div>

              <div class="form-group">
                <label class="form-label">Téléphone</label>
                <input 
                  type="text" 
                  class="form-control" 
                  value="+261 34 00 000 00"
                />
              </div>

              <div class="form-group">
                <label class="form-label">Ville</label>
                <input 
                  type="text" 
                  class="form-control" 
                  value="Antananarivo"
                />
              </div>

            </div>

            <hr class="auth-divider" />

            <h3 style="font-size:0.95rem;margin-bottom:1rem;">
              Sécurité du compte
            </h3>

            <div class="form-grid-2">

              <div class="form-group">
                <label class="form-label">Nouveau mot de passe</label>
                <input 
                  type="password" 
                  class="form-control" 
                  placeholder="••••••••"
                />
              </div>

              <div class="form-group">
                <label class="form-label">Confirmer le mot de passe</label>
                <input 
                  type="password" 
                  class="form-control" 
                  placeholder="••••••••"
                />
              </div>

            </div>

            <div style="display:flex;gap:10px;margin-top:1.5rem;flex-wrap:wrap;">

              <button type="submit" class="btn-submit">
                <i class="bi bi-check-lg"></i>
                Enregistrer les modifications
              </button>

              <button type="reset" class="btn-secondary-custom">
                Réinitialiser
              </button>

            </div>

          </form>

        </div>

        <!-- Statistiques profil -->
        <div class="metrics-row">

          <div class="metric-card">
            <div class="metric-icon blue">
              <i class="bi bi-calendar-check"></i>
            </div>
            <div class="metric-value">8</div>
            <div class="metric-label">Réservations totales</div>
          </div>

          <div class="metric-card">
            <div class="metric-icon green">
              <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="metric-value">5</div>
            <div class="metric-label">Réservations confirmées</div>
          </div>

          <div class="metric-card">
            <div class="metric-icon yellow">
              <i class="bi bi-hourglass-split"></i>
            </div>
            <div class="metric-value">2</div>
            <div class="metric-label">En attente</div>
          </div>

          <div class="metric-card">
            <div class="metric-icon red">
              <i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="metric-value">1</div>
            <div class="metric-label">Annulées</div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<!-- scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>

</body>
</html>