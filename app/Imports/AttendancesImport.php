<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class AttedancesImport implements ToModel, WithHeadingRow
{
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

        return new Students([
            'student_id' => $cleanedRow['student_id'],
            'date' => $cleanedRow['class'] ?? null,
            'status' => $cleanedRow['birth_date'] ?? null,
        ]);
    }
}
