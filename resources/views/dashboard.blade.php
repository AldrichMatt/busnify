<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<x-style />
</head>
<body class="bg-gradient-to-b from-[#B175FB] to-[#001476] min-h-screen">
<x-header />
<x-todo text="sambungkan produksi ke stock, make sure akun berubah saat produksi" />
  <!-- Dashboard Content Section -->
<section class="w-full pb-20 pt-10">
    <div class="mx-20 flex flex-col gap-8">
        
        <!-- Back Navigation -->
        <a href="/" class="flex items-center gap-2 cursor-pointer hover:opacity-80 transition-opacity w-fit">
            <div class="flex items-center justify-center">
                <img src="{{ asset('I13_392_13_83.svg') }}" alt="Back" class="w-full h-full">
            </div>
            <span class="text-white text-sm font-medium">Back</span>
        </a>

        <!-- Page Title -->
        <h2 class="text-white text-4xl md:text-5xl font-medium">Dashboard</h2>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            
            <!-- Card 1: Total Saldo Akun -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">Rp 15.757.000</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Total Saldo Akun</p>
                    <p class="text-[#67d25f] text-xs font-bold">+35% dari 07 Jan 2026</p>
                </div>
            </div>

            <!-- Card 2: Laba Rugi -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">Rp 1.575.000</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Laba Rugi</p>
                    <p class="text-[#67d25f] text-xs font-bold">+35% dari Dec 2025</p>
                </div>
            </div>

            <!-- Card 3: Beban Pokok Produksi -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">Rp 1.575.000</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Beban Pokok Produksi</p>
                    <p class="text-[#67d25f] text-xs font-bold">+35% dari Dec 2026</p>
                </div>
            </div>

            <!-- Card 4: Budget Bulan Depan -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">Rp 1.575.000</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Budget Bulan Depan</p>
                    <p class="text-[#67d25f] text-xs font-bold">+35% dari Dec 2025</p>
                </div>
            </div>

            <!-- Card 5: Budget Terkumpul -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">Rp 1.575.000</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Budget Terkumpul</p>
                    <p class="text-[#67d25f] text-xs font-bold">+35% dari Dec 2025</p>
                </div>
            </div>

            <!-- Card 6: Penjualan -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">120 Menu</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Penjualan</p>
                    <p class="text-[#67d25f] text-xs font-bold">+12% dari 07 Jan 2026</p>
                </div>
            </div>

            <!-- Card 7: Menu Terlaris -->
            <div class="bg-white rounded-xl p-4 shadow-md border-2 border-[#8c8c8c] flex flex-col gap-4">
                <p class="text-[#1e1e1e] text-2xl font-bold">Ayam Suwir</p>
                <div class="h-px bg-gray-200 w-full"></div>
                <div class="flex flex-col gap-1">
                    <p class="text-[#8c8c8c] text-sm font-medium">Menu Terlaris</p>
                    <p class="text-[#67d25f] text-xs font-bold">+50 Penjualan dari 31 Dec 2025</p>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="flex flex-col gap-6 mt-8">
            
            <!-- Chart 1: Statistik Modal -->
            <div class="bg-white rounded-[14px] p-5 shadow-md border border-[#8c8c8c] flex flex-col gap-6">
                <h3 class="text-black text-2xl md:text-3xl font-bold">Statistik Modal</h3>
                
                <div class="flex justify-between items-center">
                    <p class="text-black text-3xl md:text-4xl font-bold">Rp 15.757.000</p>
                    <p class="text-[#67d25f] text-2xl md:text-3xl font-bold">+35%</p>
                </div>

                <!-- Chart SVG -->
                <div class="w-full overflow-hidden">
                    <img src="{{ asset('I13_404_13_251.svg') }}" alt="Chart" class="w-full h-auto object-cover">
                </div>

                <!-- Timeframe Buttons -->
                <div class="flex flex-wrap gap-4 mt-2">
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">D</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">W</span>
                    </button>
                    <!-- Active Button -->
                    <button class="small-btn rounded-xl shadow-md bg-gradient-to-br from-[#B175FB]/50 to-[#001476]/50">
                        <span class="text-white font-medium">M</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">Y</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">YTD</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">3Y</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">5Y</span>
                    </button>
                </div>
            </div>

            <!-- Chart 2: Statistik Penjualan -->
            <div class="bg-white rounded-[14px] p-5 shadow-md border border-[#8c8c8c] flex flex-col gap-6">
                <h3 class="text-black text-2xl md:text-3xl font-bold">Statistik Penjualan</h3>
                
                <div class="flex justify-between items-center">
                    <p class="text-black text-3xl md:text-4xl font-bold">120 Menu</p>
                    <p class="text-[#67d25f] text-2xl md:text-3xl font-bold">+35%</p>
                </div>

                <!-- Chart SVG -->
                <div class="w-full overflow-hidden">
                    <img src="{{ asset('I13_405_13_251.svg') }}" alt="Chart" class="w-full h-auto object-cover">
                </div>

                <!-- Timeframe Buttons -->
                <div class="flex flex-wrap gap-4 mt-2">
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">D</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">W</span>
                    </button>
                    <!-- Active Button -->
                    <button class="small-btn rounded-xl shadow-md bg-gradient-to-br from-[#B175FB]/50 to-[#001476]/50">
                        <span class="text-white font-medium">M</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">Y</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">YTD</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">3Y</span>
                    </button>
                    <button class="small-btn rounded-xl shadow-md bg-white hover:bg-gray-50 transition-colors">
                        <span class="text-[#1e1e1e] font-medium">5Y</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

  <script>
// No custom JS required
  </script>
</body>
</html>