<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kyhan;
use Carbon\Carbon;
use App\Models\BcDoanhSo;
use App\Models\BcSoLuongSo;
use App\Models\PassBookHistory;
use Mockery\Generator\StringManipulation\Pass\Pass;

class Report extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'hệ thống tạo báo cáo tự động';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $startDay = Carbon::now()->subDays(1);
        $endDay = Carbon::now();

        $kyhan = Kyhan::all();
        foreach ($kyhan as $k) {
            // bao cao doanh thu
            $bcdoanhthu = new BcDoanhSo();
            $bcdoanhthu->makyhan = $k->makyhan;
            $sotietkiem = $k->ListPassbook->where('ngaydongso', null);
            foreach ($sotietkiem as $stks) {
                $lichsu = $stks->history;
                foreach ($lichsu as $ls) {
                    $ngaygiaodich = Carbon::parse($ls->ngaygiaodich);
                    if ($ngaygiaodich->betweenIncluded($startDay, $endDay)) {
                        $type = $ls->loaigd;
                        switch ($type) {
                            case PassBookHistory::DEPOSIT:
                                $bcdoanhthu->tongthu += $ls->sotien;
                                break;
                            case PassBookHistory::WITHDRAW:
                                $bcdoanhthu->tongchi += $ls->sotien;
                                break;
                        }
                    }
                }
            }
            $bcdoanhthu->save();

            // bc so luong so
            $sotietkiem = $k->ListPassbook;
            $bcsls = new BcSoLuongSo();
            $bcsls->makyhan = $k->makyhan;
            foreach ($sotietkiem as $stks) {
                $ngaymo = Carbon::parse($stks->ngaymoso);
                if ($ngaymo->betweenIncluded($startDay, $endDay)) {
                    $bcsls->sl_somoi++;
                }
                if ($stks->ngaydongso != null) {
                    $ngaydong = Carbon::parse($stks->ngaydongso);
                    if ($ngaydong->betweenIncluded($startDay, $endDay)) {
                        $bcsls->sl_sodong++;
                    }
                }
            }
            $bcsls->save();
        }
    }
}
