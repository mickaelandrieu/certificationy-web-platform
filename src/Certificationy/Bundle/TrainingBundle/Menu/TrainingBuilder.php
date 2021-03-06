<?php
/**
 * This file is part of the Certificationy Web Platform.
 * (c) Johann Saunier (johann_27@hotmail.fr)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 **/

namespace Certificationy\Bundle\TrainingBundle\Menu;

use Certificationy\Bundle\TrainingBundle\Manager\CertificationManager;
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;

class TrainingBuilder
{
    /**
     * @var \Knp\Menu\FactoryInterface
     */
    protected $factory;

    /**
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    protected $translator;

    /**
     * @var \Certificationy\Bundle\TrainingBundle\Manager\CertificationManager
     */
    protected $certificationManager;

    /**
     * @param FactoryInterface     $factory
     * @param TranslatorInterface           $translator
     * @param CertificationManager $certificationManager
     */
    public function __construct(
        FactoryInterface $factory,
        TranslatorInterface $translator,
        CertificationManager $certificationManager
    ) {
        $this->translator = $translator;
        $this->factory = $factory;
        $this->certificationManager = $certificationManager;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createTrainingMenu(Request $request)
    {
        $menu = $this->factory->createItem('training');

        $trainingMenu = $menu->addChild('training', [
            'label' => $this->translator->trans('training.menu', [], 'training')
        ]);

        foreach ($this->certificationManager->getCertifications() as $certificationName => $certificationLabel) {
            $trainingMenu->addChild($certificationName, [
                'route' => 'certification_guidelines',
                'routeParameters' => ['name' => $certificationName],
                'label' => $certificationLabel
            ]);
        }

        return $menu;
    }
}
