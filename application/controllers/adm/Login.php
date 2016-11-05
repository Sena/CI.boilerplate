<?php

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        if (isset($this->data['adm']->id)) {

            if ($this->session->userdata('adm')) {
                $this->session->unset_userdata('adm');
            }

            unset($this->data['adm']);
        }
        $this->data['email'] = $this->session->flashdata('email');

        parent::renderer();
    }

    public function auth()
    {
        if ($this->input->post()) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('password', 'Senha', 'trim|required');

            $this->session->set_flashdata('email', $this->input->post('email'));

            if ($this->form_validation->run() === FALSE) {
                $this->setError(validation_errors());
            } else {
                $adm = $this->admin_model->get(
                    array(
                        'email' => $this->input->post('email')
                    )
                )->result();

                if (count($adm) === 0) {
                    $this->setError('Não achei esse e-mail. Tem certeza que escreveu certo?');
                } else {
                    $adm = current($adm);
                    if ($adm->password != md5($this->input->post('password'))) {
                        $this->setError($adm->name . ', a sua senha está errada');
                    } elseif ((int)$adm->status_id != 1) {
                        $this->setError($adm->name . ', seu perfil não está ativo. Queria falar nada não, mas acho que... melhor falar com o RH');
                    } else {

                        if ($this->input->post('remember') == 1) {

                            $cookie = array(
                                'name' => 'hash',
                                'value' => md5($adm->password . $this->config->config['encryption_key']),
                                'expire' => '86500'
                            );
                            $this->input->set_cookie($cookie);

                        }
                        $this->session->set_userdata('adm', $adm);
                        redirect($this->uri->segment(1));
                    }
                }
            }
        } else {
            $this->setError('Ocorreu um erro ao processar o formulario, tente novamente mais tarde');
        }
        redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
    }
}