<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

//Tout d'abord nous ajoutons la classe Factory de FakerPhp
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    /* public const EPISODES = [
        ['season' => 'season_0', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_0', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_0', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_1', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_1', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_1', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_2', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_2', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_2', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_3', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_3', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_3', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_4', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_4', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_4', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_5', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_5', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_5', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_6', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_6', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_6', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_7', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_7', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_7', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_8', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_8', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_8', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_9', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_9', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_9', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_10', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_10', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_10', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_11', 'title' => 'Lorem Ipsum', 'number' => '1', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_11', 'title' => 'Lorem Ipsum', 'number' => '2', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],
        ['season' => 'season_11', 'title' => 'Lorem Ipsum', 'number' => '3', 'synopsis' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...'],


    ];*/

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        #foreach (self::EPISODES as $epItem) {
        for ($i = 0; $i < 50; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season_' . $faker->numberBetween(0, 4)));
            $episode->setTitle($faker->sentence(3));
            $episode->setNumber($faker->numberBetween(1, 10));
            $episode->setSynopsis($faker->paragraph(3));
            $manager->persist($episode);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            SeasonFixtures::class,
        ];
    }
}
