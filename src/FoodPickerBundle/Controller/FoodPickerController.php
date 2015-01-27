<?php
namespace FoodPickerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FoodPickerController extends Controller
{
    public function indexAction(Request $request) {

        $placesToEat = array(
            'Kentucky Fried Chicken',
            'The Birds!',
            'Big Wing Co.',
            'A Fowl Place',
            'Gallus Maximus',
            'Fillet de Poulet',
            'El Polo Loco'
        );

        $session = $request->getSession();
        $previous = $session->get('previous', 'You have not used this service before!');

        $foodDex = rand(0, count($placesToEat)-1);

        $restaurant = $placesToEat[$foodDex];
        $session->set('previous', $restaurant);

        return $this->render(
            'FoodPickerBundle:FoodPicker:foodpicker.html.twig',
            array(
                'restaurant' => $restaurant,
                'previous' => $previous,
                'currloc' => 'http://localhost:8000/app_dev.php/foodpicker' //javascript:document.location.reload(true)
                )
        );
    }
}