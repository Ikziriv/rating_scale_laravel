<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Penilaian;
use App\Indikator;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::all();
        return view('backend.pages.penilaian.index', compact('penilaians'));
    }

    public function create()
    {
        $indikators = Indikator::all();
        $user = User::all();
        return view('backend.pages.penilaian.create', compact('indikators', 'user'));
    }

    public function store(Request $request)
    {
        $id = $request->user_id;
        $penilaian = $request->all();
        $iv1 = ($penilaian['nilai_1'] / $penilaian['banding_1']) * $penilaian['bobot_1'];
        $iv2 = ($penilaian['nilai_2'] / $penilaian['banding_2']) * $penilaian['bobot_2'];
        $iv3 = ($penilaian['nilai_3'] / $penilaian['banding_3']) * $penilaian['bobot_3'];
        $iv4 = ($penilaian['nilai_4'] / $penilaian['banding_4']) * $penilaian['bobot_4'];
        $iv5 = ($penilaian['nilai_5'] / $penilaian['banding_5']) * $penilaian['bobot_5'];
        $iv6 = ($penilaian['nilai_6'] / $penilaian['banding_6']) * $penilaian['bobot_6'];
        $iv7 = ($penilaian['nilai_7'] / $penilaian['banding_7']) * $penilaian['bobot_7'];
        $iv8 = ($penilaian['nilai_8'] / $penilaian['banding_8']) * $penilaian['bobot_8'];
        $iv9 = ($penilaian['nilai_9'] / $penilaian['banding_9']) * $penilaian['bobot_9'];
        $iv10 = ($penilaian['nilai_10'] / $penilaian['banding_10']) * $penilaian['bobot_10'];
        $iv11 = ($penilaian['nilai_11'] / $penilaian['banding_11']) * $penilaian['bobot_11'];
        $total = $iv1 + $iv2 + $iv3 + $iv4 + $iv5 + $iv6 + $iv7 + $iv8 + $iv9 + $iv10 + $iv11;
        $conv = number_format($total);
        $nilai = new Penilaian();
        if(($conv = 0 && $conv <= 45)) {
            $nilai->user_id =$id;
            $nilai->peringkat = 1;
            $nilai->skala = 'E';
            $nilai->ket = 'Sangat Buruk';
            $nilai->nilai = $total;
        }
        if(($conv = 46 && $conv <= 60)) {
            $nilai->user_id =$id;
            $nilai->peringkat = 2;
            $nilai->skala = 'D';
            $nilai->ket = 'Buruk';
            $nilai->nilai = $total;
        }
        if(($conv = 61 && $conv <= 75)) {
            $nilai->user_id =$id;
            $nilai->peringkat = 3;
            $nilai->skala = 'C';
            $nilai->ket = 'Cukup Baik';
            $nilai->nilai = $total;
        }
        if(($conv = 76 && $conv <= 85)) {
            $nilai->user_id =$id;
            $nilai->peringkat = 4;
            $nilai->skala = 'B';
            $nilai->ket = 'Baik';
            $nilai->nilai = $total;
        }
        if(($conv = 86 && $conv >= 100)) {
            $nilai->user_id = $id;
            $nilai->peringkat = 4;
            $nilai->skala = 'B';
            $nilai->ket = 'Baik';
            $nilai->nilai = $total;
        }
        $nilai->save();
        return redirect()->route('penilaian.index')->with('success','Penilaian berhasil ditambahkan');
    }

    public function edit(Penilaian $penilaian)
    {
        return view('backend.pages.penilaian.edit', compact('penilaian'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $penilaian->update($request->all());

        return redirect()->route('penilaian.index')->with('success','Penilaian berhasil diubah');
    }

    public function show(Penilaian $penilaian)
    {
        return view('backend.pages.penilaian.show', compact('penilaian'));
    }

    public function destroy($id)
    {
        $penilaian = Penilaian::find($id);
        $penilaian->delete();

        return redirect()->back()->with('success','Penilaian berhasil dihapus');
    }

    public function daily(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));
        $user = $request->get('user_id');
        $users = DB::table('users')->select('id', 'username')->get();

        $penilaian = Penilaian::orderBy('created_at', 'desc')
            ->whereDate('created_at', 'like', $date.'%')
            ->orWhere('user_id',$user)
            ->get();

        return view('backend.pages.penilaian.reports.daily', compact('users', 'penilaian', 'date'));
    }

    public function monthly(Request $request)
    {
        $years = getYears();
        $months = getMonths();
        $users = DB::table('users')->select('id', 'username')->get();

        $user = $request->get('user_id');
        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));
        $reports = $this->getMonthlyReports($user, $year, $month);

        return view('backend.pages.penilaian.reports.monthly', compact('users', 'reports', 'months', 'years', 'month', 'year'));
    }

    public function yearly(Request $request)
    {
        $years = getYears();
        $months = getMonths();
        $users = DB::table('users')->select('id', 'username')->get();

        $user = $request->get('user_id');
        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));
        $reports = $this->getYearlyReports($user, $year);

        return view('backend.pages.penilaian.reports.yearly', compact('users', 'reports', 'months', 'years', 'month', 'year'));
    }

    private function getMonthlyReports($user, $year, $month)
    {
        $rawQuery = 'DATE(created_at) as date';
        $rawQuery .= ', user_id as id_user';
        $rawQuery .= ', nilai AS nilai_pg';

        $reportsData = DB::table('penilaians')->select(DB::raw($rawQuery))
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orWhere('user_id',$user)
            // ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $reports = [];
        foreach ($reportsData as $report) {
            $key = substr($report->date, -2);
            $reports[$key] = $report;
            $reports[$key]->nilai_pg = $report->nilai_pg;
        }

        return collect($reports);
    }

    private function getYearlyReports($user, $year)
    {
        $rawQuery = 'MONTH(created_at) as month';
        $rawQuery .= ', count(`user_id`) as count';
        $rawQuery .= ', sum(nilai) AS amount';

        $reportsData = DB::table('penilaians')->select(DB::raw($rawQuery))
            ->where(DB::raw('YEAR(created_at)'), $year)
            ->orWhere('user_id',$user)
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->groupBy('created_at')
            ->get();

        $reports = [];
        foreach ($reportsData as $report) {
            $key = str_pad($report->month, 2, '0', STR_PAD_LEFT);
            $reports[$key] = $report;
            $reports[$key]->total = $report->amount;
        }

        return collect($reports);
    }
}
