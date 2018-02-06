<?php
namespace AppBundle\Services\User;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class UserHandler
{
    private $formFactory;
    private $userManager;

    public function __construct(
        FormFactoryInterface $formFactory,
        UserManagerInterface $userManager
    )
    {
        $this->formFactory = $formFactory;
        $this->userManager = $userManager;
    }

    public function post(array $request)
    {
        $user = $this->userManager->createUser();;

        return $this->processForm($user, $request, 'POST');
    }

    private function processForm(User $user, array $request, $method)
    {
        $form = $this->formFactory->create(UserType::class, $user, ['method' => $method]);
        $form->submit($request, 'POST' !== $method);

        if ($form->isValid()) {
            $user = $form->getData();
            $this->userManager->updateUser($user);

            return $user;
        }

        return $form;
    }
}
