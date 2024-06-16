<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class StudentsImport implements ToModel, WithHeadingRow
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
            'name' => $cleanedRow['name'],
            'student_id' => $cleanedRow['student_id'],
            'class' => $cleanedRow['class'] ?? null,
            'birth_date' => $cleanedRow['birth_date'] ?? null,
            'address' => $cleanedRow['address'] ?? null,
            'phone_number' => $cleanedRow['phone_number'] ?? null,
        ]);
    }
}
