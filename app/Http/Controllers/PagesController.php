<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Clinic;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Xray;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{

    public function index()
    {
        // Get view file location from menu config
        $view = theme()->getOption('page', 'view');
        // Check if the page view file exist
        if (view()->exists('pages.'.$view)) {
            if($view == 'index'){
                $patientsCount = 0  ; //sizeof(Patient::all());
                $ordersCount = 0;//sizeof(Order::whereDate('created_at', Carbon::today())->get());
                $clinicsCount = 0;//sizeof(Clinic::all());
                $checkupCount =0;//sizeof(Checkup::all());
                $xrayCount = 0;//sizeof(Xray::all());
                $medicineCount =0; //sizeof(Medicine::all());
                return view('pages.'.$view, compact('patientsCount', 'ordersCount',
                'clinicsCount', 'checkupCount', 'xrayCount', 'medicineCount'));
            }else{
                return view('pages.'.$view);
            }
        }

        // Get the default inner page
        return view('inner');
    }

    /**
     * Temporary function to replace icon duotone
     */
    public function replaceIcons()
    {
        $fileContent = file_get_contents(public_path('icon_replacement.txt'));
        $lines       = explode("\n", $fileContent);

        $patterns     = [];
        $replacements = [];
        foreach ($lines as $line) {
            $el             = explode(' - ', $line);
            $patterns[]     = trim($el[0]);
            $replacements[] = trim($el[1]);
        }

        $files    = File::allFiles(resource_path());
        $filtered = array_filter($files, function ($str) {
            return strpos($str, ".php") !== false;
        });

        foreach ($filtered as $file) {
            $bladeFileContent = file_get_contents($file->getPathname());

            $bladeFileContent = str_replace($patterns, $replacements, $bladeFileContent);

            file_put_contents($file->getPathname(), $bladeFileContent);
        }
    }
}
