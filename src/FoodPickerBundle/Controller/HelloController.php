<?php
namespace FoodPickerBundle\Controller;

//use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HelloController extends Controller
{

    /**
     * @Route(
     *      "/hello/{name}",
     *      name="hello",
     *      requirements = {"name" = "[a-zA-Z]+"}
     * )
     */

    public function indexAction($name = "argUment_default"){
//        return new Response(
//            '<html><body>Hello ' . $name . '!</body></html>'
//        );

        return $this->redirect($this->generateUrl('foodpicker'), 301);
    }
}