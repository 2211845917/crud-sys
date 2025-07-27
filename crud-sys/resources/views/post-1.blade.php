<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Manager - Beautiful CRUD Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-gray-900 text-center mb-2">
                Posts Manager
            </h1>
            <p class="text-lg text-gray-600 text-center">
                Create, manage, and organize your blog posts with our beautiful CRUD interface
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Add Post Button -->
        <div class="mb-8">
            <button
                id="addPostBtn"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200"
            >
                <i data-lucide="plus" class="w-5 h-5"></i>
                Add New Post
            </button>
        </div>

        <!-- Add Post Form -->
        <div id="postForm" class="bg-white rounded-xl shadow-lg border border-gray-100 p-6 mb-8 hidden">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Create New Post</h2>
            <form id="addPostForm" class="space-y-4">
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700 mb-2">
                        Author Name
                    </label>
                    <input
                        type="text"
                        id="author"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        placeholder="Enter author name..."
                        required
                    />
                </div>
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Post Title
                    </label>
                    <input
                        type="text"
                        id="title"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        placeholder="Enter post title..."
                        required
                    />
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Post Content
                    </label>
                    <textarea
                        id="content"
                        rows="5"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                        placeholder="Write your post content here..."
                        required
                    ></textarea>
                </div>
                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200"
                    >
                        Publish Post
                    </button>
                    <button
                        type="button"
                        id="cancelBtn"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Posts Display -->
        <div class="space-y-4">
            <h2 id="postsHeader" class="text-2xl font-semibold text-gray-900 mb-6">
                All Posts (0)
            </h2>
            
            <!-- Empty State -->
            <div id="emptyState" class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                <div class="text-gray-400 mb-4">
                    <i data-lucide="file-text" class="w-16 h-16 mx-auto mb-4 opacity-50"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-600 mb-2">No posts yet</h3>
                <p class="text-gray-500">Click "Add New Post" to create your first blog post</p>
            </div>

            <!-- Posts Container -->
            <div id="postsContainer" class="grid gap-4 hidden">
                <!-- Posts will be dynamically added here -->
            </div>
        </div>
    </div>

    <!-- Footer Description -->
    <div class="bg-gray-900 text-white py-12 mt-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-semibold mb-4">
                Powerful Blog Management
            </h3>
            <p class="text-gray-300 text-lg leading-relaxed max-w-2xl mx-auto">
                This CRUD application demonstrates modern web development practices with HTML, Tailwind CSS, and vanilla JavaScript. 
                Create, view, and delete blog posts with a beautiful, responsive interface that works seamlessly across all devices.
            </p>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div>
                    <div class="bg-blue-600 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="plus" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Create</h4>
                    <p class="text-gray-400 text-sm">Add new posts with title, content, and author</p>
                </div>
                <div>
                    <div class="bg-green-600 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Read</h4>
                    <p class="text-gray-400 text-sm">View all posts in a clean, organized layout</p>
                </div>
                <div>
                    <div class="bg-red-600 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="trash-2" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Delete</h4>
                    <p class="text-gray-400 text-sm">Remove posts with a single click</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Posts array to store data
        let posts = [];
        let nextId = 1;

        // DOM elements
        const addPostBtn = document.getElementById('addPostBtn');
        const postForm = document.getElementById('postForm');
        const addPostForm = document.getElementById('addPostForm');
        const cancelBtn = document.getElementById('cancelBtn');
        const emptyState = document.getElementById('emptyState');
        const postsContainer = document.getElementById('postsContainer');
        const postsHeader = document.getElementById('postsHeader');

        // Show/hide form
        addPostBtn.addEventListener('click', () => {
            postForm.classList.remove('hidden');
            postForm.scrollIntoView({ behavior: 'smooth' });
        });

        cancelBtn.addEventListener('click', () => {
            postForm.classList.add('hidden');
            addPostForm.reset();
        });

        // Add new post
        addPostForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const author = document.getElementById('author').value.trim();
            const title = document.getElementById('title').value.trim();
            const content = document.getElementById('content').value.trim();

            if (author && title && content) {
                const newPost = {
                    id: nextId++,
                    author,
                    title,
                    content,
                    createdAt: new Date()
                };

                posts.unshift(newPost);
                renderPosts();
                addPostForm.reset();
                postForm.classList.add('hidden');
            }
        });

        // Delete post
        function deletePost(id) {
            posts = posts.filter(post => post.id !== id);
            renderPosts();
        }

        // Format date
        function formatDate(date) {
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // Render posts
        function renderPosts() {
            postsHeader.textContent = `All Posts (${posts.length})`;

            if (posts.length === 0) {
                emptyState.classList.remove('hidden');
                postsContainer.classList.add('hidden');
            } else {
                emptyState.classList.add('hidden');
                postsContainer.classList.remove('hidden');

                postsContainer.innerHTML = posts.map(post => `
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-200 group">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                                    ${post.title}
                                </h3>
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                                    <i data-lucide="user" class="w-4 h-4"></i>
                                    <span>By ${post.author}</span>
                                </div>
                                <p class="text-gray-600 mb-4 leading-relaxed">
                                    ${post.content}
                                </p>
                                <div class="flex items-center gap-2 text-sm text-gray-500">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                    <span>Published ${formatDate(post.createdAt)}</span>
                                </div>
                            </div>
                            <button
                                onclick="deletePost(${post.id})"
                                class="bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 p-2 rounded-lg transition-all duration-200 hover:scale-105"
                                title="Delete post"
                            >
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>
                `).join('');

                // Re-initialize Lucide icons for dynamically added content
                lucide.createIcons();
            }
        }

        // Initial render
        renderPosts();
    </script>
</body>
</html>