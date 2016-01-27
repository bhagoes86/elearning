<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array(
            'Model_thread'  => 'model_thread',
            'Model_visitor' => 'model_visitor',
            'Model_topic'   => 'model_topic'
        ));
        $this->load->helper(array('bbcodeparser','visitor','thread'));

        if(!sentinel()->check()) {
            redirect(login_url());
        }
    }
    
    public function index()
    {
        if($this->session->flashdata('success')){
            $data['success'] = $this->session->flashdata('success');
        }elseif($this->session->flashdata('failed')){
            $data['failed'] = $this->session->flashdata('failed');
        }

        $user = sentinel()->getUser();
        $daerahUser         = $user->profile->desa_id;
        if ($this->checkTA()==TRUE){
            $data['addTopic']       = anchor('topic/create', '<i class="fa fa-plus"></i> Topic Baru', 'class="btn btn-primary btn-sm"');
            $data['dashTopic']      = anchor('topic/', 'Your Topics', 'class="btn btn-primary btn-sm"');
            $data['draftSide']      = $this->model_thread->get_all_drafts($user->id);
            $data['tenagaAhli']     = $user->id;
            $data['threadSide']     = $this->model_thread->get_all_threads($daerahUser, $user->id);
            $threads                = collect($this->model_thread->get_all_threads($daerahUser, $user->id));
        }else{
            $data['threadSide'] = $this->model_thread->get_threads_by_user($daerahUser, $user->id);
            $threads            = collect($this->model_thread->get_threads_by_user($daerahUser, $user->id));
        }
        
        $data['categoryUser']   = $this->model_thread->get_all_category_user();
        $data['authorSide']     = $this->model_thread->get_thread_from_author($user->id);
        $data['comments']       = $this->model_thread->get_count_reply(); 
        $data['visitors']       = $this->model_visitor->get_visitors();
        $data['categoriesHead'] = $this->model_thread->get_categories();
        $data['categoriesSide'] = $this->model_thread->get_categories();
        $data['topics']         = $this->model_topic->get_approved_topics();
        $data['closeThreads']   = $this->model_thread->get_close_threads($user->id);
        $data['threadMembers']  = $this->model_thread->get_thread_members();
        $data['commentsSide']   = $this->model_thread->get_comments_from_author($user->id);
        $data['userID']         = $user->id;

        $data['threads']        = pagination($threads, 10, 'thread', 'bootstrap_md');

        $this->load->view('thread/all_threads',$data);
    }

    public function category($idCategory)
    {
        $getCategory            = $this->model_thread->get_category($idCategory);
        foreach($getCategory as $cat){
            $data['category']   = $cat->category_name;
        }

        $user           = sentinel()->getUser();
        $daerahUser     = $user->profile->desa_id;
        if ($this->checkTA()==TRUE){
            $data['addTopic']   = anchor('topic/create', '<i class="fa fa-plus"></i> Topic Baru', 'class="btn btn-primary btn-sm"');
            $data['dashTopic']  = anchor('topic/', 'Your Topics', 'class="btn btn-primary btn-sm"');
            $data['draftSide']  = $this->model_thread->get_all_drafts($user->id);
            $data['tenagaAhli'] = $user->id;
            $data['threadSide'] = $this->model_thread->get_all_threads($daerahUser, $user->id);
            $threads            = collect($this->model_thread->get_threads_category($idCategory, $user->id));
        }else{
            $data['threadSide'] = $this->model_thread->get_threads_by_user($daerahUser, $user->id);
            $threads            = collect($this->model_thread->get_threads_category_by_user($idCategory, $user->id, $daerahUser));
        }
        $data['categoryUser']   = $this->model_thread->get_all_category_user();
        $data['authorSide']     = $this->model_thread->get_thread_from_author($user->id);
        $data['comments']       = $this->model_thread->get_count_reply(); 
        $data['visitors']       = $this->model_visitor->get_visitors();
        $data['categoriesHead'] = $getCategory;
        $data['categoriesSide'] = $this->model_thread->get_categories();
        $data['topics']         = $this->model_topic->get_approved_topics();
        $data['closeThreads']   = $this->model_thread->get_close_threads($user->id);
        $data['threadMembers']  = $this->model_thread->get_thread_members();
        $data['commentsSide']   = $this->model_thread->get_comments_from_author($user->id);
        $data['userID']         = $user->id;

        $data['threads']        = pagination($threads, 10, 'thread/category/'.$idCategory, 'bootstrap_md');

        $this->load->view('thread/all_threads',$data);
    }
    
    public function create()
    {
        if($this->session->flashdata('hasil')){
            $data['breadcrumb'] = $this->session->flashdata('hasil');
        }else{
            $data['breadcrumb'] = 'Post New Thread';
        }
        
        $user       = sentinel()->getUser();
        $daerahUser = $user->profile->desa_id;
        if ($this->checkTA()==TRUE){
            $data['tenagaAhli'] = $user->id;
            $data['draftSide']  = $this->model_thread->get_all_drafts($user->id);
            $data['categories'] = $this->model_thread->get_categories_by_ta($daerahUser, $user->id);
            $data['threadSide'] = $this->model_thread->get_all_threads($daerahUser, $user->id);
        }else{
            $data['threadSide'] = $this->model_thread->get_threads_by_user($daerahUser, $user->id);
            $data['categories'] = $this->model_thread->getCategory_by_Wilayah($daerahUser);
        }

        $data['userID']         = $user->id;
        $data['topics']         = $this->model_topic->get_approved_topics();
        $data['authorSide']     = $this->model_thread->get_thread_from_author($user->id);
        $data['categoriesSide'] = $this->model_thread->get_categories();
        $data['closeThreads']   = $this->model_thread->get_close_threads($user->id);
        $data['commentsSide']   = $this->model_thread->get_comments_from_author($user->id);
        $role                   = sentinel()->findRoleBySlug('lnr');
        $data['users']          = $role->users;

        $this->load->view('thread/create',$data);
    }
    
    public function post()
    {
        $this->form_validation->set_rules('kategori','Kategori','required');
        $this->form_validation->set_rules('topic','Topic','required');
        $this->form_validation->set_rules('type','Type', '');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('message','Message','required');
        
        if($this->form_validation->run()==TRUE){ 
            $user       = sentinel()->getUser();
            $idTopic    = set_value('topic');
            $status     = '1';
            $typeThread = set_value('type');
            if($typeThread == ''){
                $type='public';
            }else{
                $type='close';
            }
            
            // START : check status apabila nantinya thread perlu di approve
            // if ($this->checkTA()==TRUE){ 
            //     $userTopics = $this->model_thread->get_topics_by_user($user->id);
            //     if(checkTopic($idTopic, $userTopics) == TRUE){
            //         $status = '1';
            //     }else{
            //         $status = '0';
            //     }
            // }else{
            //     $status = '0';
            // }
            // END : check status apabila nantinya thread perlu di approve

            $data=array(
                'category'  => set_value('kategori'),
                'type'      => $type,
                'topic'     => set_value('topic'),
                'title'     => set_value('title'),
                'message'   => set_value('message'),
                'reply_to'  => '0',
                'author'    => $user->id,
                'status'    => $status,
                'created_at'=> date('Y-m-d H:i:s')
            );
            $data = $this->security->xss_clean($data); //xss clean
            $save = $this->model_thread->save_thread($data);

            if($typeThread == 'close'){
                $idThread   = $save;
                $member     = $this->input->post('member');
                foreach($member AS $key => $value){
                    $threadMember = array(
                        'thread_id'     => $idThread,
                        'user_id'       => $value,
                        'notif_status'  => '1'
                    );
                    $this->model_thread->save_thread_member($threadMember);
                }
            }

            if($save != FALSE){
                $this->session->set_flashdata('success','Thread baru berhasil dibuat');
            }else{
                $this->session->set_flashdata('failed','Thread baru tidak berhasil dibuat');
            }
            redirect('thread/');
        }else{
            $this->session->set_flashdata('failed',validation_errors());
            redirect('thread/');
        }
    }
    
    public function view($id)
    {
        $get_thread = $this->model_thread->get_thread($id);
        foreach($get_thread as $t){
            $data = array(
                'idCategory'=> $t->category,
                'category'  => $t->category_name,
                'topic'     => $t->topicName,
                'author'    => $t->author,
                'tanggal'   => $t->created_at,
                'title'     => $t->title,
                'status'    => $t->status,
                'message'   => BBCodeParser($t->message)
            );
        }

        $user                   = sentinel()->getUser();
        $visitorIdentity        = visitorIdentity($user->id,$id);
        $this->model_visitor->saveVisitor($visitorIdentity);

        $daerahUser         = $user->profile->desa_id;
        if ($this->checkTA()==TRUE){
            $data['tenagaAhli'] = $user->id;
            $data['draftSide']  = $this->model_thread->get_all_drafts($user->id);
            $data['threadSide'] = $this->model_thread->get_all_threads($daerahUser, $user->id);
        }else{
            $data['threadSide'] = $this->model_thread->get_threads_by_user($daerahUser, $user->id);
        }
        $data['authorSide']     = $this->model_thread->get_thread_from_author($user->id);
        $data['categoriesSide'] = $this->model_thread->get_categories();
        $data['closeThreads']   = $this->model_thread->get_close_threads($user->id);
        $data['commentsSide']   = $this->model_thread->get_comments_from_author($user->id);
        $data['reply']          = $this->model_thread->get_reply($id);
        $data['countReply']     = count($data['reply']);
        $data['userID']         = $user->id;
        $data['topics']         = $this->model_topic->get_approved_topics();
        $data['id']             = $id;
        
        if($this->session->flashdata('success')){
            $data['success']    = $this->session->flashdata('success');
        }elseif($this->session->flashdata('failed')){
            $data['failed']     = $this->session->flashdata('failed');
        }

        $this->load->view('thread/single',$data);
    }
    
    public function deleteThread($id)
    {
        $data   = array('id' => $id);
        $delete = $this->model_thread->delete_thread($data);

        if($delete==TRUE){
            $this->model_thread->delete_replies($id);
            $this->model_thread->delete_thread_members($id);
            $this->session->set_flashdata('success','Thread berhasil dihapus');
        }else{
            $this->session->set_flashdata('failed','Thread tidak berhasil dihapus');
        }
        redirect('thread/');
    }
    
    public function update($controller, $id)
    {
        $this->form_validation->set_rules('kategori','Kategori','required');
        $this->form_validation->set_rules('topic','Topic','required');
        $this->form_validation->set_rules('type','type','');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('message','Message','required');
        
        if($this->form_validation->run()==TRUE){    
            $data=array(
                'category'  => set_value('kategori'),
                'topic'     => set_value('topic'),
                'type'      => set_value('type'),
                'title'     => set_value('title'),
                'message'   => set_value('message'),
                'updated_at'=> date('Y-m-d H:i:s')
            );
            $data = $this->security->xss_clean($data); //xss clean
            $save = $this->model_thread->update_thread($id,$data);

            $typeThread         = set_value('type');
            if($typeThread == 'close'){
                $member         = $this->input->post('member');
                $threadMembers  = array();
                foreach($member AS $key => $value){
                    $threadMembers[]    = $value;
                }
                $this->model_thread->deleteThreadMemberUpdate($id, $threadMembers);

                foreach($member AS $key => $value){
                    $checkMember  = $this->model_thread->checkThreadMember($id, $value); 
                    if($checkMember == FALSE){
                        $threadMember = array(
                            'thread_id'     => $id,
                            'user_id'       => $value,
                            'notif_status'  => '1'
                        );
                        $this->model_thread->save_thread_member($threadMember);
                    }
                }
            }else{
                $this->model_thread->delete_thread_members($id);
            }

            if($save==TRUE){
                $this->session->set_flashdata('success','Thread berhasil diperbarui');
            }else{
                $this->session->set_flashdata('failed','Thread tidak berhasil diperbarui');
            }
            redirect($controller.'/');
        }else{
            $this->session->set_flashdata('failed',validation_errors());
            redirect($controller.'/');
        }
    }

    public function replyThread($id)
    {
        $this->form_validation->set_rules('message','Message','required');

        if($this->form_validation->run()==TRUE){
            $get_thread = $this->model_thread->get_thread($id);

            foreach($get_thread as $t){
                $category = $t->category;
                $topic    = $t->topic;
                $type     = $t->type;
                $comments = $t->comments;
            }

            $user = sentinel()->getUser();
            $data=array(
                'category'      => $category,
                'topic'         => $topic,
                'type'          => $type,
                'title'         => 'Thread Reply',
                'message'       => set_value('message'),
                'reply_to'      => $id,
                'author'        => $user->id,
                'status'        => '1',
                'created_at'    => date('Y-m-d H:i:s'),
                'notif_status'  => '1'
            );
            $post_reply = $this->model_thread->save_thread($data);

            if($post_reply==TRUE){
                $this->session->set_flashdata('success', 'Komentar anda berhasil dikirim');
            }else{
                $this->session->set_flashdata('failed', 'Komentar anda tidak berhasil dikirim');
            }
            redirect('thread/view/'.$id);
        }else{
            $this->session->set_flashdata('failed',validation_errors());
            redirect('thread/view/'.$id);
        }
    }

    public function updateReply($idThread,$idReply)
    {
        $this->form_validation->set_rules('message','Message','required');

        if($this->form_validation->run()==TRUE){
            $data = array(
                'updated_at'    => date('Y-m-d H:i:s'),
                'message'       => set_value('message')
            );

            $update = $this->model_thread->update_thread($idReply,$data);
            if($update==TRUE){
                $this->session->set_flashdata('success', 'Komentar berhasil diperbarui');
            }else{
                $this->session->set_flashdata('failed', 'Komentar tidak berhasil diperbarui');
            }

            redirect('thread/view/'.$idThread.'#'.$idReply);
        }else{
            redirect('thread/view/'.$idThread);
        }
    }

    public function deleteReply($idThread, $idReply, $userID)
    {
        $data = array(
            'id'    => $idReply,
            'author'=> $userID
        );
        $delete=$this->model_thread->delete_thread($data);
        if($delete==TRUE){
            $this->session->set_flashdata('success', 'Komentar berhasil dihapus.');
        }else{
            $this->session->set_flashdata('failed', 'Komentar tidak berhasil dihapus.');
        }
        redirect('thread/view/'.$idThread);
    }

    public function get_topics(){
        $idCategory     = $this->input->post('idCategory');
        $user           = sentinel()->getUser();
        $daerahUser = $user->profile->desa_id;
        if($this->checkTA() == TRUE){
            $getTopics  = $this->model_topic->getTopics_by_ta($user->id, $idCategory, $daerahUser);
        }else{
            $getTopics  = $this->model_topic->getTopics_by_Category($idCategory, $daerahUser);
        }
        $publicTopics   = $this->model_topic->get_public_topics($idCategory);

        $allTopics      = array();
        foreach($getTopics as $temp){
            if ( ! in_array($temp, $allTopics)) {
                $allTopics[] = $temp;
            }
        }
        foreach($publicTopics as $temp){
            if ( ! in_array($temp, $allTopics)) {
                $allTopics[] = $temp;
            }
        }

        $topics = null;
        $topics = '<option value="">- Pilih Topic -</option>';
        if(!empty($allTopics)){
            foreach($allTopics as $top){
                $topics .= '<option value="'.$top->id.'" >'.$top->topic.'</option>';
            }
        }else{
            $topics     = '<option value="">- Topic belum tersedia -</option>';
        }
        echo $topics;

    }

    public function getUserByTopic()
    {
        $idTopic    = $this->input->post('topic');
        $getTopic   = $this->model_topic->selectTopic($idTopic);
        $user = sentinel()->getUser();

        foreach($getTopic as $t){
            $daerah     = $t->daerah;
        }
        if($daerah != '00.00.00.0000'){
            $users  = Model\User::getByWilayah($daerah);
        }else{
            $users = Model\User::all();
        }

        usersOption($users, $user->id);
    }

    public function getSelectedMember()
    {
        $idTopic    = $this->input->post('topic');
        $getTopic   = $this->model_topic->selectTopic($idTopic);
        $idThread   = $this->input->post('thread');
        $getMember  = $this->model_thread->get_thread_members_by_id($idThread);
        $user = sentinel()->getUser();

        foreach($getTopic as $t){
            $daerah     = $t->daerah;
        }
        if($daerah != '00.00.00.0000'){
            $users  = Model\User::getByWilayah($daerah);
        }else{
            $users = Model\User::all();
        }
        if(!empty($getMember)){
            userSelectedOption($users, $getMember, $user->id);
        }else{
            usersOption($users, $user->id);
        }
    }

    public function checkTA()
    {
        if (sentinel()->inRole('ta')) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
