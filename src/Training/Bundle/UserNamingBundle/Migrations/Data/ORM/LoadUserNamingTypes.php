<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class LoadUserNamingTypes extends AbstractFixture
{
    /** @var array */
    protected $namingTypes = [
        'Official'         => 'PREFIX FIRST MIDDLE LAST SUFFIX',
        'Unofficial'       => 'FIRST LAST',
        'First name only'  => 'FIRST'
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->namingTypes as $title => $format) {
            $type = new UserNamingType();
            $type->setTitle($title)
                ->setFormat($format);

            $manager->persist($type);
        }

        $manager->flush();
    }
}
