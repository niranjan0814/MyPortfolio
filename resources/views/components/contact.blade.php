<!-- resources/views/components/contact.blade.php -->
<section id="contact" class="section-full bg-white">
    <div class="container mx-auto max-w-4xl fade-in">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center text-gray-800">Contact Me</h2>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <!-- Button to trigger popup -->
        <div class="text-center">
            <button id="openPopup" class="bg-blue-600 text-white py-3 px-6 rounded-lg font-bold hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg">
                Contact Me
            </button>
        </div>

        <!-- Popup Container -->
        <div id="contactPopup"
             class="fixed inset-0 flex bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-xl max-w-2xl w-full max-h-[80vh] overflow-y-auto mx-4 md:mx-auto border border-gray-200">
                <div class="flex justify-end">
                    <button id="closePopup" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Contact Information -->
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-blue-100 p-4 rounded-lg border border-blue-200">
                                <i class="fas fa-address-card text-3xl text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-blue-600">Get in Touch</h3>
                                <p class="text-gray-600 mt-2">Feel free to reach out for collaborations, opportunities, or questions.</p>
                            </div>
                        </div>
                        
                        <ul class="space-y-4">
                            <li class="flex items-center gap-4">
                                <i class="fas fa-phone text-2xl text-blue-500"></i>
                                <span class="text-gray-700">+94 76 423 1394</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <i class="fas fa-envelope text-2xl text-green-500"></i>
                                <span class="text-gray-700">niranjansivarajah35@gmail.com</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <i class="fas fa-map-marker-alt text-2xl text-red-500"></i>
                                <span class="text-gray-700">No. 424/11, K.K.S. Road, Jaffna, Sri Lanka</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <i class="fab fa-linkedin text-2xl text-blue-500"></i>
                                <a href="https://linkedin.com/in/niranjan-sivarasa-56ba57366" target="_blank" class="text-gray-700 hover:text-blue-600 transition-colors">LinkedIn Profile</a>
                            </li>
                            <li class="flex items-center gap-4">
                                <i class="fab fa-github text-2xl text-gray-700"></i>
                                <a href="https://github.com/niranjan0814" target="_blank" class="text-gray-700 hover:text-blue-600 transition-colors">GitHub Profile</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-green-100 p-4 rounded-lg border border-green-200">
                                <i class="fas fa-paper-plane text-3xl text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-green-600">Send a Message</h3>
                                <p class="text-gray-600 mt-2">Fill out the form below to contact me directly.</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div>
                                <label for="name" class="block text-gray-700 mb-2 font-medium">Your Name</label>
                                <input type="text" id="name" name="name" required 
                                       class="w-full bg-white p-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-gray-800 transition-colors @error('name') border-red-500 @enderror"
                                       value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="block text-gray-700 mb-2 font-medium">Your Email</label>
                                <input type="email" id="email" name="email" required 
                                       class="w-full bg-white p-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-gray-800 transition-colors @error('email') border-red-500 @enderror"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-gray-700 mb-2 font-medium">Subject</label>
                                <input type="text" id="subject" name="subject" 
                                       class="w-full bg-white p-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-gray-800 transition-colors @error('subject') border-red-500 @enderror"
                                       value="{{ old('subject') }}">
                                @error('subject')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="message" class="block text-gray-700 mb-2 font-medium">Message</label>
                                <textarea id="message" name="message" rows="5" required 
                                          class="w-full bg-white p-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-gray-800 transition-colors @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Popup Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('openPopup').addEventListener('click', function() {
                document.getElementById('contactPopup').classList.remove('hidden');
            });

            document.getElementById('closePopup').addEventListener('click', function() {
                document.getElementById('contactPopup').classList.add('hidden');
            });

            // Close popup when clicking outside
            document.getElementById('contactPopup').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                }
            });
        });
    </script>
</section>