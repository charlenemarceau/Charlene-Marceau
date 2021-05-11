
- [Installer un projet](#installer-un-projet)
- [Analyse générale du projet](#analyse-générale-du-projet)
  - [Analyse fonctionnelle](#analyse-fonctionnelle)
  - [Couche métier](#couche-métier)
- [Configuration de l'application](#configuration-de-lapplication)
- [Automatisation](#automatisation)
  - [Personnaliser](#personnaliser)
  - [Crée un message Flash après modification](#crée-un-message-flash-après-modification)
  - [FilmController : delete](#filmcontroller--delete)
    - [Méthode 1](#méthode-1)
  - [Méthode 2](#méthode-2)
- [Ahouter une navbar](#ahouter-une-navbar)
- [Contraintes de formulaires](#contraintes-de-formulaires)
  - [Dans FilmType](#dans-filmtype)


# Installer un projet
```bash
 symfony new `Charlene-Marceau` --full --version=5.2
```

# Analyse générale du projet
Une application web qui permet de présenter les films réalisateurs à succès.
Une application avec :
- un espace qui affiche les films, une page de détails pour en connaître un peu plus sur un film spécifique et des formulaires qui proposent des actions pour :
  - ajouter un nouveau film
  - modifier les détails d'un film
  - Voir les détails
  - Supprimer

## Analyse fonctionnelle

- Compréhensible voire dicté pour le client.
- Peut donner lieu à un Use Case UML.

## Couche métier
- dégager les types de données
- Ici : 
    1. Films
    2. Réalisateurs

# Configuration de l'application 
1. database 
   
   ```bash
   symfony console doctrine:database:create
   # faire la connexion avec la base de données
    DATABASE_URL="postgresql://postgres:root@127.0.0.1:5432/db_charlene_marceau"
   ```

2. les entités Film et Realisateur et leur relation (Many to One)
   ```bash
   symfony console make:entity Film #(titre (string), affiche(text), recompense(string), annee (date), synopsis(text))
   symfony console make:entity Realisateur #(nom(string), prenom(string)
   ```

3. Migrations 
```bash
php bin/console make:migration
# ou
symfony bin/console make:migration
puis
symfony console doctrine:migrations:migrate
```

4. Les fixtures 

- Créer un tableau d'objets du type Film dans AppFixtures.php
   - créer 1 ou 2 films 
```bash
symfony console doctrine:fixtures:load
```

# Automatisation
Le coeur de l'application est générée automatiquement avec :
```bash
symfony console make:crud
```
On peut maintenant voir nos 2 films sur la page : http://localhost:8000/film/

## Personnaliser
Ajouter Bootstrap pour les page, le thème formulaire.
   - ajouter style au besoin.
Dans config/package/twig.yaml
```yaml
    form_themes: ['bootstrap_4_layout.html.twig']
```

## Crée un message Flash après modification
- 1 partie dans le controller : la construction du message
- 1 autre dans la vue : l'affichage selon le choix pris dans la doc
## FilmController : delete
### Méthode 1 
- Un lien depuis la page d'accueil 
- Ici le lien
## Méthode 2
- lien dans la page update
- on ajoute une confirmation en javascript
- __NB__ : Attention à l'emplacement de `{% block javascripts %}{% endblock %}`
#
# Ahouter une navbar
- un fichier _navbar.html.twig, crée avec une navbar Bootstrap
    - un titre
    - un bouton accueil
    - un menu déroulant
- inclure dans base.html.twig dans un {% block navbar%}

#
# Contraintes de formulaires
## Dans FilmType

Voir : Pour inihiber le contrôle HTML 5
```php
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
``` 

Voir les contraintes des champs.
Ici, dans le cas  où un champs est considéré comme nullable = false dans la database.
> voir empty_data.
```php
    ->add('title', TextType::class, [
                'label' => 'Un titre en quelques mots',
                'empty_data' => "",
``` 
