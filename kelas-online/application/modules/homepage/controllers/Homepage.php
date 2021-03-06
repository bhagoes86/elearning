<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Model\Kelas\Course;

class Homepage extends Admin
{
    protected $repository;
    protected $roles = [];

    public function __construct()
    {
        parent::__construct();

        $this->repository = new Library\Kelas\CourseRepository;
    }

    public function index()
    {
        if (sentinel()->inRole('ins')) {
            redirect('dashboard', 'refresh');

            return;
        }

        $popular            = $this->repository->getPopular()->take(4);
        $latest             = $this->repository->getLatest()->take(8);
        $category_lists     = $this->repository->getCategoryLists();

        $category_lists     = ['All Category'] + $category_lists;

        $this->template->build('index', compact('popular', 'latest', 'category_lists'));
    }
}

/* End of file Dashboard.php */
/* Location: ./application/modules/learner/Dashboard.php */