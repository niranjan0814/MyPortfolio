{{-- resources/views/components/contact.blade.php --}}
@props([])

@php
    $user = auth()->user();
@endphp

<section id="contact" class="section-full bg-white py-20">
    <div class="container mx-auto max-w-4xl fade-in px-4">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center text-gray-800">Contact Me</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative text-center font-medium">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Open Popup Button -->
        <div class="text-center">
            <button id="openPopup"
                class="bg-blue-600 text-white py-3 px-8 rounded-lg font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Contact Me
            </button>
        </div>

        <!-- Popup Modal -->
        <div id="contactPopup"
            class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto border border-gray-200">
                
                <!-- Close Button -->
                <div class="flex justify-end p-4">
                    <button id="closePopup" class="text-gray-500 hover:text-gray-800 text-3xl font-light transition-colors">
                        &times;
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8">
                    
                    <!-- Left: Contact Info -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                        <div class="flex items-start gap-4 mb-6">
                            
                            <div>
                                <h3 class="text-2xl font-bold text-blue-700">Get in Touch</h3>
                                <p class="text-gray-600 mt-1">Feel free to reach out for collaborations or questions.</p>
                            </div>
                        </div>

                        <ul class="space-y-5 text-gray-700">
                            @if($user->phone)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <img src="https://img.icons8.com/?size=100&id=59818&format=png&color=007BFF" class="w-6 h-6" alt="Phone" />
                                        <div>
                                            <p class="font-medium">Phone</p>
                                            <p class="text-sm text-gray-600">{{ $user->phone }}</p>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endif

                            @if($user->email)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <img src="https://img.icons8.com/?size=100&id=12580&format=png&color=10B981" class="w-6 h-6" alt="Email" />
                                        <div>
                                            <p class="font-medium">Email</p>
                                            <p class="text-sm text-gray-600 break-all">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endif

                            @if($user->address)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <img src="https://img.icons8.com/?size=100&id=4cQ415HSv4Xx&format=png&color=000000" class="w-6 h-6" alt="Address" />
                                        <div>
                                            <p class="font-medium">Address</p>
                                            <p class="text-sm text-gray-600">{{ $user->address }}</p>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endif

                            @if($user->linkedin_url)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <img src="https://img.icons8.com/?size=100&id=13930&format=png&color=2563EB" class="w-6 h-6" alt="LinkedIn" />
                                        <div>
                                            <p class="font-medium">LinkedIn</p>
                                            <p class="text-sm text-gray-600">Professional Profile</p>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endif

                            @if($user->github_url)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <img src="https://img.icons8.com/?size=100&id=12599&format=png&color=111827" class="w-6 h-6" alt="GitHub" />
                                        <div>
                                            <p class="font-medium">GitHub</p>
                                            <p class="text-sm text-gray-600">Project Repository</p>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Right: Contact Form -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-green-600 text-white p-4 rounded-xl shadow-md">
                                <img src="https://img.icons8.com/?size=100&id=60688&format=png&color=ffffff" alt="Paper Plane" class="w-6 h-6" />
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-green-700">Send a Message</h3>
                                <p class="text-gray-600 mt-1">Fill out the form below to contact me directly.</p>
                            </div>
                        </div>

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all"
                                    placeholder="John Doe" value="{{ old('name') }}">
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all"
                                    placeholder="john@example.com" value="{{ old('email') }}">
                            </div>

                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                                <input type="text" id="subject" name="subject"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all"
                                    placeholder="Project Collaboration" value="{{ old('subject') }}">
                            </div>

                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all resize-none"
                                    placeholder="Hi Niranjan, I'd love to discuss...">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-indigo-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const popup = document.getElementById('contactPopup');
            const openBtn = document.getElementById('openPopup');
            const closeBtn = document.getElementById('closePopup');

            openBtn.addEventListener('click', () => popup.classList.remove('hidden'));
            closeBtn.addEventListener('click', () => popup.classList.add('hidden'));
            popup.addEventListener('click', (e) => {
                if (e.target === popup) popup.classList.add('hidden');
            });

            // Escape key closes modal
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
                    popup.classList.add('hidden');
                }
            });
        });
    </script>
</section>
