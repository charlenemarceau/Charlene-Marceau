<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Film;
use App\Entity\Realisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = [
            [
            'titre' => "Pulp Fiction", 
            'affiche' => "https://fr.web.img5.acsta.net/medias/nmedia/18/62/88/98/18766087.jpg",
            'realisateur' => "Quentin Tarantino",
            'annee' => new DateTime('2007/06/06'),
            'synopsis' => "C'est à la tombée du jour que Jungle Julia, la DJ la plus sexy d'Austin, peut enfin se détendre
             avec ses meilleures copines, Shanna et Arlene. Ce trio infernal, qui vit la nuit, attire les regards dans tous
              les bars et dancings du Texas. L'attention dont ces trois jeunes femmes sont l'objet n'est pas forcément innocente.",
            'recompense' => "Palme D'Or, Grand Prix pour Quantin Tarantino",
            ],
            [
            'titre' => "Le Parrain", 
            'affiche' => "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQyO8trmFbGTJIY6MaIFqzfPB6hW8UFCAYxTqtdKWGz7EJ6Jt-d",
            'realisateur' => "Francis Ford Coppola",
            'annee' => new DateTime('1972/10/18'),
            'synopsis' => "A New York, à la fin des années 70. Michael Corleone est parvenu à reconvertir les nombreuses affaires
            de la famille dans des secteurs parfaitement légaux. Il a multiplié les dons à l'Eglise et s'est attiré les bonnes
            grâces de l'archevêque Gilday, directeur de la banque du Vatican. Gilday, au bout du rouleau, lui demande alors une
            forte avance. Michael accepte, en échange du contrôle d'une société immobilière dont le Vatican possède une part importante.",
            'recompense' => "Oscar du meilleur film(1973), Golden Glode du meilleur réalisateur (1973)...",
            ],
            ];

            foreach ($data as $f) {
                $film = new Film;
                $film
                ->setTitre($f['titre'])
                // ->setRealisateur($f['realisateur'])
                ->setAffiche($f['affiche'])
                ->setAnnee($f['annee'])
                ->setSynopsis($f['synopsis'])
                ->setRecompense($f['recompense']);


                $manager->persist(($film));
            }
            //a la fin
        $manager->flush();
    }
}
