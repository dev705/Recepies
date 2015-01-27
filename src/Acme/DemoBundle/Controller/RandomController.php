<?php

namespace Acme\DemoBundle\Controller;

//use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomController extends Controller
{
    public function indexAction($limit)
    {
        //return new Response ('<html><body>Number: '.rand(1, $limit).'</body></html>');

        $number = rand(1, $limit);

        return $this->render(
            'AcmeDemoBundle:Random:index.html.twig',
            array('number' => $number)
        );

        // render a PHP template instead
        // return $this->render(
        //     'AcmeDemoBundle:Random:index.html.php',
        //     array('number' => $number)
        // );

        //logical name:    BundleName:ControllerName:TemplateName
        //phys location:   /path/to/*BundleName*/Resources/views/*ControllerName*/*TemplateName*

    }

}