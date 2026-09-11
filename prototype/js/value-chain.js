/**
 * Rahnab Pharmed — 7-Subsidiary Biomanufacturing Ecosystem Data & Flow Matrix
 * All data verified against Iranian National Gazette & regulatory databases.
 */

const subsidiaryData = {
  persis: {
    id: 'persis',
    step: 1,
    tier: { fa: 'شتاب‌دهی و نوآوری مولکولی', en: 'Incubation & Molecular R&D' },
    name: { fa: 'پرسیس ژن', en: 'Persis Gene' },
    legalName: { fa: 'شرکت شتاب‌دهنده پرسیس ژن', en: 'Persis Gene Accelerator Co.' },
    nationalId: '14005750960',
    role: { 
      fa: 'بانک سلولی، مهندسی ژنتیک و تولید آزمایشگاهی و پایلوت پروتئین‌های نوترکیب',
      en: 'Cell banking, genetic engineering, and pilot bioprocess scale-up for recombinant therapeutics'
    },
    metrics: [
      { label: { fa: 'طرح‌های در حال شتاب‌دهی', en: 'Incubated Projects' }, value: '۱۵+' },
      { label: { fa: 'رده سلولی اختصاصی', en: 'Proprietary Cell Lines' }, value: '۲۴' },
      { label: { fa: 'مساحت آزمایشگاهی', en: 'Laboratory Space' }, value: '۲,۵۰۰ m²' }
    ],
    certifications: ['دانش‌بنیان نوآور', 'گواهی GMP پایلوت', 'تاییدیه معاونت علمی'],
    tags: ['r-and-d', 'incubation'],
    color: '#FD7702',
    website: 'https://persisgene.com'
  },
  tamin: {
    id: 'tamin',
    step: 2,
    tier: { fa: 'تأمین بالادستی بیولوژیک', en: 'Upstream Biological Sourcing' },
    name: { fa: 'تأمین پلاسما نوژین', en: 'Tamin Plasma Nozhin' },
    legalName: { fa: 'شرکت تأمین پلاسما نوژین', en: 'Tamin Plasma Nozhin Co.' },
    nationalId: '14012987472',
    role: { 
      fa: 'توسعه زنجیره مراکز پلاسمادرمانی و جمع‌آوری پلاسمای انسانی طبق استانداردهای بین‌المللی IQPP',
      en: 'Human plasma collection centers network conforming to IQPP & European pharmacopeia standards'
    },
    metrics: [
      { label: { fa: 'مراکز فعال پلاسما', en: 'Active Apheresis Centers' }, value: '۴ مرکز' },
      { label: { fa: 'جمع‌آوری سالانه', en: 'Annual Collection' }, value: '۱۰۰k+ لیتر' },
      { label: { fa: 'اهداکنندگان فعال', en: 'Active Donors' }, value: '۴۵,۰۰۰+' }
    ],
    certifications: ['مجوز رسمی سازمان غذا و دارو (IFDA)', 'گواهی ایمنی بیولوژیک'],
    tags: ['plasma', 'sourcing'],
    color: '#0EA5E9',
    website: 'https://tpnojine.com'
  },
  nozhin: {
    id: 'nozhin',
    step: 3,
    tier: { fa: 'پالایش صنعتی و فراکسیوناسیون', en: 'Industrial Fractionation' },
    name: { fa: 'نوژین زیست فارمد', en: 'Nozhin Zist Pharmed' },
    legalName: { fa: 'شرکت نوژین زیست فارمد', en: 'Nozhin Zist Pharmed Co.' },
    nationalId: '14012098694',
    role: { 
      fa: 'پالایشگاه بزرگ فرآورده‌های مشتق از پلاسما؛ تولید آلبومین، IVIG و فاکتورهای انعقادی VIII و IX',
      en: 'Megascale plasma fractionation plant producing human albumin, IVIG, and coagulation factors VIII/IX'
    },
    metrics: [
      { label: { fa: 'ظرفیت اسمی پالایش', en: 'Fractionation Capacity' }, value: '۱۵۰,۰۰۰ L/y' },
      { label: { fa: 'کلین‌روم صنعتی Grade A/B', en: 'Grade A/B Cleanrooms' }, value: '۳,۸۰۰ m²' },
      { label: { fa: 'صرفه‌جویی ارزی سالانه', en: 'Annual Currency Savings' }, value: '$۳۵M+' }
    ],
    certifications: ['گواهینامه ملی GMP فرآورده‌های بیولوژیک', 'مجوز ساخت سازمان غذا و دارو'],
    tags: ['plasma', 'manufacturing'],
    color: '#FD7702',
    website: '#'
  },
  karayakhteh: {
    id: 'karayakhteh',
    step: 4,
    tier: { fa: 'سلول‌درمانی و پزشکی بازساختی', en: 'Cell & Gene Therapy (ATMP)' },
    name: { fa: 'کارایاخته (CARTIMED)', en: 'KarayaKhteh / CARTIMED' },
    legalName: { fa: 'شرکت کارا یاخته تجهیز آزما', en: 'Kara Yakhteh Tajhiz Azma Co.' },
    nationalId: '14007103978',
    role: { 
      fa: 'تولید فرآورده‌های درمانی پیشرفته (ATMP)، درمان با سلول‌های CAR-T (CD19) و ایمونوتراپی سرطان',
      en: 'Advanced Therapy Medicinal Products (ATMP), CD19 CAR-T cell immunotherapy & regenerative bioproducts'
    },
    metrics: [
      { label: { fa: 'فاز کارآزمایی بالینی', en: 'Clinical Trial Phase' }, value: 'Phase I/II' },
      { label: { fa: 'تجهیزات تولید سلولی', en: 'Cell Processing Suites' }, value: 'Class 100' },
      { label: { fa: 'همکاری بالینی دانشگاهی', en: 'Academic Partner' }, value: 'دانشگاه علوم پزشکی تهران' }
    ],
    certifications: ['تاییدیه کمیته ملی اخلاق پزشکی', 'مجوز کارآزمایی بالینی'],
    tags: ['cell-therapy', 'advanced-therapies'],
    color: '#8B5CF6',
    website: '#'
  },
  padra: {
    id: 'padra',
    step: 5,
    tier: { fa: 'سرم‌های درمانی و پادزهرها', en: 'Hyperimmune Sera & Antivenoms' },
    name: { fa: 'پادرا سرم البرز', en: 'Padra Serum Alborz' },
    legalName: { fa: 'شرکت پادرا سرم البرز', en: 'Padra Serum Alborz Co.' },
    nationalId: '14006664540',
    role: { 
      fa: 'تولید سرم‌های هایپرایمیون اسبی، پادزهرهای اختصاصی مارگزیدگی و عقرب‌زدگی و سموم بیولوژیک',
      en: 'Production of equine hyperimmune sera, polyvalent snake & scorpion antivenoms for emergency medicine'
    },
    metrics: [
      { label: { fa: 'سهم تأمین استراتژیک کشور', en: 'National Supply Share' }, value: '۷۰٪+' },
      { label: { fa: 'تولید سالانه ویال سرم', en: 'Annual Serum Vials' }, value: '۵۰۰,۰۰۰+' },
      { label: { fa: 'مجموعه تخصصی پلاسمافورز', en: 'Equine Facility' }, value: '۵۰ هکتار' }
    ],
    certifications: ['گواهی GMP سازمان غذا و دارو', 'صادرکننده نمونه دارویی'],
    tags: ['antivenoms', 'manufacturing'],
    color: '#10B981',
    website: 'https://padraserum.com'
  },
  baya: {
    id: 'baya',
    step: 6,
    tier: { fa: 'فرآوری تکمیلی و فیل-فینیش', en: 'Downstream Aseptic Fill-Finish' },
    name: { fa: 'بایا زیست فارمد', en: 'Baya Zist Pharmed' },
    legalName: { fa: 'شرکت بایا زیست فارمد', en: 'Baya Zist Pharmed Co.' },
    nationalId: '14010425772',
    role: { 
      fa: 'خطوط استریل پرکنی ویال و سرنگ‌های از پیش پرشده (PFS)، بسته‌بندی نهایی دارویی تحت نظارت روباتیک',
      en: 'Sterile high-speed vial & pre-filled syringe (PFS) filling lines under robotic isolator technology'
    },
    metrics: [
      { label: { fa: 'سرعت خط پرکنی استریل', en: 'Aseptic Filling Speed' }, value: '۶,۰۰۰ v/h' },
      { label: { fa: 'تکنولوژی ایزولاتور', en: 'Isolator Technology' }, value: 'Grade A Closed' },
      { label: { fa: 'ظرفیت سالانه PFS', en: 'Annual PFS Capacity' }, value: '۱۲,۰۰۰,۰۰۰' }
    ],
    certifications: ['گواهی استانداردهای ایزولاتور cGMP', 'تجهیزات تمام اتوماتیک'],
    tags: ['fill-finish', 'manufacturing'],
    color: '#FD7702',
    website: '#'
  },
  arc: {
    id: 'arc',
    step: 7,
    tier: { fa: 'آزمایشگاه کنترل کیفی و ترخیص', en: 'Biological QC & Batch Release' },
    name: { fa: 'آرک زیست آزما', en: 'Arc Zist Azma' },
    legalName: { fa: 'شرکت آزمایشگاه کنترل کیفی آرک زیست آزما (دانش‌بنیان)', en: 'Arc Zist Azma QC Laboratory Co.' },
    nationalId: '14003984672',
    role: { 
      fa: 'نخستین آزمایشگاه تخصصی کنترل کیفی فرآورده‌های بیولوژیک در ایران؛ آزمایشگاه همکار رسمی سازمان غذا و دارو',
      en: 'First biological QC laboratory in Iran; certified reference collaborator of the Food & Drug Administration'
    },
    metrics: [
      { label: { fa: 'آزمون‌های پیشرفته فعال', en: 'Active Validated Assays' }, value: '۱۲۰+' },
      { label: { fa: 'دستگاه‌های آنالیتیک پیشرفته', en: 'Mass-Spec & HPLC Suites' }, value: '۲۸ واحد' },
      { label: { fa: 'بچ‌های ترخیص‌شده سالانه', en: 'Batches Cleared Annually' }, value: '۱,۴۰۰+' }
    ],
    certifications: ['آزمایشگاه همکار رسمی IFDA', 'گواهینامه ISO/IEC 17025', 'دانش‌بنیان سطح یک'],
    tags: ['qc', 'batch-release'],
    color: '#00A896',
    website: 'https://arcbioassay.com'
  }
};

