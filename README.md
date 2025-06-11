# Urban Store

Urban Store est une application e-commerce développée avec Laravel. Ce dépôt contient tout le nécessaire pour lancer le projet en local.

## Installation

1. Installez les dépendances PHP :
   ```bash
   composer install
   ```
2. Installez les dépendances JavaScript :
   ```bash
   npm install
   ```
3. Copiez le fichier d'exemple des variables d'environnement :
   ```bash
   cp .env.example .env
   ```
4. Configurez les variables d'environnement selon votre contexte (base de données, services tiers, etc.). Pour l'intégration de CinetPay, renseignez notamment :
   - `CINETPAY_SITE_ID`
   - `CINETPAY_API_KEY`
   - `CINETPAY_SECRET_KEY`
5. Lancez les migrations pour créer la base de données :
   ```bash
   php artisan migrate
   ```
6. Démarrez le serveur de développement :
   ```bash
   npm run dev
   ```
   ou
   ```bash
   php artisan serve
   ```

Une fois ces étapes terminées, l'application sera accessible sur l'URL affichée dans le terminal.
