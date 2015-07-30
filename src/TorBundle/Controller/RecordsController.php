<?php

namespace TorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TorBundle\Entity\Records;
use TorBundle\Form\RecordsType;

/**
 * Records controller.
 *
 */
class RecordsController extends Controller
{

    /**
     * Lists all Records entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TorBundle:Records')->findAll();

        return $this->render('TorBundle:Records:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function indexUserAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TorBundle:Records')->findAll();

        return $this->render('TorBundle:Records:indexUser.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Records entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Records();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('records_show', array('id' => $entity->getId())));
        }

        return $this->render('TorBundle:Records:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Records entity.
     *
     * @param Records $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Records $entity)
    {
        $form = $this->createForm(new RecordsType(), $entity, array(
            'action' => $this->generateUrl('records_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Records entity.
     *
     */
    public function newAction()
    {
        $entity = new Records();
        $form   = $this->createCreateForm($entity);

        return $this->render('TorBundle:Records:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Records entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TorBundle:Records')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Records entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TorBundle:Records:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Records entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TorBundle:Records')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Records entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TorBundle:Records:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Records entity.
    *
    * @param Records $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Records $entity)
    {
        $form = $this->createForm(new RecordsType(), $entity, array(
            'action' => $this->generateUrl('records_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Records entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TorBundle:Records')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Records entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('records_edit', array('id' => $id)));
        }

        return $this->render('TorBundle:Records:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Records entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TorBundle:Records')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Records entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('records'));
    }

    /**
     * Creates a form to delete a Records entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('records_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
