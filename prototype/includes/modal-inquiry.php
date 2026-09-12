<?php
/**
 * B2B Partnership Modal Template Part
 * مدال درخواست همکاری تجاری، سرمایه‌گذاری و فرم رسمی ارتباط با هلدینگ
 */
?>
<!-- B2B Inquiry Modal -->
<div id="inquiryModal"
  class="fixed inset-0 bg-black/80 z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300 backdrop-blur-md p-4">
  <div class="bg-[#0A0E17] border border-gold-400/25 rounded-3xl w-full max-w-lg p-8 relative shadow-2xl">
    <button id="closeModalBtn" aria-label="Close"
      class="absolute top-5 left-5 text-slate-400 hover:text-white text-2xl leading-none">&times;</button>
    <div class="mb-6">
      <span class="text-xs uppercase tracking-widest text-gold-400 font-bold font-en-mono"
        data-i18n="modal_label">PORTAL PARTNERSHIP</span>
      <h3 class="text-2xl font-bold text-white mt-1" data-i18n="modal_title">درخواست همکاری تجاری B2B</h3>
      <p class="text-slate-400 text-sm mt-1" data-i18n="modal_subtitle">ارتباط مستقیم با معاونت سرمایه‌گذاری و توسعه کسب‌وکار هلدینگ</p>
    </div>
    <form class="flex flex-col gap-4">
      <input type="text" placeholder="نام و نام خانوادگی"
        class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
        data-i18n-placeholder="modal_name">
      <input type="text" placeholder="نام شرکت / سازمان"
        class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
        data-i18n-placeholder="modal_company">
      <input type="email" placeholder="ایمیل سازمانی (Corporate Email)"
        class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
        data-i18n-placeholder="modal_email">
      <textarea placeholder="شرح درخواست همکاری یا سرمایه‌گذاری..." rows="4"
        class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
        data-i18n-placeholder="modal_message"></textarea>
      <button type="submit" class="btn-primary w-full justify-center py-3.5 mt-2" data-i18n="modal_submit">ارسال درخواست رسمی</button>
    </form>
  </div>
</div>
