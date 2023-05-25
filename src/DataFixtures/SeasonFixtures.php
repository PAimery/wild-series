<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

//Tout d'abord nous ajoutons la classe Factory de FakerPhp
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    /*public const SEASONS = [
        ['program' => 'program_0', 'number' => '1', 'year' => '2010', 'description' => 'La première saison est de six épisodes, diffusés du 31 octobre 2010 au 5 décembre 2010.'],
        ['program' => 'program_0', 'number' => '2', 'year' => '2011', 'description' => 'La deuxième saison est de treize épisodes sortie le 26 octobre 2011.'],
        ['program' => 'program_0', 'number' => '3', 'year' => '2012', 'description' => 'La troisième saison comporte seize épisodes et a été diffusés du 14 octobre 2012 au 31 mars 2013.'],
        ['program' => 'program_1', 'number' => '1', 'year' => '2008', 'description' => 'La première saison comporte sept épisodes et a été diffusée du 20 janvier 2008 au 9 mars 2008, aux États-Unis.'],
        ['program' => 'program_1', 'number' => '2', 'year' => '2009', 'description' => 'La deuxième saison comporte treize épisodes et a été diffusée le 7 mai 2009, aux États-Unis.'],
        ['program' => 'program_1', 'number' => '3', 'year' => '2010', 'description' => 'La troisième saison comporte treize épisodes et a été diffusée du 21 mars 2010 au 13 juin 2010, aux États-Unis.'],
        ['program' => 'program_2', 'number' => '1', 'year' => '2006', 'description' => 'La première saison comporte vingt-deux épisodes et a été diffusée du 29 août 2005 au 15 mai 2006 aux États-Unis.'],
        ['program' => 'program_2', 'number' => '2', 'year' => '2007', 'description' => 'La deuxième saison comporte vingt-deux épisodes et a été diffusée du 21 août 2006 au 2 avril 2007 aux États-Unis'],
        ['program' => 'program_2', 'number' => '3', 'year' => '2008', 'description' => 'La troisième saison comporte treize épisodes et a été diffusée du 17 septembre 2007 au 18 février 2008 aux États-Unis '],
        ['program' => 'program_3', 'number' => '1', 'year' => '2017', 'description' => 'La première saison comporte vingt-troix épisodes et a été diffusée du 2 mai 2017 au 27 juin 2017 sur Netflix '],
        ['program' => 'program_3', 'number' => '2', 'year' => '2019', 'description' => 'La deuxième saison comporte vingt-cinq épisodes et a été diffusée le 19 juillet 2019 sur Netflix. '],
        ['program' => 'program_4', 'number' => '1', 'year' => '2019', 'description' => 'La deuxième saison comporte vingt-cinq épisodes et a été diffusée le 19 juillet 2019 sur Netflix. '],
    ];*/

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        #foreach (self::SEASONS as $key => $seasonItem) {
        for ($i = 0; $i < 25; $i++) {
            $season = new Season();
            $season->setNumber($faker->numberBetween(1, 5));
            $season->setYear($faker->numberBetween(1995, 2020));
            $season->setDescription($faker->paragraphs(3, true));
            $season->setProgram($this->getReference('program_' . $faker->numberBetween(0, 4)));
            $manager->persist($season);

            $this->setReference('season_' . $i, $season);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            ProgramFixtures::class,
        ];
    }
}
