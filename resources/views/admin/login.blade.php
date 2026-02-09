<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FreeSWITCH CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-600 to-purple-700 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">FreeSWITCH CMS</h1>
            <p class="text-gray-600 mt-2">Advanced Call Center Management System</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
            <p class="text-sm font-semibold text-blue-800 mb-2">Test Credentials:</p>
            <div class="text-xs text-blue-700 space-y-1">
                <p><strong>Admin:</strong> admin@freeswitch.com / admin123</p>
                <p><strong>Manager:</strong> manager@freeswitch.com / manager123</p>
                <p><strong>Supervisor:</strong> supervisor@freeswitch.com / supervisor123</p>
            </div>
        </div>

        <form action="/admin/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    placeholder="admin@freeswitch.com" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    placeholder="Enter password" required>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 text-white font-bold py-3 rounded-lg hover:from-indigo-700 hover:to-purple-800 transition-all duration-300 transform hover:scale-105">
                Sign In
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            <p>© 2024 FreeSWITCH CMS. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
