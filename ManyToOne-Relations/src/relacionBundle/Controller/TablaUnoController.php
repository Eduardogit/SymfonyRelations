<?php

namespace relacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use relacionBundle\Entity\TablaUno;
use relacionBundle\Entity\TablaDos;
use relacionBundle\Form\TablaUnoType;

/**
 * TablaUno controller.
 *
 */
class TablaUnoController extends Controller
{

    /**
     * Lists all TablaUno entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('relacionBundle:TablaUno')->findAll();

        return $this->render('relacionBundle:TablaUno:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TablaUno entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TablaUno();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tablauno_show', array('id' => $entity->getId())));
        }

        return $this->render('relacionBundle:TablaUno:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TablaUno entity.
     *
     * @param TablaUno $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TablaUno $entity)
    {
        $form = $this->createForm(new TablaUnoType(), $entity, array(
            'action' => $this->generateUrl('tablauno_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TablaUno entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity   = new TablaUno();
        $form     = $this->createCreateForm($entity);
        
        $entity2  = $em->getRepository('relacionBundle:TablaDos')->findAll();
        return $this->render('relacionBundle:TablaUno:new.html.twig', array(
            'entity' => $entity,
            'entity2' => $entity2,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TablaUno entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('relacionBundle:TablaUno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TablaUno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('relacionBundle:TablaUno:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TablaUno entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('relacionBundle:TablaUno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TablaUno entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('relacionBundle:TablaUno:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TablaUno entity.
    *
    * @param TablaUno $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TablaUno $entity)
    {
        $form = $this->createForm(new TablaUnoType(), $entity, array(
            'action' => $this->generateUrl('tablauno_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TablaUno entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('relacionBundle:TablaUno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TablaUno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tablauno_edit', array('id' => $id)));
        }

        return $this->render('relacionBundle:TablaUno:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TablaUno entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('relacionBundle:TablaUno')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TablaUno entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tablauno'));
    }

    /**
     * Creates a form to delete a TablaUno entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tablauno_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
