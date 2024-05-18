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

Vich/uploader-bundle

Installation vich/uploader composer require vich/uploader-bundle

Modifier le fichier config/packages/vich_uploader.yaml mappings: zoo: uri_prefix: /images/nom_dossier upload_destination: '%kernel.project_dir%/public/images/zoo' namer: Vich\UploaderBundle\Naming\SmartUniqueNamer

Modifier l'entité

use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]

#[Vich\UploadableField(mapping: 'nom_dossier', fileNameProperty: 'imageName', size: 'imageSize')] private ?File $imageFile = null;

#[ORM\Column(nullable: true)]
private ?string $imageName = null;

#[ORM\Column(nullable: true)]
private ?int $imageSize = null;

#[ORM\Column(nullable: true)]
private ?\DateTimeImmutable $updatedAt = null;

 /**
 * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
 * of 'UploadedFile' is injected into this setter to trigger the update. If this
 * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
 * must be able to accept an instance of 'File' as the bundle will inject one here
 * during Doctrine hydration.
 *
 * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
 */
public function setImageFile(?File $imageFile = null): void
{
    $this->imageFile = $imageFile;

    if (null !== $imageFile) {
        // It is required that at least one field changes if you are using doctrine
        // otherwise the event listeners won't be called and the file is lost
        $this->updatedAt = new \DateTimeImmutable();
    }
}

public function getImageFile(): ?File
{
    return $this->imageFile;
}

public function setImageName(?string $imageName): void
{
    $this->imageName = $imageName;
}

public function getImageName(): ?string
{
    return $this->imageName;
}

public function setImageSize(?int $imageSize): void
{
    $this->imageSize = $imageSize;
}

public function getImageSize(): ?int
{
    return $this->imageSize;
}