<?php

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/ryanmotor/'
        ]);
    }

    public function getAllMotor()
    {

        $response = $this->_client->request('GET', 'RyanMotor');

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'];
    }

    public function getMotorId($id)
    {
        $response = $this->_client->request('GET', 'RyanMotor', [
            'query' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'][$id];
    }

    public function tambahMotor()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "gambar" => $this->input->post('gambar', true),
            "alamat" => $this->input->post('alamat', true)
        ];

        $response = $this->_client->request('POST', 'RyanMotor', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusMotor($nama)
    {
        $response = $this->_client->delete('RyanMotor', [
            'form_params' => [
                'nama' => $nama,
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function ubahDataMotor()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "nama" => $this->input->post('nama', true),
            "gambar" => $this->input->post('gambar', true),
            "alamat" => $this->input->post('alamat', true),

        ];

        $response = $this->_client->request('PUT', 'RyanMotor', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataMahasiswa()
    {
        // $keyword = $this->input->post('keyword', true);
        // $this->db->like('nama', $keyword);
        // $this->db->or_like('gambar', $keyword);
        // $this->db->or_like('alamat', $keyword);
        // return $this->db->get('mahasiswa')->result_array();
        return false;
    }
}
