<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliersName = [
                "Botol Kaca","Fluffy","Rudi Melati","Pliko","Ruel/Else","Bed Lucky","Nezumi","The Jay''s","Baby Bess","PT Kharisma Pakmu (Sleek)","PT Javinde Suryara Tsatu","Swan","Adi Rahmanto","Boca","Jade Baby","Jaya Mas","Shankusen","Nia Local","PT Crown","Jessy","Sunflower","UD Hokie","Gudang Jaya Abadi","Jelita","Hunday","Nisikawa","Junior Style","Aruchi","Tom-Tom","UD Sekawan","Soar Brand","Cheddy","Libby","Buana Henjo (KTS)","JS Jakarta","Okio","Camera","Babyhai","Baby Willo","PT Gempita Maju Selaras","PT Leon Boga Sentosa","","PT Oba","UD Sakura","K My Love","Acf (Bka)","Vinina","Putra Khatulistiwa","Korset (Quen)","PalmerHouse","PT Jeremy","Dixon","Jingle","PT Golden Raja (Gabag)","PT Dwi Surya","Bidadari","PT Alamii Natura Sejahtera","Indoscot","Jovan Busana","Aneka Sukses Semesta","Love & Care","Rainbow","PT Manunggal Guna Abadi","Bsm","Hoga","Joeyi","Mercy Collections","Cherry House","Jingga","Pigeon","Pak Stevi","Chekido","Zed Kid","Babytha","Dialogue","Abiy Baby","Elvira","Kum-Kum","Charmindo","Momeasy","Texco","Akiong","Mika Kimi","PT Ghina Luken Kencana","Iq Baby","CV Atar Global (Nova)","Mamalia","Petite","Omiland","Mega","Eru Baby","Darby","PT Permai Karya Persada","PT Pasific Indah Pratama (Space Baby)","Mom''s Gift","A Thie Jaya","SBS (Little Baby)","Kj Chi Chi","Glory","Mastela","Dell","Baby Lucky","Gd Pandawa","PT Bevos Surya","Jeje Kids","Perlak LD","Huki","Pontjo","Baby Dream","UD Nusantara","Rifani","MamyPoko","Devi (Bs Nia)","Boboko","Winteku","Moom Baby","Chintaka Baby","CV JJ Sukses Makmur","Doremi","Bib","Makuku","Avent","Snoby","Ci Nita","Putra Niaga","Momz Skin Care","KK Pingo","Tumbuh Subur Makmur","Grazia","PT Royal Mitra (Gea)","Beo Factory","Hello Baby","PT Antarmitra (Pure Baby)","Ko Oseng","Surya Abadi (Gur Beauty)","Zwitsal (Firdaus)","Hokiku","Scoora","PT Trimanunggal (Bebe Smart)","Pak Agung Topi","Lisa/Riksa","Sugar Baby","Baby Life","Nia Import","Glora BTB","Baby Joy","Hachi","Lusty Bunny","Kyoto","Babylo","Kum-Kum (Nia)","Happy Time","Surya Abadi Garmindo","Molek","Keluarga Mandiri","Baby Safe","Sido Mumbul","Mom''s Bandung (Devi)"
        ];
        $faker = Factory::create();
        foreach ($suppliersName as $name) {

        $accountNumber = $faker->numerify('########'); // Generates an 8-digit random number
        $taxId = strtoupper($faker->bothify('??#??#??##')); // Generates a random alphanumeric string like 'AB3CD2E1'
        $phone = $faker->numerify('###-###-####'); // Generates a random phone number like '123-456-7890'
        $email = $faker->safeEmail; // Generates a random email address
            Supplier::firstOrCreate(
                ['company_name' => $name],
                [
                    'agency_name' => $name,
                    'account_number' => $accountNumber,
                    'tax_id' => $taxId,
                    'phone' => $phone,
                    'email' => $email,
                ]
            );
        }
    }
}
