<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *       http://example.com/index.php/welcome
     *   - or -
     *       http://example.com/index.php/welcome/index
     *   - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
//load model , session and helper
        parent::__construct();
        $this->load->model('list_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {

        } else {
            redirect(base_url() . 'user/loadLogin');
        }

        $list_data = $this->list_model->get_list($this->session->userdata('user_id'));
        $this->session->set_userdata('lists', $list_data);
        $this->load->view('user_profile');
    }

    public function test()
    {
        //$this->input->post->('status');
        echo $this->input->post('status');
    }

    public function add_list($name, $start, $end)
    {
        $url_name = str_replace('%20', ' ', $name);
        $event['event_start'] = $start;
        $event['event_end'] = $end;
        $event['event_name'] = $url_name;
        $event['user_id'] = $this->session->userdata('user_id');
        $event['is_completed'] = '0';
        $res = $this->list_model->list($event);
        $list_data = $this->list_model->get_list($this->session->userdata('user_id'));
        $this->session->set_userdata('lists', $list_data);
        redirect('lists/index');
    }

    public function delete_list($id)
    {
        echo $id;
        $this->list_model->delete_list($id);
        redirect('lists/index');
    }

    public function update_list($id)
    {
        $res = $this->list_model->get_status($id);
        print_r($res);
        if ($res['0']['is_completed'] == 1) {
            echo 'complete';
            $arr = array(
                'is_completed' => '0'
            );
            $this->list_model->update_list($id, $arr);
        } else {
            echo 'not';
            $arr = array(
                'is_completed' => '1'
            );
            $this->list_model->update_list($id, $arr);
        }
//
        redirect('lists/index');
    }
}

?>