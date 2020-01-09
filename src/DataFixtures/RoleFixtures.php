<?php

namespace App\DataFixtures;


use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $role = new Role();
         $role->setLibelle("SupAdmin");
         $manager->persist($role);

         $role1 = new Role();
         $role1->setLibelle("Admin");
         $manager->persist($role1);

         $role2 = new Role();
         $role2->setLibelle("Caissier");
         $manager->persist($role2);
        
        $manager->flush();
    }
}