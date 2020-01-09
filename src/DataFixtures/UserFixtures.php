<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\RoleRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    private $rep;
    
    public function __construct(UserPasswordEncoderInterface $encoder,RoleRepository $rep)
    {
        $this->encoder = $encoder;
        $this->rep=$rep;
    }
    
    public function load(ObjectManager $manager)
    {

        $user = new User();
        $role=$this->rep->findOneBy(["libelle"=>"SupAdmin"]);
        $user->setProfil($role)
        ->setRoles(["ROLE_".$role->getLibelle()])
        ->setFullname("sidy diop")
        ->setUsername("SupAdmin")
        ->setIsActive(true)
       ->setPassword($this->encoder->encodePassword($user, "root"));


        $manager->persist($user);

        $manager->flush();
    }
}
