<?php

namespace App\Http\Controllers;

use App\Mail\ProductsExportMail;
use App\Models\User;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = User::whereIn('type', ['seller', 'admin'])->get();

        return view('seller.index', ['sellers' => $sellers]);
    }

    public function exportCSV()
    {
        $products = Auth::user()->products;

        $csvFileName = 'products_export.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$csvFileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Name', 'Price', 'Category', 'Quantity']);

            foreach ($products as $product) {
                fputcsv($file, [
                    $product->id,
                    $product->name,
                    $product->price,
                    $product->category->name,
                    $product->quantity,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function emailCSV(User $reciver)
    {
        $products = Auth::user()->products;

        $filename = 'products_export.csv';
        $path = storage_path("app/$filename");

        $file = fopen($path, 'w');
        fputcsv($file, ['ID', 'Name', 'Price', 'Category', 'Quantity']);

        foreach ($products as $product) {
            fputcsv($file, [
                $product->id,
                $product->name,
                $product->price,
                $product->category->name,
                $product->quantity,
            ]);
        }

        fclose($file);

        $writer = new PngWriter;

        $qrFileName = 'qr_code.png';
        $qrPath = storage_path('app/qr_code.png');
        $qrCode = new QrCode(
            data: config('app.url'),
        );
        $result = $writer->write($qrCode);
        $result->saveToFile($qrPath);

        Mail::to($reciver->email)->send(new ProductsExportMail($filename, $qrFileName, $reciver));

        File::delete($path);
        File::delete($qrPath);

        return back()->with('success', 'CSV exported and emailed successfully.');
    }
}
