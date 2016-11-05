<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class admin
 */
class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');
    }

    public function index()
    {
        $this->data['list'] = $this->admin_model->get()->result();


        parent::renderer();
    }

    public function edit($id = NULL)
    {

        if ($this->uri->segment(3) == 'editar' && (int)$id === 0) {
            redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/novo');
        } elseif ($id > 0) {
            $data = $this->admin_model->get(array('id' => $id))->result();
            if (count($data) > 0) {
                $data = current($data);
                $this->data['data'] = $data;
            }
        }

        parent::renderer();
    }

    public function save($id = NULL)
    {
        $id = (int)$id;
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Nome', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->setError(validation_errors());
                if ($id === 0) {
                    $redirect = '/novo';
                } else {
                    $redirect = '/editar/' . $id;
                }
                redirect($this->uri->segment(1) . '/' . $this->uri->segment(2) . $redirect);
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email')
                );

                if ($this->input->post('password')) {
                    $data['password'] = md5($this->input->post('password'));
                }

                if ($id === 0) {
                    $id = $this->admin_model->insert($data, true);
                } else {
                    $this->admin_model->update(array('id' => $id), $data);
                }
                if ($id === 0) {
                    $this->setError('Tenho todas informações, mas não consegui gravar. Preciso analisar meus logs');
                } else {
                    $this->setMsg('Guardei essas informações, quando precisar é só pedir');
                }
            }
        } else {
            $this->setError('Ocorreu um erro ao processar o formulario, tente novamente mais tarde');
        }
        redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
    }

    public function delete($id)
    {
        $this->admin_model->delete(array('id' => $id));
        $this->setMsg('Joguei essas informações fora, não venha me perguntar sobre elas no futuro...');
        redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
    }
}