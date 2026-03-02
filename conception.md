# Plateforme de Collecte de Données

## Description
Plateforme permettant aux utilisateurs de collecter des données pour leur ministère.

## Flux Utilisateur
1. L'utilisateur sélectionne son ministère
2. L'utilisateur remplit un formulaire de collecte de données
3. Les données sont sauvegardées et associées au ministère

## Architecture

### Base de Données
- **Table: ministeres** - Liste des ministères
  - id, name, code, description
- **Table: data_collections** - Collecte de données
  - id, user_id, ministere_id, form_data (JSON), created_at, updated_at

### Modèles Laravel
- `Ministere` - Gestion des ministères
- `DataCollection` - Gestion des collectes de données

### Contrôleurs
- `MinisteireController` - Sélection du ministère
- `DataCollectionController` - Formulaire et collecte de données

### Vues
- `ministeres.select` - Sélection du ministère
- `data-collection.form` - Formulaire de collecte

## Statut
- [ ] Créer migrations
- [ ] Créer modèles
- [ ] Créer seeders (ministères)
- [ ] Créer contrôleurs
- [ ] Créer vues
- [ ] Configurer routes
