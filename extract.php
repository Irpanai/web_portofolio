<?php

$transcript_file = 'C:\\Users\\muham\\.gemini\\antigravity-ide\\brain\\ae19af27-e8ed-4899-85e0-54aa71d00b1e\\.system_generated\\logs\\transcript_full.jsonl';
$handle = fopen($transcript_file, 'r');
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if (strpos($line, 'welcome.blade.php') !== false) {
            $data = json_decode($line, true);
            if (isset($data['content']) && strpos($data['content'], 'Total Bytes') !== false && strpos($data['content'], 'Showing lines') !== false) {
                file_put_contents('recovered.txt', $data['content']);
                echo 'Found file content block!';
                exit(0);
            }
        }
    }
    fclose($handle);
}
echo 'Not found.';
