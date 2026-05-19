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