/**
 * Initialize Drawer & Node Interactions
 */
function initValueChain() {
  const nodes = document.querySelectorAll('.vc-node');
  const drawer = document.getElementById('dossierDrawer');
  const overlay = document.getElementById('dossierOverlay');
  const closeBtn = document.getElementById('closeDrawerBtn');

  if (!nodes.length || !drawer || !overlay) return;

  nodes.forEach(node => {
    node.addEventListener('click', () => {
      const companyKey = node.getAttribute('data-company');
      const data = subsidiaryData[companyKey];
      if (!data) return;

      openDossier(data);
      
      nodes.forEach(n => n.classList.remove('active'));
      node.classList.add('active');
    });
  });

  const closeDrawer = () => {
    drawer.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
  };

  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  overlay.addEventListener('click', closeDrawer);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('open')) closeDrawer();
  });

  // Filter Tabs
  const filterBtns = document.querySelectorAll('.vc-filter-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active', 'btn-primary'));
      filterBtns.forEach(b => b.classList.add('btn-secondary'));
      btn.classList.add('active', 'btn-primary');
      btn.classList.remove('btn-secondary');

      const filter = btn.getAttribute('data-filter');
      nodes.forEach(node => {
        const companyKey = node.getAttribute('data-company');
        const data = subsidiaryData[companyKey];
        if (filter === 'all' || data.tags.includes(filter)) {
          node.style.display = 'block';
          setTimeout(() => { node.style.opacity = '1'; node.style.transform = 'translateY(0)'; }, 50);
        } else {
          node.style.opacity = '0';
          node.style.transform = 'translateY(8px)';
          setTimeout(() => { node.style.display = 'none'; }, 250);
        }
      });
    });
  });
}

