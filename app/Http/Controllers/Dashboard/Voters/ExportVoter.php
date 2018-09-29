<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classroom;

class ExportVoter extends Controller
{
    public function __invoke()
    {
        $filename = 'Data Pemilih '.date('Y');

        app('excel')->create($filename, function ($writer) {
            $classrooms = Classroom::with('voters')->get();

            foreach ($classrooms as $classroom) {
                $writer->sheet($classroom->name, function ($sheet) use ($classroom) {
                    $voters = $classroom->voters->map(function ($voter) use ($classroom) {
                        return [
                            $classroom->name,
                            $voter->name,
                            $voter->id,
                            $voter->access_code
                        ];
                    });

                    $voters->prepend(['Kelas', 'Nama', 'NIS', 'Kode Akses']);
                    $sheet->fromArray($voters->toArray(), null, 'A1', false, false);
                    $sheet->getStyle('A1:D1')->applyFromArray([
                        'font' => ['bold' => true]
                    ]);
                    $sheet->getStyle('D1:D100')->getFont()->setName('Consolas');
                    $sheet->getStyle('D1:D100')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                });
            }
        })->download('xlsx');
    }
}
