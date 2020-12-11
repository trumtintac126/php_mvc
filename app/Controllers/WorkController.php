<?php

namespace App\Controllers;

use App\Models\WorkModel;

class WorkController extends AbstractController
{
    /**
     * WorkModel
     *
     * @var WorkModel
     */
    protected $worktModel;

    /**
     * Product constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->worktModel = new WorkModel();
    }

    /**
     * List record
     *
     * @return mixed
     */
    public function index()
    {
        try {
            $data = $this->worktModel->get();

            return $this->view->render('work', $data);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Add record
     */
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'work_name'  => trim($_POST['work_name']) ?? '',
                'start_date' => trim($_POST['start_date']) ?? '',
                'end_date'   => trim($_POST['end_date']) ?? '',
                'status'     => trim($_POST['status']),
            ];

            // TODO: handle validate

            try {
                $this->worktModel->add($data);

                return $this->redirect('/');
            } catch (\Exception $exception) {
                // TODO : handle save LOG
                return $this->view->render('addWork');
            }
        } else {
            return $this->view->render('addWork');
        }
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function edit($id)
    {
        $work = $this->worktModel->show($id);

        if (! $work) {
            return $this->redirect('/');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'work_name'  => trim($_POST['work_name']) ?? '',
                'start_date' => trim($_POST['start_date']) ?? '',
                'end_date'   => trim($_POST['end_date']) ?? '',
                'status'     => trim($_POST['status']),
            ];

            // TODO: handle validate

            try {
                $this->worktModel->update($id, $data);

                return $this->redirect('/');
            } catch (\Exception $exception) {
                // TODO : handle save LOG
                return  $this->view->render('editWork', $work);
            }
        } else {
            return  $this->view->render('editWork', $work);
        }
    }

    /**
     * Remove record
     *
     * @param int $id WorkId
     *
     * @return mixed
     */
    public function remove($id)
    {
        $work = $this->worktModel->show($id);

        if (! $work) {
            return $this->redirect('/');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->worktModel->removeById($id);

                return $this->redirect('/');
            } catch (\Exception $exception) {
                // TODO : handle save LOG
                return  $this->view->render('deleteWork', $work);
            }
        } else {
            return  $this->view->render('deleteWork', $work);
        }
    }
}