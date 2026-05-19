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
