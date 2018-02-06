<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Routing\ClassResourceInterface;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserController extends Controller implements ClassResourceInterface
{
    /**
     * @ApiDoc(
     *  section="Users",
     *  description="Get all users",
     *  resource = true,
     *  statusCodes = {
     *     200 = "Successful",
     *     404 = "Not found"
     *   }
     * )
     */
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();

        return $users;
    }

    /**
     * @ApiDoc(
     *  section="Users",
     *  description="Get a user",
     *  resource = true,
     *  statusCodes = {
     *     201 = "Successful",
     *     404 = "Not found"
     *   }
     * )
     * @ParamConverter("user", class="AppBundle:User")
     */
    public function getAction(User $user)
    {
        return $user;
    }

    /**
     * 
     * @ApiDoc(
     *  section="Users",
     *  description="Create new user",
     *  resource = true,
     *  statusCodes = {
     *     200 = "Successful",
     *     400 = "Password and confirmation doesn't match"
     *   }
     * )
     *
     */
    public function postAction(Request $request)
    {
        $userHandler = $this->get("app.user.user_handler");

        return $userHandler->post($request->request->all());
    }
}