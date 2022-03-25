<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\provinceModel;

class api extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new provinceModel();
        $data['province'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new provinceModel();
        $data = [
            'kota' => $this->request->getVar('kota'),
            'provinsi'  => $this->request->getVar('provinsi'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'data created successfully'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($id = null)
    {
        $model = new provincemodel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No datafound');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new provinceModel();
        $id = $this->request->getVar('id');
        $data = [
            'kota' => $this->request->getVar('kota'),
            'provinsi'  => $this->request->getVar('provinsi'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'data updated successfully'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $model = new provinceModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'data successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No data found');
        }
    }
}
