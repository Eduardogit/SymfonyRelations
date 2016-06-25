<?php

namespace relacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use relacionBundle\Entity\TablaDos;
use relacionBundle\Form\TablaDosType;

/**
 * TablaDos controller.
 *
 */
class TablaDosController extends Controller
{

    /**
     * Lists all TablaDos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('relacionBundle:TablaDos')->findAll();

        return $this->render('relacionBundle:TablaDos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TablaDos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TablaDos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tablados_show', array('id' => $entity->getId())));
        }

        return $this->render('relacionBundle:TablaDos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TablaDos entity.
     *
     * @param TablaDos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TablaDos $entity)
    {
        $form = $this->createForm(new TablaDosType(), $entity, array(
            'action' => $this->generateUrl('tablados_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TablaDos entity.
     *
     */
    public function newAction()
    {
        $entity = new TablaDos();
        $form   = $this->createCreateForm($entity);

        return $this->render('relacionBundle:TablaDos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TablaDos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('relacionBundle:TablaDos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TablaDos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('relacionBundle:TablaDos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TablaDos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('relacionBundle:TablaDos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TablaDos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('relacionBundle:TablaDos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TablaDos entity.
    *
    * @param TablaDos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TablaDos $entity)
    {
        $form = $this->createForm(new TablaDosType(), $entity, array(
            'action' => $this->generateUrl('tablados_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TablaDos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('relacionBundle:TablaDos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TablaDos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tablados_edit', array('id' => $id)));
        }

        return $this->render('relacionBundle:TablaDos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TablaDos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('relacionBundle:TablaDos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TablaDos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tablados'));
    }

    /**
     * Creates a form to delete a TablaDos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tablados_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
