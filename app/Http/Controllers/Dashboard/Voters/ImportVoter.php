<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classroom;
use App\Voter;

class ImportVoter extends Controller
{
    /**
     * method for import voter from excel
     * 
     * @return redirect
     */
    public function __invoke(Request $request)
    {
        /**
         * get all list of voters
         */
        Voter::truncate();

        /**
         * read excel
         */
        $excel = app('excel')->load($request->excel_file, function ($reader) use ($request) {
            $sheets = $reader->get();

            /**
             * create new classroom based on excel title
             */
            foreach ($sheets as $sheet) {
                $classroom = Classroom::firstOrCreate([
                    'name' => $sheet->getTitle()
                ]);

                /**
                 * importing the column
                 */
                foreach ($sheet->all() as $voter) {
                    $classroom->voters()->create([
                        'id' => $voter->nis,
                        'name' => $voter->nama,
                        'access_code' => str_random(5)
                    ]);
                }
            }
        });

        return redirect()
            ->route('dashboard.voters')
            ->with('success', 'Data pemilih berhasil diimpor');
    }
}
