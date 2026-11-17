import json
import sys

transcript_file = r"C:\Users\muham\.gemini\antigravity-ide\brain\ae19af27-e8ed-4899-85e0-54aa71d00b1e\.system_generated\logs\transcript_full.jsonl"
with open(transcript_file, 'r', encoding='utf-8') as f:
    for line in f:
        try:
            data = json.loads(line)
            if data.get('type') == 'TOOL_RESPONSE' and data.get('tool_calls'):
                pass
            if 'welcome.blade.php' in line:
                if 'Showing lines' in data.get('content', '') or 'Total Bytes' in data.get('content', ''):
                    print("Found file content block!")
                    with open('recovered.txt', 'w', encoding='utf-8') as out:
                        out.write(data['content'])
                    sys.exit(0)
        except Exception as e:
            pass

print("Not found.")
