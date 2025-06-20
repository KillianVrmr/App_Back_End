<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Structuur - Minder chaos, Meer overzicht</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style> 
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="none" width="1200" height="600"/><g opacity="0.3"><rect fill="%23ffffff" x="100" y="100" width="80" height="60" rx="4"/><rect fill="%23ffffff" x="200" y="120" width="60" height="80" rx="4"/><rect fill="%23ffffff" x="300" y="90" width="100" height="70" rx="4"/><rect fill="%23f59e0b" x="420" y="140" width="20" height="20" rx="10"/><rect fill="%23ef4444" x="460" y="130" width="15" height="30" rx="7"/><rect fill="%23ffffff" x="500" y="110" width="90" height="50" rx="4"/><rect fill="%23ffffff" x="650" y="130" width="70" height="90" rx="4"/><rect fill="%23f59e0b" x="750" y="160" width="25" height="25" rx="12"/></g></svg>');
            background-size: cover;
            background-position: center;
            opacity: 0.6;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="absolute top-0 left-0 right-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="text-white font-bold text-xl">
                LOGO
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-white hover:text-green-400 transition-colors">Over ons</a>
                <a href="#" class="text-white hover:text-green-400 transition-colors">Contact</a>
                <a href="/login" class="text-white hover:text-green-400 transition-colors">Login</a>
                <a href="/register" class="text-white hover:text-green-400 transition-colors">Register</a>

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center overflow-hidden bg-[url('/images/banner-homepage.jpg')] bg-cover bg-center">
  <!-- Flat color overlay -->
  <div class="absolute inset-0 bg-[#242257] bg-opacity-80 z-0"></div>

  <!-- Content wrapper -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 py-20">
    <div class="grid lg:grid-cols-2 gap-12 items-center text-white">
      <div>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
          Minder chaos.<br />
          <span class="text-green">Meer overzicht.</span>
        </h1>
        <p class="text-xl mb-8 text-gray-200 leading-relaxed">
          Van planning tot oplevering –<br />
          één platform voor team, communicatie en voortgang.
        </p>
        <button class="btn-primary text-white px-8 py-4 rounded-lg font-semibold text-lg inline-flex items-center space-x-2">
          <span>Demo aanvragen</span>
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>


    <!-- Features Section -->
    <section class="py-20 bg-deeppurple">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Waarom Structuur?</h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card-hover bg-white/10 backdrop-blur-sm rounded-xl p-8 border border-white/20">
                    <div class="w-16 h-16 bg-green-400 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Projectbeheer op maat voor de bouwsector</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Van grondwerk tot afwerking: alle bouwspecifieke processen in één overzichtelijk platform.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="card-hover bg-white/10 backdrop-blur-sm rounded-xl p-8 border border-white/20">
                    <div class="w-16 h-16 bg-purple-400 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Altijd up-to-date communicatie</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Realtime updates tussen werknemers, projectleiders en klanten. Miscommunicatie behoort tot het verleden.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="card-hover bg-white/10 backdrop-blur-sm rounded-xl p-8 border border-white/20">
                    <div class="w-16 h-16 bg-blue-400 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Visueel en gebruiksvriendelijk</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Overzichtelijke interface, ontworpen speciaal voor de routines van bouwprofessionals.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-deepblue">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Testimonials</h2>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <blockquote class="text-2xl md:text-3xl font-light text-white mb-6 leading-relaxed">
                                "Sinds we Structuur gebruiken zijn onze werven dubbel zo goed georganiseerd."
                            </blockquote>
                            <div class="text-gray-300">
                                <span class="font-semibold">— Bouwbedrijf De Snoek</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="text-white font-bold text-xl mb-4">LOGO</div>
                    <p class="text-gray-400">Minder chaos, meer overzicht in de bouw.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-green-400 transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-green-400 transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-green-400 transition-colors">Demo</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Bedrijf</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-green-400 transition-colors">Over ons</a></li>
                        <li><a href="#" class="hover:text-green-400 transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-green-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-green-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-green-400 transition-colors">Documentation</a></li>
                        <li><a href="#" class="hover:text-green-400 transition-colors">Status</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Structuur. Alle rechten voorbehouden.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to hero section
        window.addEventListener('scroll', () => {
            const hero = document.querySelector('.hero-bg');
            const scrolled = window.pageYOffset;
            const parallax = scrolled * 0.5;
            
            if (hero) {
                hero.style.transform = `translateY(${parallax}px)`;
            }
        });
    </script>
</body>
</html>
