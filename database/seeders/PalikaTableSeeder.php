<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PalikaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //bhojpur
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Bhojpur Municipality",
            'palika_np' => 'भोजपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Shadanand Municipality",
            'palika_np' => 'षडानन्द नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Aamchok Rural Municipality",
            'palika_np' => 'आमचोक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Tyamke Maiyum",
            'palika_np' => 'ट्याम्केमैयुम गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Arun Rural Municipality",
            'palika_np' => 'अरुण गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Pauwadungma Rural Municipality",
            'palika_np' => 'पौवादुङमा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Salpasilichho Rural Municipality",
            'palika_np' => 'साल्पासिलिछो गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Hatuwagadhi Rural Municipality",
            'palika_np' => 'हतुवागढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 1,
            'palika_en' => "Ramprasad Rai Rural Municipality",
            'palika_np' => 'रामप्रसाद राई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Paakhribas Municipality",
            'palika_np' => 'पाख्रिबास नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Dhankuta Municipality",
            'palika_np' => 'धनकुटा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Mahalaxmi Municipality",
            'palika_np' => 'महालक्ष्मी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Sangurigadhi Rural Municipality",
            'palika_np' => 'सागुरीगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Sahidbhumi Rural Municipality",
            'palika_np' => 'सहीदभूमि गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Chhathar Jorpati Rural Municipality",
            'palika_np' => 'छथर जोरपाटी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 2,
            'palika_en' => "Chaubise Rural Municipality",
            'palika_np' => 'चौविसे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Iilam Municipality",
            'palika_np' => 'ईलाम नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Deumaai Municipality",
            'palika_np' => 'देउमाई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Maai Municipality",
            'palika_np' => 'माई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Suryodaya Municipality",
            'palika_np' => 'सूर्योदय नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Phakphokthum Rural Municipality",
            'palika_np' => 'फाकफोकथुम गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Mai Jogmai Rural Municipality",
            'palika_np' => 'माईजोगमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Chulachuli Rural Municipality",
            'palika_np' => 'चुलाचुली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Rong Rural Municipality",
            'palika_np' => 'रोङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Mangsebung Rural Municipality",
            'palika_np' => 'माङसेबुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 3,
            'palika_en' => "Sandakpur Rural Municipality",
            'palika_np' => 'सन्दकपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Mechinagar Municipality",
            'palika_np' => 'मेचीनगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Damak Municipality",
            'palika_np' => 'दमक नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Kankai Municipality",
            'palika_np' => 'कन्काई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Bhadrapur Municipality",
            'palika_np' => 'भद्रपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Arjundhara Municipality",
            'palika_np' => 'अर्जुनधारा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Shivasatakshi Municipality",
            'palika_np' => 'शिवसताक्षी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Gauraadaha Municipality",
            'palika_np' => 'गौरादह नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Birtamod Municipality",
            'palika_np' => 'विर्तामोड नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Kamal Rural Municipality",
            'palika_np' => 'कमल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Buddha Shanti Rural Municipality",
            'palika_np' => 'बुद्धशान्ति गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Kachankawal Rural Municipality",
            'palika_np' => 'कचनकवल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Jhapa Rural Municipality",
            'palika_np' => 'झापा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Barhadashi Rural Municipality",
            'palika_np' => 'बाह्रदशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 4,
            'palika_en' => "Gaurigunj Rural Municipality",
            'palika_np' => 'गौरीगंज गाउँपालिका',

        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Haldibari Rural Municipality",
            'palika_np' => 'हल्दीवारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Rupakot Majhuwagadhi Municipality",
            'palika_np' => 'रुपाकोट मझुवागढ़ी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Khotehang Rural Municipality",
            'palika_np' => 'खोटेहाङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Diprung Rural Municipality",
            'palika_np' => 'दिप्रुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Aiselukharka Rural Municipality",
            'palika_np' => 'ऐसेलुखर्क गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Jantedhunga Rural Municipality",
            'palika_np' => 'जन्तेढुंगा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Kepilasgadhi Rural Municipality",
            'palika_np' => 'केपिलासगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Barahpokhari Rural Municipality",
            'palika_np' => 'बराहपोखरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 5,
            'palika_en' => "Lamidanda Rural Municipality",
            'palika_np' => 'लामीडाँडा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Sakela Rural Municipality",
            'palika_np' => 'साकेला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Biratnagar Sub-Metropolitan",
            'palika_np' => 'विराटनगर उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Belbari Municipality",
            'palika_np' => 'बेलबारी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Letang Municipality",
            'palika_np' => 'लेटांग नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Pathari Sanischari Municipality",
            'palika_np' => 'पथरी शनिश्चरे नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Rangeli Municipality",
            'palika_np' => 'रंगेली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Ratuwamaai Municipality",
            'palika_np' => 'रतुवामाई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Sunwarsi Municipality",
            'palika_np' => 'सुनवर्षी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Urlabari Municipality",
            'palika_np' => 'उर्लाबारी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Sundarharaicha Municipality",
            'palika_np' => 'सुन्दरहरैचा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Jahada Rural Municipality",
            'palika_np' => 'जहदा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Budi Ganga Rural Municipality",
            'palika_np' => 'बुढीगंगा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Katahari Rural Municipality",
            'palika_np' => 'कटहरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Dhanpalthan Rural Municipality",
            'palika_np' => 'धनपालथान गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Kanepokhari Rural Municipality",
            'palika_np' => 'कानेपोखरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Gramthan Rural Municipality",
            'palika_np' => 'ग्रामथान गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Kerabari Rural Municipality",
            'palika_np' => 'केरावारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 6,
            'palika_en' => "Miklajung Rural Municipality",
            'palika_np' => 'मिक्लाजुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Siddhicharan Municipality",
            'palika_np' => 'सिद्दिचरण नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Manebhanjyang Rural Municipality",
            'palika_np' => 'मानेभञ्ज्याङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Champadevi Rural Municipality",
            'palika_np' => 'चम्पादेवी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Sunkoshi Rural Municipality",
            'palika_np' => 'सुनकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Molung Rural Municipality",
            'palika_np' => 'मोलुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Chisankhugadhi Rural Municipality",
            'palika_np' => 'चिसंखुगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Khiji Demba Rural Municipality",
            'palika_np' => 'खिजिदेम्बा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 7,
            'palika_en' => "Likhu Rural Municipality",
            'palika_np' => 'लिखु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Fidim Municipality",
            'palika_np' => 'फिदिम नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Miklajung Rural Municipality",
            'palika_np' => 'मिक्लाजुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "nda Rural Municipality",
            'palika_np' => 'फाल्गुनन्द गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Hilihang Rural Municipality",
            'palika_np' => 'हिलिहाङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Phalelung Rural Municipality",
            'palika_np' => 'फालेलुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Yangwarak Rural Municipality",
            'palika_np' => 'याङवरक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Tumbewa Rural Municipality",
            'palika_np' => 'तुम्बेवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 8,
            'palika_en' => "Tumbewa Rural Municipality",
            'palika_np' => 'तुम्बेवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Chainpur Municipality",
            'palika_np' => 'चैनपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Dharmadevi Municipality",
            'palika_np' => 'धर्मदेवी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Khandwari Municipality",
            'palika_np' => 'खांदवारी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Maadi Municipality",
            'palika_np' => 'मादी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Panchkhapan Municipality",
            'palika_np' => 'पाँचखपन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Makalu Rural Municipality",
            'palika_np' => 'मकालु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Silichong Rural Municipality",
            'palika_np' => 'सिलीचोङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Sabhapokhari Rural Municipality",
            'palika_np' => 'सभापोखरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Chichila Rural Municipality",
            'palika_np' => 'चिचिला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 9,
            'palika_en' => "Bhot Khola Rural Municipality",
            'palika_np' => 'भोटखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Solududhkunda Municipality",
            'palika_np' => 'सोलुदुधकुण्ड नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Dudhakaushika Rural Municipality",
            'palika_np' => 'दुधकौशिका गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Necha Salyan Rural Municipality",
            'palika_np' => 'नेचासल्यान गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Maha Kulung Rural Municipality",
            'palika_np' => 'महाकुलुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Sotang Rural Municipality",
            'palika_np' => 'सोताङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Khumbu Pasang Lhamu Rural Municipality",
            'palika_np' => 'खुम्बु पासाङल्हमु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 10,
            'palika_en' => "Likhu Pike Rural Municipality",
            'palika_np' => 'लिखुपिके गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Iitahari Sub-Metropolitan",
            'palika_np' => 'ईटहरी उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Dharan Sub-Metropolitan",
            'palika_np' => 'धरान उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Inaruwa Municipality",
            'palika_np' => 'इनरुवा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Duhabi Municipality",
            'palika_np' => 'दुहवी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Ramdhuni Municipality",
            'palika_np' => 'रामधुनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Baraha Municipality",
            'palika_np' => 'बराह नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Koshi Rural Municipality",
            'palika_np' => 'कोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Harinagara Rural Municipality",
            'palika_np' => 'हरिनगरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Bhokraha Rural Municipality",
            'palika_np' => 'भोक्राहा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Dewanganj Rural Municipality",
            'palika_np' => 'देवानगन्ज गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Gadhi Rural Municipality",
            'palika_np' => 'गढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 11,
            'palika_en' => "Barju Rural Municipality",
            'palika_np' => 'बर्जु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Fungling Municipality",
            'palika_np' => 'फुंलिंग नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Sirijangha Rural Municipality",
            'palika_np' => 'सिरीजङ्घा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Aathrai Triveni Rural Municipality",
            'palika_np' => 'आठराई त्रिवेणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Pathibhara Yangwarak Rural Municipality",
            'palika_np' => 'पाथीभरा याङवरक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Meringden Rural Municipality",
            'palika_np' => 'मेरिङदेन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Sidingwa Rural Municipality",
            'palika_np' => 'सिदिङ्वा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Phaktanglung Rural Municipality",
            'palika_np' => 'फाक्ताङ्लुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Maiwa Khola Rural Municipality",
            'palika_np' => 'मैवाखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 12,
            'palika_en' => "Mikwa Khola Rural Municipality",
            'palika_np' => 'मिक्वाखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 13,
            'palika_en' => "Myanglung Municipality",
            'palika_np' => 'म्यांगलुंग नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 13,
            'palika_en' => "Laligurans Municipality",
            'palika_np' => 'लालीगुराँस नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 13,
            'palika_en' => "Aathrai Rural Municipality",
            'palika_np' => 'आठराई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 13,
            'palika_en' => "Phedap Rural Municipality",
            'palika_np' => 'फेदाप गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 13,
            'palika_en' => "Chhathar Rural Municipality",
            'palika_np' => 'छथर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 13,
            'palika_en' => "Menchayayem Rural Municipality",
            'palika_np' => 'मेन्छयायेम गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Katari Municipality",
            'palika_np' => 'कटारी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Chaudandigadhi Municipality",
            'palika_np' => 'चौदण्डीगढी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Triyuga Municipality",
            'palika_np' => 'त्रियुगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Belakaa Municipality",
            'palika_np' => 'वेलका नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Udayapurgadhi Rural Municipality",
            'palika_np' => 'उदयपुरगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Rautamai Rural Municipality",
            'palika_np' => 'रौतामाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Tapli Rural Municipality",
            'palika_np' => 'ताप्ली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 14,
            'palika_en' => "Limchungbung Rural Municipality",
            'palika_np' => 'लिम्चुङबुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Birganj Sub-Metropolitan",
            'palika_np' => 'बिरगंज उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Pokhariya Municipality",
            'palika_np' => 'पोखरिया नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Sakhuwa Prasauni Rural Municipality",
            'palika_np' => 'सखुवा प्रसौनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Jagarnathpur Rural Municipality",
            'palika_np' => 'जगरनाथपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Chhipaharmai Rural Municipality",
            'palika_np' => 'छिपहरमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Bindabasini Rural Municipality",
            'palika_np' => 'बिन्दबासिनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Paterwa Sugauli Rural Municipality",
            'palika_np' => 'पटेर्वा सुगौली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Jira Bhavani Rural Municipality",
            'palika_np' => 'जिरा भवानी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Kalikamai Rural Municipality",
            'palika_np' => 'कालिकामाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Pakaha Mainpur Rural Municipality",
            'palika_np' => 'पकाहा मैनपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Thori Rural Municipality",
            'palika_np' => 'ठोरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 15,
            'palika_en' => "Dhobini Rural Municipality",
            'palika_np' => 'धोबीनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Kalaiya Sub-Metropolitan",
            'palika_np' => 'कलैया उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Jitpur Simara Sub-Metropolitan",
            'palika_np' => 'जितपुरसिमरा उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Kolhavi Municipality",
            'palika_np' => 'कोल्हवी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Nijgadh Municipality",
            'palika_np' => 'निजगढ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Mahagadhimaai Municipality",
            'palika_np' => 'महागढ़ीमाई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Simraungadh Municipality",
            'palika_np' => 'सिम्रौनगढ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Subarna Rural Municipality",
            'palika_np' => 'सुवर्ण  गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Adarsha Kotwal Rural Municipality",
            'palika_np' => 'आदर्श कोतवाल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Baragadhi Rural Municipality",
            'palika_np' => 'बारागढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Pheta Rural Municipality",
            'palika_np' => 'फेटा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Karaiyamai Rural Municipality",
            'palika_np' => 'करैयामाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Prasauni Rural Municipality",
            'palika_np' => 'प्रसौनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Bishrampur Rural Municipality",
            'palika_np' => 'विश्रामपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Devtal Rural Municipality",
            'palika_np' => 'देवताल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 16,
            'palika_en' => "Parawanipur Rural Municipality",
            'palika_np' => 'परवानीपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Chandrapur Municipality",
            'palika_np' => 'चंद्रपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Garuda Municipality",
            'palika_np' => 'गरुडा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Gaur Municipality",
            'palika_np' => 'गौर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Rajpur Rural Municipality",
            'palika_np' => 'राजपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Paroha Rural Municipality",
            'palika_np' => 'परोहा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Iishnaath Rural Municipality",
            'palika_np' => 'ईशनाथ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Fatuwabijayapur Rural Municipality",
            'palika_np' => 'फतुवाबिजयपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Maulapur Rural Municipality",
            'palika_np' => 'मौलापुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Madhav Narayan Rural Municipality",
            'palika_np' => 'माधव नारायण गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Katahariya Rural Municipality",
            'palika_np' => 'कटहरिया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Gujara Rural Municipality",
            'palika_np' => 'गुजरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Gadhimaai Rural Municipality",
            'palika_np' => 'गढीमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Durga Bhagwati Rural Municipality",
            'palika_np' => 'दुर्गा भगवती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Devahi Gonahi Rural Municipality",
            'palika_np' => 'देवाही गोनाही गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 17,
            'palika_en' => "Brindavan Rural Municipality",
            'palika_np' => 'वृन्दावन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Iishworpur Municipality",
            'palika_np' => 'ईश्वोरपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Malangawa Municipality",
            'palika_np' => 'मलंगवा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Lalbandi Municipality",
            'palika_np' => 'लालबन्दी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Haripur Municipality",
            'palika_np' => 'हरिपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Haripurwa Municipality",
            'palika_np' => 'हरिपुर्वा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Harivan Municipality",
            'palika_np' => 'हरिवन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Barhathawa Municipality",
            'palika_np' => 'बरहथवा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Balaraa Municipality",
            'palika_np' => 'बलरा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Godaita Municipality",
            'palika_np' => 'गोडेटा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Bagmati Municipality",
            'palika_np' => 'बागमती नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Bishnu Rural Municipality",
            'palika_np' => 'विष्णु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Ramnagar Rural Municipality",
            'palika_np' => 'रामनगर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Bramhapuri Rural Municipality",
            'palika_np' => 'ब्रह्मपुरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Dhankaul Rural Municipality",
            'palika_np' => 'धनकौल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Chandranagar Rural Municipality",
            'palika_np' => 'चन्द्रनगर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Chakraghatta Rural Municipality",
            'palika_np' => 'चक्रघट्टा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Kabilasi Rural Municipality",
            'palika_np' => 'कविलासी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Kaudena Rural Municipality",
            'palika_np' => 'कौडेना गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 18,
            'palika_en' => "Basbariya Rural Municipality",
            'palika_np' => 'बसबरिया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Janakpurdham Sub-Metropolitan",
            'palika_np' => 'जनकपुरधाम उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Kshireshwornath Municipality",
            'palika_np' => 'क्षिरेश्वरनाथ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Ganeshman Charnath Municipality",
            'palika_np' => 'गणेशमान चारनाथ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Dhanushadham Municipality",
            'palika_np' => 'धनुषाधाम नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Nagarain Municipality",
            'palika_np' => 'नगराइन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Vedeha Municipality",
            'palika_np' => 'विदेह नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Mithila Municipality",
            'palika_np' => 'मिथिला नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Shahidnagar Municipality",
            'palika_np' => 'शहिदनगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Sabaila Municipality",
            'palika_np' => 'सबैला नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Aaurahi Rural Municipality",
            'palika_np' => 'औरही गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Hansapur Rural Municipality",
            'palika_np' => 'हंसपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Laksminiya Rural Municipality",
            'palika_np' => 'लक्ष्मीनिया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Mukhiyapatti Musaharmiya Rural Municipality",
            'palika_np' => 'मुखियापट्टी मुसहरमिया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Mithila Bihari Rural Municipality",
            'palika_np' => 'मिथिला बिहारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Bateshwar Rural Municipality",
            'palika_np' => 'बटेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Janak Nandini Rural Municipality",
            'palika_np' => 'जनकनन्दिनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Kamala Siddhidaatri Rural Municipality",
            'palika_np' => 'कमला सिद्धिदत्री गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 19,
            'palika_en' => "Dhanauji Rural Municipality",
            'palika_np' => 'धनौजी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Lahaan Municipality",
            'palika_np' => 'लहान नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Dhangadhimaai Municipality",
            'palika_np' => 'धनगढीमाई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Siraha Municipality",
            'palika_np' => 'सिरहा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Golbajar Municipality",
            'palika_np' => 'गोलबजार नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Michaiyan Municipality",
            'palika_np' => 'मिचैयाँ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Kalyanpur Municipality",
            'palika_np' => 'कल्याणपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Bhagawanpur Rural Municipality",
            'palika_np' => 'भगवानपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Aaurahi Rural Municipality",
            'palika_np' => 'औरही गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Bishnupur Rural Municipality",
            'palika_np' => 'विष्णुपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Bariyarpatti Rural Municipality",
            'palika_np' => 'बरियारपट्टी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Laksmipur Patari Rural Municipality",
            'palika_np' => 'लक्ष्मीपुर पतारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Naraha Rural Municipality",
            'palika_np' => 'नरहा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Sakhuwanankarkatti Rural Municipality",
            'palika_np' => 'सखुवानान्कारकट्टी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Arnama Rural Municipality",
            'palika_np' => 'अर्नमा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Nawarajpur Rural Municipality",
            'palika_np' => 'नवराजपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Sukhipur Rural Municipality",
            'palika_np' => 'सुखीपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 20,
            'palika_en' => "Karjanha Rural Municipality",
            'palika_np' => 'कर्जन्हा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Jaleshwor Municipality",
            'palika_np' => 'जलेश्वर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Bardibas Municipality",
            'palika_np' => 'बर्दिबास नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Gaushala Municipality",
            'palika_np' => 'गौशाला नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Ekdara Rural Municipality",
            'palika_np' => 'एकडारा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Sonama Rural Municipality",
            'palika_np' => 'सोनमा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Samsi Rural Municipality",
            'palika_np' => 'साम्सी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Loharpatti Rural Municipality",
            'palika_np' => 'लोहारपट्टी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Ramgopalpur Rural Municipality",
            'palika_np' => 'रामगोपालपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Mahottari Rural Municipality",
            'palika_np' => 'महोत्तरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Manara Rural Municipality",
            'palika_np' => 'मनरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Matihani Rural Municipality",
            'palika_np' => 'मटिहानी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Bhangaha Rural Municipality",
            'palika_np' => 'भंगाहा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Balawa Rural Municipality",
            'palika_np' => 'बलवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Pipara Rural Municipality",
            'palika_np' => 'पिपरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 21,
            'palika_en' => "Aaurahi Rural Municipality",
            'palika_np' => 'औरही गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Rajbiraj Municipality",
            'palika_np' => 'राजविराज नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Kanchanrup Municipality",
            'palika_np' => 'कन्चंरूप नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Daakneshwori Municipality",
            'palika_np' => 'डाक्नेश्वरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Bodebarsain Municipality",
            'palika_np' => 'बोदेबरसाईन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Khadak Municipality",
            'palika_np' => 'खडक नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Shambhunath Municipality",
            'palika_np' => 'शम्भुनाथ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Surunga Municipality",
            'palika_np' => 'सुरुङ्गा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Hanumannagar kankalini Municipality",
            'palika_np' => 'हनुमाननगर कन्कालिनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Krishnasawaran Rural Municipality",
            'palika_np' => 'कृष्णासवरन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Chhinnamasta Rural Municipality",
            'palika_np' => 'छिन्नमस्ता गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Mahadeva Rural Municipality",
            'palika_np' => 'महादेवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Saptakoshi Rural Municipality",
            'palika_np' => 'सप्तकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Tirhut Rural Municipality",
            'palika_np' => 'तिरहुत गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Tilathi Koiladi Rural Municipality",
            'palika_np' => 'तिलाठी कोईलाडी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Rupani Rural Municipality",
            'palika_np' => 'रुपनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Belhi Chapena Rural Municipality",
            'palika_np' => 'बेल्ही चपेना गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Bishnupur Rural Municipality",
            'palika_np' => 'बिष्णुपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Aagnisaira Krishnasawaran Rural Municipality",
            'palika_np' => 'अग्निसाइर कृष्णासवरन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 22,
            'palika_en' => "Balan-Bihul Rural Municipality",
            'palika_np' => 'बलान-बिहुल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Kamalamaai Municipality",
            'palika_np' => 'कमलामाई नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Dudhauli Municipality",
            'palika_np' => 'दुधौली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Golanjor Rural Municipality",
            'palika_np' => 'गोलन्जोर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Ghyanglekh Rural Municipality",
            'palika_np' => 'घ्याङलेख गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Tinpatan Rural Municipality",
            'palika_np' => 'तिनपाटन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Phikkal Rural Municipality",
            'palika_np' => 'फिक्कल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Marin Rural Municipality",
            'palika_np' => 'मरिण गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Sunkoshi Rural Municipality",
            'palika_np' => 'सुनकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 23,
            'palika_en' => "Hariharpurgadhi Rural Municipality",
            'palika_np' => 'हरिहरपुरगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Manthali Municipality",
            'palika_np' => 'मन्थली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Ramechhap Municipality",
            'palika_np' => 'रामेछाप नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Umakunda Rural Municipality",
            'palika_np' => 'उमाकुण्ड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Khandadevi Rural Municipality",
            'palika_np' => 'खाँडादेवी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Gokulganga Rural Municipality",
            'palika_np' => 'गोकुलगङ्गा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Doramba Rural Municipality",
            'palika_np' => 'दोरम्बा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Likhu Tamakoshi Rural Municipality",
            'palika_np' => 'लिखु तामाकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 24,
            'palika_en' => "Sunapati Rural Municipality",
            'palika_np' => 'सुनापती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Jiri Municipality",
            'palika_np' => 'जिरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Bhimeshwor Municipality",
            'palika_np' => 'भीमेश्वर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Kalinchok Rural Municipality",
            'palika_np' => 'कालिन्चोक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Gaurishankar Rural Municipality",
            'palika_np' => 'गौरिशंकर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Tamakoshi Rural Municipality",
            'palika_np' => 'तामाकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Melung Rural Municipality",
            'palika_np' => 'मेलुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Bigu Rural Municipality",
            'palika_np' => 'विगु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Baiteshwar Rural Municipality",
            'palika_np' => 'वैतेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 25,
            'palika_en' => "Shailung Rural Municipality",
            'palika_np' => 'शैलुङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 26,
            'palika_en' => "Changunarayan Municipality",
            'palika_np' => 'चाँगुनारायण नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 26,
            'palika_en' => "Bhaktapur Municipality",
            'palika_np' => 'भक्तपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 26,
            'palika_en' => "Madhyapur Thimi Municipality",
            'palika_np' => 'मध्यपुर थिमी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 26,
            'palika_en' => "Suryavinayak Municipality",
            'palika_np' => 'सूर्यविनायक नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Dhunibensi Municipality",
            'palika_np' => 'धुनीबेंशी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Nilkantha Municipality",
            'palika_np' => 'नीलकण्ठ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Khaniyabas Rural Municipality",
            'palika_np' => 'खनियाबास गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Gajuri Rural Municipality",
            'palika_np' => 'गजुरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Galchhi Rural Municipality",
            'palika_np' => 'गल्छी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Gangajamuna Rural Municipality",
            'palika_np' => 'गङ्गाजमुना गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Jwalamukhi Rural Municipality",
            'palika_np' => 'ज्वालामूखी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Thakre Rural Municipality",
            'palika_np' => 'थाक्रे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Netrawati Dabjong Rural Municipality",
            'palika_np' => 'नेत्रावती डबजोङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Benighat Rorang Rural Municipality",
            'palika_np' => 'बेनीघाट रोराङ्ग गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Ruby Valley Rural Municipality",
            'palika_np' => 'रुवी भ्याली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Siddhalekh Rural Municipality",
            'palika_np' => 'सिद्धलेक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 27,
            'palika_en' => "Tripura Sundari Rural Municipality",
            'palika_np' => 'त्रिपुरासुन्दरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Kathmandu Metropolitan",
            'palika_np' => 'काठमाडौँ महानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Kageshwori Manohara Municipality",
            'palika_np' => 'कागेश्वरी मनोहरा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Kirtipur Municipality",
            'palika_np' => 'कीर्तिपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Gokarneshwor Municipality",
            'palika_np' => 'गोकर्णेश्वोर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Chandragiri Municipality",
            'palika_np' => 'चन्द्रागिरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Tokha Municipality",
            'palika_np' => 'टोखा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Tarkeshwor Municipality",
            'palika_np' => 'तार्केश्वोर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Dakshinkali Municipality",
            'palika_np' => 'दक्षिणकाली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Nagarjun Municipality",
            'palika_np' => 'नागार्जुन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Budhanilkantha Municipality",
            'palika_np' => 'बुढानिलकण्ठ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 28,
            'palika_en' => "Sankharapur Municipality",
            'palika_np' => 'शंखारापुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Dhulikhel Municipality",
            'palika_np' => 'धुलिखेल नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Banepa Municipality",
            'palika_np' => 'बनेपा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Panauti Municipality",
            'palika_np' => 'पनौती नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Panchkhal Municipality",
            'palika_np' => 'पाँचखाल नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Namobudha Municipality",
            'palika_np' => 'नमोबुद्ध नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Khanikhola Rural Municipality",
            'palika_np' => 'खानीखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Chaunri Deurali Rural Municipality",
            'palika_np' => 'चौंरी देउराली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Temal Rural Municipality",
            'palika_np' => 'तेमाल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Bethanchok Rural Municipality",
            'palika_np' => 'बेथानचोक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Bhumlu Rural Municipality",
            'palika_np' => 'भुम्लु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Mandandeupur Municipality",
            'palika_np' => 'मण्डनदेउपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Mahabharat Rural Municipality",
            'palika_np' => 'महाभारत गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 29,
            'palika_en' => "Roshi Rural Municipality",
            'palika_np' => 'रोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 30,
            'palika_en' => "Lalitpur Metropolitan",
            'palika_np' => 'ललितपुर महानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 30,
            'palika_en' => "Godawari Municipality",
            'palika_np' => 'गोदावरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 30,
            'palika_en' => "Mahalaksmi Municipality",
            'palika_np' => 'महालक्ष्मी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 30,
            'palika_en' => "Konjyosom Rural Municipality",
            'palika_np' => 'कोन्ज्योसोम गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 30,
            'palika_en' => "Bagmati Rural Municipality",
            'palika_np' => 'बाग्मती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 30,
            'palika_en' => "Mahankal Rural Municipality",
            'palika_np' => 'महाङ्काल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Bidur Municipality",
            'palika_np' => 'विदुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Belkotgadhi Municipality",
            'palika_np' => 'बेलकोटगढी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Kakani Rural Municipality",
            'palika_np' => 'ककनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Kispang Rural Municipality",
            'palika_np' => 'किस्पाङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Tadi Rural Municipality",
            'palika_np' => 'तादी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Tarkeshwar Rural Municipality",
            'palika_np' => 'तारकेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Dupcheshwar Rural Municipality",
            'palika_np' => 'दुप्चेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Panchakanya Rural Municipality",
            'palika_np' => 'पञ्चकन्या गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Likhu Rural Municipality",
            'palika_np' => 'लिखु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Myagang Rural Municipality",
            'palika_np' => 'मेघांग गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Shivapuri Rural Municipality",
            'palika_np' => 'शिवपुरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 31,
            'palika_en' => "Suryagadhi Rural Municipality",
            'palika_np' => 'सुर्यगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 32,
            'palika_en' => "Uttargaya Rural Municipality",
            'palika_np' => 'उत्तरगया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 32,
            'palika_en' => "Kalika Rural Municipality",
            'palika_np' => 'कालिका गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 32,
            'palika_en' => "Gosaikund Rural Municipality",
            'palika_np' => 'गोसाईकुण्ड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 32,
            'palika_en' => "Naukunda Rural Municipality",
            'palika_np' => 'नौकुण्ड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 32,
            'palika_en' => "Parbatikunda Rural Municipality",
            'palika_np' => 'पार्वतीकुण्ड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 32,
            'palika_en' => "Aamachodingmo Rural Municipality",
            'palika_np' => 'आमाछोदिङमो गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Chautara Sangachowkgadhi Municipality",
            'palika_np' => 'चौतारा साँगाचोकगढी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Barhabise Municipality",
            'palika_np' => 'वाह्रबिसे नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Melamchi Municipality",
            'palika_np' => 'मेलम्ची नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Indrawati Rural Municipality",
            'palika_np' => 'र्इन्द्रावती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Jugal Rural Municipality",
            'palika_np' => 'जुगल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Panchpokhari Thangpal Rural Municipality",
            'palika_np' => 'पाँचपोखरी थाङपाल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Balephi Rural Municipality",
            'palika_np' => 'बलेफी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Bhotekoshi Rural Municipality",
            'palika_np' => 'भोटेकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Lisankhu Pakhar Rural Municipality",
            'palika_np' => 'लिसंखु पाखर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Sunkoshi Rural Municipality",
            'palika_np' => 'सुनकोशी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Helambu Rural Municipality",
            'palika_np' => 'हेलम्बु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 33,
            'palika_en' => "Tripura Sundari Rural Municipality",
            'palika_np' => 'त्रिपुरासुन्दरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Bharatpur Metropolitan",
            'palika_np' => 'भरतपुर महानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Kalika Municipality",
            'palika_np' => 'कालिका नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Khairhani Municipality",
            'palika_np' => 'खैरहनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Madi Municipality",
            'palika_np' => 'माडी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Ratnnagar Municipality",
            'palika_np' => 'रत्ननगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Rapti Municipality",
            'palika_np' => 'राप्ती नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 34,
            'palika_en' => "Ichchhakamana Rural Municipality",
            'palika_np' => 'इच्छाकामना गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Chitwan Rural Municipality",
            'palika_np' => 'हेटौंडा उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'थाहा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Rapti Rural Municipality",
            'palika_np' => 'ईन्द्र सरोवर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'कैलाश गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Rapti Rural Municipality",
            'palika_np' => 'बकैया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'बाग्मती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Rapti Rural Municipality",
            'palika_np' => 'भीमफेदी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'मकवानपुरगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Rapti Rural Municipality",
            'palika_np' => 'मनहरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 35,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'राक्सिराङ्ग गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Baglung Municipality",
            'palika_np' => 'बागलुङ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Galkot Municipality",
            'palika_np' => 'गल्कोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Jaimini Municipality",
            'palika_np' => 'जैमिनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Dhorpatan Municipality",
            'palika_np' => 'ढोरपाटन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Bareng Rural Municipality",
            'palika_np' => 'वरेङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Kathekhola Rural Municipality",
            'palika_np' => 'काठेखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Tamankhola Rural Municipality",
            'palika_np' => 'तमानखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Tarakhola Rural Municipality",
            'palika_np' => 'ताराखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Nisikhola Rural Municipality",
            'palika_np' => 'निसीखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 36,
            'palika_en' => "Badigad Rural Municipality",
            'palika_np' => 'वडिगाड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Gorkha Municipality",
            'palika_np' => 'गोरखा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Palungtar Municipality",
            'palika_np' => 'पालुंगटार नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Barpak Sulikot Rural Municipality",
            'palika_np' => 'बारपाक सुलीकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Siranchok Rural Municipality",
            'palika_np' => 'सिरानचोक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Ajirkot Rural Municipality",
            'palika_np' => 'अजिरकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Aarughat Rural Municipality",
            'palika_np' => 'आरूघाट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Gandaki Rural Municipality",
            'palika_np' => 'गण्डकी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Chum Nubri Rural Municipality",
            'palika_np' => 'चुम नुव्री गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Dharche Rural Municipality",
            'palika_np' => 'धार्चे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Bhimsen Thapa Rural Municipality",
            'palika_np' => 'भिमसेनथापा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 37,
            'palika_en' => "Shahid Lakhan Rural Municipality",
            'palika_np' => 'शहिद लखन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 38,
            'palika_en' => "Pokhara Lekhnath Metropolitan",
            'palika_np' => 'पोखरा लेखनाथ महानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 38,
            'palika_en' => "Annapurna Rural Municipality",
            'palika_np' => 'अन्नपुर्ण गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 38,
            'palika_en' => "Machhapuchhre Rural Municipality",
            'palika_np' => 'माछापुछ्रे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 38,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'मादी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 38,
            'palika_en' => "Rupa Rural Municipality",
            'palika_np' => 'रूपा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Besishahar Municipality",
            'palika_np' => 'बेसीशहर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Madhyanepal Municipality",
            'palika_np' => 'मध्यनेपाल नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Rainas Municipality",
            'palika_np' => 'राईनास नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Sundarbazar Municipality",
            'palika_np' => 'सुन्दरबजार नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Kwaholasothar Rural Municipality",
            'palika_np' => 'क्व्होलासोथार गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Dudhpokhari Rural Municipality",
            'palika_np' => 'दूधपोखरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Dordi Rural Municipality",
            'palika_np' => 'दोर्दी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Marsyangdi Rural Municipality",
            'palika_np' => 'मर्स्याङदी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 39,
            'palika_en' => "Chame Rural Municipality",
            'palika_np' => 'चामे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 40,
            'palika_en' => "Narpa Bhumi Rural Municipality",
            'palika_np' => 'नार्पा भूमी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 40,
            'palika_en' => "Nason Rural Municipality",
            'palika_np' => 'नासोँ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 40,
            'palika_en' => "Manang Disyang Rural Municipality",
            'palika_np' => 'मनाङ डिस्याङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 41,
            'palika_en' => "Gharapjhong Rural Municipality",
            'palika_np' => 'घरपझोङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 41,
            'palika_en' => "Thasang Rural Municipality",
            'palika_np' => 'थासाङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 41,
            'palika_en' => "Lomanthang Rural Municipality",
            'palika_np' => 'लोमन्थाङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 41,
            'palika_en' => "Baragung Muktichhetra Rural Municipality",
            'palika_np' => 'बारागुङ मुक्तिक्षेत्र गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 41,
            'palika_en' => "Lo-Ghekar Damodarkunda Rural Municipality",
            'palika_np' => 'लो-घेकर दामोदरकुण्ड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 42,
            'palika_en' => "Beni Municipality",
            'palika_np' => 'बेनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 42,
            'palika_en' => "Annapurna Rural Municipality",
            'palika_np' => 'अन्नपुर्ण गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 42,
            'palika_en' => "Dhaulagiri Rural Municipality",
            'palika_np' => 'धवलागिरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 42,
            'palika_en' => "Mangala Rural Municipality",
            'palika_np' => 'मंगला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 42,
            'palika_en' => "Malika Rural Municipality",
            'palika_np' => 'मालिका गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 42,
            'palika_en' => "Raghuganga Rural Municipality",
            'palika_np' => 'रघुगंगा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Kawasoti Municipality",
            'palika_np' => 'कावासोती नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Gaindakot Municipality",
            'palika_np' => 'गैंडाकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Devchuli Municipality",
            'palika_np' => 'देवचुली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Bardghat Municipality",
            'palika_np' => 'बर्दघाट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Madhyabindu Municipality",
            'palika_np' => 'मध्यविन्दु नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Ramgram Municipality",
            'palika_np' => 'रामग्राम नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Sunbal Municipality",
            'palika_np' => 'सुनवल नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Hupsekot Rural Municipality",
            'palika_np' => 'हुप्सेकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Sarabal Rural Municipality",
            'palika_np' => 'सरावल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Binayi Triveni Rural Municipality",
            'palika_np' => 'विनयी त्रिवेणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Bulingtar Rural Municipality",
            'palika_np' => 'बुलिङटार गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Baudikali Rural Municipality",
            'palika_np' => 'बौदीकाली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Pratappur Rural Municipality",
            'palika_np' => 'प्रतापपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 43,
            'palika_en' => "Palhinandan Rural Municipality",
            'palika_np' => 'पाल्हीनन्दन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Kusma Municipality",
            'palika_np' => 'कुश्मा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Phalebas Municipality",
            'palika_np' => 'फलेवास नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Jaljala Rural Municipality",
            'palika_np' => 'जलजला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Painyu Rural Municipality",
            'palika_np' => 'पैयूं गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Mahashila Rural Municipality",
            'palika_np' => 'महाशिला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Modi Rural Municipality",
            'palika_np' => 'मोदी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 44,
            'palika_en' => "Bihadi Rural Municipality",
            'palika_np' => 'विहादी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Galyang Municipality",
            'palika_np' => 'गल्याङ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Chapakot Municipality",
            'palika_np' => 'चापाकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Putalibazar Municipality",
            'palika_np' => 'पुतलीबजार नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Bhirkot Municipality",
            'palika_np' => 'भीरकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Waling Municipality",
            'palika_np' => 'वालिङ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Arjun Chaupari Rural Municipality",
            'palika_np' => 'अर्जुन चौपारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Aandhikhola Rural Municipality",
            'palika_np' => 'आँधीखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Kaligandaki Rural Municipality",
            'palika_np' => 'कालीगण्डकी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Phedikhola Rural Municipality",
            'palika_np' => 'फेदीखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Biruwa Rural Municipality",
            'palika_np' => 'विरुवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 45,
            'palika_en' => "Harinas Rural Municipality",
            'palika_np' => 'हरीनास गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Bhanu Municipality",
            'palika_np' => 'भानु नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Bhimad Municipality",
            'palika_np' => 'भिमाद नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Vyas Municipality",
            'palika_np' => 'व्यास नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "ShuklaGandaki Municipality",
            'palika_np' => 'शुक्लागण्डकी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Aanbu Khaireni Rural Municipality",
            'palika_np' => 'आँबुखैरेनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Rishing Rural Municipality",
            'palika_np' => 'ऋषिङ्ग गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Ghiring Rural Municipality",
            'palika_np' => 'घिरिङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Devghat Rural Municipality",
            'palika_np' => 'देवघाट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Myagde Rural Municipality",
            'palika_np' => 'म्याग्दे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 46,
            'palika_en' => "Bandipur Rural Municipality",
            'palika_np' => 'बन्दिपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Kapilvastu Municipality",
            'palika_np' => 'कपिलवस्तु नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Buddhabhumi Municipality",
            'palika_np' => 'बुद्धभुमि नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Shivaraj Municipality",
            'palika_np' => 'शिवराज नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Maharajgunj Municipality",
            'palika_np' => 'महाराजगंज नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Krishnanagar Municipality",
            'palika_np' => 'कृष्णनगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Baanganga Municipality",
            'palika_np' => 'बाणगंगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Mayadevi Rural Municipality",
            'palika_np' => 'मायादेवी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Yasodhara Rural Municipality",
            'palika_np' => 'यसोधरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Shuddhodhan Rural Municipality",
            'palika_np' => 'शुद्धोधन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 47,
            'palika_en' => "Bijaynagar Rural Municipality",
            'palika_np' => 'विजयनगर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 48,
            'palika_en' => "Triveni Susta Rural Municipality",
            'palika_np' => 'त्रिवेणी सुस्ता गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 48,
            'palika_en' => "Pratappur Rural Municipality",
            'palika_np' => 'प्रतापपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 48,
            'palika_en' => "Sarawal Rural Municipality",
            'palika_np' => 'सरावल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 48,
            'palika_en' => "Palhi Nandan Rural Municipality",
            'palika_np' => 'पाल्हीनन्दन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Butwal Sub-Metropolitan",
            'palika_np' => 'बुटवल उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Devdaha Municipality",
            'palika_np' => 'देवदह नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Lumbini sanskritik Municipality",
            'palika_np' => 'लुम्बिनी सांस्कृतिक नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "SainaMaina Municipality",
            'palika_np' => 'सैनामैना नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Siddarthanagar Municipality",
            'palika_np' => 'सिद्दार्थनगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Tilottama Municipality",
            'palika_np' => 'तिलोत्तमा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Gaidhawa Rural Municipality",
            'palika_np' => 'गैडहवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Kanchan Rural Municipality",
            'palika_np' => 'कञ्चन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Kotahimai Rural Municipality",
            'palika_np' => 'कोटहीमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Marchawarimai Rural Municipality",
            'palika_np' => 'मर्चवारीमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Mayadevi Rural Municipality",
            'palika_np' => 'मायादेवी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Om Satiya Rural Municipality",
            'palika_np' => 'ओमसतीया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Rohini Rural Municipality",
            'palika_np' => 'रोहिणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Sammarimai Rural Municipality",
            'palika_np' => 'सम्मरीमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Siyari Rural Municipality",
            'palika_np' => 'सियारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 49,
            'palika_en' => "Shuddhodhan Rural Municipality",
            'palika_np' => 'शुद्धोधन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 50,
            'palika_en' => "Sandhikharka Municipality",
            'palika_np' => 'सन्धिखर्क नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 50,
            'palika_en' => "Shitganga Municipality",
            'palika_np' => 'शितगंगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 50,
            'palika_en' => "Bhumikasthan Municipality",
            'palika_np' => 'भूमिकास्थान नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 50,
            'palika_en' => "Chhatradev Rural Municipality",
            'palika_np' => 'छत्रदेव गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 50,
            'palika_en' => "Pandini Rural Municipality",
            'palika_np' => 'पाणिनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 50,
            'palika_en' => "Malarani Rural Municipality",
            'palika_np' => 'मालारानी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Musikot Municipality",
            'palika_np' => 'मुसिकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Resunga Municipality",
            'palika_np' => 'रेसुंगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Isma Rural Municipality",
            'palika_np' => 'ईस्मा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Kaligandaki Rural Municipality",
            'palika_np' => 'कालीगण्डकी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Gulmi Durbar Rural Municipality",
            'palika_np' => 'गुल्मीदरवार गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Satyawati Rural Municipality",
            'palika_np' => 'सत्यवती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Chandrakot Rural Municipality",
            'palika_np' => 'चन्द्रकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Ruru Rural Municipality",
            'palika_np' => 'रुरु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Chhatrakot Rural Municipality",
            'palika_np' => 'छत्रकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Dhurkot Rural Municipality",
            'palika_np' => 'धुर्कोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Madane Rural Municipality",
            'palika_np' => 'मदाने गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 51,
            'palika_en' => "Malika Rural Municipality",
            'palika_np' => 'मालिका गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Rampur Municipality",
            'palika_np' => 'रामपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Tansen Municipality",
            'palika_np' => 'तानसेन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Nisdi Rural Municipality",
            'palika_np' => 'निस्दी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Purbakhola Rural Municipality",
            'palika_np' => 'पूर्वखोला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Rambha Rural Municipality",
            'palika_np' => 'रम्भा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Mathagadhi Rural Municipality",
            'palika_np' => 'माथागढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Tinau Rural Municipality",
            'palika_np' => 'तिनाउ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Bagnaskali Rural Municipality",
            'palika_np' => 'वगनासकाली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Ribdikot Rural Municipality",
            'palika_np' => 'रिब्दीकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 52,
            'palika_en' => "Rainadevi Chhahara Rural Municipality",
            'palika_np' => 'रैनादेवी छहरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Tulsipur Sub-Metropolitan",
            'palika_np' => 'तुलसीपुर उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Ghorahi Sub-Metropolitan",
            'palika_np' => 'घोराही उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Lamahi Municipality",
            'palika_np' => 'लमही नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Banglachuli Rural Municipality",
            'palika_np' => 'वंगलाचुली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Dangisharan Rural Municipality",
            'palika_np' => 'दंगीशरण गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Gadhawa Rural Municipality",
            'palika_np' => 'गढवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Rajpur Rural Municipality",
            'palika_np' => 'राजपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Rapti Rural Municipality",
            'palika_np' => 'राप्ती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Shantinagar Rural Municipality",
            'palika_np' => 'शान्तिनगर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 53,
            'palika_en' => "Babai Rural Municipality",
            'palika_np' => 'बबई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Pyuthan Municipality",
            'palika_np' => 'प्युठान नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Swargadwari Municipality",
            'palika_np' => 'स्वर्गद्वारी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Gaumukhi Rural Municipality",
            'palika_np' => 'गौमुखी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Mandavi Rural Municipality",
            'palika_np' => 'माण्डवी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Sarumarani Rural Municipality",
            'palika_np' => 'सरुमारानी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Mallarani Rural Municipality",
            'palika_np' => 'मल्लरानी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Naubahini Rural Municipality",
            'palika_np' => 'नौबहिनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Jhimaruk Rural Municipality",
            'palika_np' => 'झिमरुक गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 54,
            'palika_en' => "Airawati Rural Municipality",
            'palika_np' => 'ऐरावती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Rolpa Municipality",
            'palika_np' => 'रोल्पा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Triveni Rural Municipality",
            'palika_np' => 'त्रिवेणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Duikholi Rural Municipality",
            'palika_np' => 'दुइखोली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Madi Rural Municipality",
            'palika_np' => 'माडी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Runtigadhi Rural Municipality",
            'palika_np' => 'रुन्टीगढी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Lungri Rural Municipality",
            'palika_np' => 'लुङ्ग्री गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Sukidaha Rural Municipality",
            'palika_np' => 'सुकिदह गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Sunchhahari Rural Municipality",
            'palika_np' => 'सुनछहरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Suwarnawati Rural Municipality",
            'palika_np' => 'सुबर्णवती गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 55,
            'palika_en' => "Thawang Rural Municipality",
            'palika_np' => 'थवाङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 56,
            'palika_en' => "Musikot Municipality",
            'palika_np' => 'मुसिकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 56,
            'palika_en' => "Chaurjahari Municipality",
            'palika_np' => 'चौरजहारी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 56,
            'palika_en' => "Aathbiskot Municipality",
            'palika_np' => 'आठबिसकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 56,
            'palika_en' => "Putha Uttarganga Rural Municipality",
            'palika_np' => 'पुठा उत्तरगंगा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 56,
            'palika_en' => "Bhume Rural Municipality",
            'palika_np' => 'भूमे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 56,
            'palika_en' => "Sisne Rural Municipality",
            'palika_np' => 'सिस्ने गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Nepalgunj Sub-Metropolitan",
            'palika_np' => 'नेपालगंज उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Kohalpur Municipality",
            'palika_np' => 'कोहलपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Narainapur Rural Municipality",
            'palika_np' => 'नरैनापुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Raptisonari Rural Municipality",
            'palika_np' => 'राप्ती सोनारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Baijnath Rural Municipality",
            'palika_np' => 'वैजनाथ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Khajura Rural Municipality",
            'palika_np' => 'खजुरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Duduwa Rural Municipality",
            'palika_np' => 'डुडुवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 57,
            'palika_en' => "Janaki Rural Municipality",
            'palika_np' => 'जानकी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Gulariya Municipality",
            'palika_np' => 'गुलरिया नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Madhuvan Municipality",
            'palika_np' => 'मधुवन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Rajapur Municipality",
            'palika_np' => 'राजापुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Thakurbaba Municipality",
            'palika_np' => 'ठाकुरबाबा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Bansgadhi Municipality",
            'palika_np' => 'बाँसगढी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Barbardiya Municipality",
            'palika_np' => 'बारबर्दिया नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Badhaiyatal Rural Municipality",
            'palika_np' => 'बढैयाताल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 58,
            'palika_en' => "Geruwa Rural Municipality",
            'palika_np' => 'गेरुवा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 59,
            'palika_en' => "Sani Bheri Rural Municipality",
            'palika_np' => 'सानीभेरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 59,
            'palika_en' => "Tribeni Rural Municipality",
            'palika_np' => 'त्रिवेणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 59,
            'palika_en' => "Banphikot Rural Municipality",
            'palika_np' => 'बाँफिकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Sharda Municipality",
            'palika_np' => 'शारदा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Bagchaur Municipality",
            'palika_np' => 'बागचौर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Bangad Kupinde Municipality",
            'palika_np' => 'बनगाड कुपिन्ड़े नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Kalimati Rural Municipality",
            'palika_np' => 'कालीमाटी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Tribeni Rural Municipality",
            'palika_np' => 'त्रिवेणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Kapurkot Rural Municipality",
            'palika_np' => 'कपुरकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Chhatreshwari Rural Municipality",
            'palika_np' => 'छत्रेश्वरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Dhorchaur Rural Municipality",
            'palika_np' => 'ढोरचौर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Kumakhmalika Rural Municipality",
            'palika_np' => 'कुमाखमालिका गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 60,
            'palika_en' => "Darma Rural Municipality",
            'palika_np' => 'दार्मा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Thuli Bheri Municipality",
            'palika_np' => 'ठुली भेरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Tripurasundari Municipality",
            'palika_np' => 'त्रिपुरासुन्दरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Dolpo Buddha Rural Municipality",
            'palika_np' => 'डोल्पो बुद्ध गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "She Phoksundo Rural Municipality",
            'palika_np' => 'शे फोक्सुन्डो गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Jagadulla Rural Municipality",
            'palika_np' => 'जगदुल्ला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Mudkechula Rural Municipality",
            'palika_np' => 'मुड्केचुला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Kaike Rural Municipality",
            'palika_np' => 'काईके गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 61,
            'palika_en' => "Chharka Tangsong Rural Municipality",
            'palika_np' => 'छार्का ताङसोङ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Simkot Rural Municipality",
            'palika_np' => 'सिमकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Namkha Rural Municipality",
            'palika_np' => 'नाम्खा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Kharpunath Rural Municipality",
            'palika_np' => 'खार्पुनाथ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Sarkegad Rural Municipality",
            'palika_np' => 'सर्केगाड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Chankheli Rural Municipality",
            'palika_np' => 'चंखेली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Adanchuli Rural Municipality",
            'palika_np' => 'अदानचुली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 62,
            'palika_en' => "Tanjakot Rural Municipality",
            'palika_np' => 'ताँजाकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "ChandanNath Municipality",
            'palika_np' => 'चन्दननाथ नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Kankasundari Rural Municipality",
            'palika_np' => 'कनकासुन्दरी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Sinja Rural Municipality",
            'palika_np' => 'सिंजा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Hima Rural Municipality",
            'palika_np' => 'हिमा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Tila Rural Municipality",
            'palika_np' => 'तिला गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Guthichaur Rural Municipality",
            'palika_np' => 'गुठिचौर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Tatopani Rural Municipality",
            'palika_np' => 'तातोपानी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 63,
            'palika_en' => "Patarasi Rural Municipality",
            'palika_np' => 'पातारासी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Khadachakra Municipality",
            'palika_np' => 'खाडाचक्र नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Raskot Municipality",
            'palika_np' => 'रास्कोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Tilagufa Municipality",
            'palika_np' => 'तिलागुफा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Pachaljharana Rural Municipality",
            'palika_np' => 'पचालझरना गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Sanni Triveni Rural Municipality",
            'palika_np' => 'सान्नी त्रिवेणी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Narharinath Rural Municipality",
            'palika_np' => 'नरहरिनाथ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Shubha Kalika Rural Municipality",
            'palika_np' => 'शुभ कालिका गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Mahawai Rural Municipality",
            'palika_np' => 'महावै गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 64,
            'palika_en' => "Palata Rural Municipality",
            'palika_np' => 'पलाता गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 65,
            'palika_en' => "Chayanath Rara Municipality",
            'palika_np' => 'छायाँनाथ रारा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 65,
            'palika_en' => "Mugum Karmarong Rural Municipality",
            'palika_np' => 'मुगुम कार्मारोंग गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 65,
            'palika_en' => "Soru Rural Municipality",
            'palika_np' => 'सोरु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 65,
            'palika_en' => "Khatyad Rural Municipality",
            'palika_np' => 'खत्याड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Birendranagar Municipality",
            'palika_np' => 'बीरेन्द्रनगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Bheriganga Municipality",
            'palika_np' => 'भेरीगंगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Gurbhakot Municipality",
            'palika_np' => 'गुर्भाकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Panchapuri Municipality",
            'palika_np' => 'पंचपुरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Lekhbeshi Municipality",
            'palika_np' => 'लेकबेशी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Chaukune Rural Municipality",
            'palika_np' => 'चौकुने गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Barahatal Rural Municipality",
            'palika_np' => 'बराहताल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Chingad Rural Municipality",
            'palika_np' => 'चिङ्गाड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 66,
            'palika_en' => "Simta Rural Municipality",
            'palika_np' => 'सिम्ता गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Narayan Municipality",
            'palika_np' => 'नारायण नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Dullu Municipality",
            'palika_np' => 'दुल्लु नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Chamunda Bindrasaini Municipality",
            'palika_np' => 'चामुण्डा बिन्द्रासैनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "AathBis Municipality",
            'palika_np' => 'आठबीस नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Bhagawatimai Rural Municipality",
            'palika_np' => 'भगवतीमाई गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Gurans Rural Municipality",
            'palika_np' => 'गुराँस गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Dungeshwar Rural Municipality",
            'palika_np' => 'डुंगेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Naumule Rural Municipality",
            'palika_np' => 'नौमुले गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Mahabu Rural Municipality",
            'palika_np' => 'महावु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Bhairabi Rural Municipality",
            'palika_np' => 'भैरवी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 67,
            'palika_en' => "Thantikandh Rural Municipality",
            'palika_np' => 'ठाँटीकाँध गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Bheri Municipality",
            'palika_np' => 'भेरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Chhedagad Municipality",
            'palika_np' => 'छेडागाड नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Triveni Nalgad Municipality",
            'palika_np' => 'त्रिवेणी नलगाड नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Kushe Rural Municipality",
            'palika_np' => 'कुसे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Junichande Rural Municipality",
            'palika_np' => 'जुनीचाँदे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Barekot Rural Municipality",
            'palika_np' => 'बारेकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 68,
            'palika_en' => "Shivalaya Rural Municipality",
            'palika_np' => 'शिवालय गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Dhangadhi Sub-Metropolitan",
            'palika_np' => 'धनगढी उपमहानगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Tikapur Municipality",
            'palika_np' => 'टिकापुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Ghodaghodi Municipality",
            'palika_np' => 'घोडाघोडी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Lamkhichuha Municipality",
            'palika_np' => 'लम्किचुहा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Bhajani Municipality",
            'palika_np' => 'भजनी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Godawari Municipality",
            'palika_np' => 'गोदावरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Gauriganga Municipality",
            'palika_np' => 'गौरीगंगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Janaki Rural Municipality",
            'palika_np' => 'जानकी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Bardagoriya Rural Municipality",
            'palika_np' => 'बर्गगोरिया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Mohanyal Rural Municipality",
            'palika_np' => 'मोहन्याल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Kailari Rural Municipality",
            'palika_np' => 'कैलारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Joshipur Rural Municipality",
            'palika_np' => 'जोशीपुर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 69,
            'palika_en' => "Chure Rural Municipality",
            'palika_np' => 'चुरे गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Mangalsen Municipality",
            'palika_np' => 'मंगलसेन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Kamalbazar Municipality",
            'palika_np' => 'कमलबजार नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Sanfebagar",
            'palika_np' => 'साँफेबगर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Panchadeval Binayak Municipality",
            'palika_np' => 'पंचदेवल विनायक नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Chaurpati Rural Municipality",
            'palika_np' => 'चौरपाटी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Mellekh Rural Municipality",
            'palika_np' => 'मेल्लेख गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Bannigadi Jayagad Rural Municipality",
            'palika_np' => 'बान्नीगडीजैगड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Ramaroshan Rural Municipality",
            'palika_np' => 'रामारोशन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Dhankari Rural Municipality",
            'palika_np' => 'ढँकारी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 70,
            'palika_en' => "Turmakhand Rural Municipality",
            'palika_np' => 'तुर्माखाँद गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Dipayal Silgadi Municipality",
            'palika_np' => 'दिपायल सिलगडी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Shikhar Municipality",
            'palika_np' => 'शिखर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Purbichauki Rural Municipality",
            'palika_np' => 'पूर्वीचौकी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Badikedar Rural Municipality",
            'palika_np' => 'बड्डी केदार गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Jorayal Rural Municipality",
            'palika_np' => 'जोरायल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Sayal Rural Municipality",
            'palika_np' => 'सायल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Aadarsha Rural Municipality",
            'palika_np' => 'आदर्श गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "K.I. Singh Rural Municipality",
            'palika_np' => 'केआईसिंह गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 71,
            'palika_en' => "Bogatan-Phudsil Rural Municipality",
            'palika_np' => 'वोगटान–फुड्सिल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "JayaPrithivi Municipality",
            'palika_np' => 'जयपृथिवी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Bungal Municipality",
            'palika_np' => 'बुंगल नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Talkot Rural Municipality",
            'palika_np' => 'तलकोट गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Masta Rural Municipality",
            'palika_np' => 'मष्टा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Thalara Rural Municipality",
            'palika_np' => 'थलारा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Khaptad Chhanna Rural Municipality",
            'palika_np' => 'खप्तड छान्ना गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Bitthadchir Rural Municipality",
            'palika_np' => 'बित्थडचिर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Surma Rural Municipality",
            'palika_np' => 'सुर्मा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Chhabis Pathibhera Rural Municipality",
            'palika_np' => 'छब्बीसपाथिभेरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Durgathali Rural Municipality",
            'palika_np' => 'दुर्गाथली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Kedarsyu Rural Municipality",
            'palika_np' => 'केदारस्यु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 72,
            'palika_en' => "Kanda Saipal Rural Municipality",
            'palika_np' => 'काँडा सइपाल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Badimalika Municipality",
            'palika_np' => 'बडीमालिका नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Triveni Municipality",
            'palika_np' => 'त्रिवेणी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Budhiganga Municipality",
            'palika_np' => 'बुढीगंगा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Budhinanda Municipality",
            'palika_np' => 'बुढीनन्दा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Gaumul Rural Municipality",
            'palika_np' => 'गौमुल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Swami Kartik Khapar Rural Municipality",
            'palika_np' => 'स्वामिकार्तिक खापर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Khaptad Chhededaha Rural Municipality",
            'palika_np' => 'खप्तड छेडेदह गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Himali Rural Municipality",
            'palika_np' => 'हिमाली गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 73,
            'palika_en' => "Swami Kartik Khapar Rural Municipality",
            'palika_np' => 'स्वामिकार्तिक खापर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Bhimdatta Municipality",
            'palika_np' => 'भिमदत्त नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Punarbas Municipality",
            'palika_np' => 'पुनर्बास नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Bedkot Municipality",
            'palika_np' => 'बेदकोट नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Mahakali Municipality",
            'palika_np' => 'महाकाली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Shuklafata Municipality",
            'palika_np' => 'शुक्लाफाटा नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Belauri Municipality",
            'palika_np' => 'बेलौरी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Krishnapur Municipality",
            'palika_np' => 'कृष्णपुर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Beldandi Rural Municipality",
            'palika_np' => 'बेलडाँडी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 74,
            'palika_en' => "Laljhadi Rural Municipality",
            'palika_np' => 'लालझाँडी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Amargadhi Municipality",
            'palika_np' => 'अमरगढी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Parshuram Municipality",
            'palika_np' => 'परशुराम नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Aalitaal Rural Municipality",
            'palika_np' => 'आलिताल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Bhageshwar Rural Municipality",
            'palika_np' => 'भागेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Navadurga Rural Municipality",
            'palika_np' => 'नवदुर्गा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Ajaymeru Rural Municipality",
            'palika_np' => 'अजयमेरु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 75,
            'palika_en' => "Ganyapadhura Rural Municipality",
            'palika_np' => 'गन्यापधुरा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Dasharathchand Municipality",
            'palika_np' => 'दशरथचन्द नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Patan Municipality",
            'palika_np' => 'पाटन नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Melauli Municipality",
            'palika_np' => 'मेलौली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Puchaundi Municipality",
            'palika_np' => 'पुचौडी नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Surnaya Rural Municipality",
            'palika_np' => 'सुर्नया गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Sigas Rural Municipality",
            'palika_np' => 'सिगास गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Shivanath Rural Municipality",
            'palika_np' => 'शिवनाथ गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Pancheshwar Rural Municipality",
            'palika_np' => 'पञ्चेश्वर गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Dogdakedar Rural Municipality",
            'palika_np' => 'दोगडाकेदार गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 76,
            'palika_en' => "Dilashaini Rural Municipality",
            'palika_np' => 'डिलाशैनी गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Mahakali Municipality",
            'palika_np' => 'महाकाली नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Shailyashikhar Municipality",
            'palika_np' => 'शैल्यशिखर नगरपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Malikarjun Rural Municipality",
            'palika_np' => 'मालिकार्जुन गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Api Himal Rural Municipality",
            'palika_np' => 'अपि हिमाल गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Duhu Rural Municipality",
            'palika_np' => 'दुहु गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Naugad Rural Municipality",
            'palika_np' => 'नौगाड गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Marma Rural Municipality",
            'palika_np' => 'मार्मा गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Lekam Rural Municipality",
            'palika_np' => 'लेकम गाउँपालिका'
        ]);
        DB::table('palikas')->insert([
            'district_id' => 77,
            'palika_en' => "Byas Rural Municipality",
            'palika_np' => 'ब्याँस गाउँपालिका'
        ]);

    }
}
