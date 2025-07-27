<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-4xl mx-auto px-4 py-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Posts Manager</h1>
            <p class="text-lg text-gray-600">Create and manage your blog posts</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Add Button -->
        <button id="addBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all mb-8">
            <i data-lucide="plus" class="w-5 h-5 inline mr-2"></i>Add New Post
        </button>

        <!-- Form -->
        <div id="form" class="bg-white rounded-xl shadow-lg p-6 mb-8 hidden">
            <h2 class="text-2xl font-semibold mb-4">Create New Post</h2>
            <input id="author" placeholder="Author name..." class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-500" required>
            <input id="title" placeholder="Post title..." class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-500" required>
            <textarea id="content" placeholder="Post content..." rows="4" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-500 resize-none" required></textarea>
            <button id="saveBtn" class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg mr-3">Publish</button>
            <button id="cancelBtn" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-6 rounded-lg">Cancel</button>
        </div>

        <!-- Posts -->
        <h2 id="header" class="text-2xl font-semibold mb-6">All Posts (0)</h2>
        
        <div id="empty" class="bg-white rounded-xl shadow-sm p-12 text-center">
            <i data-lucide="file-text" class="w-16 h-16 mx-auto mb-4 text-gray-400"></i>
            <h3 class="text-xl font-medium text-gray-600 mb-2">No posts yet</h3>
            <p class="text-gray-500">Click "Add New Post" to create your first post</p>
        </div>

        <div id="posts" class="space-y-4 hidden"></div>
    </div>

    <!-- Footer -->
    <div class="bg-gray-900 text-white py-12 mt-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-semibold mb-4">Powerful Blog Management</h3>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto">
                Modern CRUD application for managing blog posts. Create, view, and delete posts with a beautiful, responsive interface.
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();
        
        let posts = [], nextId = 1;
        const $ = id => document.getElementById(id);
        
        $('addBtn').onclick = () => {
            $('form').classList.remove('hidden');
            $('form').scrollIntoView({behavior: 'smooth'});
        };
        
        $('cancelBtn').onclick = () => {
            $('form').classList.add('hidden');
            ['author', 'title', 'content'].forEach(id => $(id).value = '');
        };
        
        $('saveBtn').onclick = () => {
            const author = $('author').value.trim();
            const title = $('title').value.trim();
            const content = $('content').value.trim();
            
            if (author && title && content) {
                posts.unshift({id: nextId++, author, title, content, date: new Date()});
                render();
                $('cancelBtn').click();
            }
        };
        
        function deletePost(id) {
            posts = posts.filter(p => p.id !== id);
            render();
        }
        
        function render() {
            $('header').textContent = `All Posts (${posts.length})`;
            
            if (posts.length === 0) {
                $('empty').classList.remove('hidden');
                $('posts').classList.add('hidden');
            } else {
                $('empty').classList.add('hidden');
                $('posts').classList.remove('hidden');
                $('posts').innerHTML = posts.map(p => `
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-all">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">${p.title}</h3>
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                                    <i data-lucide="user" class="w-4 h-4"></i>By ${p.author}
                                </div>
                                <p class="text-gray-600 mb-4">${p.content}</p>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                    ${p.date.toLocaleDateString()}
                                </div>
                            </div>
                            <button onclick="deletePost(${p.id})" class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-lg hover:scale-105 transition-all">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>
                `).join('');
                lucide.createIcons();
            }
        }
        
        render();
    </script>
</body>
</html>