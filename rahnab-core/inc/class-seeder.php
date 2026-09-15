<?php
/**
 * Demo Content Seeder for Rahnab Pharmed Holding
 * سیستم خودکار ایجاد و تثبیت داده‌های اولیه شرکت‌ها، خدمات و صفحات هلدینگ
 *
 * @package Rahnab_Core
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

class Rahnab_Core_Seeder {

    /**
     * Initialize seeder hooks and admin page.
     */
    public static function init() {
        add_action('admin_menu', [__CLASS__, 'register_admin_menu']);
        add_action('admin_post_rahnab_run_seeder', [__CLASS__, 'handle_seeder_request']);
    }

    /**
     * Add admin tools menu for the Holding Seeder.
     */
    public static function register_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=company',
            __('راه‌اندازی داده‌های اولیه هلدینگ', 'rahnab-core'),
            __('راه‌اندازی محتوای اولیه', 'rahnab-core'),
            'manage_options',
            'rahnab-seeder',
            [__CLASS__, 'render_admin_page']
        );
    }

    /**
     * Render the admin page for the seeder.
     */
    public static function render_admin_page() {
        if (!current_user_can('manage_options')) {
            return;
        }

        $status = isset($_GET['status']) ? sanitize_key($_GET['status']) : '';
        ?>
        <div class="wrap" style="max-width: 850px; font-family: system-ui, sans-serif;">
            <h1 style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
                <span class="dashicons dashicons-database" style="font-size: 32px; width: 32px; height: 32px; color: #D4AF37;"></span>
                <?php esc_html_e('راه‌اندازی و درج خودکار محتوای رسمی هلدینگ رهناب فارمد', 'rahnab-core'); ?>
            </h1>

            <?php if ($status === 'success') : ?>
                <div class="notice notice-success is-dismissible" style="padding: 12px; font-weight: bold; border-right-color: #D4AF37;">
                    <p><?php esc_html_e('عملیات با موفقیت انجام شد! تمامی ۶ شرکت زیرمجموعه، ۶ توانمندی راهبردی، اخبار رسمی و صفحات اصلی به دیتابیس اضافه شدند.', 'rahnab-core'); ?></p>
                </div>
            <?php endif; ?>

            <div class="card" style="padding: 24px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); background: #fff;">
                <h2 style="margin-top: 0; color: #05070B; font-size: 18px;">
                    <?php esc_html_e('نصب محتوای پیش‌فرض با ۱ کلیک (One-Click Holding Seeder)', 'rahnab-core'); ?>
                </h2>
                <p style="color: #4b5563; line-height: 1.8; font-size: 14px;">
                    <?php esc_html_e('با اجرای این عملیات، موجودیت‌های تاییدشده هلدینگ شامل موارد زیر به صورت هوشمند و خودکار در دیتابیس ساخته می‌شوند:', 'rahnab-core'); ?>
                </p>

                <ul style="list-style: disc; margin-right: 24px; color: #374151; font-size: 13px; line-height: 2;">
                    <li><strong>۶ شرکت زیرمجموعه هلدینگ:</strong> نوژین زیست، تأمین پلاسما، پرسیس ژن، آرک زیست، پادرا سرم، کارا یاخته (همراه با مشخصات، تگ‌ها و فیلدها).</li>
                    <li><strong>۶ محور استراتژیک توانمندی و زنجیره ارزش:</strong> پالایش پلاسما، شتاب‌دهی، سلول‌درمانی، آزمون‌های مرجع، سرم‌های پادزهر و تجهیزات بیوراکتور.</li>
                    <li><strong>صفحات اصلی هلدینگ:</strong> صفحه درباره ما، شرکت‌ها، توانمندی‌ها، اخبار و تماس با ما (همراه با انتساب تمپلیت‌های اختصاصی).</li>
                    <li><strong>۶ خبر و دستاورد برجسته ملی هلدینگ:</strong> با متون کامل، دسته‌بندی و تاریخ انتشار.</li>
                </ul>

                <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                    <form method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <?php wp_nonce_field('rahnab_run_seeder_action', 'rahnab_seeder_nonce'); ?>
                        <input type="hidden" name="action" value="rahnab_run_seeder">
                        <button type="submit" class="button button-primary button-hero" style="background: #05070B; border-color: #D4AF37; color: #E5B887; font-weight: bold;">
                            <?php esc_html_e('ایجاد / به‌روزرسانی محتوای کامل هلدینگ', 'rahnab-core'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Handle POST request to run the seeder securely.
     */
    public static function handle_seeder_request() {
        if (!current_user_can('manage_options')) {
            wp_die(__('شما اجازه دسترسی به این بخش را ندارید.', 'rahnab-core'));
        }

        check_admin_referer('rahnab_run_seeder_action', 'rahnab_seeder_nonce');

        self::seed_all();

        wp_safe_redirect(admin_url('edit.php?post_type=company&page=rahnab-seeder&status=success'));
        exit;
    }

    /**
     * Master seeder method.
     */
    public static function seed_all() {
        self::seed_companies();
        self::seed_services();
        self::seed_news();
        self::seed_pages();
    }

    /**
     * 1. Seed 6 Official Subsidiaries.
     */
    public static function seed_companies() {
        $companies = [
            [
                'title'     => 'نوژین زیست فارمد',
                'slug'      => 'company-nojin',
                'anchor_id' => 'company-nojin',
                'tagline'   => 'پالایشگاه صنعتی پلاسما و واکسن‌های نوین',
                'sector'    => 'پالایشگاه زیستی و واکسن',
                'desc'      => 'بزرگ‌ترین سرمایه‌گذاری بخش خصوصی در حوزه پالایش پلاسما، تولید آلبومین، IVIG و واکسن‌های های‌تک دامی و طیور کشور با ظرفیت اسمی ۱۵۰ هزار لیتر.',
                'website'   => 'https://nozhinzist.com',
                'badge'     => 'فاز پالایشگاهی',
                'stat'      => '۱۵۰ هزار لیتر پلاسما',
                'order'     => 1,
            ],
            [
                'title'     => 'تأمین پلاسما نوژین',
                'slug'      => 'company-tamin-plasma',
                'anchor_id' => 'company-tamin-plasma',
                'tagline'   => 'شبکه ملی جمع‌آوری و فرآوری پلاسمای انسانی',
                'sector'    => 'زیرساخت تأمین پلاسما',
                'desc'      => 'ایجاد و راهبری مدرن‌ترین پایگاه‌های جمع‌آوری پلاسمای انسانی مطابق با استانداردهای سازمان بهداشت جهانی (WHO) جهت تأمین پایدار پالایشگاه ملی.',
                'website'   => 'https://taminplasma.com',
                'badge'     => 'تأمین پایدار مواد اولیه',
                'stat'      => 'استاندارد cGMP و WHO',
                'order'     => 2,
            ],
            [
                'title'     => 'پرسیس ژن',
                'slug'      => 'company-persis',
                'anchor_id' => 'company-persis',
                'tagline'   => 'شتاب‌دهنده زیست‌دارویی و سرمایه‌گذاری خطرپذیر',
                'sector'    => 'شتاب‌دهی و انکوباسیون نخبگان',
                'desc'      => 'نخستین و بزرگ‌ترین شتاب‌دهنده تخصصی زیست‌دارویی ایران؛ زایشگاه داروهای بیوسیمیلار، مهندسی پروتئین‌های نوترکیب و جذب استعدادهای برتر کشور.',
                'website'   => 'https://persisgene.com',
                'badge'     => 'قطب نوآوری زیستی',
                'stat'      => '+۱۵ استارتاپ موفق',
                'order'     => 3,
            ],
            [
                'title'     => 'آرک زیست آزما',
                'slug'      => 'company-arc',
                'anchor_id' => 'company-arc',
                'tagline'   => 'آزمایشگاه جامع رفرنس و کنترل کیفی بیولوژیک',
                'sector'    => 'آزمایشگاه کنترل کیفی و GLP',
                'desc'      => 'ارائه آزمون‌های فوق‌تخصصی کنترل کیفی فرآورده‌های بیولوژیک، آنالیزهای فیزیکوشیمیایی پروتئین، تست‌های درون‌تنی و بچ‌ریلیز دارویی با گواهی ISO 17025.',
                'website'   => 'https://arczist.com',
                'badge'     => 'مرجعیت ملی کنترل کیفی',
                'stat'      => 'تأییدیه ISO/IEC 17025',
                'order'     => 4,
            ],
            [
                'title'     => 'پادرا سرم البرز',
                'slug'      => 'company-padra',
                'anchor_id' => 'company-padra',
                'tagline'   => 'تولید سرم‌های هایپوایمیون و پادزهرهای اورژانسی',
                'sector'    => 'ایمونوتراپی و پادزهر',
                'desc'      => 'تأمین‌کننده راهبردی بیش از ۷۰ درصد پادزهرهای مارگزیدگی و عقرب‌زدگی کشور و سرم‌های ضدهاری انسانی، تأمین‌کننده امنیت بهداشتی مناطق مرزی و محروم.',
                'website'   => 'https://padraserum.com',
                'badge'     => 'امنیت سلامت ملی',
                'stat'      => '۷۰٪ نیاز کشور',
                'order'     => 5,
            ],
            [
                'title'     => 'کارا یاخته تجهیز آزما',
                'slug'      => 'company-karayakhte',
                'anchor_id' => 'company-karayakhte',
                'tagline'   => 'طراحی و ساخت بیوراکتورها و تجهیزات فرآیندی',
                'sector'    => 'مهندسی تجهیزات و بیوراکتور',
                'desc'      => 'توسعه و بومی‌سازی فرمانتورهای صنعتی، سیستم‌های فیلتراسیون جریان مماس (TFF) و پکیج‌های بیوتکنولوژی پیشرفته مطابق الزامات فارماکوپه‌های بین‌المللی.',
                'website'   => 'https://karayakhte.com',
                'badge'     => 'بومی‌سازی تجهیزات های‌تک',
                'stat'      => 'بیوراکتورهای صنعتی تا 2000L',
                'order'     => 6,
            ],
        ];

        foreach ($companies as $data) {
            $existing = get_page_by_path($data['slug'], OBJECT, 'company');
            $post_data = [
                'post_title'   => $data['title'],
                'post_name'    => $data['slug'],
                'post_content' => $data['desc'],
                'post_status'  => 'publish',
                'post_type'    => 'company',
                'menu_order'   => $data['order'],
            ];

            if ($existing) {
                $post_data['ID'] = $existing->ID;
                $post_id = wp_update_post($post_data);
            } else {
                $post_id = wp_insert_post($post_data);
            }

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_company_tagline', sanitize_text_field($data['tagline']));
                update_post_meta($post_id, '_company_sector_text', sanitize_text_field($data['sector']));
                update_post_meta($post_id, '_company_website', esc_url_raw($data['website']));
                update_post_meta($post_id, '_company_badge', sanitize_text_field($data['badge']));
                update_post_meta($post_id, '_company_stat', sanitize_text_field($data['stat']));
                update_post_meta($post_id, '_company_anchor_id', sanitize_text_field($data['anchor_id']));

                // Set taxonomy
                wp_set_object_terms($post_id, $data['sector'], 'company_sector', false);
            }
        }
    }

    /**
     * 2. Seed 6 Strategic Capabilities (Services).
     */
    public static function seed_services() {
        $services = [
            [
                'num'     => '01',
                'title'   => 'فرآورده‌های بیولوژیک و مشتق از پلاسما',
                'slug'    => 'plasma-derived-products',
                'badge'   => 'پالایشگاه صنعتی پلاسما',
                'metric'  => '۱۵۰ هزار لیتر ظرفیت اسمی سالانه',
                'desc'    => 'تأمین پایدار فاکتورهای انعقادی VIII و IX، ایمونوگلوبولین وریدی (IVIG) و آلبومین انسانی با بهره‌گیری از خطوط تمام‌اتوماتیک پالایش پلاسمانویسی و فرآوری صنعتی.',
                'order'   => 1,
            ],
            [
                'num'     => '02',
                'title'   => 'شتاب‌دهی، تحقیق و توسعه زیست‌فناوری',
                'slug'    => 'biotech-acceleration-rd',
                'badge'   => 'شتاب‌دهنده تخصصی زیست‌دارو',
                'metric'  => '۱۵+ استارتاپ شتاب‌یافته تا مرحله تجاری',
                'desc'    => 'حمایت همه‌جانبه از تیم‌های نخبه دانشگاهی، توسعه فناوری خطوط سلولی نوترکیب، بهینه‌سازی فرآیندهای Upstream و Downstream و انتقال دانش فنی به صنعت.',
                'order'   => 2,
            ],
            [
                'num'     => '03',
                'title'   => 'درمان‌های پیشرفته سلولی و ژن‌درمانی',
                'slug'    => 'advanced-cell-gene-therapy',
                'badge'   => 'پزشکی بازساختی و فردمحور',
                'metric'  => 'فازهای پیش‌بالینی ایمونوتراپی CAR-T',
                'desc'    => 'سرمایه‌گذاری روی مرزهای دانش پزشکی مدرن؛ توسعه سلول‌های بنیادی، پلتفرم‌های ویروسی ژن‌درمانی و نسل نوین ایمونوتراپی‌های هدفمند سرطان.',
                'order'   => 3,
            ],
            [
                'num'     => '04',
                'title'   => 'آزمایشگاه‌های مرجع و کنترل کیفی بیولوژیک',
                'slug'    => 'qc-reference-laboratories',
                'badge'   => 'گواهینامه بین‌المللی ISO 17025',
                'metric'  => '۱۰۰+ آزمون تخصصی بچ‌ریلیز فرآورده‌ها',
                'desc'    => 'انجام آزمون‌های کنترل کیفی دارویی مطابق فارماکوپه‌های EP و USP، آزمون‌های سم‌شناسی، بیواسی‌های اختصاصی و تأیید سلامت بیوسیمیلارها.',
                'order'   => 4,
            ],
            [
                'num'     => '05',
                'title'   => 'سرم‌های درمانی، پادزهرها و ایمونوگلوبولین‌ها',
                'slug'    => 'antivenom-hyperimmune-sera',
                'badge'   => 'پوشش پادزهرهای اورژانسی کشور',
                'metric'  => '۷۰٪ سهم تأمین اورژانس‌های کشوری',
                'desc'    => 'فرآوری سرم‌های هایپوایمیون، ایمونوگلوبولین‌های ضد هاری، ضد کزاز و پادزهرهای چندظرفیتی مار و عقرب جهت نجات جان بیماران در شرایط حاد.',
                'order'   => 5,
            ],
            [
                'num'     => '06',
                'title'   => 'ساخت تجهیزات زیست‌فرآیندی و بیوراکتورها',
                'slug'    => 'bioprocess-equipment-bioreactors',
                'badge'   => 'بومی‌سازی ماشین‌آلات های‌تک',
                'metric'  => 'بیوراکتورهای استیل و یکبارمصرف',
                'desc'    => 'طراحی و ساخت بیوراکتورهای صنعتی، فرمانتورهای کشت میکروبی، سیستم‌های SIP/CIP و سامانه‌های اتوماسیون پایلوت و تولید دارویی.',
                'order'   => 6,
            ],
        ];

        foreach ($services as $data) {
            $existing = get_page_by_path($data['slug'], OBJECT, 'service');
            $post_data = [
                'post_title'   => $data['title'],
                'post_name'    => $data['slug'],
                'post_content' => $data['desc'],
                'post_status'  => 'publish',
                'post_type'    => 'service',
                'menu_order'   => $data['order'],
            ];

            if ($existing) {
                $post_data['ID'] = $existing->ID;
                $post_id = wp_update_post($post_data);
            } else {
                $post_id = wp_insert_post($post_data);
            }

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_service_num', sanitize_text_field($data['num']));
                update_post_meta($post_id, '_service_badge', sanitize_text_field($data['badge']));
                update_post_meta($post_id, '_service_metric', sanitize_text_field($data['metric']));
            }
        }
    }

    /**
     * 3. Seed 6 Official News & Milestone Posts.
     */
    public static function seed_news() {
        $news_items = [
            [
                'title'     => 'بهره‌برداری از فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت ۱۵۰ هزار لیتر',
                'slug'      => 'nozhin-plasma-refinery-expansion',
                'excerpt'   => 'گامی تاریخی در دستیابی به حاکمیت زیست‌دارویی کشور با راه‌اندازی بزرگ‌ترین زیرساخت خصوصی پالایش پلاسما و تولید فاکتورهای خونی.',
                'content'   => 'فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت فرآوری سالانه ۱۵۰ هزار لیتر پلاسما رسماً به بهره‌برداری رسید. این رویداد گامی بنیادین در تأمین مستقل داروهای مشتق از پلاسما نظیر آلبومین و IVIG در کشور محسوب می‌شود.',
                'date_fa'   => '۲۴ شهریور ۱۴۰۴',
                'read_time' => '۵ دقیقه مطالعه',
            ],
            [
                'title'     => 'موفقیت کارا یاخته در فاز نخست کارآزمایی بالینی ایمونوتراپی سلولی CAR-T',
                'slug'      => 'car-t-clinical-trial-success',
                'excerpt'   => 'دستیابی به نرخ پاسخ بالینی کم‌نظیر در درمان بیماران مبتلا به لوسمی حاد لنفوبلاستیک با فناوری سلول‌های بازبرنامه‌ریزی‌شده.',
                'content'   => 'محققان و پژوهشگران شرکت کارا یاخته تجهیز آزما موفق به تکمیل فاز اول کارآزمایی بالینی درمان سرطان با پلتفرم CAR-T Cell شدند. نتایج اولیه حاکی از اثربخشی بسیار بالا و کنترل بیماری در بیش از ۸۵ درصد بیماران داوطلب است.',
                'date_fa'   => '۱۸ شهریور ۱۴۰۴',
                'read_time' => '۴ دقیقه مطالعه',
            ],
            [
                'title'     => 'تأمین بیش از ۷۰ درصد پادزهرهای اورژانسی کشور توسط پادرا سرم البرز',
                'slug'      => 'padra-serum-national-antivenom-supply',
                'excerpt'   => 'پوشش سراسری مراکز درمان گزش‌های خطرناک و نجات جان هزاران بیمار در مناطق مرزی و محروم با استاندارد WHO.',
                'content'   => 'شرکت پادرا سرم البرز با ارتقای ظرفیت خطوط تولید سرم‌های هایپوایمیون، سهم خود از تأمین پادزهرهای اورژانسی مار و عقرب گزیدگی وزارت بهداشت را به بیش از ۷۰ درصد رساند.',
                'date_fa'   => '۰۲ شهریور ۱۴۰۴',
                'read_time' => '۳ دقیقه مطالعه',
            ],
            [
                'title'     => 'اخذ گواهینامه رفرنس بین‌المللی ISO/IEC 17025 توسط آرک زیست آزما',
                'slug'      => 'arc-zist-iso-17025-accreditation',
                'excerpt'   => 'ارتقای استانداردهای کنترل کیفی، آزمون‌های بیواسی و تأیید بچ‌ریلیز فرآورده‌های بیولوژیک در سطح آزمایشگاه‌های مرجع منطقه‌ای.',
                'content'   => 'آزمایشگاه جامع آرک زیست آزما موفق به استقرار و دریافت گواهینامه استاندارد بین‌المللی ISO/IEC 17025 گردید. این گواهینامه اعتبار نتایج آزمون‌های این مرکز را در سطح شبکه آزمایشگاهی بین‌المللی تضمین می‌کند.',
                'date_fa'   => '۱۵ مرداد ۱۴۰۴',
                'read_time' => '۵ دقیقه مطالعه',
            ],
            [
                'title'     => 'آغاز چرخه شتاب‌دهی دور جدید تیم‌های زیست‌دارویی در شتاب‌دهنده پرسیس ژن',
                'slug'      => 'persis-gene-new-cohort-acceleration',
                'excerpt'   => 'ورود ۶ استارتاپ نخبگانی زیست‌فناوری سلامت به مرحله تحقیق، توسعه فرمولاسیون و جذب سرمایه‌گذاری ونچر در هلدینگ.',
                'content'   => 'پرسیس ژن به عنوان بزرگ‌ترین هاب شتاب‌دهی بیوتکنولوژی کشور، پذیرش ۶ تیم استارتاپی جدید را در حوزه‌های پروتئین‌های نوترکیب و زیست‌حسگرهای تشخیصی آغاز کرد.',
                'date_fa'   => '۲۸ تیر ۱۴۰۴',
                'read_time' => '۴ دقیقه مطالعه',
            ],
            [
                'title'     => 'افتتاح پایگاه فوق‌پیشرفته جمع‌آوری پلاسمای استان البرز توسط تأمین پلاسما نوژین',
                'slug'      => 'tamin-plasma-alborz-center-opening',
                'excerpt'   => 'گسترش شبکه ملی جمع‌آوری پلاسما به روش پلاسمانویسی تمام‌اتوماتیک و مطابق با استانداردهای بهداشت جهانی WHO.',
                'content'   => 'پایگاه جدید جمع‌آوری پلاسمای تأمین پلاسما نوژین با بهره‌گیری از مدرن‌ترین دستگاه‌های آفرزیس خودکار در استان البرز افتتاح شد تا زنجیره ارزش تولید داروهای زیستی بیش از پیش تقویت گردد.',
                'date_fa'   => '۱۰ تیر ۱۴۰۴',
                'read_time' => '۳ دقیقه مطالعه',
            ],
        ];

        foreach ($news_items as $data) {
            $existing = get_page_by_path($data['slug'], OBJECT, 'post');
            $post_data = [
                'post_title'   => $data['title'],
                'post_name'    => $data['slug'],
                'post_excerpt' => $data['excerpt'],
                'post_content' => $data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ];

            if ($existing) {
                $post_data['ID'] = $existing->ID;
                $post_id = wp_update_post($post_data);
            } else {
                $post_id = wp_insert_post($post_data);
            }

            if ($post_id && !is_wp_error($post_id)) {
                if (!empty($data['date_fa'])) {
                    update_post_meta($post_id, '_news_date_fa', sanitize_text_field($data['date_fa']));
                }
                if (!empty($data['read_time'])) {
                    update_post_meta($post_id, '_news_read_time', sanitize_text_field($data['read_time']));
                }
            }
        }
    }

    /**
     * 4. Seed Essential Pages and Assign Specialized Templates.
     */
    public static function seed_pages() {
        $pages = [
            [
                'title'    => 'صفحه اصلی',
                'slug'     => 'home',
                'template' => 'front-page.php',
            ],
            [
                'title'    => 'درباره رهناب',
                'slug'     => 'about',
                'template' => 'page-about.php',
            ],
            [
                'title'    => 'توانمندی‌ها و خدمات',
                'slug'     => 'services',
                'template' => 'page-services.php',
            ],
            [
                'title'    => 'شرکت‌های زیرمجموعه',
                'slug'     => 'companies',
                'template' => 'page-companies.php',
            ],
            [
                'title'    => 'اخبار و رویدادها',
                'slug'     => 'news',
                'template' => 'page-news.php',
            ],
            [
                'title'    => 'تماس با ما',
                'slug'     => 'contact',
                'template' => 'page-contact.php',
            ],
        ];

        foreach ($pages as $p) {
            $existing = get_page_by_path($p['slug'], OBJECT, 'page');
            $page_data = [
                'post_title'   => $p['title'],
                'post_name'    => $p['slug'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ];

            if ($existing) {
                $page_id = $existing->ID;
            } else {
                $page_id = wp_insert_post($page_data);
            }

            if ($page_id && !is_wp_error($page_id)) {
                if ($p['template'] !== 'front-page.php') {
                    update_post_meta($page_id, '_wp_page_template', $p['template']);
                } else {
                    // Set as front page
                    update_option('show_on_front', 'page');
                    update_option('page_on_front', $page_id);
                }
            }
        }
    }
}
