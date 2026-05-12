# SQLite database
## Table
### users
CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "nom" TEXT NOT NULL UNIQUE,
    "email" TEXT NOT NULL UNIQUE,
    "password" TEXT NOT NULL,
    "role" TEXT NOT NULL,
    "created_at" DATETIME DEFAULT CURRENT_TIMESTAMP
);

### ressources
CREATE TABLE IF NOT EXISTS "ressources" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "nom" TEXT NOT NULL,
    "type" TEXT NOT NULL,
    "capacite" INTEGER NOT NULL,
    "description" TEXT
);

### creneaux
CREATE TABLE IF NOT EXISTS "creneaux" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "ressource_id" INTEGER NOT NULL,
    "date-debut" DATE NOT NULL,
    "date-fin" DATE NOT NULL,
    "places-disponibles" INTEGER NOT NULL,
    "actif" BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY (ressource_id) REFERENCES ressources(id)
);

### reservations
CREATE TABLE IF NOT EXISTS "reservations" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "user_id" INTEGER NOT NULL,
    "creneau_id" INTEGER NOT NULL,
    "status" TEXT NOT NULL,
    "created_at" DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (creneau_id) REFERENCES creneaux(id)
);