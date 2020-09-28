<?php

class Dashboard extends CI_Controller
{


    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);
        $data = [
            'id'      => $barang['id_brg'],
            'qty'     => 1,
            'price'   => $barang['harga'],
            'name'    => $barang['nama_brg']
        ];
        $this->cart->insert($data);
        redirect('dashboard');
    }

    public function detail_keranjang()
    {
        $data['title'] = 'Form Keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard');
    }

    public function pembayaran()
    {
        $data['title'] = 'Form Keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $is_proses  = $this->Model_invoice->index();
        if ($is_proses) {

            $this->cart->destroy();
            $data['title'] = 'Form Keranjang';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Proses Pesanana Gagal</div>');
            redirect('dashboard/detail_keranjang');
        }
    }

    public function detail($id)
    {
        $data['barang'] = $this->model_barang->detail_brg($id);
        $data['title'] = 'Form Keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
}