function openDossier(data) {
  const isEn = document.documentElement.getAttribute('lang') === 'en';
  const drawer = document.getElementById('dossierDrawer');
  const overlay = document.getElementById('dossierOverlay');

  const content = `
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/10">
      <div class="flex items-center gap-3">
        <span class="w-8 h-8 rounded-full bg-amber-500/20 text-amber-400 font-mono flex items-center justify-center font-bold text-sm">
          0${data.step}
        </span>
        <div>
          <span class="text-xs text-amber-400 font-semibold tracking-wider block">${isEn ? data.tier.en : data.tier.fa}</span>
          <h3 class="text-xl font-bold text-white">${isEn ? data.name.en : data.name.fa}</h3>
        </div>
      </div>
      <button id="closeDrawerInner" class="text-slate-400 hover:text-white p-2 rounded-lg bg-white/5 hover:bg-white/10 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>

    <div class="space-y-6 text-sm text-slate-300">
      <div>
        <p class="text-xs text-slate-400 mb-1">${isEn ? 'Official Registered Name' : 'نام رسمی ثبت‌شده'}</p>
        <p class="font-medium text-white">${isEn ? data.legalName.en : data.legalName.fa}</p>
        <p class="text-xs font-mono text-slate-400 mt-1">${isEn ? 'National ID: ' : 'شناسه ملی: '} <span class="text-amber-300 font-semibold">${data.nationalId}</span></p>
      </div>

      <div class="p-4 rounded-lg bg-slate-900/60 border border-white/5">
        <p class="text-xs text-amber-400 font-semibold mb-2">${isEn ? 'Ecosystem Role in Rahnab Group' : 'نقش در زنجیره ارزش هلدینگ رهناب'}</p>
        <p class="leading-relaxed text-slate-200">${isEn ? data.role.en : data.role.fa}</p>
      </div>

      <div>
        <p class="text-xs text-slate-400 mb-3 font-semibold">${isEn ? 'Key Industrial Capacities' : 'ظرفیت‌ها و شاخص‌های کلیدی عملیاتی'}</p>
        <div class="grid grid-cols-1 gap-2.5">
          ${data.metrics.map(m => `
            <div class="flex items-center justify-between p-3 rounded-lg bg-white/5 border border-white/5">
              <span class="text-slate-300 text-xs">${isEn ? m.label.en : m.label.fa}</span>
              <span class="font-mono font-bold text-amber-400">${m.value}</span>
            </div>
          `).join('')}
        </div>
      </div>

      <div>
        <p class="text-xs text-slate-400 mb-2 font-semibold">${isEn ? 'Regulatory Accreditations' : 'مجوزها و تاییده‌های حاکمیتی'}</p>
        <div class="flex flex-wrap gap-1.5">
          ${data.certifications.map(c => `
            <span class="px-2.5 py-1 text-xs rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-medium">✓ ${c}</span>
          `).join('')}
        </div>
      </div>

      <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-3">
        ${data.website !== '#' ? `
          <a href="${data.website}" target="_blank" rel="noopener noreferrer" class="btn btn-secondary text-xs flex-1 text-center">
            ${isEn ? 'Visit Official Portal ↗' : 'مشاهده وبگاه رسمی شرکت ↗'}
          </a>
        ` : `
          <span class="text-xs text-slate-400 italic">${isEn ? 'Institutional Sub-holding Entity' : 'واحد یکپارچه سازمانی هلدینگ'}</span>
        `}
        <button class="btn btn-primary text-xs" onclick="alert('${isEn ? 'Contact routing via Rahnab Corporate Secretariat' : 'هدایت درخواست از طریق دبیرخانه مرکزی رهناب فارمد'}')">
          ${isEn ? 'B2B Inquiry' : 'ثبت استعلام تجاری'}
        </button>
      </div>
    </div>
  `;

  drawer.innerHTML = content;
  drawer.classList.add('open');
  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';

  document.getElementById('closeDrawerInner').addEventListener('click', () => {
    drawer.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
  });
}

document.addEventListener('DOMContentLoaded', initValueChain);
