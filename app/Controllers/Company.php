<?php

namespace App\Controllers;

use App\Models\CompanyModel;

class Company extends BaseController
{
    public function index()
    {
        $model = model(CompanyModel::class);

        $perPage = $this->request->getVar('perPage') ?? 10;
        $page = $this->request->getVar('page') ?? 1;

        $type = $this->request->getVar('type');
        $search = $this->request->getVar('search');

        $companies = null;

        if (isset($type) && isset($search)) {
            $companies = $model->select('*')
                ->where([$type => $search])
                ->paginate($perPage, 'default', $page);
        } else {
            $companies = $model->paginate($perPage, 'default', $page);
        }

        $data = [
            'companies' => $companies,
            'pager' => $model->pager,
            'perPage' => $perPage,
            'type' => $type,
            'search' => $search
        ];

        return view('companies/index', $data);
    }

    public function new() {

        if ($this->request->getMethod() == 'post') {

            $model = model(CompanyModel::class);

            $name = $this->request->getPost('name');
            $nit = $this->request->getPost('nit');
            $nrc = $this->request->getPost('nrc');
            $city = $this->request->getPost('city');

            $data = [
                'name' => $name,
                'nit' => $nit,
                'nrc' => $nrc,
                'city' => $city,
            ];

            if ($model->insert($data) === false)
                return view('companies/new', ['errors' => $model->errors()]);

            return redirect()->to('/companies/new')
                ->with('type', 'success')
                ->with('msg', 'Added successfully');
        }

        return view('companies/new');

    }

    public function edit($id) {

        $model = model(CompanyModel::class);

        if ($this->request->getMethod() == 'post') {

            $id = $this->request->getPost('id');
            $name = $this->request->getPost('name');
            $nit = $this->request->getPost('nit');
            $nrc = $this->request->getPost('nrc');
            $city = $this->request->getPost('city');

            $data = [
                'name' => $name,
                'nit' => $nit,
                'nrc' => $nrc,
                'city' => $city,
            ];

            if ($model->update($id, $data) === false) {
                $data['id'] = $id;
                return view('companies/edit', ['errors' => $model->errors(), 'company' => $data]);
            }

            return redirect()->to('/companies')
                ->with('type', 'info')
                ->with('msg', 'Updated successfully');
        }

        $company =  $model->find($id);

        return view('companies/edit', ['company' => $company]);
    }

    public function delete($id) {

        $model = model(CompanyModel::class);
        $model->delete($id);

        return redirect()->to('/companies')
            ->with('type', 'danger')
            ->with('msg', 'Deleted successfully');

    }
}
