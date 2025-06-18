<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-bold text-center mb-6">IP Checker</h1>
        
        <div class="space-y-4">
            <div class="bg-gray-50 p-4 rounded">
                <h2 class="text-sm font-semibold text-gray-600 mb-1">Your IP Address</h2>
                <p class="text-xl font-mono">{{ $ip }}</p>
            </div>
            
            <div class="bg-gray-50 p-4 rounded">
                <h2 class="text-sm font-semibold text-gray-600 mb-1">User Agent</h2>
                <p class="text-sm font-mono break-all">{{ $userAgent }}</p>
            </div>
        </div>

        <div class="mt-8 space-y-4">
            <div>
                <p class="text-sm text-gray-600 mb-2">Get your IP using curl:</p>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm font-mono">curl {{ url('/ip') }}</p>
                </div>
            </div>

            <div>
                <p class="text-sm text-gray-600 mb-2">Get only the IP address:</p>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm font-mono">curl {{ url('/ip') }} | jq -r .ip</p>
                </div>
            </div>

            <div>
                <p class="text-sm text-gray-600 mb-2">Example response:</p>
                <div class="bg-gray-50 p-3 rounded">
                    <pre class="text-sm font-mono">{
  "ip": "{{ $ip }}",
  "user_agent": "curl/7.xx.x"
}</pre>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 