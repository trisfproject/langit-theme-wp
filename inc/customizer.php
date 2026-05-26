<?php
/**
 * Theme Customizer settings.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return editable theme defaults.
 *
 * @return array<string,string>
 */
function langit_customizer_defaults() {
	return array(
		'hero_eyebrow'                => __( 'INTEGRATED BUILDING TECHNOLOGY', 'langit' ),
		'hero_title'                  => __( 'Reliable Building Technology Systems', 'langit' ),
		'hero_description'            => __( 'PT Global Teknindo menghadirkan solusi terintegrasi untuk keamanan, jaringan, elektrikal, fire alarm, audio, instalasi, dan pemeliharaan melalui konsultasi, implementasi, serta dukungan teknis yang menjaga operasional fasilitas tetap andal.', 'langit' ),
		'hero_primary_button_text'    => __( 'Our Services', 'langit' ),
		'hero_primary_button_url'     => '#services',
		'hero_secondary_button_text'  => __( 'Contact Us', 'langit' ),
		'hero_secondary_button_url'   => home_url( '/contact/' ),
		'hero_background_1'           => get_template_directory_uri() . '/assets/images/services/cctv-security-system.webp',
		'hero_background_2'           => get_template_directory_uri() . '/assets/images/projects/network-infrastructure-deployment.webp',
		'hero_background_3'           => get_template_directory_uri() . '/assets/images/projects/fire-alarm-integration.webp',
		'hero_background_4'           => get_template_directory_uri() . '/assets/images/projects/audio-public-address-installation.webp',
		'hero_overlay_opacity'        => '0.82',
		'show_hero_section'           => '1',
		'show_company_section'        => '1',
		'show_services_section'       => '1',
		'show_industry_section'       => '1',
		'show_projects_section'       => '1',
		'show_trust_section'          => '1',
		'show_team_section'           => '1',
		'show_testimonials_section'   => '1',
		'show_client_logo_section'    => '1',
		'show_faq_section'            => '1',
		'show_downloads_section'      => '1',
		'show_certifications_section' => '1',
		'show_cta_section'            => '1',
		'company_short_intro'         => __( 'Company Introduction', 'langit' ),
		'company_section_title'       => __( 'Technology Partner for Modern Facilities', 'langit' ),
		'company_description'         => __( 'PT Global Teknindo berfokus pada perencanaan, instalasi, integrasi, dan pemeliharaan sistem teknologi gedung. Setiap pekerjaan dijalankan dengan standar kerja terukur, dokumentasi yang jelas, serta hasil instalasi yang mudah dioperasikan dan dirawat dalam jangka panjang.', 'langit' ),
		'company_intro_closing_text'  => __( 'Pelajari lebih lanjut mengenai profil perusahaan, visi, dan komitmen layanan kami.', 'langit' ),
		'company_intro_button_text'   => __( 'About Company', 'langit' ),
		'company_intro_button_url'    => home_url( '/company/' ),
		'company_intro_image'         => get_template_directory_uri() . '/assets/images/langit-project-1200.jpg',
		'company_page_hero_title'     => __( 'Company', 'langit' ),
		'company_page_hero_description' => __( 'Profil perusahaan, nilai kerja, legalitas, dan kapabilitas PT Global Teknindo dalam mendukung kebutuhan teknologi gedung serta fasilitas industri.', 'langit' ),
		'company_about_eyebrow'       => __( 'Company Overview', 'langit' ),
		'company_about_title'         => __( 'Integrated technology partner for building and industrial systems.', 'langit' ),
		'company_about_description'   => __( 'PT Global Teknindo merupakan perusahaan profesional yang menyediakan solusi Mechanical Electrical, CCTV & Security System, Networking Infrastructure, Fire Alarm System, Audio & Public Address, serta Installation & Maintenance Service untuk kebutuhan industri, gedung komersial, pemerintahan, dan fasilitas lainnya.', 'langit' ),
		'company_capability_items'    => __( "Mechanical Electrical\nCCTV & Security System\nNetworking Infrastructure\nFire Alarm System\nAudio & Public Address\nInstallation & Maintenance Service", 'langit' ),
		'company_vision_title'        => __( 'Clear direction for reliable long-term partnership.', 'langit' ),
		'company_vision_text'         => __( 'Menjadi perusahaan profesional dan terpercaya yang mampu menjadi mitra usaha dalam memenuhi kebutuhan Mechanical Electrical, Elektronik, Audio System, CCTV, IT System, serta berbagai kebutuhan industri dan gedung lainnya.', 'langit' ),
		'company_mission_text'        => __( "Meningkatkan kualitas pelayanan kepada pelanggan, baik dalam pengadaan produk maupun layanan jasa secara profesional dan berkelanjutan.\nMemberikan solusi yang tepat, efektif, dan inovatif guna membantu menyelesaikan permasalahan pelanggan melalui produk dan layanan yang kami tawarkan.\nMelaksanakan pelatihan dan pengembangan kompetensi bagi teknisi maupun tenaga ahli agar memiliki kemampuan dan standar profesional sesuai bidangnya.\nMemberikan layanan purna jual (after sales service) yang responsif, cepat, tepat waktu, dan terpercaya.", 'langit' ),
		'company_why_title'           => __( 'Practical advantages for demanding project environments.', 'langit' ),
		'company_value_title'         => __( 'Values that guide every project delivery.', 'langit' ),
		'company_values'              => __( "Professional Team | Tim disiapkan untuk menjaga koordinasi teknis, mutu pekerjaan, keselamatan instalasi, dan kelancaran dukungan selama proyek berlangsung. | team.svg\nStructured Workflow | Setiap pekerjaan dijalankan dengan tahapan yang jelas, dokumentasi rapi, dan komunikasi yang mudah dipantau oleh pelanggan. | document.svg\nMaintenance Support | Dukungan pemeliharaan membantu menjaga performa sistem agar tetap stabil dan siap mendukung operasional jangka panjang. | maintenance.svg\nScalable Solutions | Solusi dirancang agar dapat disesuaikan dengan perkembangan kebutuhan gedung, fasilitas, dan sistem operasional pelanggan. | network.svg\nIndustrial Reliability | Pendekatan kerja berfokus pada keandalan sistem untuk lingkungan industri, komersial, dan fasilitas yang menuntut stabilitas tinggi. | electrical.svg\nConsultation & Integration | Tim membantu proses konsultasi, instalasi, integrasi, pengujian, dan penyesuaian sistem secara terarah. | contact.svg", 'langit' ),
		'company_industry_title'      => __( 'Industry coverage for modern facilities.', 'langit' ),
		'company_industries'          => __( "Commercial Buildings | Dukungan sistem untuk gedung komersial yang membutuhkan keamanan, konektivitas, audio, dan maintenance terstruktur.\nIndustrial Facilities | Solusi dapat disesuaikan dengan kebutuhan area produksi, gudang, utilitas, dan fasilitas operasional industri.\nOffices | Implementasi sistem teknologi gedung untuk kantor, ruang kerja, dan lingkungan bisnis yang membutuhkan konektivitas andal.\nWarehouses | Dukungan CCTV, jaringan, alarm, dan pemeliharaan untuk area penyimpanan dengan kebutuhan pemantauan yang konsisten.\nPublic Facilities | Sistem pendukung operasional untuk fasilitas publik yang membutuhkan komunikasi, keamanan, dan kesiapan layanan.\nHospitality | Solusi teknologi gedung untuk hotel, venue, dan fasilitas layanan yang mengutamakan kenyamanan serta keandalan operasional.", 'langit' ),
		'company_workflow_title'      => __( 'Operational workflow from consultation to maintenance.', 'langit' ),
		'company_workflow_items'      => __( "Consultation | Tim memahami kebutuhan awal, prioritas operasional, dan target solusi yang ingin dicapai pelanggan.\nSurvey | Kondisi lokasi ditinjau untuk menentukan titik pekerjaan, jalur instalasi, perangkat, dan potensi kendala teknis.\nPlanning | Rencana kerja disusun agar instalasi berjalan terarah, efisien, dan sesuai kebutuhan sistem di lapangan.\nInstallation | Proses pemasangan dilakukan dengan memperhatikan kerapian, keamanan kerja, dan dokumentasi teknis.\nTesting | Sistem diuji untuk memastikan fungsi perangkat, koneksi, dan integrasi berjalan sesuai kebutuhan operasional.\nMaintenance | Dukungan pemeliharaan membantu menjaga performa sistem tetap stabil setelah pekerjaan selesai.", 'langit' ),
		'company_cta_title'           => __( 'Ready to discuss your company requirements?', 'langit' ),
		'company_cta_description'     => __( 'Tim kami siap membantu meninjau kebutuhan teknis dan menyiapkan rekomendasi solusi yang sesuai dengan kondisi proyek.', 'langit' ),
		'company_cta_primary_text'    => __( 'Contact Us', 'langit' ),
		'company_cta_primary_url'     => home_url( '/contact/' ),
		'company_cta_secondary_text'  => __( 'Our Services', 'langit' ),
		'company_cta_secondary_url'   => home_url( '/products/' ),
		'services_section_eyebrow'    => __( 'Our Services', 'langit' ),
		'services_section_title'      => __( 'Integrated Services for Building Infrastructure', 'langit' ),
		'featured_service_ids'        => '',
		'featured_service_count'      => '6',
		'industry_section_eyebrow'    => __( 'Industry Coverage', 'langit' ),
		'industry_section_title'      => __( 'Built for Diverse Operating Environments', 'langit' ),
		'industry_items'              => __( "Industrial | Pabrik, gudang, fasilitas produksi, dan area operasional industri.\nCommercial Building | Gedung perkantoran, pusat bisnis, mall, hotel, dan area komersial.\nGovernment | Kantor pemerintahan, layanan publik, ruang monitoring, dan command center.\nResidential | Apartemen, perumahan modern, smart home, dan keamanan hunian.", 'langit' ),
		'projects_section_eyebrow'    => __( 'Featured Projects', 'langit' ),
		'projects_section_title'      => __( 'Selected work for industrial and commercial facilities.', 'langit' ),
		'featured_project_ids'        => '',
		'featured_project_count'      => '3',
		'trust_section_eyebrow'       => __( 'Client Trust', 'langit' ),
		'trust_section_title'         => __( 'Trusted support for demanding operating environments.', 'langit' ),
		'trust_section_description'   => __( 'Kepercayaan pelanggan dibangun melalui proses kerja terukur, dokumentasi yang jelas, dukungan teknis responsif, dan pengalaman lintas kebutuhan fasilitas.', 'langit' ),
		'trust_stat_1_value'          => '50+',
		'trust_stat_1_label'          => __( 'Completed Projects', 'langit' ),
		'trust_stat_1_description'    => __( 'Dukungan pekerjaan untuk kebutuhan instalasi, integrasi, dan pemeliharaan sistem teknologi gedung.', 'langit' ),
		'trust_stat_2_value'          => '6',
		'trust_stat_2_label'          => __( 'Core Services', 'langit' ),
		'trust_stat_2_description'    => __( 'Kapabilitas layanan mencakup keamanan, jaringan, elektrikal, alarm, audio, instalasi, dan maintenance.', 'langit' ),
		'trust_stat_3_value'          => '4+',
		'trust_stat_3_label'          => __( 'Supported Industries', 'langit' ),
		'trust_stat_3_description'    => __( 'Solusi dapat diterapkan untuk area industri, komersial, pemerintahan, dan fasilitas operasional lainnya.', 'langit' ),
		'trust_stat_4_value'          => '24/7',
		'trust_stat_4_label'          => __( 'Maintenance Support', 'langit' ),
		'trust_stat_4_description'    => __( 'Dukungan pemeliharaan disiapkan untuk membantu menjaga keandalan sistem dalam jangka panjang.', 'langit' ),
		'team_section_eyebrow'        => __( 'Professional Team', 'langit' ),
		'team_section_title'          => __( 'Leadership and technical support for reliable project delivery.', 'langit' ),
		'team_section_description'    => __( 'Tim kami mendukung proses konsultasi, perencanaan, instalasi, integrasi, dan maintenance dengan koordinasi yang terstruktur serta berorientasi pada kebutuhan operasional pelanggan.', 'langit' ),
		'featured_team_ids'           => '',
		'featured_team_count'         => '3',
		'testimonials_section_eyebrow' => __( 'Testimonials', 'langit' ),
		'testimonials_section_title'  => __( 'Client confidence built through reliable delivery.', 'langit' ),
		'testimonials_section_description' => __( 'Testimoni pelanggan membantu menunjukkan kualitas koordinasi, ketepatan implementasi, dan dukungan teknis yang diberikan oleh tim kami.', 'langit' ),
		'featured_testimonial_ids'    => '',
		'featured_testimonial_count'  => '3',
		'client_logo_section_eyebrow' => __( 'Trusted By', 'langit' ),
		'client_logo_section_title'   => __( 'Clients & Partners', 'langit' ),
		'client_logo_section_description' => __( 'Logo klien dan partner ditampilkan sebagai referensi kepercayaan untuk kebutuhan proyek industri, komersial, dan fasilitas operasional lainnya.', 'langit' ),
		'featured_client_ids'         => '',
		'featured_client_count'       => '8',
		'faq_section_eyebrow'         => __( 'Frequently Asked Questions', 'langit' ),
		'faq_section_title'           => __( 'Helpful answers for planning your building technology project.', 'langit' ),
		'faq_section_description'     => __( 'Temukan jawaban ringkas seputar konsultasi, instalasi, integrasi, dan maintenance agar kebutuhan proyek lebih mudah dipahami sebelum berdiskusi dengan tim kami.', 'langit' ),
		'featured_faq_ids'            => '',
		'featured_faq_count'          => '5',
		'downloads_section_eyebrow'   => __( 'Resources & Downloads', 'langit' ),
		'downloads_section_title'     => __( 'Company documents and technical resources.', 'langit' ),
		'downloads_section_description' => __( 'Akses profil perusahaan, katalog, brosur, sertifikasi, dan dokumen teknis yang membantu proses evaluasi, konsultasi, serta perencanaan kebutuhan proyek.', 'langit' ),
		'featured_download_ids'       => '',
		'featured_download_count'     => '3',
		'certifications_section_eyebrow' => __( 'Certifications & Compliance', 'langit' ),
		'certifications_section_title' => __( 'Professional standards that support reliable project delivery.', 'langit' ),
		'certifications_section_description' => __( 'Sertifikasi dan referensi kepatuhan membantu menunjukkan komitmen terhadap standar kerja, keselamatan, dokumentasi, dan kualitas implementasi di lingkungan industri maupun komersial.', 'langit' ),
		'featured_certification_ids'  => '',
		'featured_certification_count' => '3',
		'cta_eyebrow'                 => __( 'Contact', 'langit' ),
		'cta_title'                   => __( 'Diskusikan Kebutuhan Sistem Teknologi Gedung Anda', 'langit' ),
		'cta_description'             => __( 'Global Teknindo menghadirkan solusi terintegrasi untuk keamanan, jaringan, elektrikal, audio, instalasi, dan maintenance guna mendukung infrastruktur bangunan modern yang lebih aman, efisien, dan terpercaya.', 'langit' ),
		'cta_button_text'             => __( 'Contact Us', 'langit' ),
		'cta_button_url'              => home_url( '/contact/' ),
		'global_cta_eyebrow'          => __( 'Contact', 'langit' ),
		'global_cta_title'            => __( 'Diskusikan Kebutuhan Sistem Teknologi Gedung Anda', 'langit' ),
		'global_cta_description'      => __( 'Global Teknindo menghadirkan solusi terintegrasi untuk keamanan, jaringan, elektrikal, audio, instalasi, dan maintenance guna mendukung infrastruktur bangunan modern yang lebih aman, efisien, dan terpercaya.', 'langit' ),
		'global_cta_primary_text'     => __( 'Contact Us', 'langit' ),
		'global_cta_primary_url'      => home_url( '/contact/' ),
		'global_cta_secondary_text'   => '',
		'global_cta_secondary_url'    => '',
		'global_cta_variant'          => 'centered',
		'contact_cta_eyebrow'         => __( 'Consultation', 'langit' ),
		'contact_cta_title'           => __( 'Need technical consultation for your project?', 'langit' ),
		'contact_cta_description'     => __( 'Tim kami siap membantu meninjau kebutuhan sistem, menentukan solusi yang sesuai, dan menyiapkan langkah kerja berikutnya.', 'langit' ),
		'contact_cta_primary_text'    => __( 'Contact Us', 'langit' ),
		'contact_cta_primary_url'     => home_url( '/contact/' ),
		'contact_cta_secondary_text'  => __( 'WhatsApp', 'langit' ),
		'contact_cta_secondary_url'   => '',
		'contact_cta_variant'         => 'contact',
		'inquiry_title'               => __( 'Need support for your next project?', 'langit' ),
		'inquiry_description'         => __( 'Konsultasikan kebutuhan layanan, diskusi proyek, atau dukungan pemeliharaan agar tim kami dapat menyiapkan langkah teknis yang tepat.', 'langit' ),
		'inquiry_primary_text'        => __( 'Request Consultation', 'langit' ),
		'inquiry_primary_url'         => home_url( '/contact/' ),
		'inquiry_secondary_text'      => __( 'WhatsApp', 'langit' ),
		'inquiry_secondary_url'       => '',
		'inquiry_variant'             => 'consultation',
		'inquiry_form_shortcode'      => '[fluentform id="1"]',
		'company_name'                => __( 'PT Global Teknindo', 'langit' ),
		'company_short_description'   => __( 'PT Global Teknindo menyediakan solusi terintegrasi di bidang teknologi, security system, mechanical electrical, networking, installation service, serta maintenance service yang profesional dan terpercaya.', 'langit' ),
		'company_address'             => __( 'Indonesia', 'langit' ),
		'company_working_hours'       => __( 'Monday - Friday', 'langit' ),
		'contact_whatsapp_number'     => '+62 812 0000 0000',
		'contact_whatsapp_url'        => '',
		'contact_email_address'       => 'info@globalteknindo.co.id',
		'contact_hero_description'    => __( 'Tim Global Teknindo siap membantu kebutuhan keamanan, jaringan, elektrikal, audio, instalasi, dan maintenance untuk fasilitas maupun industri Anda.', 'langit' ),
		'contact_info_eyebrow'        => __( 'Contact Information', 'langit' ),
		'contact_info_title'          => __( 'Reach our team through the right channel.', 'langit' ),
		'contact_form_eyebrow'        => __( 'Contact Form', 'langit' ),
		'contact_form_title'          => __( 'Send your project inquiry.', 'langit' ),
		'contact_form_description'    => __( 'Kirimkan informasi proyek, lokasi pekerjaan, layanan yang dibutuhkan, dan jadwal yang diharapkan agar tim kami dapat menindaklanjuti dengan tepat.', 'langit' ),
		'contact_form_shortcode'      => '',
		'contact_form_recipient_email' => get_option( 'admin_email' ),
		'contact_form_cc_email'       => '',
		'contact_form_subject_prefix' => __( '[Langit Inquiry]', 'langit' ),
		'contact_form_success_message' => __( 'Terima kasih. Pesan Anda berhasil dikirim dan tim kami akan segera menindaklanjuti.', 'langit' ),
		'contact_form_error_message'  => __( 'Maaf, pesan belum dapat dikirim. Pastikan data wajib sudah lengkap dan coba kembali.', 'langit' ),
		'contact_quick_eyebrow'       => __( 'Quick Contact', 'langit' ),
		'contact_quick_title'         => __( 'Need a faster response?', 'langit' ),
		'contact_quick_description'   => __( 'Hubungi tim kami melalui WhatsApp untuk konsultasi awal, kebutuhan maintenance, atau diskusi proyek yang membutuhkan respons lebih cepat.', 'langit' ),
		'contact_quick_button_text'   => __( 'Chat via WhatsApp', 'langit' ),
		'show_quote_intro_section'    => '1',
		'show_quote_services_section' => '1',
		'show_quote_form_section'     => '1',
		'show_quote_support_section'  => '1',
		'quote_hero_eyebrow'          => __( 'Quote Request', 'langit' ),
		'quote_hero_title'            => __( 'Request a Project Consultation', 'langit' ),
		'quote_hero_description'      => __( 'Sampaikan kebutuhan proyek, layanan yang dibutuhkan, lokasi pekerjaan, dan jadwal yang diharapkan agar tim kami dapat menyiapkan arahan teknis serta estimasi penawaran yang lebih tepat.', 'langit' ),
		'quote_intro_eyebrow'         => __( 'Consultation Introduction', 'langit' ),
		'quote_intro_title'           => __( 'Structured consultation for reliable project planning.', 'langit' ),
		'quote_intro_description'     => __( 'Proses konsultasi membantu memahami kebutuhan sistem, kondisi lapangan, prioritas operasional, dan ruang lingkup pekerjaan sebelum penawaran disusun secara profesional.', 'langit' ),
		'quote_services_eyebrow'      => __( 'Service Selection', 'langit' ),
		'quote_services_title'        => __( 'Choose the services you want to discuss.', 'langit' ),
		'quote_services_description'  => __( 'Pilih layanan yang paling sesuai dengan kebutuhan proyek agar diskusi teknis dapat diarahkan sejak awal.', 'langit' ),
		'quote_service_count'         => '6',
		'quote_service_button_text'   => __( 'Continue to Request Form', 'langit' ),
		'quote_form_eyebrow'          => __( 'Request Form', 'langit' ),
		'quote_form_title'            => __( 'Send your quotation request.', 'langit' ),
		'quote_form_description'      => __( 'Lengkapi informasi kontak, jenis layanan, deskripsi proyek, estimasi waktu, dan lokasi pekerjaan untuk membantu tim kami meninjau kebutuhan Anda.', 'langit' ),
		'quote_form_shortcode'        => '[fluentform id="1"]',
		'quote_whatsapp_eyebrow'      => __( 'Quick Consultation', 'langit' ),
		'quote_whatsapp_title'        => __( 'Prefer to discuss first?', 'langit' ),
		'quote_whatsapp_description'  => __( 'Hubungi tim kami melalui WhatsApp untuk konsultasi awal, permintaan survei teknis, atau diskusi kebutuhan maintenance.', 'langit' ),
		'quote_whatsapp_button_text'  => __( 'Consult via WhatsApp', 'langit' ),
		'quote_whatsapp_url'          => '',
		'quote_support_eyebrow'       => __( 'Consultation Support', 'langit' ),
		'quote_support_title'         => __( 'Support options for every project stage.', 'langit' ),
		'quote_support_description'   => __( 'Tim kami dapat membantu dari konsultasi awal, diskusi proyek, survei teknis, hingga dukungan pemeliharaan setelah implementasi.', 'langit' ),
		'quote_cta_eyebrow'           => __( 'Need Assistance?', 'langit' ),
		'quote_cta_title'             => __( 'Ready to prepare your project quotation?', 'langit' ),
		'quote_cta_description'       => __( 'Kirimkan kebutuhan proyek atau hubungi tim kami untuk mendapatkan arahan konsultasi yang sesuai dengan kondisi lapangan.', 'langit' ),
		'quote_cta_primary_text'      => __( 'Start Quote Request', 'langit' ),
		'quote_cta_primary_url'       => '#quote-form',
		'quote_cta_secondary_text'    => __( 'WhatsApp Consultation', 'langit' ),
		'show_maintenance_overview_section' => '1',
		'show_maintenance_plans_section' => '1',
		'show_maintenance_coverage_section' => '1',
		'show_maintenance_sla_section' => '1',
		'maintenance_hero_eyebrow'    => __( 'Maintenance & Support', 'langit' ),
		'maintenance_hero_title'      => __( 'Reliable Maintenance Support for Building Technology Systems', 'langit' ),
		'maintenance_hero_description' => __( 'Layanan maintenance membantu menjaga performa CCTV, jaringan, fire alarm, mechanical electrical, audio, dan sistem pendukung operasional agar tetap stabil, terdokumentasi, serta siap digunakan.', 'langit' ),
		'maintenance_overview_eyebrow' => __( 'Service Overview', 'langit' ),
		'maintenance_overview_title'  => __( 'Structured support for long-term system reliability.', 'langit' ),
		'maintenance_overview_description' => __( 'Program maintenance disiapkan untuk membantu inspeksi berkala, penanganan gangguan, pemeriksaan perangkat, dokumentasi kondisi sistem, dan rekomendasi perbaikan sesuai kebutuhan operasional pelanggan.', 'langit' ),
		'maintenance_plans_eyebrow'   => __( 'Maintenance Plans', 'langit' ),
		'maintenance_plans_title'     => __( 'Support options for different operational needs.', 'langit' ),
		'maintenance_plans_description' => __( 'Pilih model dukungan yang sesuai dengan prioritas operasional, tingkat urgensi, dan kebutuhan pemeliharaan sistem di lapangan.', 'langit' ),
		'maintenance_plan_items'      => __( "Preventive Maintenance | Pemeriksaan berkala untuk menjaga fungsi perangkat, koneksi, dan integrasi sistem tetap stabil sebelum gangguan terjadi. | Planned Support\nCorrective Maintenance | Penanganan gangguan teknis, troubleshooting, penggantian komponen, dan pemulihan fungsi sistem sesuai kondisi lapangan. | Repair Support\nEmergency Support | Dukungan prioritas untuk kebutuhan mendesak yang memerlukan respons teknis lebih cepat pada sistem penting. | Priority Response\nRoutine Inspection | Inspeksi perangkat, panel, jaringan, alarm, dan area instalasi untuk memastikan kondisi sistem tetap terpantau. | Inspection\nAnnual Service Contract | Kontrak dukungan tahunan untuk maintenance berkala, dokumentasi layanan, dan koordinasi teknis yang lebih terstruktur. | Contract", 'langit' ),
		'maintenance_coverage_eyebrow' => __( 'Support Coverage', 'langit' ),
		'maintenance_coverage_title'  => __( 'Coverage for core building technology systems.', 'langit' ),
		'maintenance_coverage_description' => __( 'Dukungan maintenance dapat diterapkan pada berbagai sistem utama yang menunjang keamanan, konektivitas, komunikasi, dan operasional fasilitas.', 'langit' ),
		'maintenance_coverage_items'  => __( "CCTV | Pemeriksaan kamera, rekaman, koneksi, storage, dan kualitas pemantauan sistem keamanan.\nNetworking | Pemeriksaan koneksi, perangkat jaringan, titik distribusi, konfigurasi dasar, dan stabilitas konektivitas.\nFire Alarm | Pemeriksaan panel, detector, alarm, jalur instalasi, dan fungsi notifikasi sesuai kebutuhan sistem.\nMechanical Electrical | Pemeriksaan panel, jalur elektrikal, perangkat pendukung, dan kondisi instalasi operasional.\nAudio & Public Address | Pemeriksaan amplifier, speaker, jalur audio, kualitas suara, dan fungsi komunikasi area.", 'langit' ),
		'maintenance_sla_eyebrow'     => __( 'SLA & Response', 'langit' ),
		'maintenance_sla_title'       => __( 'Clear support information for operational confidence.', 'langit' ),
		'maintenance_sla_description' => __( 'Informasi SLA membantu pelanggan memahami alur respons, prioritas dukungan, ketersediaan teknis, dan eskalasi pekerjaan secara lebih transparan.', 'langit' ),
		'maintenance_sla_items'       => __( "Response Time | Respons awal disesuaikan dengan prioritas gangguan, lokasi, dan jenis kontrak dukungan yang disepakati. | Priority Based\nSupport Availability | Dukungan teknis dapat disiapkan untuk jam kerja, kunjungan berkala, atau kebutuhan khusus sesuai perjanjian layanan. | Scheduled\nOperational Coverage | Layanan mendukung fasilitas komersial, industri, kantor, gudang, dan area operasional lain yang membutuhkan sistem stabil. | Multi-Site\nTechnical Escalation | Kendala teknis ditangani melalui identifikasi masalah, tindakan perbaikan, dokumentasi, dan rekomendasi tindak lanjut. | Structured", 'langit' ),
		'maintenance_cta_eyebrow'     => __( 'Maintenance Consultation', 'langit' ),
		'maintenance_cta_title'       => __( 'Need maintenance support for your facility?', 'langit' ),
		'maintenance_cta_description' => __( 'Konsultasikan kondisi sistem, kebutuhan inspeksi, atau rencana kontrak pemeliharaan agar tim kami dapat menyiapkan rekomendasi dukungan yang tepat.', 'langit' ),
		'maintenance_cta_primary_text' => __( 'Request Maintenance Quote', 'langit' ),
		'maintenance_cta_primary_url' => home_url( '/quote/' ),
		'maintenance_cta_secondary_text' => __( 'WhatsApp Support', 'langit' ),
		'social_instagram_url'        => '',
		'social_facebook_url'         => '',
		'social_linkedin_url'         => '',
		'social_youtube_url'          => '',
		'footer_cta_title'            => __( 'Diskusikan Kebutuhan Sistem Teknologi Gedung Anda', 'langit' ),
		'footer_cta_description'      => __( 'Global Teknindo menghadirkan solusi terintegrasi untuk keamanan, jaringan, elektrikal, audio, instalasi, dan maintenance guna mendukung infrastruktur bangunan modern yang lebih aman, efisien, dan terpercaya.', 'langit' ),
		'footer_cta_button_text'      => __( 'Contact Us', 'langit' ),
		'footer_cta_button_url'       => home_url( '/contact/' ),
		'footer_copyright_text'       => __( 'Copyright {year} {site_name}. All rights reserved.', 'langit' ),
		'tracking_ga_id'              => '',
		'tracking_gtm_id'             => '',
		'tracking_meta_pixel_id'      => '',
		'tracking_clarity_id'         => '',
		'tracking_custom_head_scripts' => '',
		'tracking_custom_footer_scripts' => '',
		'tracking_schema_enabled'     => '0',
	);
}

