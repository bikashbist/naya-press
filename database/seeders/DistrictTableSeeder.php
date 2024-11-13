<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //province 1
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Bhojpur",
            'district_np' => 'भोजपुर',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Dhankuta",
            'district_np' => 'धनकुटा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Ilam",
            'district_np' => 'इलाम',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Jhapa",
            'district_np' => 'झापा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Khotang",
            'district_np' => 'खोटाङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Morang",
            'district_np' => 'मोरङ',
        ]);

        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Okhaldhunga",
            'district_np' => 'ओखलढुङ्गा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Panchthar",
            'district_np' => 'पाँचथर',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Sankhuwasabha",
            'district_np' => 'संखुवासभा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Solukhumbu",
            'district_np' => 'सोलुखुम्बु',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Sunsari",
            'district_np' => 'सुनसरी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Taplejung",
            'district_np' => 'ताप्लेजुङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Tehrathum",
            'district_np' => 'तेह्रथुम',
        ]);
        DB::table('districts')->insert([
            'province_id' => 1,
            'district_en' => "Udayapur",
            'district_np' => 'उदयपुर',
        ]);

        //province 2
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Parsa",
            'district_np' => 'पर्सा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Bara",
            'district_np' => 'बारा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Rautahat",
            'district_np' => 'रौतहट',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Sarlahi",
            'district_np' => 'सर्लाही',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Dhanusa",
            'district_np' => 'धनुषा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Siraha",
            'district_np' => 'सिराहा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Mahottari",
            'district_np' => 'महोत्तरी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 2,
            'district_en' => "Saptari",
            'district_np' => 'सप्तरी',
        ]);
        //province 3
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Sindhuli",
            'district_np' => 'सिन्धुली',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Ramechhap",
            'district_np' => 'रामेछाप',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Dolakha",
            'district_np' => 'दोलखा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Bhaktapur",
            'district_np' => 'भक्तपुर',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Dhading",
            'district_np' => 'धादिङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Kathmandu",
            'district_np' => 'काठमाडौं',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Kavrepalanchok",
            'district_np' => 'काभ्रेपलाञ्चोक',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Lalitpur",
            'district_np' => 'ललितपुर',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Nuwakot",
            'district_np' => 'नुवाकोट',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Rasuwa",
            'district_np' => 'रसुवा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Sindhupalchowk",
            'district_np' => 'सिन्धुपाल्चोक',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Chitwan",
            'district_np' => 'चितवन',
        ]);
        DB::table('districts')->insert([
            'province_id' => 3,
            'district_en' => "Makwanpur",
            'district_np' => 'मकवानपुर',
        ]);
        //province 4
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Baglung",
            'district_np' => 'बागलुङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Gorkha",
            'district_np' => 'गोरखा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Kaski",
            'district_np' => 'कास्की',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Lamjung",
            'district_np' => 'लमजुङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Manang",
            'district_np' => 'मनाङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Mustang",
            'district_np' => 'मुस्ताङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Myagdi",
            'district_np' => 'म्याग्दी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Nawalparasi",
            'district_np' => 'नवलपुर',

        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Parbat",
            'district_np' => 'पर्वत',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Syangja",
            'district_np' => 'स्याङ्जा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 4,
            'district_en' => "Tanahun",
            'district_np' => 'तनहुँ',
        ]);

        //province 5
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Kapilvastu",
            'district_np' => 'कपिलवस्तु',

        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Parasi",
            'district_np' => 'परासी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Rupandehi",
            'district_np' => 'रुपन्देही',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Arghakhanchi",
            'district_np' => 'अर्घाखाँची',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Gulmi",
            'district_np' => 'गुल्मी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Palpa",
            'district_np' => 'पाल्पा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Dang",
            'district_np' => 'दाङ देउखुरी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Pyuthan",
            'district_np' => 'प्युठान',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Rolpa",
            'district_np' => 'रोल्पा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Eastern Rukum (East)",
            'district_np' => 'रुकुम (पूर्वी)',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Banke",
            'district_np' => 'बाँके',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Bardiya",
            'district_np' => 'बर्दिया',
        ]);
        DB::table('districts')->insert([
            'province_id' => 5,
            'district_en' => "Western Rukum (West)",
            'district_np' => 'रूकुम (पश्चिम)',
        ]);
        //province 6
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Salyan",
            'district_np' => 'सल्यान',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Dolpa",
            'district_np' => 'डोल्पा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Humla",
            'district_np' => 'हुम्ला',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Jumla",
            'district_np' => 'जुम्ला',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Kalikot",
            'district_np' => 'कालिकोट',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Mugu",
            'district_np' => 'मुगु',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Surkhet",
            'district_np' => 'सुर्खेत',
        ]);

        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Dailekh",
            'district_np' => 'दैलेख',
        ]);
        DB::table('districts')->insert([
            'province_id' => 6,
            'district_en' => "Jajarkot",
            'district_np' => 'जाजरकोट',
        ]);
        //province 7
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Kailali",
            'district_np' => 'कैलाली',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Acham",
            'district_np' => 'अछाम',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Darcula",
            'district_np' => 'डोटी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Bajhan",
            'district_np' => 'बझाङ',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Bajura",
            'district_np' => 'बाजुरा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Kanchanpur",
            'district_np' => 'कञ्चनपुर',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Dadeldhura",
            'district_np' => 'डडेल्धुरा',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Baitadi",
            'district_np' => 'बैतडी',
        ]);
        DB::table('districts')->insert([
            'province_id' => 7,
            'district_en' => "Darchula",
            'district_np' => 'दार्चुला',
        ]);
    }
}
