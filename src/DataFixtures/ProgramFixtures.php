<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMS = [
        ['title' => 'Walking dead', 'synopsis' => 'Des zombies envahissent la terre', 'category' => 'category_Horreur'],
        ['title' => 'Breaking Bad', 'synopsis' => 'Un professeur de chimiesombre dans le crime pour assurer l\'avenir financier de sa famille.', 'category' => 'category_Thriller'],
        ['title' => 'Prison Break', 'synopsis' => 'les mésaventures de deux frères confrontés au monde carcéral.', 'category' => 'category_Policier'],
        ['title' => 'Casa de Papel', 'synopsis' => 'Le but est d\'infiltrer la Banque d\'Espagne afin de dérober 100 tonnes d\'or ', 'category' => 'category_Drame'],
        ['title' => 'The Night Agent', 'synopsis' => 'L\'agent du FBI, Peter Sutherland, se retrouve impliqué dans une vaste conspiration', 'category' => 'category_Action'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROGRAMS as $key => $progItem) {
            $program = new Program();
            $program->setTitle($progItem['title']);
            $program->setSynopsis($progItem['synopsis']);
            $program->setCategory($this->getReference($progItem['category']));
            $manager->persist($program);
            $this->addReference('program_' . $key, $program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
