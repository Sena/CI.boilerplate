<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Post
 */
class Post extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('post_model');
    }
    public function index(){
        $this->data['list'] = $this->post_model->get()->result();

        parent::renderer();
    }
    public function edit($id = NULL){

        if($this->uri->segment(3) == 'editar' && (int) $id === 0) {
            redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/novo');
        }elseif($id > 0){
            $data = $this->post_model->get(array('id' => $id))->result();
            if(count($data) > 0){
                $data = current($data);
                $this->data['data'] = $data;
            }
        }

        if(isset($this->data['data']) === false) {
            $this->data['data'] = new stdClass();
            $this->data['data']->datetime = convertDate(date(DATE_FORMAT)) . ' ' . date('H:i:s');
        }

        parent::renderer();
    }
    public function record($id = NULL){
        $id = (int)$id;
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('text', 'Texto', 'trim|required|min_length[3]');

            if($this->form_validation->run() === FALSE){
                $this->setError(validation_errors());
                if($id === 0){
                    $redirect = '/novo';
                }else{
                    $redirect = '/editar/' . $id;
                }
                redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) .  $redirect);
            } else {
                $data = array(
                    'title' => $this->input->post('title'),
                    'text' => $this->input->post('text'),
                    'datetime' => convertDate($this->input->post('date')) . ' ' . $this->input->post('hour')
                );

                if($_FILES['img']['size'] > 0) {

                    if($id !== 0){
                        $tempVar = $this->post_model->get(array('id' => $id))->result();
                        $tempVar = current($tempVar);
                        @unlink($tempVar->img);
                    }
                    $uploadPath = './assets/upload/' . $this->router->class . '/';
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, DIR_WRITE_MODE, TRUE);
                    }
                    $this->load->library('upload', array('upload_path' => $uploadPath, 'allowed_types' => 'gif|jpg|png', 'encrypt_name' => true));

                    if ( ! $this->upload->do_upload('img')) {
                        $this->setError($this->upload->display_errors());
                    }else{
                        $file = $this->upload->data();
                        $data['img'] = $uploadPath . $file['file_name'];

                        $this->load->library('image_lib', array(
                            'source_image' => $data['img'],
                            'maintain_ratio' => TRUE,
                            'width' => 800,
                            'height' => 600
                        ));
                        if ( ! $this->image_lib->resize())
                        {
                            $this->setError($this->image_lib->display_errors());
                        }
                    }
                }
                if($id === 0){
                    $id = $this->post_model->insert($data, true);
                }else{
                    $this->post_model->update(array('id' => $id), $data);
                }
                if($id === 0) {
                    $this->setError('Tenho todas informações, mas não consegui gravar. Preciso analisar meus logs');
                }else{
                    $this->setMsg('Guardei essas informações, quando precisar é só pedir');
                }
            }
        }else{
            $this->setError('Ocorreu um erro ao processar o formulario, tente novamente mais tarde');
        }
        redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
    }
    public function delete($id)
    {
        $tempVar = $this->post_model->get(array('id' => $id))->result();
        $tempVar = current($tempVar);
        @unlink($tempVar->img);

        $this->post_model->delete(array('id' => $id));
        $this->setMsg('Joguei essas informações fora, não venha me perguntar sobre elas no futuro...');
        redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
    }
}