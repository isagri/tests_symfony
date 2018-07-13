<?php


namespace App\Controller;

use Symfony\Component\DependencyInjection\Tests\Compiler\D;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Product;
use App\Entity\Category;

//symfony 4.0
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends Controller
{

    /**
     * @Route("/testvalidator", name="testvalidator")
     */
    public function testvalidator(ValidatorInterface $validator)
    //public function testvalidator()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        //$product->setName('screen//');
        $name = '12345678901234567890123456789012345678901234567890' .
                '12345678901234567890123456789012345678901234567890' .
                '12345678901234567890123456789012345678901234567890' .
                '12345678901234567890123456789012345678901234567890' .
                '12345678901234567890123456789012345678901234567890' .
                '12345isabelle';
        $name = '';
        $name = 1234567890;
        $available = 1;
        $product->setName(11);
        $product->setPrice(-123);
        $product->setAvailable(true);
        $product->setDescription('1');
        $product-> setCategory(new Category());
        //$product->setDate1(new \DateTime());
        $product->setDate1(new \DateTime());
        $product->setDatetime2(new \DateTime());
        $product->setStatus(123);
        $product->setLatitude('999999.999999995');
        $product->setSize(9999999999.4);


        //$validator = $this->get('validator');
        $errors = $validator->validate($product,null,array('Default'));


        //$errors = $validator->validate($product,null,['superieur7']);
        //$errors = $validator->validate($product,null,['superieur7','Default']);

        if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
        * ConstraintViolationList object. This gives us a nice string
        * for debugging.
        */
        /*
            $errorsString = (string) $errors;
            return new Response($errorsString);
        */
            $msgEntete = 'Erreur sur le produit  id= ' . $product->getId() . ', name=  ' . $product->getName() . ',price= ' . $product->getPrice();
            return $this->render('errorValidator.html.twig',[
                'controller_name' => 'ProductController',
                'msgEntete' => $msgEntete,
                'errors' => $errors,
            ]);
        }

        return new Response('The product is valid! Yes!');
    }


    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager->getRepository(Category::class)->find(1);

        $product = new Product();
        //$product->setName('Keyboard');

        $available = '12345678901234567890123456789012345678901234567890' .
            '12345678901234567890123456789012345678901234567890' .
            '12345678901234567890123456789012345678901234567890' .
            '12345678901234567890123456789012345678901234567890' .
            '12345678901234567890123456789012345678901234567890' .
            '12345isabelle';
        $name = true;
        //sleep(60);
        $available = ( $name =='keyboard');
        $product->setName($name);
        $product->setPrice(-123);
        $product->setDescription('xx');
        $product->setAvailable(1);
        $product->setCategory($category);
        $product->setDate2(new \DateTime());
        //$product->setDate2("2015-03-12");
        $product->setDatetime2(new \DateTime());
        $product->setLatitude('999999.999999995');
        $product->setSize('9999999999.4');





        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        // ne fonctionne pas : return new Response('Saved new product with id '.$product->getId());
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'message' => 'produit créé : ',
            'product' => $product,
        ]);

    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'message' => 'produit : ',
            'product' => $product,
        ]);


    }
    /**
     * @Route("/product/update/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }
    /**
     * @Route("/product/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'message' => 'produit supprimé : ',
            'product' => $product,
        ]);
    }

}

