<?php
namespace App\Controllers;

use App\Models\ModulModel;
use App\Models\ProjectModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Modul extends BaseController
{
    public function modul($id_project)
    {
        $modulModel = new ModulModel();
        $userModel = new UserModel();
        $projectModel = new ProjectModel();
        $moduls = $modulModel->getModulByProject($id_project);
        $users = $userModel->findAll();
        $project = $projectModel->findAll();

        return view('home/modul', ['modul' => $moduls, 'users' => $users, 'project' => $project, 'id_project' => $id_project]);
    }

    public function proses_add_modul()
    {
        $modulModel = new ModulModel();
        $id_project = $this->request->getPost('id_project');
        $new_bobot = (int)$this->request->getPost('bobot');
        $start_date = $this->request->getPost('tanggal_mulai');
        $deadline = $this->request->getPost('deadline');

        // Validate if deadline is not before start date
        if (strtotime($deadline) < strtotime($start_date)) {
            return redirect()->back()->with('error', 'Deadline tidak boleh berada di bawah tanggal mulai.')->withInput();
        }

        // Calculate the total current bobot for the project
        $current_bobot = $modulModel->where('id_project', $id_project)->selectSum('bobot')->get()->getRow()->bobot;

        if (($current_bobot + $new_bobot) > 100) {
            return redirect()->back()->with('error', 'Total bobot cannot exceed 100.')->withInput();
        }

        $data = $this->request->getPost();

        $file = $this->request->getFile('upload');
        $namaFile = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/assets/files');
            $namaFile = $file->getName();
        }

        $data['upload'] = $namaFile;

        $modulModel->insert($data);

        return redirect()->back()->with('success', 'Module added successfully.')->withInput();
    }

    public function delete($id_modul)
    {
        $modulModel = new ModulModel();
        $modulModel->delete_modul($id_modul);
        return redirect()->back()->withInput();
    }

    public function generatePDF()
    {
        $modulModel = new ModulModel();
        $data['modul'] = $modulModel->findAll();

        $dompdf = new Dompdf();
        $html = view('modul/pdf_view', $data);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("list_modul.pdf", array("Attachment" => false));
    }

    public function view_pdf($filename)
    {
        $file = ROOTPATH . 'public/assets/files/' . $filename;

        if (file_exists($file)) {
            return redirect()->to(base_url('assets/files/' . $filename));
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
}
