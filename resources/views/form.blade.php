<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>page-c6d2d63f-df63-4b91-82b6-fd80441f8166</title>
  <link href="./dist/output.css" rel="stylesheet">
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
        colors: {
          'brand-dark': '#1e1e1e',
          'brand-gray': '#8c8c8c',
          'table-header': '#f8f7f5',
          'table-text': '#635549',
          'badge-bg': '#dcfce7',
          'badge-text': '#166534',
          'badge-dot': '#16a34a',
        }
      }
    }
  }
</script>
</head>
<body>
  <!-- Main Application Section -->
<!-- Wraps the entire desktop view including the gradient background -->
<section class="min-h-screen w-full bg-gradient-to-b from-[#509CF3] to-[#083E7C] p-4 sm:p-10 flex justify-center items-start font-sans">
  
  <!-- Content Container: Max width 1200px to match design -->
  <div class="w-full max-w-[1200px] flex flex-col gap-4">

    <!-- Header Area: Back Button -->
    <div class="w-full flex items-center py-3">
      <button class="flex items-center gap-0 hover:opacity-75 transition-opacity">
        <img src="./assets//I13_433_13_75.svg" alt="Back" class="w-[18px] h-[18px]">
        <span class="text-[#1e1e1e] text-sm font-normal ml-1">Text</span>
      </button>
    </div>

    <!-- Page Title -->
    <div class="w-full pb-4">
      <h1 class="text-white text-4xl font-bold">Form</h1>
    </div>

    <!-- Form Content Stack -->
    <div class="w-full flex flex-col gap-4">
      
      <!-- Input Field 1 -->
      <div class="flex flex-col gap-2 w-full">
        <label class="text-black text-sm font-normal">Label</label>
        <div class="w-full bg-white border border-[#8c8c8c] rounded-lg h-[34px] flex items-center px-3">
          <input type="text" class="w-full h-full outline-none text-sm bg-transparent" placeholder="">
        </div>
      </div>

      <!-- Input Field 2 -->
      <div class="flex flex-col gap-2 w-full">
        <label class="text-black text-sm font-normal">Label</label>
        <div class="w-full bg-white border border-[#8c8c8c] rounded-lg h-[34px] flex items-center px-3">
          <input type="text" class="w-full h-full outline-none text-sm bg-transparent" placeholder="">
        </div>
      </div>

      <!-- Dropdown Field -->
      <div class="flex flex-col gap-2 w-full">
        <label class="text-black text-sm font-normal">Label</label>
        <div class="w-full bg-white border border-[#8c8c8c] rounded-lg h-[34px] flex items-center justify-between px-3 cursor-pointer">
          <span class="text-sm text-gray-500"></span>
          <img src="./assets//I13_439_13_215.svg" alt="Chevron" class="w-4 h-4">
        </div>
      </div>

      <!-- Radio Group -->
      <div class="flex flex-col gap-2 w-full mt-2">
        <label class="text-black text-sm font-normal">Label</label>
        <div class="flex flex-row gap-8">
          <!-- Radio Option 1 -->
          <label class="flex items-center gap-2 cursor-pointer">
            <div class="w-[13px] h-[13px] rounded-full border border-black flex items-center justify-center">
              <!-- Selected state would have a dot here -->
            </div>
            <span class="text-black text-sm">Label</span>
          </label>
          <!-- Radio Option 2 -->
          <label class="flex items-center gap-2 cursor-pointer">
            <div class="w-[13px] h-[13px] rounded-full border border-black"></div>
            <span class="text-black text-sm">Label</span>
          </label>
        </div>
      </div>

      <!-- Table Section -->
      <div class="flex flex-col gap-2 w-full mt-4">
        <label class="text-black text-sm font-normal">Label</label>
        
        <!-- Table Container -->
        <div class="w-full border border-[#8c8c8c] rounded-xl overflow-hidden flex flex-col bg-white">
          
          <!-- Table Header -->
          <div class="bg-[#f8f7f5] w-full grid grid-cols-5 px-6 py-5 gap-4">
            <div class="text-[#635549] text-sm">Id</div>
            <div class="text-[#635549] text-sm">Nama</div>
            <div class="text-[#635549] text-sm text-center">Total</div>
            <div class="text-[#635549] text-sm text-center">Status</div>
            <div class="text-[#635549] text-sm text-right">Pilih</div>
          </div>

          <!-- Table Row -->
          <div class="bg-white w-full grid grid-cols-5 px-6 py-4 gap-4 items-center border-t border-gray-100">
            <div class="text-[#181411] text-sm">#</div>
            <div class="text-[#635549] text-sm">Lorem Ipsum</div>
            <div class="text-[#181411] text-sm font-medium text-center">Rp 95.000</div>
            
            <!-- Status Badge -->
            <div class="flex justify-center">
              <div class="bg-[#dcfce7] rounded-full px-3 py-1 flex items-center gap-1.5">
                <div class="w-1.5 h-1.5 rounded-full bg-[#16a34a]"></div>
                <span class="text-[#166534] text-xs font-medium">Selesai</span>
              </div>
            </div>

            <!-- Action Checkbox/Button -->
            <div class="flex justify-end">
              <div class="w-[13px] h-[13px] border border-black cursor-pointer"></div>
            </div>
          </div>
          
        </div>
      </div>

      <!-- Submit Button -->
      <div class="mt-8">
        <button class="bg-[#1e1e1e] text-white rounded-xl shadow-lg w-[243px] h-[50px] flex justify-center items-center font-bold hover:bg-gray-800 transition-colors">
          Submit
        </button>
      </div>

    </div>
  </div>
</section>

  <script>
// No custom JS required
  </script>
</body>
</html>