/**
 * Get a Customizer value with a default fallback.
 *
 * @param string $key Setting key without prefix.
 * @return string
 */
function langit_theme_mod( $key ) {
	$defaults = langit_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	$value    = get_theme_mod( 'langit_' . $key, $default );

	if ( '' === $value ) {
		return $default;
	}

	return $value;
}

/**
 * Sanitize textarea content.
 *
 * @param string $value Input value.
 * @return string
 */
function langit_sanitize_textarea( $value ) {
	return sanitize_textarea_field( $value );
}

/**
 * Sanitize a comma-separated list of email addresses.
 *
 * @param string $value Input value.
 * @return string
 */
function langit_sanitize_email_list( $value ) {
	$emails = array_filter( array_map( 'trim', explode( ',', (string) $value ) ) );
	$emails = array_filter( array_map( 'sanitize_email', $emails ), 'is_email' );

	return implode( ', ', $emails );
}

/**
 * Sanitize checkbox-like Customizer values.
 *
 * @param mixed $value Input value.
 * @return string
 */
function langit_sanitize_checkbox( $value ) {
	return $value ? '1' : '0';
}

/**
 * Sanitize positive integer fields.
 *
 * @param mixed $value Input value.
 * @return string
 */
function langit_sanitize_positive_int( $value ) {
	return (string) max( 1, absint( $value ) );
}

