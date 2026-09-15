<?php
/**
 * Native Custom Meta Boxes for Rahnab Pharmed Core
 * پنل‌های متای اختصاصی و بومی وردپرس بدون هیچ‌گونه وابستگی به ACF
 *
 * @package Rahnab_Core
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

class Rahnab_Core_Meta_Boxes {

    /**
     * Nonce action and name constants
     */
    const NONCE_ACTION = 'rahnab_save_meta_box_data';
    const NONCE_NAME   = 'rahnab_meta_box_nonce';

    /**
     * Initialize meta boxes hooks
     */
    public static function init() {
        add_action('add_meta_boxes', [__CLASS__, 'register_meta_boxes']);
        add_action('save_post', [__CLASS__, 'save_meta_box_data'], 10, 2);
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_admin_styles']);
    }

    /**
     * Enqueue minimal styling for luxury admin feel.
     * Uses a registered virtual style handle so WordPress properly renders inline CSS.
     */
    public static function enqueue_admin_styles($hook) {
        if (!in_array($hook, ['post.php', 'post-new.php'], true)) {
            return;
        }

        $screen = get_current_screen();
        if (!$screen || !in_array($screen->post_type, ['company', 'service', 'post'], true)) {
            return;
        }

        wp_register_style('rahnab-admin-meta-boxes', false);
        wp_enqueue_style('rahnab-admin-meta-boxes');

        wp_add_inline_style('rahnab-admin-meta-boxes', "
            .rahnab-meta-box-wrap { direction: rtl; font-family: system-ui, -apple-system, sans-serif; }
            .rahnab-meta-row { margin-bottom: 18px; }
            .rahnab-meta-label { display: block; font-weight: 700; margin-bottom: 6px; color: #1e293b; font-size: 13px; }
            .rahnab-meta-desc { font-size: 11px; color: #64748b; margin-top: 4px; }
            .rahnab-meta-input { width: 100%; max-width: 600px; padding: 7px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 13px; box-sizing: border-box; }
            .rahnab-meta-input:focus { border-color: #D4AF37; box-shadow: 0 0 0 1px #D4AF37; outline: none; }
            .rahnab-meta-textarea { width: 100%; max-width: 600px; padding: 7px 12px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 13px; box-sizing: border-box; resize: vertical; min-height: 70px; font-family: inherit; }
            .rahnab-meta-textarea:focus { border-color: #D4AF37; box-shadow: 0 0 0 1px #D4AF37; outline: none; }
            .rahnab-meta-badge-preview { display: inline-block; padding: 2px 8px; border-radius: 9999px; background: rgba(212,175,55,0.15); color: #B89028; font-size: 11px; font-weight: 600; }
        ");
    }

    /**
     * Register Meta Boxes
     */
    public static function register_meta_boxes() {
        // Company Details Meta Box
        add_meta_box(
            'rahnab_company_details',
            __('اطلاعات راهبردی و مشخصات شرکت', 'rahnab-core'),
            [__CLASS__, 'render_company_meta_box'],
            'company',
            'normal',
            'high'
        );

        // Service Details Meta Box
        add_meta_box(
            'rahnab_service_details',
            __('مشخصات و شاخص‌های توانمندی زیست‌دارویی', 'rahnab-core'),
            [__CLASS__, 'render_service_meta_box'],
            'service',
            'normal',
            'high'
        );

        // News Details Meta Box
        add_meta_box(
            'rahnab_news_details',
            __('مشخصات و شاخص‌های خبر و دستاورد', 'rahnab-core'),
            [__CLASS__, 'render_news_meta_box'],
            'post',
            'normal',
            'high'
        );
    }

    /**
     * Render Company Meta Box
     */
    public static function render_company_meta_box($post) {
        wp_nonce_field(self::NONCE_ACTION, self::NONCE_NAME);

        $name_en     = get_post_meta($post->ID, '_company_name_en', true);
        $tagline     = get_post_meta($post->ID, '_company_tagline', true);
        $sector_text = get_post_meta($post->ID, '_company_sector_text', true);
        $website     = get_post_meta($post->ID, '_company_website', true);
        $badge       = get_post_meta($post->ID, '_company_badge', true);
        $stat        = get_post_meta($post->ID, '_company_stat', true);
        $anchor_id   = get_post_meta($post->ID, '_company_anchor_id', true);
        $mono_logo   = get_post_meta($post->ID, '_company_logo_custom', true);
        $cap         = get_post_meta($post->ID, '_company_cap', true);
        $focus       = get_post_meta($post->ID, '_company_focus', true);
        ?>
        <div class="rahnab-meta-box-wrap">
            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_name_en">
                    <?php esc_html_e('نام لاتین شرکت (English Name):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_name_en" name="_company_name_en" class="rahnab-meta-input dir-ltr" style="direction: ltr; text-align: left;"
                       value="<?php echo esc_attr($name_en); ?>" placeholder="Nozhin Zist Pharmed">
                <p class="rahnab-meta-desc"><?php esc_html_e('نام انگلیسی جهت نمایش در تگ مونو اسپیس بالای توضیحات شرکت.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_tagline">
                    <?php esc_html_e('عنوان صنعتی / شعار تخصصی (Tagline):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_tagline" name="_company_tagline" class="rahnab-meta-input"
                       value="<?php echo esc_attr($tagline); ?>" placeholder="<?php esc_attr_e('مثال: پالایشگاه صنعتی پلاسما و واکسن‌های نوین', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('عنوان کوتاه تخصصی که زیر نام شرکت در کارت‌ها و صفحات نمایش داده می‌شود.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_sector_text">
                    <?php esc_html_e('حوزه فعالیت کلیدی (Sector Text):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_sector_text" name="_company_sector_text" class="rahnab-meta-input"
                       value="<?php echo esc_attr($sector_text); ?>" placeholder="<?php esc_attr_e('مثال: فرآورده‌های مشتق از پلاسما', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('نام زیرمجموعه یا زنجیره تخصصی شرکت در هلدینگ.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_website">
                    <?php esc_html_e('آدرس وب‌سایت رسمی شرکت (External Website):', 'rahnab-core'); ?>
                </label>
                <input type="url" id="company_website" name="_company_website" class="rahnab-meta-input dir-ltr" style="direction: ltr; text-align: left;"
                       value="<?php echo esc_attr($website); ?>" placeholder="https://example.com">
                <p class="rahnab-meta-desc"><?php esc_html_e('پیوند دکمه ورود به وب‌سایت اختصاصی شرکت (با آیکون ↗).', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_badge">
                    <?php esc_html_e('نشان افتخار یا وضعیت (Badge):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_badge" name="_company_badge" class="rahnab-meta-input"
                       value="<?php echo esc_attr($badge); ?>" placeholder="<?php esc_attr_e('مثال: فاز پالایشگاهی', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('بج متنی با کادر طلایی بالای کارت شرکت.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_stat">
                    <?php esc_html_e('شاخص عددی یا مقیاس تولید (Key Stat):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_stat" name="_company_stat" class="rahnab-meta-input"
                       value="<?php echo esc_attr($stat); ?>" placeholder="<?php esc_attr_e('مثال: ۱۵۰ هزار لیتر ظرفیت سالانه', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('شاخص عددی مهمی که در باکس کارت شرکت قرار می‌گیرد.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_anchor_id">
                    <?php esc_html_e('شناسه انکر اختصاصی (HTML Anchor ID):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_anchor_id" name="_company_anchor_id" class="rahnab-meta-input dir-ltr" style="direction: ltr; text-align: left;"
                       value="<?php echo esc_attr($anchor_id); ?>" placeholder="company-nojin">
                <p class="rahnab-meta-desc"><?php esc_html_e('برای اسکرول مستقیم به این شرکت از منو (مثال: company-nojin).', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_logo_custom">
                    <?php esc_html_e('آدرس فایل لوگوی مونوکروم (Logo URL / Relative Path):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="company_logo_custom" name="_company_logo_custom" class="rahnab-meta-input dir-ltr" style="direction: ltr; text-align: left;"
                       value="<?php echo esc_attr($mono_logo); ?>" placeholder="assets/images/subsidiaries/nojin_logo.webp">
                <p class="rahnab-meta-desc"><?php esc_html_e('در صورت خالی بودن، تصویر شاخص یا لوگوی پیش‌فرض شرکت استفاده می‌شود.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_cap">
                    <?php esc_html_e('زیرساخت و ظرفیت تولید (Infrastructure & Capacity):', 'rahnab-core'); ?>
                </label>
                <textarea id="company_cap" name="_company_cap" class="rahnab-meta-textarea"
                          placeholder="<?php esc_attr_e('مثال: پالایشگاه ۳۰۰,۰۰۰ لیتری پلاسما، خطوط فیل و فینیش آسپتیک...', 'rahnab-core'); ?>"><?php echo esc_textarea($cap); ?></textarea>
                <p class="rahnab-meta-desc"><?php esc_html_e('توضیحات زیرساخت فنی و ظرفیت تولید در کارت صفحه شرکت‌ها.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="company_focus">
                    <?php esc_html_e('فرآورده‌ها و تمرکز محوری (Focus & Products):', 'rahnab-core'); ?>
                </label>
                <textarea id="company_focus" name="_company_focus" class="rahnab-meta-textarea"
                          placeholder="<?php esc_attr_e('مثال: فاکتورهای انعقادی VIII و IX، آلبومین انسانی، IVIG...', 'rahnab-core'); ?>"><?php echo esc_textarea($focus); ?></textarea>
                <p class="rahnab-meta-desc"><?php esc_html_e('محصولات کلیدی و تمرکز تخصصی در کارت صفحه شرکت‌ها.', 'rahnab-core'); ?></p>
            </div>
        </div>
        <?php
    }

    /**
     * Render Service Meta Box
     */
    public static function render_service_meta_box($post) {
        wp_nonce_field(self::NONCE_ACTION, self::NONCE_NAME);

        $num             = get_post_meta($post->ID, '_service_num', true);
        $title_en        = get_post_meta($post->ID, '_service_title_en', true);
        $badge           = get_post_meta($post->ID, '_service_badge', true);
        $badge_secondary = get_post_meta($post->ID, '_service_badge_secondary', true);
        $metric          = get_post_meta($post->ID, '_service_metric', true);
        $icon            = get_post_meta($post->ID, '_service_icon', true);
        $specs           = get_post_meta($post->ID, '_service_specs', true);
        $entities        = get_post_meta($post->ID, '_service_entities', true);
        ?>
        <div class="rahnab-meta-box-wrap">
            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_num">
                    <?php esc_html_e('شماره ترتیب دورقمی (مثال: 01، 02):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_num" name="_service_num" class="rahnab-meta-input dir-ltr" style="direction: ltr; width: 120px;"
                       value="<?php echo esc_attr($num); ?>" placeholder="01">
                <p class="rahnab-meta-desc"><?php esc_html_e('کد دورقمی برای حفظ ترتیب مینیمال طراحی.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_title_en">
                    <?php esc_html_e('عنوان لاتین توانمندی (English Title / Subtitle):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_title_en" name="_service_title_en" class="rahnab-meta-input dir-ltr" style="direction: ltr; text-align: left;"
                       value="<?php echo esc_attr($title_en); ?>" placeholder="Veterinary Recombinant Vaccines & National Biosecurity">
                <p class="rahnab-meta-desc"><?php esc_html_e('عنوان انگلیسی مونو اسپیس زیر تیتر اصلی کارت.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_badge">
                    <?php esc_html_e('برچسب اصلی دسته‌بندی (Primary Badge):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_badge" name="_service_badge" class="rahnab-meta-input"
                       value="<?php echo esc_attr($badge); ?>" placeholder="<?php esc_attr_e('مثال: دام و طیور', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('برچسب اول بالای کارت خدمت.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_badge_secondary">
                    <?php esc_html_e('برچسب مکمل دوم (Secondary Badge):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_badge_secondary" name="_service_badge_secondary" class="rahnab-meta-input"
                       value="<?php echo esc_attr($badge_secondary); ?>" placeholder="<?php esc_attr_e('مثال: واکسن‌های نوترکیب', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('برچسب طلایی دوم بالای کارت خدمت.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_metric">
                    <?php esc_html_e('شاخص برجسته یا ظرفیت خدمت (Highlight Metric):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_metric" name="_service_metric" class="rahnab-meta-input"
                       value="<?php echo esc_attr($metric); ?>" placeholder="<?php esc_attr_e('مثال: استاندارد cGMP بین‌المللی', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('شاخص کیفی یا عددی برجسته در کارت.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_icon">
                    <?php esc_html_e('فایل آیکون وکتور (SVG Icon File):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_icon" name="_service_icon" class="rahnab-meta-input dir-ltr" style="direction: ltr; text-align: left;"
                       value="<?php echo esc_attr($icon); ?>" placeholder="service-veterinary-vaccines.svg">
                <p class="rahnab-meta-desc"><?php esc_html_e('نام فایل SVG در پوشه assets/icons/services/ یا مسیر کامل فایل.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_specs">
                    <?php esc_html_e('مشخصات فنی و مقیاس زیرساخت (Technical Specifications):', 'rahnab-core'); ?>
                </label>
                <textarea id="service_specs" name="_service_specs" class="rahnab-meta-textarea"
                          placeholder="<?php esc_attr_e('مثال: خطوط فرمولاسیون آسپتیک، بیوراکتورهای صنعتی پایلوت تا کلان...', 'rahnab-core'); ?>"><?php echo esc_textarea($specs); ?></textarea>
                <p class="rahnab-meta-desc"><?php esc_html_e('توضیح فنی زیرساخت‌ها در صفحه اختصاصی توانمندی‌ها.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="service_entities">
                    <?php esc_html_e('شرکت‌های مجری و پشتیبان (Executing Entities):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="service_entities" name="_service_entities" class="rahnab-meta-input"
                       value="<?php echo esc_attr($entities); ?>" placeholder="<?php esc_attr_e('مثال: نوژین زیست فارمد | پرسیس‌ژن', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('نام شرکت‌های وابسته که این خدمت یا توانمندی را ارائه می‌دهند.', 'rahnab-core'); ?></p>
            </div>
        </div>
        <?php
    }

    /**
     * Render News Meta Box
     */
    public static function render_news_meta_box($post) {
        wp_nonce_field(self::NONCE_ACTION, self::NONCE_NAME);

        $date_fa   = get_post_meta($post->ID, '_news_date_fa', true);
        $read_time = get_post_meta($post->ID, '_news_read_time', true);
        ?>
        <div class="rahnab-meta-box-wrap">
            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="news_date_fa">
                    <?php esc_html_e('تاریخ شمسی انتشار (مثال: ۲۴ شهریور ۱۴۰۴):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="news_date_fa" name="_news_date_fa" class="rahnab-meta-input"
                       value="<?php echo esc_attr($date_fa); ?>" placeholder="<?php esc_attr_e('۲۴ شهریور ۱۴۰۴', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('تاریخ شمسی اختصاصی که در کارت‌ها و هدر خبر نمایش داده می‌شود.', 'rahnab-core'); ?></p>
            </div>

            <div class="rahnab-meta-row">
                <label class="rahnab-meta-label" for="news_read_time">
                    <?php esc_html_e('مدت زمان تقریبی مطالعه (مثال: ۵ دقیقه مطالعه):', 'rahnab-core'); ?>
                </label>
                <input type="text" id="news_read_time" name="_news_read_time" class="rahnab-meta-input"
                       value="<?php echo esc_attr($read_time); ?>" placeholder="<?php esc_attr_e('۵ دقیقه مطالعه', 'rahnab-core'); ?>">
                <p class="rahnab-meta-desc"><?php esc_html_e('برچسب زمان تقریبی مطالعه جهت نمایش در مشخصات خبر.', 'rahnab-core'); ?></p>
            </div>
        </div>
        <?php
    }

    /**
     * Save Meta Box Data with Strict Security & Sanitization.
     * Hardened against PHP 8 ArgumentCountError, revisions, and unauthorized edits.
     *
     * @param int          $post_id Post ID.
     * @param WP_Post|null $post    Optional Post object.
     */
    public static function save_meta_box_data($post_id, $post = null) {
        // 1. Check Nonce
        if (!isset($_POST[self::NONCE_NAME]) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[self::NONCE_NAME])), self::NONCE_ACTION)) {
            return;
        }

        // 2. Check Autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // 3. Skip Revisions
        if (wp_is_post_revision($post_id)) {
            return;
        }

        // 4. Check Permissions
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Resolve Post Object safely
        if (!$post || !($post instanceof WP_Post)) {
            $post = get_post($post_id);
        }

        if (!$post) {
            return;
        }

        // 5. Save Company Fields
        if ($post->post_type === 'company') {
            $company_text_fields = [
                '_company_name_en',
                '_company_tagline',
                '_company_sector_text',
                '_company_badge',
                '_company_stat',
                '_company_anchor_id',
                '_company_logo_custom',
            ];

            foreach ($company_text_fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_text_field(wp_unslash($_POST[$field])));
                }
            }

            $company_textarea_fields = [
                '_company_cap',
                '_company_focus',
            ];

            foreach ($company_textarea_fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_textarea_field(wp_unslash($_POST[$field])));
                }
            }

            if (isset($_POST['_company_website'])) {
                update_post_meta($post_id, '_company_website', esc_url_raw(wp_unslash($_POST['_company_website'])));
            }
        }

        // 6. Save Service Fields
        if ($post->post_type === 'service') {
            $service_text_fields = [
                '_service_num',
                '_service_title_en',
                '_service_badge',
                '_service_badge_secondary',
                '_service_metric',
                '_service_icon',
                '_service_entities',
            ];

            foreach ($service_text_fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_text_field(wp_unslash($_POST[$field])));
                }
            }

            if (isset($_POST['_service_specs'])) {
                update_post_meta($post_id, '_service_specs', sanitize_textarea_field(wp_unslash($_POST['_service_specs'])));
            }
        }

        // 7. Save News (Post) Fields
        if ($post->post_type === 'post') {
            $news_text_fields = [
                '_news_date_fa',
                '_news_read_time',
            ];

            foreach ($news_text_fields as $field) {
                if (isset($_POST[$field])) {
                    update_post_meta($post_id, $field, sanitize_text_field(wp_unslash($_POST[$field])));
                }
            }
        }
    }
}

// Initialize on plugin load
Rahnab_Core_Meta_Boxes::init();
