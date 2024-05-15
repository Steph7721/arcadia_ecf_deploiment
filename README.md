Arcadia

Environnement technique:

PHP >= 8.1 et MYSQL >= 5.7 (WAMP) 
Symfony 5.8.16 
Bootstrap 5.3 
Easyadmin 4.7 VSCode

Extensions VSCODE:

PHP Intelephense 
Twig Language 2
DotENV 
phpfmt PHP formatter 
Material Icon Theme 
PHP Getter & Setter 
PHP Namespace Resolver 
YAML 
PHPDoc Comment Prettier - Code formatter

Installation du projet Arcadia:

Avoir définit php dans les variables d’environnement et avoir Xdebug d’activé 
Installer composer 
Installer symfony cli 
Vérifier les requirements
symfony check:requirement 
Créer un nouveau projet symfony 
symfony new my_project --webapp 
Relancer l’indexation dans VSCODE : CTRL+MAJ+P -> Intelephense: index 
Lancer un serveur symfony server:start

Installer webpack Encore 2.1:

composer require symfony/webpack-encore-bundle 

npm install 

Pour compiler en dev 
npm run dev 

Pour compiler en prod 
npm run build 

Pour compiler en temps réel les changements 
npm run watch

Webpack Encore : SASS et Bootstrap:

npm install sass-loader sass --save-dev 
Modifier webpack.config.js et ajouter .enableSassLoader() 

npm install bootstrap --save-dev 

Webpack Encore : Images 

npm install file-loader --save-dev 
Modifier webpack.config.js et ajouter

.copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[ext]',
        })

Easyadmin:

Installation du bundle easyadmin 
composer require easycorp/easyadmin-bundle

Installation admin dashboard
php bin/console make:admin:dashboard