/**
 * Sanitize hero overlay opacity.
 *
 * @param mixed $value Opacity value.
 * @return string
 */
function langit_sanitize_overlay_opacity( $value ) {
	$opacity = (float) $value;

	if ( $opacity < 0.35 ) {
		$opacity = 0.35;
	}

	if ( $opacity > 0.95 ) {
		$opacity = 0.95;
	}

	return (string) round( $opacity, 2 );
}

/**
 * Sanitize a comma-separated list of post IDs.
 *
 * @param string $value Input value.
 * @return string
 */
function langit_sanitize_id_list( $value ) {
	$ids = array_filter( array_map( 'absint', explode( ',', (string) $value ) ) );

	return implode( ',', array_unique( $ids ) );
}

/**
 * Sanitize CTA variant values.
 *
 * @param string $value Input value.
 * @return string
 */
function langit_sanitize_cta_variant( $value ) {
	$allowed = array( 'centered', 'split', 'contact', 'consultation' );

	return in_array( $value, $allowed, true ) ? $value : 'centered';
}

/**
 * Check whether a Customizer toggle is enabled.
 *
 * @param string $key Setting key without prefix.
 * @return bool
 */
function langit_theme_mod_enabled( $key ) {
	return '1' === (string) langit_theme_mod( $key );
}

