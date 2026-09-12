<?php
/**
 * Rahnab Pharmed Holding — Search Results Page
 * صفحه نتایج جستجو
 *
 * Classic WordPress Theme Ready Architecture
 */

$search_query = isset($_GET['s']) ? trim(strip_tags($_GET['s'])) : '';

$page_title = (!empty($search_query) ? 'نتایج جستجو برای: ' . htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8') : 'جستجو') . ' | هلدینگ سرمایه‌گذاری رهناب فارمد';
$page_desc  = 'نتایج جستجو در میان اخبار، رویدادها، شرکت‌های تخصصی و توانمندی‌های هلدینگ سرمایه‌گذاری رهناب فارمد.';
$active_page = 'search';
$is_home     = false;

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/fullscreen-menu.php';

// Mock searchable items representing holding ecosystem for prototype
$mock_database = [
    [
        'type'     => 'companies',
        'badge'    => 'شرکت تخصصی',
        'badge_en' => 'Subsidiary',
        'title'    => 'نوژین زیست فارمد | پالایشگاه صنعتی پلاسما و واکسن‌های نوین',
        'title_en' => 'Nozhin Zist Pharmed | Industrial Plasma Refinery & Vaccines',
        'desc'     => 'بزرگ‌ترین سرمایه‌گذاری بخش خصوصی در حوزه پالایش پلاسما، تولید آلبومین، IVIG و واکسن‌های های‌تک دامی و طیور.',
        'desc_en'  => 'Largest private biopharma investment in industrial plasma fractionation and advanced animal health vaccines.',
        'url'      => 'companies.php',
    ],
    [
        'type'     => 'services',
        'badge'    => 'توانمندی راهبردی',
        'badge_en' => 'Strategic Capability',
        'title'    => 'فرآورده‌های بیولوژیک و مشتق از پلاسما',
        'title_en' => 'Plasma Derived Medicinal Products (PDMP)',
        'desc'     => 'تأمین پایدار فاکتورهای انعقادی، ایمونوگلوبولین وریدی و آلبومین انسانی با بالاترین استانداردهای cGMP بین‌المللی.',
        'desc_en'  => 'Sustainable supply of coagulation factors, IVIG, and human albumin meeting international cGMP protocols.',
        'url'      => 'services.php',
    ],
    [
        'type'     => 'news',
        'badge'    => 'رویداد و خبر',
        'badge_en' => 'Press Release',
        'title'    => 'بهره‌برداری از فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت ۱۵۰ هزار لیتر',
        'title_en' => 'Commissioning of Nozhin Zist 150,000L Industrial Plasma Refinery Expansion',
        'desc'     => 'این گام استراتژیک، وابستگی کشور به ارسال پلاسما به خارج از مرزها را خاتمه داده و تولید داروهای حیاتی را تثبیت می‌کند.',
        'desc_en'  => 'Strategic milestone ending reliance on foreign plasma fractionation and establishing domestic production.',
        'url'      => 'news.php',
    ],
    [
        'type'     => 'companies',
        'badge'    => 'شرکت تخصصی',
        'badge_en' => 'Subsidiary',
        'title'    => 'پرسیس ژن | شتاب‌دهنده زیست‌دارویی و سرمایه‌گذاری خطرپذیر',
        'title_en' => 'Persis Gene | Biopharma Accelerator & Venture Builder',
        'desc'     => 'توسعه زنجیره شتاب‌دهی استارتاپ‌های بیوتکنولوژی، مهندسی پروتئین‌های نوترکیب و آنتی‌بادی‌های مونوکلونال در ایران.',
        'desc_en'  => 'Pioneering biotechnology acceleration, recombinant protein engineering, and monoclonal antibody ventures.',
        'url'      => 'companies.php',
    ],
    [
        'type'     => 'news',
        'badge'    => 'رویداد و خبر',
        'badge_en' => 'Press Release',
        'title'    => 'موفقیت کارا یاخته در فاز نخست کارآزمایی بالینی ایمونوتراپی سلولی CAR-T',
        'title_en' => 'CARTIMED Advances to Phase I Clinical Trials in CAR-T Cell Therapy',
        'desc'     => 'ورود رسمی هلدینگ رهناب به باشگاه دارندگان فناوری‌های نسل پنجم درمان سرطان و مهندسی سلول‌های ایمنی در غرب آسیا.',
        'desc_en'  => 'Official entry into the elite group of advanced cancer immunotherapy developers in West Asia.',
        'url'      => 'news.php',
    ],
    [
        'type'     => 'services',
        'badge'    => 'توانمندی راهبردی',
        'badge_en' => 'Strategic Capability',
        'title'    => 'ایمونوتراپی سلولی و درمان‌های پیشرفته سلول-ژن (ATMP)',
        'title_en' => 'Cellular Immunotherapy & Advanced Gene-Cell Therapies',
        'desc'     => 'طراحی و ساخت وکتورهای ویروسی، مهندسی گیرنده‌های کایمریک و توسعه پروتکل‌های سلول‌درمانی سرطان.',
        'desc_en'  => 'Design of viral vectors, chimeric antigen receptors, and clinical oncology cell therapeutics.',
        'url'      => 'services.php',
    ],
];

// Simple search filter simulation
$filtered_results = [];
if (!empty($search_query)) {
    foreach ($mock_database as $item) {
        if (mb_stripos($item['title'], $search_query) !== false || 
            mb_stripos($item['desc'], $search_query) !== false ||
            mb_stripos($item['title_en'], $search_query) !== false ||
            mb_stripos($item['desc_en'], $search_query) !== false) {
            $filtered_results[] = $item;
        }
    }
} else {
    $filtered_results = $mock_database;
}
$result_count = count($filtered_results);
?>

<main id="main-content" class="min-h-screen bg-[#05070B] pt-28 sm:pt-32 lg:pt-36 pb-20 relative overflow-hidden">

  <!-- Subtle Ambient Glows -->
  <div class="pointer-events-none absolute top-1/4 -right-40 w-96 h-96 bg-gold-400/5 rounded-full blur-3xl"></div>
  <div class="pointer-events-none absolute top-2/3 -left-40 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>

  <!-- =========================================
       ZONE 1: INTERIOR HERO
       ========================================= -->
  <section class="relative z-10 pb-10 sm:pb-14 border-b border-white/5">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <!-- Breadcrumbs -->
      <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex items-center gap-2 text-xs text-slate-400">
          <li>
            <a href="index.php" class="hover:text-gold-400 transition-colors" data-i18n="nav_home">صفحه اصلی</a>
          </li>
          <li class="text-white/20 select-none">/</li>
          <li class="text-gold-400 font-semibold" aria-current="page" data-i18n="search_crumb">نتایج جستجو</li>
        </ol>
      </nav>

      <!-- Headline -->
      <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight mb-4" data-i18n="search_hero_title">
        نتایج جستجو
      </h1>

      <p class="text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed text-justify sm:text-start mb-8" data-i18n="search_hero_subtitle">
        جستجو در میان اخبار، شرکت‌های زیرمجموعه و توانمندی‌های هلدینگ رهناب فارمد.
      </p>

      <!-- Search Input Bar -->
      <div class="max-w-2xl">
        <form action="search.php" method="GET" class="relative flex items-center">
          <input type="text" name="s" value="<?php echo htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8'); ?>" required
                 class="w-full px-5 py-4 pe-28 rounded-2xl bg-white/[0.04] border border-white/10 focus:border-gold-400 focus:bg-white/[0.08] text-white text-xs sm:text-sm transition-all placeholder:text-slate-500 outline-none"
                 placeholder="عبارت مورد نظر خود را وارد کنید..." data-i18n-placeholder="search_input_ph">
          <button type="submit"
                  class="absolute right-2 rtl:right-auto rtl:left-2 px-5 py-2.5 rounded-xl bg-gold-400 text-black text-xs font-bold hover:bg-gold-300 transition-colors">
            <span data-i18n="search_btn">جستجو</span>
          </button>
        </form>
      </div>

      <!-- Query Counter -->
      <?php if (!empty($search_query)): ?>
      <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
        <span data-i18n="search_count_prefix">نمایش</span>
        <span class="text-gold-400 font-bold font-mono"><?php echo $result_count; ?></span>
        <span data-i18n="search_count_suffix">نتیجه برای عبارت:</span>
        <span class="text-white font-bold font-mono">«<?php echo htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8'); ?>»</span>
      </div>
      <?php endif; ?>

    </div>
  </section>

  <!-- =========================================
       ZONE 2: RESULTS SECTION
       ========================================= -->
  <section class="py-10 sm:py-14 relative z-10">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      
      <?php if ($result_count > 0): ?>
      <div class="space-y-4 max-w-4xl">
        <?php foreach ($filtered_results as $item): ?>
        <article class="p-6 rounded-2xl bg-white/[0.02] border border-white/10 hover:border-gold-400/40 hover:bg-white/[0.04] transition-all duration-300 group">
          <div class="flex items-center gap-2.5 mb-2.5">
            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-gold-400/10 text-gold-400 border border-gold-400/20">
              <?php echo htmlspecialchars($item['badge'], ENT_QUOTES, 'UTF-8'); ?>
            </span>
          </div>
          <h3 class="text-base sm:text-lg font-black text-white group-hover:text-gold-300 transition-colors mb-2">
            <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>" class="block">
              <?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </h3>
          <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify mb-4">
            <?php echo htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8'); ?>
          </p>
          <a href="<?php echo htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>"
             class="inline-flex items-center gap-1.5 text-xs font-bold text-gold-400 hover:text-gold-300 transition-colors">
            <span data-i18n="search_read_more">مشاهده اطلاعات کامل</span>
            <span class="transform rtl:rotate-180">→</span>
          </a>
        </article>
        <?php endforeach; ?>
      </div>

      <?php else: ?>
      <!-- Empty State -->
      <div class="max-w-md mx-auto text-center py-16">
        <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center mx-auto mb-4 text-slate-400">
          <svg class="w-8 h-8 text-gold-400/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2" data-i18n="search_no_results">
          هیچ نتیجه‌ای متناسب با عبارت جستجو شده یافت نشد.
        </h3>
        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="search_no_results_desc">
          لطفاً املای کلمات را بررسی کنید یا عبارت دیگری را جستجو فرمایید.
        </p>
      </div>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
