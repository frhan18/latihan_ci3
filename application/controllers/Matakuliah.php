<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Matakuliah',
            'get_matakuliah' => $this->db->get('tb_matakuliah')->result_array()
        ];

        $this->load->view('templates/header.php', $data);
        $this->load->view('matakuliah/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function form_process()
    {
        $this->form_validation->set_rules('kode_matakuliah', 'Kode MK', 'required|trim|is_unique[tb_matakuliah.kode_matakuliah]');
        $this->form_validation->set_rules('nama_matakuliah', 'Nama MK', 'required|trim');
        $this->form_validation->set_rules('sks', 'Sks', 'required|trim');

        if (!$this->form_validation->run()) {
            $data = [
                'title' => 'Daftar Matakuliah',
                'get_matakuliah' => $this->db->get('tb_matakuliah')->result_array()
            ];

            $this->load->view('templates/header.php', $data);
            $this->load->view('matakuliah/index.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $matakuliah = [
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
                'nama_matakuliah' => $this->input->post('nama_matakuliah', TRUE),
                'sks'             => $this->input->post('sks', TRUE),
            ];
            $saved_matakuliah = $this->db->insert('tb_matakuliah', $matakuliah);
            if ($saved_matakuliah) {
                $this->session->set_flashdata('message', 'Data matakuliah di tambahkan');
                redirect('list');
            }
        }
    }

    public function form_update($id = null)
    {
        $data_rows = $this->db->get_where('tb_matakuliah', ['id_matakuliah' => $id])->row_array();
        if ($data_rows['id_matakuliah'] != $id) {
            show_404();
        }

        $matakuliah = [
            'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
            'nama_matakuliah' => $this->input->post('nama_matakuliah', TRUE),
            'sks'             => $this->input->post('sks', TRUE),
        ];
        $updated_matakuliah = $this->db->update('tb_matakuliah', $matakuliah,  ['id_matakuliah' => $id]);
        if ($updated_matakuliah) {
            $this->session->set_flashdata('message', 'Data matakuliah di perbarui');
            redirect('list');
        }
    }


    public function form_delete($id = null)
    {
        $data_rows = $this->db->get_where('tb_matakuliah', ['id_matakuliah' => $id])->row_array();
        if ($data_rows['id_matakuliah'] != $id) {
            show_404();
        }

        $delete_matakuliah = $this->db->delete('tb_matakuliah', ['id_matakuliah' => $id]);
        if ($delete_matakuliah) {
            $this->session->set_flashdata('message', 'Data matakuliah di hapus');
            redirect('list');
        }
    }
}
