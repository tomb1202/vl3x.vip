<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

        $settings = [
            'logo'              => '',
            'favicon'           => '',
            'title'             => 'MeSex – Xem Phim 18+ Online Miễn Phí | Cập Nhật Nhanh, Không Quảng Cáo',
            'site_name'         => 'MeSex',
            'version'           => '1.0',
            'theme_color'       => '#111111',
            'google_analytics'  => '',
            'mail'              => 'contact@mesex.tv',
            'description'       => 'MeSex là nền tảng xem phim 18+ trực tuyến miễn phí, tốc độ cao, chất lượng HD. Tổng hợp phim người lớn từ nhiều quốc gia, cập nhật liên tục.',
            'introduce'         => 'MeSex.tv cung cấp kho phim 18+ chất lượng cao từ các quốc gia như Nhật Bản, Hàn Quốc, Âu Mỹ, Việt Nam, v.v...
        Website không yêu cầu đăng ký, không quảng cáo gây phiền phức.
        Người dùng có thể xem online mượt mà hoặc tải về để xem offline bất kỳ lúc nào.',
            'copyright'         => '© 2025 MeSex. All rights reserved.',
            'notification'      => '⚠️ MeSex.tv chỉ dành cho người trên 18 tuổi. Truy cập kho phim 18+ chất lượng cao, miễn phí, không quảng cáo!',
            'introduct_footer'  => 'MeSex không lưu trữ bất kỳ video nào trên máy chủ. Tất cả nội dung đều được nhúng từ các nền tảng chia sẻ của bên thứ ba.',
        ];


        foreach ($settings as $key => $setting) {
            Setting::create([
                'key'   => $key,
                'value' => $setting,
            ]);
        }
    }
}
