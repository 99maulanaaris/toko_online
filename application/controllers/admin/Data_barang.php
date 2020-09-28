<?php

class Data_barang extends CI_Controller
{
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result_array();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stock = $this->input->post('stock');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gambar Gagal di Upload</div>');
                redirect('admin/data_barang');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = [
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stock' => $stock,
            'gambar' => $gambar
        ];
        $this->model_barang->tambah_barang($data, 'tb_barang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambhakan</div>');
        redirect('admin/data_barang');
    }

    public function edit($id)
    {
        $where  = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result_array();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_brg');
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'keterangan' => $this->input->post('keterangan'),
            'kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'stock' => $this->input->post('stock'),
        ];

        $where = ['id_brg' => $id];

        $this->model_barang->update_data($where, $data, 'tb_barang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
        redirect('admin/data_barang');
    }
    public function hapus($id)
    {
        $where = ['id_brg' => $id];
        $this->model_barang->hapus_data($where, 'tb_barang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('admin/data_barang');
    }
    public function detail_barang($id)
    {
        $data['barang'] = $this->model_barang->detail_brg($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('templates_admin/footer');
    }
}
