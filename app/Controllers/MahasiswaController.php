<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->model = new MahasiswaModel();
        helper('form');
    }

    public function index($page = 'index')
    {
        if (!is_file(APPPATH . '/Views/mahasiswa/' . $page . '.php')) {
            // if page not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $pager = \Config\Services::pager();
        $data = [
            'rows'  => $this->model->paginate(2, 'bootstrap'),
            'title' => ucfirst($page),
            'pager' => $this->model->pager
        ];

        echo view('layouts/header', $data);
        echo view('mahasiswa/' . $page, $data);
        echo view('layouts/footer');
    }

    public function detailMhs($id)
    {
        $data['title'] = "Detail data mahasiswa";
        $data['mhs'] = $this->model->getDataMhs($id);
        return view('mahasiswa/detailMhs', $data);
    }

    public function formUpdateMhs($id)
    {
        $data['title'] = "Update Mahasiswa";
        $data['mhs'] = $this->model->getDataMhs($id);
        $data['rowsProdi'] = $this->model->prodi();
        echo view('layouts/header', $data);
        echo view('mahasiswa/form-updateMhs', $data);
        echo view('layouts/footer');
    }

    public function updateMhs($id)
    {
        $validation =  \Config\Services::validation();

        $input = [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
            'foto' => $this->request->getPost('foto')
        ];

        if ($validation->run($input, 'Mahasiswa') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/Mahasiswa/edit/' . $id)->withInput();
        } else {
            // get image file
            $oldPhoto = $this->request->getFile('foto');

            if ($oldPhoto->getError() == 4) {
                $photoName = $this->request->getPost('fotoLama');
            } else {
                // generate name foto
                $photoName = $oldPhoto->getRandomName();
                // move image
                $oldPhoto->move('img', $photoName);
                // remove image file
                if ($this->request->getPost('fotoLama') != 'default.jpg') {
                    unlink('img/' . $this->request->getPost('fotoLama'));
                }
            }

            $input = [
                'nama' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'email' => $this->request->getPost('email'),
                'prodi' => $this->request->getPost('prodi'),
                'foto' => $photoName
            ];

            $updateMhs = $this->model->updateMhs($input, $id);

            if ($updateMhs) {
                session()->setFlashdata('updated', 'Data Updated');
                return redirect()->to(base_url('Mahasiswa'));
            } else {
                session()->setFlashdata('error', 'Data fail to updated');
            }
        }
    }

    public function formCreateMhs()
    {
        $data['title'] = "Create Mahasiswa";
        $data['rowsProdi'] = $this->model->prodi();
        echo view('layouts/header', $data);
        echo view('mahasiswa/form-addMhs', $data);
        echo view('layouts/footer');
    }

    public function createMhs()
    {
        $validation =  \Config\Services::validation();

        $input = [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
            'foto' => $this->request->getPost('foto')
        ];

        if ($validation->run($input, 'Mahasiswa') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/Mahasiswa/add');
        } else {
            //get image file
            $fileFoto =  $this->request->getFile('foto');

            if ($fileFoto->getError() == 4) {
                $photoName = 'default.jpg';
            } else {
                //generate name foto
                $photoName = $fileFoto->getRandomName();
                // move image
                $fileFoto->move('img', $photoName);
                //get file name
                // $photoName = $fileFoto->getName();
            }

            $save = $this->model->save([
                'nama' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'email' => $this->request->getPost('email'),
                'prodi' => $this->request->getPost('prodi'),
                'foto' => $photoName
            ]);

            if ($save) {
                session()->setFlashdata('added', 'Data created');
            } else {
                session()->setFlashdata('error', 'Data fail to created');
            }
            return redirect()->to('/Mahasiswa');
        }
    }

    public function removeMhs($id)
    {
        $mhs = $this->model->find($id);
        if ($mhs['foto'] != 'default.jpg') {
            unlink('img/' . $mhs['foto']);
        }
        $removed = $this->model->removeMhs($id);

        if ($removed) {
            session()->setFlashdata('removeMhs', 'Data removed');
        } else {
            session()->setFlashdata('error', 'Data fail to removed');
        }
        return redirect()->to('/Mahasiswa');
    }

}
