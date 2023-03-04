<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnFormatting, ShouldAutoSize
{
    public function query()
    {
        return Product::with(['Category:id,name']);
    }

    public function map($product) : array
    {
        return [
            $product->id,
            $product->name,
            $product->category->name,
            Date::dateTimeToExcel($product->created_at),
            Date::dateTimeToExcel($product->updated_at),
        ];
    }

    public function columnFormats() : array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings() : array
    {
        return [
            'Id',
            'Product Name',
            'Category',
            'Created At',
            'Updated At',
        ];
    } 

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => 'true'],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => Color::COLOR_GREEN],
                ]
            ],

        ];
    }
}
