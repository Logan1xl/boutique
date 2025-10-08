#!/usr/bin/env bash
# exit on error
set -o errexit

echo "🚀 Début du processus de build..."

# Installation des dépendances Composer
echo "📦 Installation des dépendances Composer..."
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Installation des dépendances NPM (si vous utilisez Vite/Mix)
if [ -f "package.json" ]; then
    echo "📦 Installation des dépendances NPM..."
    npm ci
    echo "🏗️  Build des assets..."
    npm run build
fi

# Créer le fichier .env depuis .env.example
if [ ! -f ".env" ]; then
    echo "📝 Création du fichier .env..."
    cp .env.example .env
fi

# Générer la clé d'application
echo "🔑 Génération de la clé d'application..."
php artisan key:generate --force

# Cache des configurations
echo "⚡ Optimisation des configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Exécution des migrations
echo "🗄️  Exécution des migrations..."
php artisan migrate --force --no-interaction

# Création du lien symbolique pour le storage
echo "🔗 Création du lien de stockage..."
php artisan storage:link

echo "✅ Build terminé avec succès!"