/**
 * Parse a comma-separated post ID setting.
 *
 * @param string $key Setting key without prefix.
 * @return array<int,int>
 */
function langit_theme_mod_id_list( $key ) {
	return array_values( array_filter( array_map( 'absint', explode( ',', langit_theme_mod( $key ) ) ) ) );
}

/**
 * Parse homepage industry rows.
 *
 * Expected row format: Title | Description.
 *
 * @return array<int,array<string,string>>
 */
function langit_homepage_industries() {
	$rows       = preg_split( '/\r\n|\r|\n/', langit_theme_mod( 'industry_items' ) );
	$industries = array();

	foreach ( $rows as $row ) {
		$row = trim( $row );
		if ( '' === $row ) {
			continue;
		}

		$parts        = array_map( 'trim', explode( '|', $row, 2 ) );
		$industries[] = array(
			'title'       => $parts[0],
			'description' => isset( $parts[1] ) && '' !== $parts[1] ? $parts[1] : __( 'Bangunan, fasilitas, dan area operasional dengan kebutuhan keamanan dan konektivitas.', 'langit' ),
		);
	}

	return $industries;
}

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function langit_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'langit_theme_settings',
		array(
			'title'       => esc_html__( 'Langit Theme Settings', 'langit' ),
			'description' => esc_html__( 'Editable homepage and footer content for the Langit theme.', 'langit' ),
			'priority'    => 30,
		)
	);

	$wp_customize->add_section(
		'langit_hero_settings',
		array(
			'title' => esc_html__( 'Hero Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_company_settings',
		array(
			'title' => esc_html__( 'Company Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_homepage_sections',
		array(
			'title' => esc_html__( 'Homepage Sections', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_company_information',
		array(
			'title' => esc_html__( 'Company Information', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_contact_information',
		array(
			'title' => esc_html__( 'Contact Information', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_contact_form_settings',
		array(
			'title' => esc_html__( 'Contact Form Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_social_media',
		array(
			'title' => esc_html__( 'Social Media', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_footer_settings',
		array(
			'title' => esc_html__( 'Footer Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_tracking_settings',
		array(
			'title' => esc_html__( 'Analytics & Tracking', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_global_cta_settings',
		array(
			'title' => esc_html__( 'Global CTA & Inquiry', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_quote_settings',
		array(
			'title' => esc_html__( 'Quote Request Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_maintenance_settings',
		array(
			'title' => esc_html__( 'Maintenance & Support', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$fields = array(
		'hero_eyebrow' => array(
			'label'   => esc_html__( 'Hero Eyebrow Text', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'show_hero_section' => array(
			'label'    => esc_html__( 'Show Hero Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'hero_background_1' => array(
			'label'       => esc_html__( 'Hero Background 1', 'langit' ),
			'description' => esc_html__( 'Recommended topic: CCTV & Security System. Suggested size: 1920x1080 WebP.', 'langit' ),
			'section'     => 'langit_hero_settings',
			'type'        => 'image',
			'sanitize'    => 'esc_url_raw',
		),
		'hero_background_2' => array(
			'label'       => esc_html__( 'Hero Background 2', 'langit' ),
			'description' => esc_html__( 'Recommended topic: Networking Infrastructure & Mechanical Electrical.', 'langit' ),
			'section'     => 'langit_hero_settings',
			'type'        => 'image',
			'sanitize'    => 'esc_url_raw',
		),
		'hero_background_3' => array(
			'label'       => esc_html__( 'Hero Background 3', 'langit' ),
			'description' => esc_html__( 'Recommended topic: Fire Alarm System.', 'langit' ),
			'section'     => 'langit_hero_settings',
			'type'        => 'image',
			'sanitize'    => 'esc_url_raw',
		),
		'hero_background_4' => array(
			'label'       => esc_html__( 'Hero Background 4', 'langit' ),
			'description' => esc_html__( 'Recommended topic: Audio & Public Address.', 'langit' ),
			'section'     => 'langit_hero_settings',
			'type'        => 'image',
			'sanitize'    => 'esc_url_raw',
		),
		'hero_overlay_opacity' => array(
			'label'       => esc_html__( 'Hero Overlay Opacity', 'langit' ),
			'description' => esc_html__( 'Adjust darkness for text readability. Recommended range: 0.70 - 0.88.', 'langit' ),
			'section'     => 'langit_hero_settings',
			'type'        => 'number',
			'sanitize'    => 'langit_sanitize_overlay_opacity',
			'input_attrs' => array(
				'min'  => '0.35',
				'max'  => '0.95',
				'step' => '0.01',
			),
		),
		'show_company_section' => array(
			'label'    => esc_html__( 'Show Company Introduction', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_services_section' => array(
			'label'    => esc_html__( 'Show Services Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_industry_section' => array(
			'label'    => esc_html__( 'Show Industry Coverage', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_projects_section' => array(
			'label'    => esc_html__( 'Show Featured Projects', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_trust_section' => array(
			'label'    => esc_html__( 'Show Client Trust Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_team_section' => array(
			'label'    => esc_html__( 'Show Team Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_testimonials_section' => array(
			'label'    => esc_html__( 'Show Testimonials Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_client_logo_section' => array(
			'label'    => esc_html__( 'Show Client Logo Showcase', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_faq_section' => array(
			'label'    => esc_html__( 'Show FAQ Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_downloads_section' => array(
			'label'    => esc_html__( 'Show Downloads Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_certifications_section' => array(
			'label'    => esc_html__( 'Show Certifications Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_cta_section' => array(
			'label'    => esc_html__( 'Show CTA Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'hero_title' => array(
			'label'   => esc_html__( 'Hero Title', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'hero_description' => array(
			'label'    => esc_html__( 'Hero Description', 'langit' ),
			'section'  => 'langit_hero_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'hero_primary_button_text' => array(
			'label'   => esc_html__( 'Primary Button Text', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'hero_primary_button_url' => array(
			'label'    => esc_html__( 'Primary Button URL', 'langit' ),
			'section'  => 'langit_hero_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'hero_secondary_button_text' => array(
			'label'   => esc_html__( 'Secondary Button Text', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'hero_secondary_button_url' => array(
			'label'    => esc_html__( 'Secondary Button URL', 'langit' ),
			'section'  => 'langit_hero_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'company_short_intro' => array(
			'label'   => esc_html__( 'Company Short Introduction', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_section_title' => array(
			'label'   => esc_html__( 'Company Section Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_description' => array(
			'label'    => esc_html__( 'Company Description Section', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_intro_closing_text' => array(
			'label'    => esc_html__( 'Company Intro Closing Text', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_intro_button_text' => array(
			'label'   => esc_html__( 'Company Intro Button Text', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_intro_button_url' => array(
			'label'    => esc_html__( 'Company Intro Button URL', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'company_intro_image' => array(
			'label'       => esc_html__( 'Company Intro Image', 'langit' ),
			'description' => esc_html__( 'Recommended size: 1200x676 or similar 16:9 ratio.', 'langit' ),
			'section'     => 'langit_company_settings',
			'type'        => 'image',
			'sanitize'    => 'esc_url_raw',
		),
		'company_page_hero_title' => array(
			'label'   => esc_html__( 'Company Hero Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_page_hero_description' => array(
			'label'    => esc_html__( 'Company Hero Description', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_about_eyebrow' => array(
			'label'   => esc_html__( 'About Eyebrow', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_about_title' => array(
			'label'   => esc_html__( 'About Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_about_description' => array(
			'label'    => esc_html__( 'About Company Description', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_capability_items' => array(
			'label'       => esc_html__( 'Company Capability Items', 'langit' ),
			'description' => esc_html__( 'One capability per line.', 'langit' ),
			'section'     => 'langit_company_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'company_vision_title' => array(
			'label'   => esc_html__( 'Vision & Mission Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_vision_text' => array(
			'label'    => esc_html__( 'Vision Text', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_mission_text' => array(
			'label'       => esc_html__( 'Mission Text', 'langit' ),
			'description' => esc_html__( 'One mission point per line.', 'langit' ),
			'section'     => 'langit_company_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'company_why_title' => array(
			'label'   => esc_html__( 'Why Choose Us Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_value_title' => array(
			'label'   => esc_html__( 'Company Values Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_values' => array(
			'label'       => esc_html__( 'Company Value Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description | icon.svg', 'langit' ),
			'section'     => 'langit_company_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'company_industry_title' => array(
			'label'   => esc_html__( 'Industry Coverage Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_industries' => array(
			'label'       => esc_html__( 'Industry Coverage Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description.', 'langit' ),
			'section'     => 'langit_company_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'company_workflow_title' => array(
			'label'   => esc_html__( 'Operational Workflow Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_workflow_items' => array(
			'label'       => esc_html__( 'Operational Workflow Items', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description.', 'langit' ),
			'section'     => 'langit_company_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'company_cta_title' => array(
			'label'   => esc_html__( 'Company CTA Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_cta_description' => array(
			'label'    => esc_html__( 'Company CTA Description', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_cta_primary_text' => array(
			'label'   => esc_html__( 'Company CTA Primary Button Text', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_cta_primary_url' => array(
			'label'    => esc_html__( 'Company CTA Primary Button URL', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'company_cta_secondary_text' => array(
			'label'   => esc_html__( 'Company CTA Secondary Button Text', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_cta_secondary_url' => array(
			'label'    => esc_html__( 'Company CTA Secondary Button URL', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'services_section_eyebrow' => array(
			'label'   => esc_html__( 'Services Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'services_section_title' => array(
			'label'   => esc_html__( 'Services Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'featured_service_ids' => array(
			'label'       => esc_html__( 'Featured Service IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated service post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_service_count' => array(
			'label'    => esc_html__( 'Service Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'industry_section_eyebrow' => array(
			'label'   => esc_html__( 'Industry Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'industry_section_title' => array(
			'label'   => esc_html__( 'Industry Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'industry_items' => array(
			'label'       => esc_html__( 'Industry Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'projects_section_eyebrow' => array(
			'label'   => esc_html__( 'Projects Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'projects_section_title' => array(
			'label'   => esc_html__( 'Projects Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'featured_project_ids' => array(
			'label'       => esc_html__( 'Featured Project IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated project post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_project_count' => array(
			'label'    => esc_html__( 'Project Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'trust_section_eyebrow' => array(
			'label'   => esc_html__( 'Trust Section Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_section_title' => array(
			'label'   => esc_html__( 'Trust Section Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_section_description' => array(
			'label'    => esc_html__( 'Trust Section Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'trust_stat_1_value' => array(
			'label'   => esc_html__( 'Trust Stat 1 Value', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_1_label' => array(
			'label'   => esc_html__( 'Trust Stat 1 Label', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_1_description' => array(
			'label'    => esc_html__( 'Trust Stat 1 Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'trust_stat_2_value' => array(
			'label'   => esc_html__( 'Trust Stat 2 Value', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_2_label' => array(
			'label'   => esc_html__( 'Trust Stat 2 Label', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_2_description' => array(
			'label'    => esc_html__( 'Trust Stat 2 Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'trust_stat_3_value' => array(
			'label'   => esc_html__( 'Trust Stat 3 Value', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_3_label' => array(
			'label'   => esc_html__( 'Trust Stat 3 Label', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_3_description' => array(
			'label'    => esc_html__( 'Trust Stat 3 Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'trust_stat_4_value' => array(
			'label'   => esc_html__( 'Trust Stat 4 Value', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_4_label' => array(
			'label'   => esc_html__( 'Trust Stat 4 Label', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'trust_stat_4_description' => array(
			'label'    => esc_html__( 'Trust Stat 4 Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'team_section_eyebrow' => array(
			'label'   => esc_html__( 'Team Section Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'team_section_title' => array(
			'label'   => esc_html__( 'Team Section Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'team_section_description' => array(
			'label'    => esc_html__( 'Team Section Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'featured_team_ids' => array(
			'label'       => esc_html__( 'Featured Team IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated team member post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_team_count' => array(
			'label'    => esc_html__( 'Team Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'testimonials_section_eyebrow' => array(
			'label'   => esc_html__( 'Testimonials Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'testimonials_section_title' => array(
			'label'   => esc_html__( 'Testimonials Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'testimonials_section_description' => array(
			'label'    => esc_html__( 'Testimonials Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'featured_testimonial_ids' => array(
			'label'       => esc_html__( 'Featured Testimonial IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated testimonial post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_testimonial_count' => array(
			'label'    => esc_html__( 'Testimonial Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'client_logo_section_eyebrow' => array(
			'label'   => esc_html__( 'Client Showcase Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'client_logo_section_title' => array(
			'label'   => esc_html__( 'Client Showcase Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'client_logo_section_description' => array(
			'label'    => esc_html__( 'Client Showcase Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'featured_client_ids' => array(
			'label'       => esc_html__( 'Featured Client IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated client post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_client_count' => array(
			'label'    => esc_html__( 'Client Logo Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'faq_section_eyebrow' => array(
			'label'   => esc_html__( 'FAQ Section Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'faq_section_title' => array(
			'label'   => esc_html__( 'FAQ Section Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'faq_section_description' => array(
			'label'    => esc_html__( 'FAQ Section Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'featured_faq_ids' => array(
			'label'       => esc_html__( 'Featured FAQ IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated FAQ post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_faq_count' => array(
			'label'    => esc_html__( 'FAQ Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'downloads_section_eyebrow' => array(
			'label'   => esc_html__( 'Downloads Section Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'downloads_section_title' => array(
			'label'   => esc_html__( 'Downloads Section Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'downloads_section_description' => array(
			'label'    => esc_html__( 'Downloads Section Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'featured_download_ids' => array(
			'label'       => esc_html__( 'Featured Download IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated download post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_download_count' => array(
			'label'    => esc_html__( 'Download Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'certifications_section_eyebrow' => array(
			'label'   => esc_html__( 'Certifications Section Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'certifications_section_title' => array(
			'label'   => esc_html__( 'Certifications Section Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'certifications_section_description' => array(
			'label'    => esc_html__( 'Certifications Section Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'featured_certification_ids' => array(
			'label'       => esc_html__( 'Featured Certification IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated certification post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_certification_count' => array(
			'label'    => esc_html__( 'Certification Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'cta_eyebrow' => array(
			'label'   => esc_html__( 'CTA Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'cta_title' => array(
			'label'   => esc_html__( 'CTA Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'cta_description' => array(
			'label'    => esc_html__( 'CTA Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'cta_button_text' => array(
			'label'   => esc_html__( 'CTA Button Text', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'cta_button_url' => array(
			'label'    => esc_html__( 'CTA Button URL', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'global_cta_eyebrow' => array(
			'label'   => esc_html__( 'Global CTA Eyebrow', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'global_cta_title' => array(
			'label'   => esc_html__( 'Global CTA Title', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'global_cta_description' => array(
			'label'    => esc_html__( 'Global CTA Description', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'global_cta_primary_text' => array(
			'label'   => esc_html__( 'Global CTA Primary Button Text', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'global_cta_primary_url' => array(
			'label'    => esc_html__( 'Global CTA Primary Button URL', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'global_cta_secondary_text' => array(
			'label'   => esc_html__( 'Global CTA Secondary Button Text', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'global_cta_secondary_url' => array(
			'label'    => esc_html__( 'Global CTA Secondary Button URL', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'global_cta_variant' => array(
			'label'    => esc_html__( 'Global CTA Variant', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'select',
			'sanitize' => 'langit_sanitize_cta_variant',
			'choices'  => array(
				'centered'     => esc_html__( 'Centered', 'langit' ),
				'split'        => esc_html__( 'Split Layout', 'langit' ),
				'contact'      => esc_html__( 'Contact Focused', 'langit' ),
				'consultation' => esc_html__( 'Consultation', 'langit' ),
			),
		),
		'contact_cta_eyebrow' => array(
			'label'   => esc_html__( 'Contact CTA Eyebrow', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'contact_cta_title' => array(
			'label'   => esc_html__( 'Contact CTA Title', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'contact_cta_description' => array(
			'label'    => esc_html__( 'Contact CTA Description', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'contact_cta_primary_text' => array(
			'label'   => esc_html__( 'Contact CTA Primary Button Text', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'contact_cta_primary_url' => array(
			'label'    => esc_html__( 'Contact CTA Primary Button URL', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'contact_cta_secondary_text' => array(
			'label'   => esc_html__( 'Contact CTA Secondary Button Text', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'contact_cta_secondary_url' => array(
			'label'       => esc_html__( 'Contact CTA Secondary Button URL', 'langit' ),
			'description' => esc_html__( 'Leave empty to use the configured WhatsApp URL.', 'langit' ),
			'section'     => 'langit_global_cta_settings',
			'type'        => 'url',
			'sanitize'    => 'esc_url_raw',
		),
		'contact_cta_variant' => array(
			'label'    => esc_html__( 'Contact CTA Variant', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'select',
			'sanitize' => 'langit_sanitize_cta_variant',
			'choices'  => array(
				'centered'     => esc_html__( 'Centered', 'langit' ),
				'split'        => esc_html__( 'Split Layout', 'langit' ),
				'contact'      => esc_html__( 'Contact Focused', 'langit' ),
				'consultation' => esc_html__( 'Consultation', 'langit' ),
			),
		),
		'inquiry_title' => array(
			'label'   => esc_html__( 'Inquiry Title', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'inquiry_description' => array(
			'label'    => esc_html__( 'Inquiry Description', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'inquiry_primary_text' => array(
			'label'   => esc_html__( 'Inquiry Primary Button Text', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'inquiry_primary_url' => array(
			'label'    => esc_html__( 'Inquiry Primary Button URL', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'inquiry_secondary_text' => array(
			'label'   => esc_html__( 'Inquiry Secondary Button Text', 'langit' ),
			'section' => 'langit_global_cta_settings',
		),
		'inquiry_secondary_url' => array(
			'label'       => esc_html__( 'Inquiry Secondary Button URL', 'langit' ),
			'description' => esc_html__( 'Leave empty to use the configured WhatsApp URL.', 'langit' ),
			'section'     => 'langit_global_cta_settings',
			'type'        => 'url',
			'sanitize'    => 'esc_url_raw',
		),
		'inquiry_variant' => array(
			'label'    => esc_html__( 'Inquiry CTA Variant', 'langit' ),
			'section'  => 'langit_global_cta_settings',
			'type'     => 'select',
			'sanitize' => 'langit_sanitize_cta_variant',
			'choices'  => array(
				'centered'     => esc_html__( 'Centered', 'langit' ),
				'split'        => esc_html__( 'Split Layout', 'langit' ),
				'contact'      => esc_html__( 'Contact Focused', 'langit' ),
				'consultation' => esc_html__( 'Consultation', 'langit' ),
			),
		),
		'inquiry_form_shortcode' => array(
			'label'       => esc_html__( 'Inquiry Form Shortcode', 'langit' ),
			'description' => esc_html__( 'Prepared for Fluent Forms, for example: [fluentform id="1"].', 'langit' ),
			'section'     => 'langit_global_cta_settings',
		),
		'show_quote_intro_section' => array(
			'label'    => esc_html__( 'Show Quote Introduction', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_quote_services_section' => array(
			'label'    => esc_html__( 'Show Service Selection', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_quote_form_section' => array(
			'label'    => esc_html__( 'Show Quote Form', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_quote_support_section' => array(
			'label'    => esc_html__( 'Show Consultation Support', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'quote_hero_eyebrow' => array(
			'label'   => esc_html__( 'Quote Hero Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_hero_title' => array(
			'label'   => esc_html__( 'Quote Hero Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_hero_description' => array(
			'label'    => esc_html__( 'Quote Hero Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_intro_eyebrow' => array(
			'label'   => esc_html__( 'Quote Introduction Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_intro_title' => array(
			'label'   => esc_html__( 'Quote Introduction Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_intro_description' => array(
			'label'    => esc_html__( 'Quote Introduction Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_services_eyebrow' => array(
			'label'   => esc_html__( 'Service Selection Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_services_title' => array(
			'label'   => esc_html__( 'Service Selection Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_services_description' => array(
			'label'    => esc_html__( 'Service Selection Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_service_count' => array(
			'label'    => esc_html__( 'Service Selection Limit', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'quote_service_button_text' => array(
			'label'   => esc_html__( 'Service Selection Button Text', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_form_eyebrow' => array(
			'label'   => esc_html__( 'Quote Form Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_form_title' => array(
			'label'   => esc_html__( 'Quote Form Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_form_description' => array(
			'label'    => esc_html__( 'Quote Form Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_form_shortcode' => array(
			'label'       => esc_html__( 'Quote Form Shortcode', 'langit' ),
			'description' => esc_html__( 'Prepared for Fluent Forms or Contact Form 7 shortcodes.', 'langit' ),
			'section'     => 'langit_quote_settings',
		),
		'quote_whatsapp_eyebrow' => array(
			'label'   => esc_html__( 'WhatsApp CTA Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_whatsapp_title' => array(
			'label'   => esc_html__( 'WhatsApp CTA Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_whatsapp_description' => array(
			'label'    => esc_html__( 'WhatsApp CTA Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_whatsapp_button_text' => array(
			'label'   => esc_html__( 'WhatsApp Button Text', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_whatsapp_url' => array(
			'label'       => esc_html__( 'WhatsApp Consultation URL', 'langit' ),
			'description' => esc_html__( 'Leave empty to use the global WhatsApp URL.', 'langit' ),
			'section'     => 'langit_quote_settings',
			'type'        => 'url',
			'sanitize'    => 'esc_url_raw',
		),
		'quote_support_eyebrow' => array(
			'label'   => esc_html__( 'Support Section Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_support_title' => array(
			'label'   => esc_html__( 'Support Section Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_support_description' => array(
			'label'    => esc_html__( 'Support Section Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_cta_eyebrow' => array(
			'label'   => esc_html__( 'Quote CTA Eyebrow', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_cta_title' => array(
			'label'   => esc_html__( 'Quote CTA Title', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_cta_description' => array(
			'label'    => esc_html__( 'Quote CTA Description', 'langit' ),
			'section'  => 'langit_quote_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'quote_cta_primary_text' => array(
			'label'   => esc_html__( 'Quote CTA Primary Button Text', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'quote_cta_primary_url' => array(
			'label'    => esc_html__( 'Quote CTA Primary Button URL', 'langit' ),
			'section'  => 'langit_quote_settings',
			'sanitize' => 'esc_url_raw',
		),
		'quote_cta_secondary_text' => array(
			'label'   => esc_html__( 'Quote CTA Secondary Button Text', 'langit' ),
			'section' => 'langit_quote_settings',
		),
		'show_maintenance_overview_section' => array(
			'label'    => esc_html__( 'Show Maintenance Overview', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_maintenance_plans_section' => array(
			'label'    => esc_html__( 'Show Maintenance Plans', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_maintenance_coverage_section' => array(
			'label'    => esc_html__( 'Show Support Coverage', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_maintenance_sla_section' => array(
			'label'    => esc_html__( 'Show SLA Section', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'maintenance_hero_eyebrow' => array(
			'label'   => esc_html__( 'Maintenance Hero Eyebrow', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_hero_title' => array(
			'label'   => esc_html__( 'Maintenance Hero Title', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_hero_description' => array(
			'label'    => esc_html__( 'Maintenance Hero Description', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'maintenance_overview_eyebrow' => array(
			'label'   => esc_html__( 'Overview Eyebrow', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_overview_title' => array(
			'label'   => esc_html__( 'Overview Title', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_overview_description' => array(
			'label'    => esc_html__( 'Overview Description', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'maintenance_plans_eyebrow' => array(
			'label'   => esc_html__( 'Plans Eyebrow', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_plans_title' => array(
			'label'   => esc_html__( 'Plans Title', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_plans_description' => array(
			'label'    => esc_html__( 'Plans Description', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'maintenance_plan_items' => array(
			'label'       => esc_html__( 'Maintenance Plan Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description | Meta label.', 'langit' ),
			'section'     => 'langit_maintenance_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'maintenance_coverage_eyebrow' => array(
			'label'   => esc_html__( 'Coverage Eyebrow', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_coverage_title' => array(
			'label'   => esc_html__( 'Coverage Title', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_coverage_description' => array(
			'label'    => esc_html__( 'Coverage Description', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'maintenance_coverage_items' => array(
			'label'       => esc_html__( 'Coverage Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description.', 'langit' ),
			'section'     => 'langit_maintenance_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'maintenance_sla_eyebrow' => array(
			'label'   => esc_html__( 'SLA Eyebrow', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_sla_title' => array(
			'label'   => esc_html__( 'SLA Title', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_sla_description' => array(
			'label'    => esc_html__( 'SLA Description', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'maintenance_sla_items' => array(
			'label'       => esc_html__( 'SLA Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description | Value/label.', 'langit' ),
			'section'     => 'langit_maintenance_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'maintenance_cta_eyebrow' => array(
			'label'   => esc_html__( 'Maintenance CTA Eyebrow', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_cta_title' => array(
			'label'   => esc_html__( 'Maintenance CTA Title', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_cta_description' => array(
			'label'    => esc_html__( 'Maintenance CTA Description', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'maintenance_cta_primary_text' => array(
			'label'   => esc_html__( 'Maintenance CTA Primary Button Text', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'maintenance_cta_primary_url' => array(
			'label'    => esc_html__( 'Maintenance CTA Primary Button URL', 'langit' ),
			'section'  => 'langit_maintenance_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'maintenance_cta_secondary_text' => array(
			'label'   => esc_html__( 'Maintenance CTA Secondary Button Text', 'langit' ),
			'section' => 'langit_maintenance_settings',
		),
		'company_name' => array(
			'label'   => esc_html__( 'Company Name', 'langit' ),
			'section' => 'langit_company_information',
		),
		'company_short_description' => array(
			'label'    => esc_html__( 'Company Short Description', 'langit' ),
			'section'  => 'langit_company_information',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_address' => array(
			'label'    => esc_html__( 'Company Address', 'langit' ),
			'section'  => 'langit_company_information',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_working_hours' => array(
			'label'   => esc_html__( 'Working Hours', 'langit' ),
			'section' => 'langit_company_information',
		),
		'contact_whatsapp_number' => array(
			'label'   => esc_html__( 'WhatsApp Number', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_whatsapp_url' => array(
			'label'       => esc_html__( 'WhatsApp URL', 'langit' ),
			'description' => esc_html__( 'Leave empty to generate a wa.me link from the WhatsApp number.', 'langit' ),
			'section'     => 'langit_contact_information',
			'type'        => 'url',
			'sanitize'    => 'esc_url_raw',
		),
		'contact_email_address' => array(
			'label'    => esc_html__( 'Email Address', 'langit' ),
			'section'  => 'langit_contact_information',
			'type'     => 'email',
			'sanitize' => 'sanitize_email',
		),
		'contact_hero_description' => array(
			'label'       => esc_html__( 'Contact Hero Description', 'langit' ),
			'description' => esc_html__( 'Use {company_name} as an optional placeholder.', 'langit' ),
			'section'     => 'langit_contact_information',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'contact_info_eyebrow' => array(
			'label'   => esc_html__( 'Contact Information Eyebrow', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_info_title' => array(
			'label'   => esc_html__( 'Contact Information Title', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_form_eyebrow' => array(
			'label'   => esc_html__( 'Inquiry Form Eyebrow', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_form_title' => array(
			'label'   => esc_html__( 'Inquiry Form Title', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_form_description' => array(
			'label'    => esc_html__( 'Inquiry Form Description', 'langit' ),
			'section'  => 'langit_contact_information',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'contact_form_shortcode' => array(
			'label'       => esc_html__( 'Inquiry Form Shortcode', 'langit' ),
			'description' => esc_html__( 'Optional. Leave empty to use the native Langit contact form.', 'langit' ),
			'section'     => 'langit_contact_form_settings',
		),
		'contact_form_recipient_email' => array(
			'label'    => esc_html__( 'Recipient Email', 'langit' ),
			'section'  => 'langit_contact_form_settings',
			'type'     => 'email',
			'sanitize' => 'sanitize_email',
		),
		'contact_form_cc_email' => array(
			'label'       => esc_html__( 'CC Email', 'langit' ),
			'description' => esc_html__( 'Optional. Use commas to add multiple addresses.', 'langit' ),
			'section'     => 'langit_contact_form_settings',
			'sanitize'    => 'langit_sanitize_email_list',
		),
		'contact_form_subject_prefix' => array(
			'label'   => esc_html__( 'Email Subject Prefix', 'langit' ),
			'section' => 'langit_contact_form_settings',
		),
		'contact_form_success_message' => array(
			'label'    => esc_html__( 'Success Message', 'langit' ),
			'section'  => 'langit_contact_form_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'contact_form_error_message' => array(
			'label'    => esc_html__( 'Error Message', 'langit' ),
			'section'  => 'langit_contact_form_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'contact_quick_eyebrow' => array(
			'label'   => esc_html__( 'Quick Contact Eyebrow', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_quick_title' => array(
			'label'   => esc_html__( 'Quick Contact Title', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_quick_description' => array(
			'label'    => esc_html__( 'Quick Contact Description', 'langit' ),
			'section'  => 'langit_contact_information',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'contact_quick_button_text' => array(
			'label'   => esc_html__( 'Quick Contact Button Text', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'social_instagram_url' => array(
			'label'    => esc_html__( 'Instagram URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_facebook_url' => array(
			'label'    => esc_html__( 'Facebook URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_linkedin_url' => array(
			'label'    => esc_html__( 'LinkedIn URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_youtube_url' => array(
			'label'    => esc_html__( 'YouTube URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'footer_cta_title' => array(
			'label'   => esc_html__( 'Footer CTA Title', 'langit' ),
			'section' => 'langit_footer_settings',
		),
		'footer_cta_description' => array(
			'label'   => esc_html__( 'Footer CTA Description', 'langit' ),
			'section' => 'langit_footer_settings',
			'type'    => 'textarea',
		),
		'footer_cta_button_text' => array(
			'label'   => esc_html__( 'Footer CTA Button Text', 'langit' ),
			'section' => 'langit_footer_settings',
		),
		'footer_cta_button_url' => array(
			'label'    => esc_html__( 'Footer CTA Button URL', 'langit' ),
			'section'  => 'langit_footer_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'footer_copyright_text' => array(
			'label'       => esc_html__( 'Footer Copyright Text', 'langit' ),
			'description' => esc_html__( 'Use {year} and {site_name} as optional placeholders.', 'langit' ),
			'section'     => 'langit_footer_settings',
		),
		'tracking_ga_id' => array(
			'label'       => esc_html__( 'Google Analytics ID', 'langit' ),
			'description' => esc_html__( 'Example: G-XXXXXXXXXX. Leave empty to disable.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'sanitize'    => 'langit_sanitize_tracking_id',
		),
		'tracking_gtm_id' => array(
			'label'       => esc_html__( 'Google Tag Manager ID', 'langit' ),
			'description' => esc_html__( 'Example: GTM-XXXXXXX. Leave empty to disable.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'sanitize'    => 'langit_sanitize_tracking_id',
		),
		'tracking_meta_pixel_id' => array(
			'label'       => esc_html__( 'Meta Pixel ID', 'langit' ),
			'description' => esc_html__( 'Numeric Pixel ID only. Leave empty to disable.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'sanitize'    => 'langit_sanitize_pixel_id',
		),
		'tracking_clarity_id' => array(
			'label'       => esc_html__( 'Microsoft Clarity ID', 'langit' ),
			'description' => esc_html__( 'Leave empty to disable.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'sanitize'    => 'langit_sanitize_tracking_id',
		),
		'tracking_custom_head_scripts' => array(
			'label'       => esc_html__( 'Custom Head Scripts', 'langit' ),
			'description' => esc_html__( 'Optional trusted tracking snippets for wp_head. Requires administrator script permissions.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_tracking_snippet',
		),
		'tracking_custom_footer_scripts' => array(
			'label'       => esc_html__( 'Custom Footer Scripts', 'langit' ),
			'description' => esc_html__( 'Optional trusted tracking snippets for wp_footer. Requires administrator script permissions.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_tracking_snippet',
		),
		'tracking_schema_enabled' => array(
			'label'       => esc_html__( 'Enable Theme Organization Schema', 'langit' ),
			'description' => esc_html__( 'Keep disabled when Rank Math or Yoast handles schema output.', 'langit' ),
			'section'     => 'langit_tracking_settings',
			'type'        => 'checkbox',
			'sanitize'    => 'langit_sanitize_checkbox',
		),
	);

	$defaults = langit_customizer_defaults();

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'langit_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => isset( $field['sanitize'] ) ? $field['sanitize'] : 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);

		$control_args = array(
			'label'       => $field['label'],
			'description' => isset( $field['description'] ) ? $field['description'] : '',
			'section'     => $field['section'],
			'type'        => isset( $field['type'] ) ? $field['type'] : 'text',
		);

		if ( isset( $field['choices'] ) ) {
			$control_args['choices'] = $field['choices'];
		}

		if ( isset( $field['input_attrs'] ) ) {
			$control_args['input_attrs'] = $field['input_attrs'];
		}

		if ( isset( $field['type'] ) && 'image' === $field['type'] ) {
			unset( $control_args['type'] );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'langit_' . $key, $control_args ) );
		} else {
			$wp_customize->add_control( 'langit_' . $key, $control_args );
		}
	}
}
add_action( 'customize_register', 'langit_customize_register' );

/**
 * Build a telephone-friendly WhatsApp URL.
 *
 * @param string $number Visible WhatsApp number.
 * @param string $message Optional prefilled text.
 * @return string
 */
function langit_whatsapp_url( $number, $message = '' ) {
	$digits = preg_replace( '/\D+/', '', $number );

	if ( empty( $digits ) ) {
		return home_url( '/contact/' );
	}

	if ( '0' === substr( $digits, 0, 1 ) ) {
		$digits = '62' . substr( $digits, 1 );
	}

	$url = 'https://wa.me/' . $digits;

	if ( ! empty( $message ) ) {
		$url .= '?text=' . rawurlencode( $message );
	}

	return $url;
}

/**
 * Return the configured WhatsApp URL.
 *
 * @param string $message Optional prefilled text.
 * @return string
 */
function langit_contact_whatsapp_url( $message = '' ) {
	$url = langit_theme_mod( 'contact_whatsapp_url' );

	if ( ! empty( $url ) ) {
		if ( ! empty( $message ) ) {
			if ( false !== strpos( $url, 'wa.me' ) || false !== strpos( $url, 'whatsapp.com' ) ) {
				$query_char = ( false !== strpos( $url, '?' ) ) ? '&' : '?';
				return $url . $query_char . 'text=' . rawurlencode( $message );
			}
		}
		return $url;
	}

	return langit_whatsapp_url( langit_theme_mod( 'contact_whatsapp_number' ), $message );
}
