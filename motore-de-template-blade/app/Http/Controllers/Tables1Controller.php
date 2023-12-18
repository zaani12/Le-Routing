<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tables1Controller extends Controller
{
    public function createRecords()
    {
        // Create a new record
        $tables1Record = posts::create([
            'test' => 'test2',
            'name' => 'test name',
            'content' => 'Lorem ipsum dolor sit amet.',
        ]);

        // You can create additional records as needed
        $postsRecord2 = posts::create([
            'test' => 'test3',
            'name' => 'test name',
            'content' => 'Consectetur adipiscing elit.',
        ]);

        // ... add more records as necessary

        // To retrieve all records from the 'posts' table
        $allRecords = posts::all();

        // To retrieve a specific record by ID
        $specificRecord = posts::find(1); // Replace 1 with the actual ID

        // To update a record
        $specificRecord->update([
            'content' => 'Updated content.',
        ]);

        // To delete a record
        $specificRecord->delete();

        // You might want to return a response or redirect here
}
}