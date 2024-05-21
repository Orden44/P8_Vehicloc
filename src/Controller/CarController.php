<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;

class CarController extends AbstractController
{
     /**
     * Page d'accueil
     */
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();

        return $this->render('home.html.twig', [
            'cars' => $cars,
        ]);
    }

    /**
     * Page de détail d'une voiture
     */
    #[Route('/car/{id}', name: 'app_car')]
    public function car(CarRepository $carRepository, int $id): Response
    {
        $car = $carRepository->find($id);

        if(!$car) {
            return $this->redirectToRoute('app_error');
        }

        return $this->render('car.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * Suppression d'une voiture
     */
    #[Route('/car/{id}/delete', name: 'app_car_delete')]
    public function deleteCar(CarRepository $carRepository, EntityManagerInterface $entityManager,  int $id): Response
    {
        $car = $carRepository->find($id);

        if(!$car) {
            return $this->redirectToRoute('app_error');
        }

        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }

    /**
     * Page d'erreur
     */
    #[Route('/errorPage', name: 'app_error')]
    public function error(): Response
    {
        return $this->render('error.html.twig', ['error' => 'Cette voiture est inexixtante']); 
    }
}
