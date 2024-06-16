<?php

namespace App\Imports;

use App\Models\Teachers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Clean column names by removing trailing single quotes
        $cleanedRow = [];
        foreach ($row as $key => $value) {
            $cleanedKey = rtrim($key, "'");
            $cleanedRow[$cleanedKey] = $value;
        }

        // Log the cleaned row for debugging
        Log::info('Imported Row: ', $cleanedRow);

        // Check if 'name' key exists and is not null
        if (!isset($cleanedRow['name']) || is_null($cleanedRow['name'])) {
            Log::error('Missing or null name field in row: ', $cleanedRow);
            return null; // Skip this row if 'name' is missing or null
        }

        return new Teachers([
            'name' => $row['name'],
            'class' => $row['class'],
            'birth_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birth_date']),
            'address' => $row['address'],
            'phone_number' => $row['phone_number'],
        ]);
    }
}
