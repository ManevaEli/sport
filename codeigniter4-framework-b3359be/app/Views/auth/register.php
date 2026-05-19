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
<!-- ║  PAGE 4 — INSCRIPTION (auth/register.php)                ║ -->
<!-- ╚══════════════════════════════════════════════════════════╝ -->

<section id="page-inscription" style="background:var(--surface);">
  <nav class="nav-public">
    <a href="#" class="brand">Fit<span>Space</span></a>
  </nav>
  <div class="auth-wrapper">
    <div class="auth-card">
      <div class="auth-logo">Fit<span>Space</span></div>
      <div class="auth-subtitle">Créez votre compte client gratuitement.</div>

      <form id="inscriptionForm" method="POST" data-url="<?= base_url('/inscription') ?>">

          <div class="form-group  mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" placeholder="Dupont" id="nom" name="nom"/>
            <span style="color:var(--accent);font-size:0.78rem;margin-top:3px;" class="error" id="nomError"></span>
          </div>

        <div class="form-group mb-3">
          <label class="form-label">Adresse email</label>
          <input type="email" class="form-control" placeholder="jean.dupont@email.com" id="email" name="email" />
          <span style="color:var(--accent);font-size:0.78rem;margin-top:3px;" class="error" id="emailError"></span>
          </div>
      
        <div class="form-group mb-3">
          <label class="form-label">Mot de passe</label>
          <input type="password" class="form-control" placeholder="6 caractères minimum" id = "mdp" name="mdp" />
          <span style="color:var(--accent);font-size:0.78rem;margin-top:3px;" class="error" id="mdpError"></span>
        </div>
       
        <button type="submit" class="btn-primary-custom">Créer mon compte</button>
      </form>

      <hr class="auth-divider" />
      <div class="auth-footer">Déjà inscrit ? <a href="<?= base_url('/log') ?>">Se connecter</a></div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="/js/app.js"></script>

</body>
</html>
